<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        date_default_timezone_set("Asia/Jakarta");
        return view('home');
    }

    public function wa(): void
    {
        // $phone = '+6282226602929';
        // $apikey = 'w2LjAKfQRfgz';
        // $ticket = 'Hasil generate';
        // $message = 'Pengajuan konsultasi anda dengan no tiket ' . $ticket . ' telah diterima oleh BPS Kota Pangkalpinang, mohon ditunggu untuk jadwal konsultasi yang akan diberikan';

        // $url = 'http://api.textmebot.com/send.php?recipient=' . $phone . '&apikey=' . $apikey . '&text=' . urlencode($message) . '&json=yes';
        // $html = file_get_contents($url);

        $no_user = '+6289601127878';
        $apikey = '4730735';
        $text = 'This 2 is a test from PHP';

        $url = 'https://api.callmebot.com/whatsapp.php?source=php&phone=' . $no_user . '&text=' . urlencode($text) . '&apikey=' . $apikey;
        $html = file_get_contents($url);
        dd($url);
    }
}
