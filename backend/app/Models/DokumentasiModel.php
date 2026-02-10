<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumentasiModel extends Model
{
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'judul',
        'deskripsi',
        'kategori',
        'jenis_kegiatan',
        'file_path',
        'file_type',
        'file_size',
        'tanggal_kegiatan',
        'fotografer',
        'jumlah_views',
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
        'kategori' => 'required|in_list[Foto,Video]',
        'jenis_kegiatan' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak,Umum,Ibadah,Lainnya]',
        'file_path' => 'required',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul harus diisi',
            'min_length' => 'Judul minimal 3 karakter',
            'max_length' => 'Judul maksimal 255 karakter',
        ],
        'kategori' => [
            'required' => 'Kategori harus dipilih',
            'in_list' => 'Kategori tidak valid',
        ],
        'jenis_kegiatan' => [
            'required' => 'Jenis kegiatan harus dipilih',
            'in_list' => 'Jenis kegiatan tidak valid',
        ],
        'file_path' => [
            'required' => 'File harus diupload',
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
    public function getDokumentasiByKategori($kategori)
    {
        return $this->where('kategori', $kategori)
                    ->where('status_aktif', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getDokumentasiByJenisKegiatan($jenisKegiatan)
    {
        return $this->where('jenis_kegiatan', $jenisKegiatan)
                    ->where('status_aktif', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getFoto()
    {
        return $this->where('kategori', 'Foto')
                    ->where('status_aktif', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getVideo()
    {
        return $this->where('kategori', 'Video')
                    ->where('status_aktif', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function countByKategori()
    {
        return [
            'Foto' => $this->where('kategori', 'Foto')->where('status_aktif', 1)->countAllResults(),
            'Video' => $this->where('kategori', 'Video')->where('status_aktif', 1)->countAllResults(),
        ];
    }

    public function getTotalDokumentasi()
    {
        return $this->where('status_aktif', 1)->countAllResults();
    }

    public function incrementViews($id)
    {
        $dokumentasi = $this->find($id);
        if ($dokumentasi) {
            $this->update($id, ['jumlah_views' => $dokumentasi['jumlah_views'] + 1]);
        }
    }

    public function searchDokumentasi($keyword)
    {
        return $this->like('judul', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->where('status_aktif', 1)
                    ->findAll();
    }
}
