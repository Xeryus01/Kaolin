<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        date_default_timezone_set("Asia/Jakarta");
        return view('home');
    }
}
