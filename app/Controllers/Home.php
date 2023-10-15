<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;

class Home extends BaseController
{
    public function index(): string
    {
        date_default_timezone_set("Asia/Jakarta");
        $model = new KonsultasiModel();

        // get semua konsultasi
        $query = $model->getAll();

        $data = [
            'kueri' => $query
        ];

        return view('home', $data);
    }

    public function wa(): void
    {
        // generate token konsultasi
        $length = 6;
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $token =  substr(str_shuffle($str), 0, $length);
        $token_admin =  substr(str_shuffle($str), 0, $length);

        $phone = '+62895345599400';
        $apikey = '3a9DzEE5TkQf';
        $ticket = 'Hasil generate';
        $message =
            'Pengajuan konsultasi dengan detail sebagai berikut
Pengajuan telah diterima, mohon ditunggu untuk jadwal konsultasi yang akan diberikan';
        $message = '*PEMBERITAHUAN*' . PHP_EOL . $message . PHP_EOL .
            'Telah berhasil dikirim' . PHP_EOL .
            'Klik link berikut untuk melakukan konfirmasi pengajuan konsultasi ' . base_url('konfirmasi_admin/' . $token . '/' . $token_admin);
        $url = 'http://api.textmebot.com/send.php?recipient=' . $phone . '&apikey=' . $apikey . '&text=' . urlencode($message) . '&json=yes';
        $html = file_get_contents($url);
        dd($html);
        // $no_user = '+628953345599400';
        // $apikey = '4730735';
        // $text = 'This 2 is a test from PHP';

        // $url = 'https://api.callmebot.com/whatsapp.php?source=php&phone=' . $no_user . '&text=' . urlencode($text) . '&apikey=' . $apikey;
        // $html = file_get_contents($url);
        // dd($url);
    }
}
