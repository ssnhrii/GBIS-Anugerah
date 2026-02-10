<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Page Header -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Kelola Jemaat</h6>
                        <a href="<?= base_url('admin/index.php?page=jemaat-tambah') ?>" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Tambah Jemaat
                        </a>
                    </div>
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kategori</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($jemaatList)): ?>
                                    <?php $no = 1 + (($pager->getCurrentPage() - 1) * $pager->getPerPage()); ?>
                                    <?php foreach ($jemaatList as $jemaat): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($jemaat['nama_lengkap']) ?></td>
                                            <td><?= esc($jemaat['jenis_kelamin']) ?></td>
                                            <td><?= esc($jemaat['kategori']) ?></td>
                                            <td><?= esc($jemaat['nomor_telepon'] ?? '-') ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/index.php?page=jemaat-view&id=' . $jemaat['id']) ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('admin/index.php?page=jemaat-edit&id=' . $jemaat['id']) ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin/index.php?action=jemaat-hapus&id=' . $jemaat['id']) ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data jemaat</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if ($pager): ?>
                        <div class="mt-3">
                            <?= $pager->links() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>


