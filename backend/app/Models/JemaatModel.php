<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'jemaat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'nomor_telepon',
        'email',
        'kategori',
        'status_pernikahan',
        'pekerjaan',
        'tanggal_baptis',
        'tanggal_sidi',
        'status_aktif'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'nama_lengkap' => 'required|min_length[3]|max_length[255]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'kategori' => 'required|in_list[Kaum Bapak,Kaum Ibu,Pemuda,Anak-anak]',
        'email' => 'permit_empty|valid_email',
        'nomor_telepon' => 'permit_empty|numeric|min_length[10]|max_length[15]',
    ];

    protected $validationMessages = [
        'nama_lengkap' => [
            'required' => 'Nama lengkap harus diisi',
            'min_length' => 'Nama lengkap minimal 3 karakter',
            'max_length' => 'Nama lengkap maksimal 255 karakter',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih',
            'in_list' => 'Jenis kelamin tidak valid',
        ],
        'kategori' => [
            'required' => 'Kategori harus dipilih',
            'in_list' => 'Kategori tidak valid',
        ],
        'email' => [
            'valid_email' => 'Format email tidak valid',
        ],
        'nomor_telepon' => [
            'numeric' => 'Nomor telepon harus berupa angka',
            'min_length' => 'Nomor telepon minimal 10 digit',
            'max_length' => 'Nomor telepon maksimal 15 digit',
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
    public function getJemaatByKategori($kategori)
    {
        return $this->where('kategori', $kategori)
                    ->where('status_aktif', 1)
                    ->findAll();
    }

    public function countByKategori()
    {
        return [
            'Kaum Bapak' => $this->where('kategori', 'Kaum Bapak')->where('status_aktif', 1)->countAllResults(),
            'Kaum Ibu' => $this->where('kategori', 'Kaum Ibu')->where('status_aktif', 1)->countAllResults(),
            'Pemuda' => $this->where('kategori', 'Pemuda')->where('status_aktif', 1)->countAllResults(),
            'Anak-anak' => $this->where('kategori', 'Anak-anak')->where('status_aktif', 1)->countAllResults(),
        ];
    }

    public function getTotalJemaat()
    {
        return $this->where('status_aktif', 1)->countAllResults();
    }

    public function searchJemaat($keyword)
    {
        return $this->like('nama_lengkap', $keyword)
                    ->orLike('email', $keyword)
                    ->orLike('nomor_telepon', $keyword)
                    ->where('status_aktif', 1)
                    ->findAll();
    }
}
