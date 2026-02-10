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
                <h1>Kelola Jemaat</h1>
                <p>Daftar semua anggota jemaat GBIS Anugerah</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/jemaat/tambah') ?>" class="btn btn-primary">
                    ➕ Tambah Jemaat
                </a>
            </div>
        </div>

        <!-- Tabel Jemaat -->
        <div class="admin-section">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Kategori</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jemaatList)): ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data jemaat</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $no = 1 + (($pager->getCurrentPage() - 1) * 10);
                            foreach ($jemaatList as $jemaat): 
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($jemaat['nama_lengkap']) ?></td>
                                    <td><?= esc($jemaat['jenis_kelamin']) ?></td>
                                    <td>
                                        <span class="badge badge-kategori badge-<?= strtolower(str_replace(' ', '-', $jemaat['kategori'])) ?>">
                                            <?= esc($jemaat['kategori']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($jemaat['nomor_telepon'] ?? '-') ?></td>
                                    <td><?= esc($jemaat['email'] ?? '-') ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= base_url('admin/jemaat/edit/' . $jemaat['id']) ?>" 
                                               class="btn-icon btn-edit" 
                                               title="Ubah">
                                                ✏️
                                            </a>
                                            <a href="<?= base_url('admin/jemaat/hapus/' . $jemaat['id']) ?>" 
                                               class="btn-icon btn-delete" 
                                               title="Hapus"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
            <?php if (!empty($jemaatList)): ?>
                <div class="pagination-wrapper">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
