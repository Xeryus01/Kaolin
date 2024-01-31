<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $allowedFields = [
        'tiket', 'kategori_instansi', 'nama_instansi', 'telepon', 'keperluan', 'tanggal', 'sesi', 'konfirmasi_admin', 'token_admin', 'metode', 'user_konsultasi', 'user_pekerjaan', 'created_by'
    ];

    public function getArr()
    {
        return $this->builder()->get()->getResultArray();
    }

    public function getAll()
    {
        $now = date("Y-m-d");
        return $this->builder()->getWhere(['tanggal >=' => $now])->getResultArray();
    }

    public function getAllList()
    {
        return $this->builder()->get()->getResultArray();
    }

    public function getByTicket($tiket)
    {
        $query = $this->builder()
            ->select("konsultasi.id AS id, tiket, nama_instansi, telepon, keperluan, tanggal, sesi, konfirmasi_admin, token_admin, metode, user_konsultasi, user_pekerjaan, created_by, konsultasi_instansi.kategori_instansi, konsultasi_metode.nama_metode, konsultasi_pekerjaan.konsultasi_pekerjaan")
            ->join('konsultasi_instansi', 'konsultasi_instansi.id_instansi = konsultasi.kategori_instansi')
            ->join('konsultasi_metode', 'konsultasi_metode.id = konsultasi.metode', 'right')
            ->join('konsultasi_pekerjaan', 'konsultasi_pekerjaan.id_pekerjaan = konsultasi.user_pekerjaan');
        return $query->getWhere(['tiket' => $tiket])->getResultArray();
    }

    public function getLink($id)
    {
        $query = $this->builder()
            ->select("konsultasi.id AS id, tiket, konsultasi_zoom.link")
            ->join('konsultasi_zoom', 'konsultasi_zoom.konsultasi_id = konsultasi.id');
        return $query->getWhere(['konsultasi.id' => $id])->getResultArray();
    }

    public function getBukti($id, $metode)
    {
        switch ($metode) {
            case '1':
                $query = $this->builder()
                    ->select("konsultasi.id AS id, konsultasi_id, tiket, konsultasi_offline.bukti_konsultasi")
                    ->join('konsultasi_offline', 'konsultasi_offline.konsultasi_id = konsultasi.id');
                break;
            case '2':
                $query = $this->builder()
                    ->select("konsultasi.id AS id, konsultasi_id, tiket, konsultasi_chat.bukti_konsultasi")
                    ->join('konsultasi_chat', 'konsultasi_chat.konsultasi_id = konsultasi.id');
                break;
            default:
                $query = $this->builder()
                    ->select("konsultasi.id AS id, konsultasi_id, tiket, konsultasi_zoom.bukti_konsultasi")
                    ->join('konsultasi_zoom', 'konsultasi_zoom.konsultasi_id = konsultasi.id');
                break;
        }

        return $query->getWhere(['konsultasi_id' => $id])->getResultArray();
    }

    public function getByUser($id)
    {
        return $this->builder()->getWhere(['created_by' => $id])->getResultArray();
    }
}
