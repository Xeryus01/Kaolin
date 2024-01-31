<?php

namespace App\Controllers;

class Konsultasi extends BaseController
{
    public function index(): string
    {
        // setting zona waktu menjadi jakarta GMT +7
        date_default_timezone_set("Asia/Jakarta");
        return view('home');
    }

    public function pengajuan_konsultasi(): string
    {
        return view('konsultasi');
    }

    public function post_konsultasi()
    {
        $model = new \App\Models\KonsultasiModel();

        // generate token konsultasi
        $token =  generate_token();
        $token_admin =  generate_token();

        // pengambilan data hasil form konsultasi dan penyiapan data yang dimasukan database
        $data = $this->request->getPost();
        $data['tiket'] = $token;
        $data['token_admin'] = $token_admin;
        $data['konfirmasi_admin'] = 0;
        $data['created_by'] = session('user')['id'];
        $data['user_pekerjaan'] = $data['pekerjaan'];

        // penyiapan no telepon
        $no_user = standardize_phone_number($data['telepon']);
        $data['telepon'] = $no_user;

        // try catch apabila ada kesalahan saat mengupload ke dalam database
        try {
            // insert data ke dalam database
            $model->insert($data);

            // notif wa apabila pengajuan konsultasi berhasil dilakukan

            $metode = standardize_metode($data['metode']);
            $sesi = standardize_sesi($data['sesi']);
            $date = indonesian_date($data['tanggal']);

            $message =
                'Pengajuan konsultasi dengan detail sebagai berikut
- No tiket ' . $token . '
- Metode ' . $metode . '
- Tanggal ' . $date . '
- Sesi ' . $sesi . PHP_EOL . '
Pengajuan telah diterima, mohon ditunggu untuk jadwal konsultasi yang akan diberikan';
            $admin_text = '*PEMBERITAHUAN*' . PHP_EOL .
                'Kegiatan konsultasi dengan no tiket ' . $token . ' pada tanggal ' . $date . ' dengan sesi ' . $sesi . ' telah diterima' . PHP_EOL .
                'Klik link berikut untuk melakukan konfirmasi pengajuan konsultasi ' . PHP_EOL . PHP_EOL .
                base_url('konfirmasi_pengajuan/' . $token . '/' . $token_admin);

            notif_wa($message, $no_user);
            $this->pengajuan_wa($message, $admin_text, $no_user);
        } catch (\Throwable $th) {
            // notif wa apabila pengajuan konsultasi gagal dilakukan
            $message = 'Pengajuan konsultasi anda dengan no tiket ' . $token . ' gagal diajukan, mohon ulangi permohonan pengajuan yang dibuat';
            $admin_text = false;
            $this->pengajuan_wa($message, $admin_text, $no_user);
        }
        // tampilkan notif berhasil atau gagal di website

        return redirect()->to(base_url());
    }

    public function my_menu(): string
    {
        $model = new \App\Models\KonsultasiModel();

        // get semua konsultasi yang dibuat user login
        $user_id = session()->get()['user']['id'];
        $query = $model->getByUser($user_id);

        $data = [
            'kueri' => $query
        ];


        for ($i = 0; $i < count($data['kueri']); $i++) {
            $data['kueri'][$i]['itanggal'] = indonesian_date($data['kueri'][$i]['tanggal']);
            $data['kueri'][$i]['kategori_instansi'] = standardize_instansi($data['kueri'][$i]['kategori_instansi']);
        }
        // sort data konsultasi berdasarkan tanggal konsultasi
        $dates = array_column($data['kueri'], 'tanggal');
        array_multisort($dates, SORT_ASC, $data['kueri']);

        return view('my_menu', $data);
    }

    public function konfirmasi_pengajuan($token, $token_admin)
    {
        // konfirmasi dari admin untuk pengajuan konsultasi
        $model = new \App\Models\KonsultasiModel();
        try {
            $model->set('konfirmasi_admin', 1)
                ->where('tiket', $token)
                ->where('token_admin', $token_admin)
                ->update();

            // notifikasi WA konfirmasi pengajuan
            $konsultasi = $model->getByTicket($token);
            $tanggal = indonesian_date(date("Y-m-d H:i:s"));

            $message =
                'Pengajuan konsultasi Anda dengan No tiket ' . $token . ' telah dikonfirmasi oleh Admin pada ' . $tanggal . '.' . PHP_EOL . '
Mohon ditunggu hingga jadwal yang telah disetujui.';
            $admin_text = 'Pengajuan konsultasi dengan No tiket ' . $token . ' telah dikonfirmasi oleh Admin pada ' . $tanggal . '.';
            $this->pengajuan_wa($message, $admin_text, $konsultasi[0]['telepon']);

            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan konfirmasi konsultasi dengan no tiket" . $token;
            echo $th;
        }
    }

