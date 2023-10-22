<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function index(): string
    {
        $model = new \App\Models\UserModel();
        $user_list = $model->getAll();
        $data = [
            'users' => $user_list
        ];
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
        $konsultasi_list = $model->getAll();
        $data = [
            'konsultasi' => $konsultasi_list
        ];

        for ($i = 0; $i < count($data['konsultasi']); $i++) {

            $time = strtotime($data['konsultasi'][$i]['tanggal']);
            $data['konsultasi'][$i]['tanggal'] = date("d-m-Y", $time);

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

        // dd($data['konsultasi']);
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

        try {
            $model->set($update)
                ->where('tiket', $data['tiket'])
                ->update();
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
        $konsultasi = $model->getByTicket($data['tiket']);
        // dd($data);

        $insert = [
            'konsultasi_id' => $konsultasi[0]['id'],
            'link' => $data['link_konsultasi']
        ];

        try {
            $model->db
                ->table('konsultasi_zoom')
                ->insert($insert);
            return redirect()->to(base_url('admin/konsultasi_list'));
        } catch (\Throwable $th) {
            echo "Gagal melakukan penambahan link konsultasi";
            echo $th;
        }
    }

    public function konsultasi_detail()
    {
        $model = new \App\Models\KonsultasiModel();
        $tiket = $_POST['tiket'];
        $konsultasi = $model->getByTicket($tiket);
        // $konsultasi[0]['link'] = "";
        if ($konsultasi[0]['metode'] == 3) {
            $konsultasi[0]['link'] = $model->getDetail($konsultasi[0]['id'])[0];
        } else {
            $konsultasi[0]['link'] = null;
        }
        return json_encode($konsultasi[0]);
    }
}
