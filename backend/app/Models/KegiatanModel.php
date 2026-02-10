<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'judul_kegiatan',
        'deskripsi',
        'kategori',
        'tanggal_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'pembicara',
        'jumlah_peserta',
        'foto_kegiatan',
        'status',
        'status_aktif'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
        'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum]',
        'tanggal_kegiatan' => 'required|valid_date',
        'status' => 'permit_empty|in_list[Akan Datang,Sedang Berlangsung,Selesai,Dibatalkan]',
    ];

    protected $validationMessages = [
        'judul_kegiatan' => [
            'required' => 'Judul kegiatan harus diisi',
            'min_length' => 'Judul kegiatan minimal 3 karakter',
            'max_length' => 'Judul kegiatan maksimal 255 karakter',
        ],
        'kategori' => [
            'required' => 'Kategori harus dipilih',
            'in_list' => 'Kategori tidak valid',
        ],
        'tanggal_kegiatan' => [
            'required' => 'Tanggal kegiatan harus diisi',
            'valid_date' => 'Format tanggal tidak valid',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // Custom Methods
    public function getKegiatanByKategori($kategori)
    {
        return $this->where('kategori', $kategori)
                    ->where('status_aktif', 1)
                    ->orderBy('tanggal_kegiatan', 'DESC')
                    ->findAll();
    }

    public function getKegiatanAkanDatang()
    {
        return $this->where('status', 'Akan Datang')
                    ->where('status_aktif', 1)
                    ->where('tanggal_kegiatan >=', date('Y-m-d'))
                    ->orderBy('tanggal_kegiatan', 'ASC')
                    ->findAll();
    }

    public function getKegiatanSelesai()
    {
        return $this->where('status', 'Selesai')
                    ->where('status_aktif', 1)
                    ->orderBy('tanggal_kegiatan', 'DESC')
                    ->findAll();
    }

    public function countByKategori()
    {
        return [
            'Kaum Bapak' => $this->where('kategori', 'Kaum Bapak')->where('status_aktif', 1)->countAllResults(),
            'Kaum Ibu' => $this->where('kategori', 'Kaum Ibu')->where('status_aktif', 1)->countAllResults(),
            'Pemuda' => $this->where('kategori', 'Pemuda')->where('status_aktif', 1)->countAllResults(),
            'Anak-anak' => $this->where('kategori', 'Anak-anak')->where('status_aktif', 1)->countAllResults(),
            'Umum' => $this->where('kategori', 'Umum')->where('status_aktif', 1)->countAllResults(),
        ];
    }

    public function getTotalKegiatan()
    {
        return $this->where('status_aktif', 1)->countAllResults();
    }

    public function searchKegiatan($keyword)
    {
        return $this->like('judul_kegiatan', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->orLike('lokasi', $keyword)
                    ->where('status_aktif', 1)
                    ->findAll();
    }
}
