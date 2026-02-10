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
                <h1>Kelola Kegiatan</h1>
                <p>Daftar semua kegiatan gereja GBIS Anugerah</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="btn btn-primary">
                    ➕ Tambah Kegiatan
                </a>
            </div>
        </div>

        <!-- Tabel Kegiatan -->
        <div class="admin-section">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Kegiatan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($kegiatanList)): ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data kegiatan</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $no = 1 + (($pager->getCurrentPage() - 1) * 10);
                            foreach ($kegiatanList as $kegiatan): 
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($kegiatan['judul_kegiatan']) ?></td>
                                    <td>
                                        <span class="badge badge-kategori badge-<?= strtolower(str_replace(' ', '-', $kegiatan['kategori'])) ?>">
                                            <?= esc($kegiatan['kategori']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></td>
                                    <td>
                                        <?php if ($kegiatan['waktu_mulai']): ?>
                                            <?= date('H:i', strtotime($kegiatan['waktu_mulai'])) ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc($kegiatan['lokasi'] ?? '-') ?></td>
                                    <td>
                                        <span class="badge badge-status badge-<?= strtolower(str_replace(' ', '-', $kegiatan['status'])) ?>">
                                            <?= esc($kegiatan['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= base_url('admin/kegiatan/edit/' . $kegiatan['id']) ?>" 
                                               class="btn-icon btn-edit" 
                                               title="Ubah">
                                                ✏️
                                            </a>
                                            <a href="<?= base_url('admin/kegiatan/hapus/' . $kegiatan['id']) ?>" 
                                               class="btn-icon btn-delete" 
                                               title="Hapus"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                                                🗑️
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if (!empty($kegiatanList)): ?>
                <div class="pagination-wrapper">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
