<main class="admin-main">
    <div class="admin-container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="admin-header">
            <div class="admin-welcome">
                <h1>Kelola Dokumentasi</h1>
                <p>Galeri foto dan video kegiatan gereja</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/dokumentasi/tambah') ?>" class="btn btn-primary">
                    ➕ Tambah Dokumentasi
                </a>
            </div>
        </div>

        <!-- Grid Dokumentasi -->
        <div class="admin-section">
            <?php if (empty($dokumentasiList)): ?>
                <p class="text-center" style="padding: var(--spacing-xl); color: var(--color-text-secondary);">
                    Belum ada dokumentasi
                </p>
            <?php else: ?>
                <div class="dokumentasi-grid">
                    <?php foreach ($dokumentasiList as $dok): ?>
                        <div class="dokumentasi-card">
                            <div class="dokumentasi-image">
                                <?php if ($dok['kategori'] === 'Foto'): ?>
                                    <img src="<?= base_url($dok['file_path']) ?>" alt="<?= esc($dok['judul']) ?>">
                                    <span class="badge-kategori badge-foto">📷 Foto</span>
                                <?php else: ?>
                                    <div class="video-placeholder">
                                        <span class="video-icon">🎥</span>
                                    </div>
                                    <span class="badge-kategori badge-video">🎥 Video</span>
                                <?php endif; ?>
                            </div>
                            <div class="dokumentasi-content">
                                <h4><?= esc($dok['judul']) ?></h4>
                                <p class="dokumentasi-meta">
                                    <span class="badge badge-jenis badge-<?= strtolower(str_replace(' ', '-', $dok['jenis_kegiatan'])) ?>">
                                        <?= esc($dok['jenis_kegiatan']) ?>
                                    </span>
                                    <?php if ($dok['tanggal_kegiatan']): ?>
                                        <span class="dokumentasi-date">
                                            📅 <?= date('d/m/Y', strtotime($dok['tanggal_kegiatan'])) ?>
                                        </span>
                                    <?php endif; ?>
                                </p>
                                <?php if ($dok['deskripsi']): ?>
                                    <p class="dokumentasi-desc"><?= esc(substr($dok['deskripsi'], 0, 80)) ?><?= strlen($dok['deskripsi']) > 80 ? '...' : '' ?></p>
                                <?php endif; ?>
                                <div class="dokumentasi-actions">
                                    <a href="<?= base_url('admin/dokumentasi/edit/' . $dok['id']) ?>" 
                                       class="btn-icon btn-edit" 
                                       title="Ubah">
                                        ✏️
                                    </a>
                                    <a href="<?= base_url('admin/dokumentasi/hapus/' . $dok['id']) ?>" 
                                       class="btn-icon btn-delete" 
                                       title="Hapus"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus dokumentasi ini?')">
                                        🗑️
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
