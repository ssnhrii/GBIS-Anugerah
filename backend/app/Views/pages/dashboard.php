<main>
    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="dashboard-header">
            <h1>Selamat Datang, <?= esc($username) ?>!</h1>
            <div class="user-info">
                <span class="badge badge-<?= $role === 'admin' ? 'primary' : 'secondary' ?>">
                    <?= ucfirst(esc($role)) ?>
                </span>
                <a href="<?= base_url('logout') ?>" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <div class="dashboard-content">
            <p>Ini adalah halaman dashboard dengan sistem autentikasi MVC CodeIgniter 4</p>
            
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3>Total Jemaat</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Total Kegiatan</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Total Dokumentasi</h3>
                    <p class="stat-number">0</p>
                </div>
            </div>
        </div>
    </div>
</main>
