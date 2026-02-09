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
                <a href="<?= base_url('logout') ?>" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="admin-stats-grid">
            <div class="admin-stat-card">
                <div class="stat-icon bg-blue">
                    <span>👥</span>
                </div>
                <div class="stat-content">
                    <h3>Total Jemaat</h3>
                    <p class="stat-number">247</p>
                    <span class="stat-change positive">+12 bulan ini</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-green">
                    <span>📅</span>
                </div>
                <div class="stat-content">
                    <h3>Kegiatan Aktif</h3>
                    <p class="stat-number">12</p>
                    <span class="stat-change">4 minggu ini</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-purple">
                    <span>📸</span>
                </div>
                <div class="stat-content">
                    <h3>Dokumentasi</h3>
                    <p class="stat-number">156</p>
                    <span class="stat-change positive">+24 baru</span>
                </div>
            </div>
            <div class="admin-stat-card">
                <div class="stat-icon bg-orange">
                    <span>📖</span>
                </div>
                <div class="stat-content">
                    <h3>Firman</h3>
                    <p class="stat-number">4</p>
                    <span class="stat-change">Minggu ini</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="admin-section">
            <h2>Quick Actions</h2>
            <div class="quick-actions-grid">
                <a href="#" class="action-card">
                    <span class="action-icon">➕</span>
                    <h3>Tambah Jemaat</h3>
                    <p>Daftarkan anggota jemaat baru</p>
                </a>
                <a href="#" class="action-card">
                    <span class="action-icon">📅</span>
                    <h3>Buat Kegiatan</h3>
                    <p>Jadwalkan kegiatan gereja</p>
                </a>
                <a href="#" class="action-card">
                    <span class="action-icon">📤</span>
                    <h3>Upload Dokumentasi</h3>
                    <p>Tambah foto atau video</p>
                </a>
                <a href="#" class="action-card">
                    <span class="action-icon">✍️</span>
                    <h3>Tulis Firman</h3>
                    <p>Posting renungan harian</p>
                </a>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="admin-section">
            <h2>Aktivitas Terbaru</h2>
            <div class="activity-table">
                <table>
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Aktivitas</th>
                            <th>User</th>
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
                            <td>Update data jemaat: Jane Smith</td>
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

        <!-- Kategori Jemaat Chart -->
        <div class="admin-section">
            <h2>Distribusi Jemaat</h2>
            <div class="chart-container">
                <div class="chart-bar-group">
                    <div class="chart-bar">
                        <div class="bar-fill bg-blue" style="height: 68%;">
                            <span class="bar-label">68</span>
                        </div>
                        <span class="bar-name">Kaum Bapak</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-pink" style="height: 72%;">
                            <span class="bar-label">72</span>
                        </div>
                        <span class="bar-name">Kaum Ibu</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-green" style="height: 54%;">
                            <span class="bar-label">54</span>
                        </div>
                        <span class="bar-name">Pemuda</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar-fill bg-orange" style="height: 53%;">
                            <span class="bar-label">53</span>
                        </div>
                        <span class="bar-name">Anak-anak</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="admin-section">
            <h2>Kegiatan Mendatang</h2>
            <div class="events-list">
                <div class="event-item">
                    <div class="event-date">
                        <span class="date-day">15</span>
                        <span class="date-month">Feb</span>
                    </div>
                    <div class="event-details">
                        <h4>Ibadah Kaum Bapak</h4>
                        <p>Minggu, 15 Februari 2026 • 09:00 WIB</p>
                        <span class="event-category bg-blue">Kaum Bapak</span>
                    </div>
                    <div class="event-actions">
                        <button class="btn-icon" title="Edit">✏️</button>
                        <button class="btn-icon" title="Delete">🗑️</button>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-date">
                        <span class="date-day">16</span>
                        <span class="date-month">Feb</span>
                    </div>
                    <div class="event-details">
                        <h4>Persekutuan Kaum Ibu</h4>
                        <p>Senin, 16 Februari 2026 • 14:00 WIB</p>
                        <span class="event-category bg-pink">Kaum Ibu</span>
                    </div>
                    <div class="event-actions">
                        <button class="btn-icon" title="Edit">✏️</button>
                        <button class="btn-icon" title="Delete">🗑️</button>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-date">
                        <span class="date-day">18</span>
                        <span class="date-month">Feb</span>
                    </div>
                    <div class="event-details">
                        <h4>Pemuda Berkarya</h4>
                        <p>Rabu, 18 Februari 2026 • 18:30 WIB</p>
                        <span class="event-category bg-green">Pemuda</span>
                    </div>
                    <div class="event-actions">
                        <button class="btn-icon" title="Edit">✏️</button>
                        <button class="btn-icon" title="Delete">🗑️</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
