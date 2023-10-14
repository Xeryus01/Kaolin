<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $allowedFields = [
        'tiket', 'instansi', 'telepon', 'keperluan', 'tanggal', 'sesi', 'konfirmasi_admin', 'metode', 'user_konsultasi', 'created_by'
    ];
}
