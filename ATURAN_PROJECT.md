# ATURAN PROJECT GBIS ANUGERAH

## STRUKTUR PROJECT

- **Framework**: CodeIgniter 4
- **Frontend**: HTML + CSS (design-system.css)
- **Database**: MySQL

## CSS & STYLING

✅ **Sudah ada master CSS** di `backend/public/css/design-system.css`

- Pakai variable CSS yang sudah didefinisikan (--color-primary, --color-secondary, dll)
- Jangan buat CSS baru, tinggal sesuaikan class yang ada
- Font: Poppins (sudah di-import)

## STRUKTUR FOLDER

```
backend/
├── app/
│   ├── Controllers/     → Logic controller
│   ├── Models/          → Database models
│   ├── Views/
│   │   ├── layouts/     → header.php & footer.php
│   │   └── pages/       → Halaman-halaman
│   └── Config/          → Konfigurasi (Routes, Database, dll)
└── public/
    ├── css/             → design-system.css
    └── images/          → Logo & gambar
```

## VIEWS

- **Header & Footer**: Sudah ada di `backend/app/Views/layouts/`
- **Halaman baru**: Buat di `backend/app/Views/pages/`
- **Include header/footer**: Pakai `<?= view('layouts/header', ['title' => 'Judul']) ?>` dan `<?= view('layouts/footer') ?>`
- **Base URL**: Pakai `<?= base_url('path') ?>`

## CONTROLLER

- Extend dari `BaseController`
- Return view: `return view('pages/nama_halaman', $data);`
- Session: `session()->get('key')` atau `session()->set('key', 'value')`

## MODEL

- Extend dari `CodeIgniter\Model`
- Set `$table`, `$primaryKey`, `$allowedFields`
- Pakai method bawaan: `find()`, `findAll()`, `insert()`, `update()`, `delete()`

## ROUTING

- Edit di `backend/app/Config/Routes.php`
- Format: `$routes->get('url', 'Controller::method');`

## DATABASE

- Config di `backend/app/Config/Database.php`
- Migration di `backend/app/Database/Migrations/`

## AUTHENTICATION

- Login controller: `AuthController.php`
- Check login: `session()->get('isLoggedIn')`
- Logout: Clear session

## NAMING CONVENTION

- **File**: PascalCase (UserModel.php, AuthController.php)
- **Class**: PascalCase
- **Method**: camelCase
- **Variable**: camelCase atau snake_case
- **Database**: snake_case (user_id, created_at)

## JANGAN LUPA

- Pakai CSRF protection di form
- Validasi input di controller
- Escape output: `<?= esc($data) ?>`
- Error handling yang proper
