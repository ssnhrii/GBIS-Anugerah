<?php

namespace App\Models;

use CodeIgniter\Model;

class PageContentModel extends Model
{
    protected $table = 'page_contents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'page_key',
        'page_title',
        'content',
        'meta_description',
        'is_active'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getByKey($key)
    {
        return $this->where('page_key', $key)->first();
    }

    public function getAllPages()
    {
        return $this->orderBy('page_title', 'ASC')->findAll();
    }
}
