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
        $length = 6;
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $token =  substr(str_shuffle($str), 0, $length);
        $token_admin =  substr(str_shuffle($str), 0, $length);

        // pengambilan data hasil form konsultasi dan penyiapan data yang dimasukan database
        $data = $this->request->getPost();
        $data['tiket'] = $token;
        $data['token_admin'] = $token_admin;
        $data['konfirmasi_admin'] = 0;
        $data['created_by'] = session('user')['id'];
        $data['user_pekerjaan'] = $data['pekerjaan'];

        // penyiapan no telepon
        $telepon = $data['telepon'];
        if (substr($telepon, 0, 2) == "08") {
            $telepon = '+62' . substr($telepon, 1, strlen($telepon));
        } elseif (substr($telepon, 0, 2) == "62") {
            $telepon = '+62' . substr($telepon, 2, strlen($telepon));
        } else {
            $telepon = $telepon;
        }
        $no_user = $telepon;
        $data['telepon'] = $no_user;

        // try catch apabila ada kesalahan saat mengupload ke dalam database
        try {
            // insert data ke dalam database
            $model->insert($data);

            // notif wa apabila pengajuan konsultasi berhasil dilakukan
            switch ($data['metode']) {
                case '1':
                    $metode = 'Offline';
                    break;
                case '2':
                    $metode = 'Online (Whatsapp)';
                    break;
                default:
                    $metode = 'Online (Zoom)';
                    break;
            }

            switch ($data['sesi']) {
                case 'I':
                    $sesi = 'I (08.30 - 09.10 WIB)';
                    break;
                case 'II':
                    $sesi = 'II (10.00 - 10.40 WIB)';
                    break;
                default:
                    $sesi = 'III (13.30 - 14.10 WIB)';
                    break;
            }

            $date = strtotime($data['tanggal']);
            $date = date("d-m-Y", $date);

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

            switch ($data['kueri'][$i]['kategori_instansi']) {
                case '1':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Negara';
                    break;
                case '2':
                    $data['kueri'][$i]['kategori_instansi'] = 'Kementerian & Lembaga Pemerintah';
                    break;
                case '3':
                    $data['kueri'][$i]['kategori_instansi'] = 'TNI/Polri/BIN Kejaksaan';
                    break;
                case '4':
                    $data['kueri'][$i]['kategori_instansi'] = 'Pemerintah Daerah';
                    break;
                case '5':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Internasional';
                    break;
                case '6':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Penelitian & Pendidikan';
                    break;
                case '7':
                    $data['kueri'][$i]['kategori_instansi'] = 'BUMN/BUMD';
                    break;
                default:
                    $data['kueri'][$i]['kategori_instansi'] = 'Swasta';
                    break;
            }
        }

        // sort data konsultasi berdasarkan tanggal konsultasi
        $dates = array_column($data['kueri'], 'tanggal');
        array_multisort($dates, SORT_ASC, $data['kueri']);

        return view('my_menu', $data);
    }

    public function pengajuan_wa($text, $admin_text, $no_user)
    {
        // persiapan no hp kaolin dan api_key
        $no_admin = '+62895345599400';
        $apikey = '3a9DzEE5TkQf';

        $url_user = 'http://api.textmebot.com/send.php?recipient=' . $no_user . '&apikey=' . $apikey . '&text=' . urlencode($text) . '&json=yes';
        $url_admin = 'http://api.textmebot.com/send.php?recipient=' . $no_admin . '&apikey=' . $apikey . '&text=' . urlencode($admin_text) . '&json=yes';

        $ch = curl_init($url_user);
        $result = curl_exec($ch);

        if ($admin_text != false)
            if ($result) {
                sleep(8);
                curl_setopt($ch, CURLOPT_URL, $url_admin);
                $result = curl_exec($ch);
            }
        curl_close($ch);
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
            $alert = "<script>toastr.info('Are you the 6 fingered man?')</script>";
            session()->setFlashdata('flash', $alert);
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
            $alert = "<script>toastr.info('Are you the 6 fingered man?')</script>";
            session()->setFlashdata('flash', $alert);
            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan konfirmasi konsultasi dengan no tiket" . $token;
            echo $th;
        }
    }

    public function detail_konsultasi()
    {
        // session()->get()['user']['id'];

        date_default_timezone_set("Asia/Jakarta");
        $model = new \App\Models\KonsultasiModel();

        // get semua konsultasi
        $query = $model->getAll();

        $data = [
            'kueri' => $query
        ];

        for ($i = 0; $i < count($data['kueri']); $i++) {
            $time = strtotime($data['kueri'][$i]['tanggal']);
            $data['kueri'][$i]['tanggal'] = date("d-m-Y", $time);

            switch ($data['kueri'][$i]['kategori_instansi']) {
                case '1':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Negara';
                    break;
                case '2':
                    $data['kueri'][$i]['kategori_instansi'] = 'Kementerian & Lembaga Pemerintah';
                    break;
                case '3':
                    $data['kueri'][$i]['kategori_instansi'] = 'TNI/Polri/BIN Kejaksaan';
                    break;
                case '4':
                    $data['kueri'][$i]['kategori_instansi'] = 'Pemerintah Daerah';
                    break;
                case '5':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Internasional';
                    break;
                case '6':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Penelitian & Pendidikan';
                    break;
                case '7':
                    $data['kueri'][$i]['kategori_instansi'] = 'BUMN/BUMD';
                    break;
                default:
                    $data['kueri'][$i]['kategori_instansi'] = 'Swasta';
                    break;
            }
        }

        return view('detail', $data);
        // // konfirmasi dari admin untuk pengajuan konsultasi
        // $model = new \App\Models\KonsultasiModel();
        // $konsultasi = $model->getByTicket($tiket);
        // // $konsultasi[0]['link'] = "";
        // if ($konsultasi[0]['metode'] == 3) {
        //     $konsultasi[0]['link'] = $model->getDetail($konsultasi[0]['id'])[0];
        // } else {
        //     $konsultasi[0]['link'] = null;
        // }
        // $user_id = session()->get()['user']['id'];
        // $query = $model->getByUser($user_id);

        // $data = [
        //     'kueri' => $query
        // ];


        // return view('detail');
    }

    // public function detail(): string
    // {
    //     // session()->get()['user']['id'];
    //     $data = $this->request->getVar();
    //     // dd($data);
    //     date_default_timezone_set("Asia/Jakarta");
    //     $model = new \App\Models\KonsultasiModel();

    //     // get semua konsultasi
    //     $query = $model->getAll();

    //     $data = [
    //         'kueri' => $query
    //     ];

    //     for ($i = 0; $i < count($data['kueri']); $i++) {
    //         $time = strtotime($data['kueri'][$i]['tanggal']);
    //         $data['kueri'][$i]['tanggal'] = date("d-m-Y", $time);

    //         switch ($data['kueri'][$i]['kategori_instansi']) {
    //             case '1':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Negara';
    //                 break;
    //             case '2':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Kementerian & Lembaga Pemerintah';
    //                 break;
    //             case '3':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'TNI/Polri/BIN Kejaksaan';
    //                 break;
    //             case '4':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Pemerintah Daerah';
    //                 break;
    //             case '5':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Internasional';
    //                 break;
    //             case '6':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Penelitian & Pendidikan';
    //                 break;
    //             case '7':
    //                 $data['kueri'][$i]['kategori_instansi'] = 'BUMN/BUMD';
    //                 break;
    //             default:
    //                 $data['kueri'][$i]['kategori_instansi'] = 'Swasta';
    //                 break;
    //         }
    //     }

    //     return view('detail', $data);
    // }

    public function feedback_konsultasi()
    {
        // session()->get()['user']['id'];

        date_default_timezone_set("Asia/Jakarta");
        $model = new \App\Models\KonsultasiModel();

        // get semua konsultasi
        $query = $model->getAll();

        $data = [
            'kueri' => $query
        ];

        for ($i = 0; $i < count($data['kueri']); $i++) {
            $time = strtotime($data['kueri'][$i]['tanggal']);
            $data['kueri'][$i]['tanggal'] = date("d-m-Y", $time);

            switch ($data['kueri'][$i]['kategori_instansi']) {
                case '1':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Negara';
                    break;
                case '2':
                    $data['kueri'][$i]['kategori_instansi'] = 'Kementerian & Lembaga Pemerintah';
                    break;
                case '3':
                    $data['kueri'][$i]['kategori_instansi'] = 'TNI/Polri/BIN Kejaksaan';
                    break;
                case '4':
                    $data['kueri'][$i]['kategori_instansi'] = 'Pemerintah Daerah';
                    break;
                case '5':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Internasional';
                    break;
                case '6':
                    $data['kueri'][$i]['kategori_instansi'] = 'Lembaga Penelitian & Pendidikan';
                    break;
                case '7':
                    $data['kueri'][$i]['kategori_instansi'] = 'BUMN/BUMD';
                    break;
                default:
                    $data['kueri'][$i]['kategori_instansi'] = 'Swasta';
                    break;
            }
        }

        return view('detail', $data);
        // // konfirmasi dari admin untuk pengajuan konsultasi
        // $model = new \App\Models\KonsultasiModel();
        // $konsultasi = $model->getByTicket($tiket);
        // // $konsultasi[0]['link'] = "";
        // if ($konsultasi[0]['metode'] == 3) {
        //     $konsultasi[0]['link'] = $model->getDetail($konsultasi[0]['id'])[0];
        // } else {
        //     $konsultasi[0]['link'] = null;
        // }
        // $user_id = session()->get()['user']['id'];
        // $query = $model->getByUser($user_id);

        // $data = [
        //     'kueri' => $query
        // ];


        // return view('detail');
    }
}
