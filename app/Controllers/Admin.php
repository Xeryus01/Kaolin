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
        // dd($data['users']);
        return view('admin/user', $data);
    }

    public function user_role()
    {
        $model = new \App\Models\UserModel();
        $user_list = $model->getAll();
        $data = [
            'users' => $user_list
        ];
        // dd($data['users']);
        return view('admin/user', $data);
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
}
