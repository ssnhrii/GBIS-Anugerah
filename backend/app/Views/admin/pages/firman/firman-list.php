<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Page Header -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Kelola Firman</h6>
                        <a href="<?= base_url('admin/index.php?page=firman-tambah') ?>" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Tambah Firman
                        </a>
                    </div>
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Ayat Alkitab</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($firmanList)): ?>
                                    <?php $no = 1 + (($pager->getCurrentPage() - 1) * $pager->getPerPage()); ?>
                                    <?php foreach ($firmanList as $firman): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($firman['judul']) ?></td>
                                            <td><?= esc($firman['ayat_alkitab'] ?? '-') ?></td>
                                            <td><?= esc($firman['penulis'] ?? '-') ?></td>
                                            <td><?= date('d-m-Y', strtotime($firman['tanggal_publikasi'])) ?></td>
                                            <td><span class="badge bg-<?= $firman['status'] == 'Published' ? 'success' : 'warning' ?>"><?= esc($firman['status'] ?? 'Draft') ?></span></td>
                                            <td>
                                                <a href="<?= base_url('admin/index.php?page=firman-edit&id=' . $firman['id']) ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin/index.php?page=firman-hapus&id=' . $firman['id']) ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data firman</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php if ($pager): ?>
                        <div class="mt-3">
                            <?= $pager->links() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>

