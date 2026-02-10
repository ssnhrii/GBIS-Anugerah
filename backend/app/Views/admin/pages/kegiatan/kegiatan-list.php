<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Page Header -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Kelola Kegiatan</h6>
                        <a href="<?= base_url('admin/index.php?page=kegiatan-tambah') ?>" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Tambah Kegiatan
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
                                    <th>Judul Kegiatan</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kegiatanList)): ?>
                                    <?php $no = 1 + (($pager->getCurrentPage() - 1) * $pager->getPerPage()); ?>
                                    <?php foreach ($kegiatanList as $kegiatan): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($kegiatan['judul_kegiatan']) ?></td>
                                            <td><?= esc($kegiatan['kategori']) ?></td>
                                            <td><?= date('d-m-Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></td>
                                            <td><?= esc($kegiatan['lokasi'] ?? '-') ?></td>
                                            <td><span class="badge bg-info"><?= esc($kegiatan['status'] ?? 'Akan Datang') ?></span></td>
                                            <td>
                                                <a href="<?= base_url('admin/index.php?page=kegiatan-view&id=' . $kegiatan['id']) ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('admin/index.php?page=kegiatan-edit&id=' . $kegiatan['id']) ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('admin/index.php?action=kegiatan-hapus&id=' . $kegiatan['id']) ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data kegiatan</td>
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


