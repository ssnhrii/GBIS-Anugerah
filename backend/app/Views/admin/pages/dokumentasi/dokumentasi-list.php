<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Page Header -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Kelola Dokumentasi</h6>
                        <a href="<?= base_url('admin/index.php?page=dokumentasi-tambah') ?>" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Tambah
                        </a>
                    </div>
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row g-3">
                        <?php if (!empty($dokumentasiList)): ?>
                            <?php foreach ($dokumentasiList as $dok): ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card h-100">
                                        <?php if (!empty($dok['file_path'])): ?>
                                            <?php if ($dok['kategori'] == 'Foto'): ?>
                                                <img src="<?= base_url($dok['file_path']) ?>" class="card-img-top" alt="<?= esc($dok['judul']) ?>" style="height: 200px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                                    <i class="fa fa-video fa-3x"></i>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <i class="fa fa-image fa-3x"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h6 class="card-title"><?= esc($dok['judul']) ?></h6>
                                            <p class="card-text small text-muted"><?= esc($dok['jenis_kegiatan']) ?></p>
                                            <div class="btn-group btn-group-sm w-100">
                                                <a href="<?= base_url('admin/index.php?page=dokumentasi-edit&id=' . $dok['id']) ?>" class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="<?= base_url('admin/index.php?page=dokumentasi-hapus&id=' . $dok['id']) ?>" 
                                                   class="btn btn-danger"
                                                   onclick="return confirm('Yakin ingin menghapus?')">
                                                    Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center py-5">
                                <p>Belum ada dokumentasi</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($pager): ?>
                        <div class="mt-3">
                            <?= $pager->links() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>

