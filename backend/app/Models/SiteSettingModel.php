<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteSettingModel extends Model
{
    protected $table = 'site_settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'setting_key',
        'setting_value',
        'setting_label',
        'setting_type'
    ];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';

    public function getByKey($key)
    {
        return $this->where('setting_key', $key)->first();
    }

    public function getValue($key, $default = '')
    {
        $setting = $this->getByKey($key);
        return $setting ? $setting['setting_value'] : $default;
    }

    public function getAllSettings()
    {
        return $this->orderBy('setting_label', 'ASC')->findAll();
    }

    public function updateValue($key, $value)
    {
        $setting = $this->getByKey($key);
        if ($setting) {
            return $this->update($setting['id'], ['setting_value' => $value]);
        }
        return false;
    }
}
