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
                <h1>Kelola Firman</h1>
                <p>Daftar semua renungan dan artikel rohani</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/firman/tambah') ?>" class="btn btn-primary">
                    ➕ Tambah Firman
                </a>
            </div>
        </div>

        <!-- Tabel Firman -->
        <div class="admin-section">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal Publikasi</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($firmanList)): ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data firman</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $no = 1 + (($pager->getCurrentPage() - 1) * 10);
                            foreach ($firmanList as $firman): 
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($firman['judul']) ?></td>
                                    <td>
                                        <span class="badge badge-kategori">
                                            <?= esc($firman['kategori']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($firman['penulis'] ?? '-') ?></td>
                                    <td><?= date('d/m/Y', strtotime($firman['tanggal_publikasi'])) ?></td>
                                    <td><?= number_format($firman['jumlah_views']) ?></td>
                                    <td>
                                        <span class="badge badge-status badge-<?= strtolower($firman['status']) ?>">
                                            <?= esc($firman['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= base_url('admin/firman/edit/' . $firman['id']) ?>" 
                                               class="btn-icon btn-edit" 
                                               title="Ubah">
                                                ✏️
                                            </a>
                                            <a href="<?= base_url('admin/firman/hapus/' . $firman['id']) ?>" 
                                               class="btn-icon btn-delete" 
                                               title="Hapus"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus firman ini?')">
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
            <?php if (!empty($firmanList)): ?>
                <div class="pagination-wrapper">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
