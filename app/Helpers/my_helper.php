<?php
function generate_token()
{
    // generate token konsultasi
    $length = 6;
    $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str), 0, $length);
}

function standardize_metode($kode)
{
    switch ($kode) {
        case '1':
            $text = 'Offline';
            break;
        case '2':
            $text = 'Online (Whatsapp)';
            break;
        default:
            $text = 'Online (Zoom)';
            break;
    }
    return $text;
}

function standardize_sesi($kode)
{
    switch ($kode) {
        case 'I':
            $text = 'I (08.30 - 09.10 WIB)';
            break;
        case 'II':
            $text = 'II (10.00 - 10.40 WIB)';
            break;
        case 'III':
            $text = 'III (13.30 - 14.10 WIB)';
            break;
        case 'V':
            $text = "Pagi (08.00 - 12.00 WIB)";
            break;
        default:
            $text = "Siang (12.00 - 16.00 WIB)";
            break;
    }
    return $text;
}

function standardize_instansi($kode)
{
    switch ($kode) {
        case '1':
            $text = 'Lembaga Negara';
            break;
        case '2':
            $text = 'Kementerian & Lembaga Pemerintah';
            break;
        case '3':
            $text = 'TNI/Polri/BIN Kejaksaan';
            break;
        case '4':
            $text = 'Pemerintah Daerah';
            break;
        case '5':
            $text = 'Lembaga Internasional';
            break;
        case '6':
            $text = 'Lembaga Penelitian & Pendidikan';
            break;
        case '7':
            $text = 'BUMN/BUMD';
            break;
        default:
            $text = 'Swasta';
            break;
    }
    return $text;
}

function standardize_phone_number($number)
{
    $telepon = $number;
    if (substr($telepon, 0, 2) == "08") {
        $telepon = '+62' . substr($telepon, 1, strlen($telepon));
    } elseif (substr($telepon, 0, 2) == "62") {
        $telepon = '+62' . substr($telepon, 2, strlen($telepon));
    } else {
        $telepon = $telepon;
    }
    $no_user = $telepon;
    return $no_user;
}

function form_add_message($token, $metode, $date, $sesi)
{
    $message =
        'Pengajuan konsultasi dengan detail sebagai berikut
- No tiket ' . $token . '
- Metode ' . $metode . '
- Tanggal ' . $date . '
- Sesi ' . $sesi . PHP_EOL . '
Pengajuan telah diterima, mohon ditunggu untuk jadwal konsultasi yang akan diberikan';
    return $message;
}

function notif_wa($text, $no)
{
    // Api Key
    $apikey = 'ucFi3Q_prntULc6XWb6x';

    $curl = curl_init();
    // Kirim WA
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
            'target' => $no,
            'message' => $text,
            'countryCode' => '62', //kode area
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $apikey
        ),
    ));
    curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }

    if (isset($error_msg)) {
        return $error_msg;
    }

    curl_close($curl);
}

function indonesian_date($timestamp = '', $date_format = 'l, j F Y')
{
    if (trim($timestamp) == '') {
        $timestamp = time();
    } elseif (!ctype_digit($timestamp)) {
        $timestamp = strtotime($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace("/S/", "", $date_format);
    $pattern = array(
        '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
        '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
        '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
        '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
        '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
        '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
        '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
        '/November/', '/December/',
    );
    $replace = array(
        'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
        'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'Sepember',
        'Oktober', 'November', 'Desember',
    );
    $date = date($date_format, $timestamp);
    $date = preg_replace($pattern, $replace, $date);
    $date = "{$date}";
    return $date;
}
