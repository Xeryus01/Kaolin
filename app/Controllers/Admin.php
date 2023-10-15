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
        // dd($data['konsultasi']);
        return view('admin/konsultasi/list', $data);
    }
}
