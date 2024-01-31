<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function index(): string
    {
        $model_user = new \App\Models\UserModel();
        $user_list = $model_user->getAll();

        $model_konsultasi = new \App\Models\KonsultasiModel();
        $konsultasi_list = $model_konsultasi->getArr();

        // get count user
        $arr = array_map(
            function ($arg) {
                return ($arg['group']);
            },
            $user_list
        );
        $users = array_count_values($arr);

        // get count konsultasi
        $arr = array_map(
            function ($arg) {
                return ($arg['metode']);
            },
            $konsultasi_list
        );
        $konsultasi = array_count_values($arr);

        $data = [
            'users' => $user_list,
            'count_user' => $users,
            'count_konsultasi' => $konsultasi,
        ];

        // dd($data['count_konsultasi']);
        return view('admin/index', $data);
    }

    public function user_list()
    {
        $model = new \App\Models\UserModel();
        $user_list = $model->getAll();
        $data = [
            'users' => $user_list
        ];
        return view('admin/user/user', $data);
    }

    public function user_status($id)
    {
        $model = new \App\Models\UserModel();
        $user = $model->getUserLogin($id);
        if ($user[0]['active'] == 1)
            $active = 0;
        else
            $active = 1;

        try {
            $model->set('active', $active)
                ->where('id', $id)
                ->update();
            return redirect()->to(base_url('admin/user_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan perubahan status aktivasi user " . $user[0]['secret'];
            echo $th;
        }
    }

    public function user_delete($id)
    {
        $model = new \App\Models\UserModel();

        try {
            $model->delete(['id' => $id]);
            return redirect()->to(base_url('admin/user_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan penghapusan user.";
            echo $th;
        }
        // dd($user);
    }

    public function user_role()
    {
        $model = new \App\Models\UserModel();
        $user_list = $model->getAll();
        $data = [
            'users' => $user_list
        ];
        return view('admin/user/user_role', $data);
    }

    public function user_change_role()
    {
        $model = new \App\Models\UserModel();
        $data = $this->request->getPost();
        $user = $model->getUserLogin($data['user_id']);

        try {
            $model->db
                ->table('auth_groups_users')
                ->set('group', $data['role_user'])
                ->where('user_id', $data['user_id'])
                ->update();
            return redirect()->to(base_url('admin/user_role'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan perubahan role user " . $user[0]['secret'];
            echo $th;
        }
    }

    public function konsultasi_list()
    {
        $model = new \App\Models\KonsultasiModel();
        $konsultasi_list = $model->getAllList();

        $data = [
            'konsultasi' => $konsultasi_list
        ];

        // sort data konsultasi berdasarkan tanggal konsultasi
        $dates = array_column($data['konsultasi'], 'tanggal');
        array_multisort($dates, SORT_DESC, $data['konsultasi']);

        for ($i = 0; $i < count($data['konsultasi']); $i++) {
            $data['konsultasi'][$i]['tanggal'] = indonesian_date($data['konsultasi'][$i]['tanggal']);

            switch ($data['konsultasi'][$i]['metode']) {
                case '1':
                    $data['konsultasi'][$i]['metode'] = 'Offline';
                    break;
                case '2':
                    $data['konsultasi'][$i]['metode'] = 'Online (Whatsapp)';
                    break;
                default:
                    $data['konsultasi'][$i]['metode'] = 'Online (Zoom)';
                    break;
            }

            switch ($data['konsultasi'][$i]['sesi']) {
                case 'I':
                    $data['konsultasi'][$i]['sesi'] = 'I (08.30 - 09.10 WIB)';
                    break;
                case 'II':
                    $data['konsultasi'][$i]['sesi'] = 'II (10.00 - 10.40 WIB)';
                    break;
                default:
                    $data['konsultasi'][$i]['sesi'] = 'III (13.30 - 14.10 WIB)';
                    break;
            }
        }

        return view('admin/konsultasi/list', $data);
    }

    public function konsultasi_jadwal()
    {
        $data = $this->request->getPost();
        $update = [
            'tanggal' => $data['new_jadwal_konsultasi'],
            'sesi' => $data['new_sesi_konsultasi']
        ];
        $model = new \App\Models\KonsultasiModel();
        $controller = new \App\Controllers\Konsultasi();
        $konsultasi = $model->getByTicket($data['tiket']);

        try {
            $model->set($update)
                ->where('tiket', $data['tiket'])
                ->update();

            // notifikasi WA penggantian jadwal
            $tanggal = indonesian_date($data['new_jadwal_konsultasi']);
            $token = $data['tiket'];
            $no_user = $konsultasi[0]['telepon'];

            switch ($data['new_sesi_konsultasi']) {
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

            $message =
                'Konsultasi dengan No tiket ' . $token . ' telah diajukan perubahan jadwal oleh Admin menjadi sesi ' . $sesi . ', ' . $tanggal . '.' .
                PHP_EOL . 'Balas pesan ini untuk mengkonfirmasi perubahan jadwal Anda.';
            $admin_text = 'Jadwal konsultasi dengan No tiket ' . $token . ' telah berhasil diubah menjadi sesi ' . $sesi . ', ' . $tanggal . '.' . PHP_EOL . '
            Dimohon Admin untuk memberikan arahan selanjutnya kepada pengguna.';
            $controller->pengajuan_wa($message, $admin_text, $no_user);

            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan perubahan jadwal konsultasi";
            echo $th;
        }
    }

    public function konsultasi_link()
    {
        $data = $this->request->getPost();

        $model = new \App\Models\KonsultasiModel();
        $controller = new \App\Controllers\Konsultasi();
        $konsultasi = $model->getByTicket($data['tiket']);

        $insert = [
            'konsultasi_id' => $konsultasi[0]['id'],
            'link' => $data['link']
        ];

        try {

            switch ($konsultasi[0]['sesi']) {
                case 'I':
                    $sesi = '08.30 WIB';
                    break;
                case 'II':
                    $sesi = '10.00 WIB';
                    break;
                default:
                    $sesi = '13.30 WIB';
                    break;
            }

            $model->db
                ->table('konsultasi_zoom')
                ->upsert($insert);

            // notifikasi WA penambahan link zoom
            $tanggal = indonesian_date($konsultasi[0]['tanggal']);
            $token = $konsultasi[0]['tiket'];
            $no_user = $konsultasi[0]['telepon'];

            $message =
                'Konsultasi dengan No tiket ' . $token . ' dapat diakses melalui link ' . $data['link'] . ', dimohon pengguna untuk memasuki ruang zoom pada pukul ' . $sesi . ', ' . $tanggal . ' sudah dimulai.' . PHP_EOL . '
Dimohon pengguna untuk mematuhi arahan yang diberikan.';
            $admin_text = 'Konsultasi dengan No tiket ' . $token . ' dapat diakses melalui link ' . $data['link'] . ', dimohon admin untuk memasuki ruang zoom sebelum pukul ' . $sesi . ', ' . $tanggal . ' sudah dimulai.' . PHP_EOL . '
            Dimohon admin untuk mengikuti arahan yang diberikan.';
            $controller->pengajuan_wa($message, $admin_text, $no_user);

            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan penambahan link konsultasi";
            echo $th;
        }
    }

    public function konsultasi_bukti()
    {
        $data = $this->request->getPost();

        $model = new \App\Models\KonsultasiModel();
        $konsultasi = $model->getByTicket($data['tiket']);

        $insert = [
            'konsultasi_id' => $konsultasi[0]['id'],
            'bukti_konsultasi' => $data['bukti_konsultasi']
        ];

        switch ($konsultasi[0]['metode']) {
            case '1':
                $query = $model->db
                    ->table('konsultasi_offline')
                    ->upsert($insert);
                break;
            case '2':
                $query = $model->db
                    ->table('konsultasi_chat')
                    ->upsert($insert);
                break;
            default:
                $query = $model->db
                    ->table('konsultasi_zoom')
                    ->upsert($insert);
                break;
        }

        try {
            $query;
            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan penambahan bukti konsultasi";
            echo $th;
        }
    }

    public function konsultasi_detail()
    {
        $model = new \App\Models\KonsultasiModel();
        $tiket = $_POST['tiket'];
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
        $konsultasi[0]['tanggal'] = indonesian_date($konsultasi[0]['tanggal']);
        return json_encode($konsultasi[0]);
    }
}
