<?php

if (!function_exists('get_page_content')) {
    /**
     * Ambil konten halaman dari database
     * 
     * @param string $pageKey
     * @return array|null
     */
    function get_page_content($pageKey)
    {
        $model = new \App\Models\PageContentModel();
        return $model->getByKey($pageKey);
    }
}

if (!function_exists('get_site_setting')) {
    /**
     * Ambil pengaturan situs dari database
     * 
     * @param string $key
     * @param string $default
     * @return string
     */
    function get_site_setting($key, $default = '')
    {
        $model = new \App\Models\SiteSettingModel();
        return $model->getValue($key, $default);
    }
}

if (!function_exists('get_all_site_settings')) {
    /**
     * Ambil semua pengaturan situs sebagai array key-value
     * 
     * @return array
     */
    function get_all_site_settings()
    {
        $model = new \App\Models\SiteSettingModel();
        $settings = $model->getAllSettings();
        
        $result = [];
        foreach ($settings as $setting) {
            $result[$setting['setting_key']] = $setting['setting_value'];
        }
        
        return $result;
    }
}
