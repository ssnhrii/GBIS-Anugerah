<main class="admin-main">
    <div class="admin-container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="admin-header">
            <div class="admin-welcome">
                <h1>Dashboard Admin</h1>
                <p>Selamat datang, <strong><?= esc($username) ?></strong>!</p>
            </div>
            <div class="admin-user-info">
                <span class="badge badge-<?= $role === 'admin' ? 'primary' : 'secondary' ?>">
                    <?= ucfirst(esc($role)) ?>
                </span>
                <a href="<?= base_url('logout') ?>" class="btn btn-logout">Keluar</a>
            </div>
        </div>

        <!-- Statistik Cepat -->
        <div class="admin-stats-grid">
            <div class="admin-stat-card">
                <div class="stat-icon bg-blue">
                    <span>👥</span>
                </div>
                <div class="stat-content">
                    <h3>Total Jemaat</h3>
                    <p class="stat-number"><?= $totalJemaat ?? 0 ?></p>
                    <span class="stat-change positive">Anggota aktif</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-blue">
                    <span>👨</span>
                </div>
                <div class="stat-content">
                    <h3>Kaum Bapak</h3>
                    <p class="stat-number"><?= $jemaatByKategori['Kaum Bapak'] ?? 0 ?></p>
                    <span class="stat-change">Anggota</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-pink">
                    <span>👩</span>
                </div>
                <div class="stat-content">
                    <h3>Kaum Ibu</h3>
                    <p class="stat-number"><?= $jemaatByKategori['Kaum Ibu'] ?? 0 ?></p>
                    <span class="stat-change">Anggota</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-green">
                    <span>🧑</span>
                </div>
                <div class="stat-content">
                    <h3>Pemuda</h3>
                    <p class="stat-number"><?= $jemaatByKategori['Pemuda'] ?? 0 ?></p>
                    <span class="stat-change">Anggota</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-orange">
                    <span>👶</span>
                </div>
                <div class="stat-content">
                    <h3>Anak-anak</h3>
                    <p class="stat-number"><?= $jemaatByKategori['Anak-anak'] ?? 0 ?></p>
                    <span class="stat-change">Anggota</span>
                </div>
            </div>
        </div>

        <!-- Aksi Cepat -->
        <div class="admin-section">
            <h2>Aksi Cepat</h2>
            <div class="quick-actions-grid">
                <a href="<?= base_url('admin/jemaat/tambah') ?>" class="action-card">
                    <span class="action-icon">➕</span>
                    <h3>Tambah Jemaat</h3>
                    <p>Daftarkan anggota jemaat baru</p>
                </a>
                <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="action-card">
                    <span class="action-icon">📅</span>
                    <h3>Buat Kegiatan</h3>
                    <p>Jadwalkan kegiatan gereja</p>
                </a>
                <a href="<?= base_url('admin/dokumentasi/upload') ?>" class="action-card">
                    <span class="action-icon">📤</span>
                    <h3>Upload Dokumentasi</h3>
                    <p>Tambah foto atau video</p>
                </a>
                <a href="<?= base_url('admin/firman/tambah') ?>" class="action-card">
                    <span class="action-icon">✍️</span>
                    <h3>Tulis Firman</h3>
                    <p>Posting renungan harian</p>
                </a>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="admin-section">
            <h2>Aktivitas Terbaru</h2>
            <div class="activity-table">
                <table>
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Aktivitas</th>
                            <th>Pengguna</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10 menit lalu</td>
                            <td>Menambahkan jemaat baru: John Doe</td>
                            <td>Admin</td>
                            <td><span class="badge badge-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>1 jam lalu</td>
                            <td>Membuat kegiatan: Ibadah Kaum Bapak</td>
                            <td>Admin</td>
                            <td><span class="badge badge-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>2 jam lalu</td>
                            <td>Upload dokumentasi: Retreat Pemuda</td>
                            <td>Admin</td>
                            <td><span class="badge badge-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>3 jam lalu</td>
                            <td>Perbarui data jemaat: Jane Smith</td>
                            <td>Admin</td>
                            <td><span class="badge badge-success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>5 jam lalu</td>
                            <td>Posting firman: Renungan Harian</td>
                            <td>Admin</td>
                            <td><span class="badge badge-success">Berhasil</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Distribusi Jemaat -->
        <div class="admin-section">
            <h2>Distribusi Jemaat</h2>
            <div class="chart-container">
                <div class="chart-bar-group">
                    <div class="chart-bar">
                        <div class="bar-fill bg-blue" style="height: <?= $jemaatByKategori['Kaum Bapak'] > 0 ? min(($jemaatByKategori['Kaum Bapak'] / max($jemaatByKategori) * 100), 100) : 0 ?>%;">
                            <span class="bar-label"><?= $jemaatByKategori['Kaum Bapak'] ?? 0 ?></span>
                        </div>
                        <span class="bar-name">Kaum Bapak</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-pink" style="height: <?= $jemaatByKategori['Kaum Ibu'] > 0 ? min(($jemaatByKategori['Kaum Ibu'] / max($jemaatByKategori) * 100), 100) : 0 ?>%;">
                            <span class="bar-label"><?= $jemaatByKategori['Kaum Ibu'] ?? 0 ?></span>
                        </div>
                        <span class="bar-name">Kaum Ibu</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-green" style="height: <?= $jemaatByKategori['Pemuda'] > 0 ? min(($jemaatByKategori['Pemuda'] / max($jemaatByKategori) * 100), 100) : 0 ?>%;">
                            <span class="bar-label"><?= $jemaatByKategori['Pemuda'] ?? 0 ?></span>
                        </div>
                        <span class="bar-name">Pemuda</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-orange" style="height: <?= $jemaatByKategori['Anak-anak'] > 0 ? min(($jemaatByKategori['Anak-anak'] / max($jemaatByKategori) * 100), 100) : 0 ?>%;">
                            <span class="bar-label"><?= $jemaatByKategori['Anak-anak'] ?? 0 ?></span>
                        </div>
                        <span class="bar-name">Anak-anak</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kegiatan Mendatang -->
        <div class="admin-section">
            <h2>Kegiatan Mendatang</h2>
            <?php if (empty($kegiatanAkanDatang)): ?>
                <p class="text-center" style="padding: var(--spacing-xl); color: var(--color-text-secondary);">
                    Belum ada kegiatan yang dijadwalkan
                </p>
            <?php else: ?>
                <div class="events-list">
                    <?php foreach (array_slice($kegiatanAkanDatang, 0, 3) as $kegiatan): ?>
                        <div class="event-item">
                            <div class="event-date">
                                <span class="date-day"><?= date('d', strtotime($kegiatan['tanggal_kegiatan'])) ?></span>
                                <span class="date-month"><?= date('M', strtotime($kegiatan['tanggal_kegiatan'])) ?></span>
                            </div>
                            <div class="event-details">
                                <h4><?= esc($kegiatan['judul_kegiatan']) ?></h4>
                                <p>
                                    <?= date('l, d F Y', strtotime($kegiatan['tanggal_kegiatan'])) ?>
                                    <?php if ($kegiatan['waktu_mulai']): ?>
                                        • <?= date('H:i', strtotime($kegiatan['waktu_mulai'])) ?> WIB
                                    <?php endif; ?>
                                </p>
                                <span class="event-category bg-<?= strtolower(str_replace(' ', '-', $kegiatan['kategori'])) ?>">
                                    <?= esc($kegiatan['kategori']) ?>
                                </span>
                            </div>
                            <div class="event-actions">
                                <a href="<?= base_url('admin/kegiatan/edit/' . $kegiatan['id']) ?>" class="btn-icon" title="Ubah">✏️</a>
                                <a href="<?= base_url('admin/kegiatan/hapus/' . $kegiatan['id']) ?>" class="btn-icon" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">🗑️</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>
