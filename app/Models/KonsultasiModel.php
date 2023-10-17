<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $allowedFields = [
        'tiket', 'kategori_instansi', 'nama_instansi', 'telepon', 'keperluan', 'tanggal', 'sesi', 'konfirmasi_admin', 'token_admin', 'metode', 'user_konsultasi', 'user_pekerjaan', 'created_by'
    ];

    public function getAll()
    {
        $now = date("Y-m-d");
        return $this->builder()->getWhere(['tanggal >=' => $now])->getResultArray();
    }

    public function getByUser($id)
    {
        return $this->builder()->getWhere(['created_by' => $id])->getResultArray();
    }
}