    public function batalkan_pengajuan($token)
    {
        // konfirmasi dari admin untuk pengajuan konsultasi
        $model = new \App\Models\KonsultasiModel();
        try {
            $model->set('konfirmasi_admin', 0)
                ->where('tiket', $token)
                ->update();

            // notifikasi WA konfirmasi pengajuan
            $konsultasi = $model->getByTicket($token);
            $tanggal = indonesian_date(date("Y-m-d H:i:s"));

            $message =
                'Pengajuan konsultasi Anda dengan No tiket ' . $token . ' telah dibatalkan oleh Admin pada ' . $tanggal . '.' . PHP_EOL . '
    Mohon ditunggu hingga pemberitahuan lebih lanjut atau ajukan konsultasi baru.';
            $admin_text = 'Pengajuan konsultasi dengan No tiket ' . $token . ' telah berhasil dibatalkan pada ' . $tanggal . '.';
            $this->pengajuan_wa($message, $admin_text, $konsultasi[0]['telepon']);

            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan konfirmasi konsultasi dengan no tiket" . $token;
            echo $th;
        }
    }

    public function detail_konsultasi()
    {
        $model = new \App\Models\KonsultasiModel();
        $tiket = $_GET['tiket'];
        $konsultasi = $model->getByTicket($tiket);
        $id = $konsultasi[0]['id'];
        $metode = $konsultasi[0]['metode'];

        $konsultasi[0]['link'] = null;
        $konsultasi[0]['bukti'] = null;

        if ($metode == 3) {
            if (isset($model->getLink($id)[0])) {
                $konsultasi[0]['link'] = $model->getLink($id)[0];
                if (isset($model->getBukti($id, $metode)[0])) {
                    $konsultasi[0]['bukti'] = $model->getBukti($id, $metode)[0];
                }
            }
        } else {
            if (isset($model->getBukti($id, $metode)[0])) {
                $konsultasi[0]['bukti'] = $model->getBukti($id, $metode)[0];
            }
        }
        $konsultasi[0]['sesi'] = standardize_sesi($konsultasi[0]['sesi']);
        if ($konsultasi[0]['konfirmasi_admin'] == 0) {
            $konsultasi[0]['konfirmasi_admin'] = "Belum Dikonfirmasi";
        } else {
            $konsultasi[0]['konfirmasi_admin'] = "Sudah Dikonfirmasi";
        }
        $data = $konsultasi[0];
        $data['tanggal'] = indonesian_date($data['tanggal']);

        return view('detail', $data);
    }

    public function my_detail()
    {
        $model = new \App\Models\KonsultasiModel();
        $tiket = $_GET['tiket'];
        $konsultasi = $model->getByTicket($tiket);
        $id = $konsultasi[0]['id'];
        $metode = $konsultasi[0]['metode'];

        $konsultasi[0]['link'] = null;
        $konsultasi[0]['bukti'] = null;

        if ($metode == 3) {
            if (isset($model->getLink($id)[0])) {
                $konsultasi[0]['link'] = $model->getLink($id)[0];
                if (isset($model->getBukti($id, $metode)[0])) {
                    $konsultasi[0]['bukti'] = $model->getBukti($id, $metode)[0];
                }
            }
        } else {
            if (isset($model->getBukti($id, $metode)[0])) {
                $konsultasi[0]['bukti'] = $model->getBukti($id, $metode)[0];
            }
        }
        $konsultasi[0]['sesi'] = standardize_sesi($konsultasi[0]['sesi']);
        if ($konsultasi[0]['konfirmasi_admin'] == 0) {
            $konsultasi[0]['konfirmasi_admin'] = "Belum Dikonfirmasi";
        } else {
            $konsultasi[0]['konfirmasi_admin'] = "Sudah Dikonfirmasi";
        }
        $data = $konsultasi[0];
        $data['tanggal'] = indonesian_date($data['tanggal']);

        return view('my_detail', $data);
    }

    public function feedback_konsultasi()
    {
        $model = new \App\Models\KonsultasiModel();
        $data = $this->request->getPost();

        $token = $data['tiket'];
        $user_id = session()->get()['user']['id'];
        $konsultasi = $model->getByTicket($token)[0];
        if (!isset($data['saran_masukan'])) {
            $data['saran_masukan'] = null;
        }
        $insert = [
            "konsultasi_id" => $konsultasi['id'],
            "konsultasi_user" => $user_id,
            "kepuasan" => $data['kepuasanOptions'],
            "kemudahan" => $data['kemudahanOptions'],
            "feedback" => $data['saran_masukan']
        ];

        $query = $model->db
            ->table('feedback')
            ->upsert($insert);

        try {
            $query;
            return redirect()->to(base_url('my_menu'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan penambahan bukti konsultasi";
            echo $th;
        }
    }

    public function pengajuan_wa($text, $admin_text, $no_user)
    {
        // persiapan no hp kaolin dan api_key
        $no_admin = '0895345599400';
        $apikey = 'ucFi3Q_prntULc6XWb6x';

        $curl = curl_init();

        // Pesan WA Admin
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $no_admin,
                'message' => $admin_text,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apikey //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }

        if (isset($error_msg)) {
            echo $error_msg;
        }

        // Pesan WA Pengguna
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $no_user,
                'message' => $text,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $apikey //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }

        if (isset($error_msg)) {
            echo $error_msg;
        }

        curl_close($curl);
    }
}
