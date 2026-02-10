<?php

namespace App\Models;

use CodeIgniter\Model;

class FirmanModel extends Model
{
    protected $table = 'firman';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'judul',
        'ayat_alkitab',
        'isi_ayat',
        'isi_renungan',
        'penulis',
        'tanggal_publikasi',
        'kategori',
        'gambar_cover',
        'jumlah_views',
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
        'judul' => 'required|min_length[3]|max_length[255]',
        'isi_renungan' => 'required',
        'tanggal_publikasi' => 'required|valid_date',
        'kategori' => 'permit_empty|in_list[Renungan Harian,Renungan Minggu,Artikel Rohani,Kesaksian,Lainnya]',
        'status' => 'permit_empty|in_list[Draft,Terbit]',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul harus diisi',
            'min_length' => 'Judul minimal 3 karakter',
            'max_length' => 'Judul maksimal 255 karakter',
        ],
        'isi_renungan' => [
            'required' => 'Isi renungan harus diisi',
        ],
        'tanggal_publikasi' => [
            'required' => 'Tanggal publikasi harus diisi',
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
    public function getFirmanTerbit()
    {
        return $this->where('status', 'Terbit')
                    ->where('status_aktif', 1)
                    ->orderBy('tanggal_publikasi', 'DESC')
                    ->findAll();
    }

    public function getFirmanByKategori($kategori)
    {
        return $this->where('kategori', $kategori)
                    ->where('status', 'Terbit')
                    ->where('status_aktif', 1)
                    ->orderBy('tanggal_publikasi', 'DESC')
                    ->findAll();
    }

    public function getFirmanTerbaru($limit = 5)
    {
        return $this->where('status', 'Terbit')
                    ->where('status_aktif', 1)
                    ->orderBy('tanggal_publikasi', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    public function countByKategori()
    {
        return [
            'Renungan Harian' => $this->where('kategori', 'Renungan Harian')->where('status_aktif', 1)->countAllResults(),
            'Renungan Minggu' => $this->where('kategori', 'Renungan Minggu')->where('status_aktif', 1)->countAllResults(),
            'Artikel Rohani' => $this->where('kategori', 'Artikel Rohani')->where('status_aktif', 1)->countAllResults(),
            'Kesaksian' => $this->where('kategori', 'Kesaksian')->where('status_aktif', 1)->countAllResults(),
            'Lainnya' => $this->where('kategori', 'Lainnya')->where('status_aktif', 1)->countAllResults(),
        ];
    }

    public function getTotalFirman()
    {
        return $this->where('status_aktif', 1)->countAllResults();
    }

    public function incrementViews($id)
    {
        $firman = $this->find($id);
        if ($firman) {
            $this->update($id, ['jumlah_views' => $firman['jumlah_views'] + 1]);
        }
    }

    public function searchFirman($keyword)
    {
        return $this->like('judul', $keyword)
                    ->orLike('isi_renungan', $keyword)
                    ->orLike('ayat_alkitab', $keyword)
                    ->where('status', 'Terbit')
                    ->where('status_aktif', 1)
                    ->findAll();
    }
}
