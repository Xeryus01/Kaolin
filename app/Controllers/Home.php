<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;

class Home extends BaseController
{
    public function index(): string
    {
        // session()->get()['user']['id'];
        date_default_timezone_set("Asia/Jakarta");
        $model = new KonsultasiModel();

        // get semua konsultasi
        $query = $model->getAll();

        $data = [
            'kueri' => $query
        ];

        // sort data konsultasi berdasarkan tanggal konsultasi
        $dates = array_column($data['kueri'], 'tanggal');
        array_multisort($dates, SORT_ASC, $data['kueri']);

        for ($i = 0; $i < count($data['kueri']); $i++) {
            $data['kueri'][$i]['itanggal'] = indonesian_date($data['kueri'][$i]['tanggal']);
            $data['kueri'][$i]['kategori_instansi'] = standardize_instansi($data['kueri'][$i]['kategori_instansi']);
        }

        return view('home', $data);
    }

    public function wa(): void
    {
        // generate token konsultasi
        $length = 6;
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $token =  substr(str_shuffle($str), 0, $length);
        $token_admin =  substr(str_shuffle($str), 0, $length);

        // persiapan no hp kaolin dan api_key
        $no_admin = '+62895345599400';
        $phone = '+6282226602929';
        $apikey = 'w5oT3Mn11Tp3';
        $message =
            'testing';
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

    public function answer(): void
    {
        $curl = curl_init();

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
                'target' => '+6282226602929',
                'message' => 'Testing Message +62',
                'delay' => '2',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ucFi3Q_prntULc6XWb6x' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function webhook()
    {

        header('content-type: application/json');
        $data = json_decode(file_get_contents('http://localhost:8080/webhook.php'), true);

        //append the messages received into a text file
        file_put_contents('whatsapp_log.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);

        //put the message and sender in variables
        $message = strtolower($data['message']);
        $from = $data['from'];
        dd($data);

        $apiKey = 'w5oT3Mn11Tp3';

        // Create a stream context
        $context = stream_context_create(['http' => [
            'method' => 'POST',
            'header' => "Api-Key: $apiKey\r\n"
        ]]);

        // Send API request
        $response = json_decode(file_get_contents('http://localhost:8080/webhook', false, $context), true);

        echo "URL Created: https://webhook.site/{$response['uuid']}";
    }
}
