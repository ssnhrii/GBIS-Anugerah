<?= $this->include('admin/layouts/header') ?>

<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Statistics Cards Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center p-4">
                            <i class="fa fa-users fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jemaat</p>
                                <h6 class="mb-0"><?= number_format($total_jemaat ?? 0) ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center p-4">
                            <i class="fa fa-calendar-alt fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Kegiatan</p>
                                <h6 class="mb-0"><?= number_format($total_kegiatan ?? 0) ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center p-4">
                            <i class="fa fa-images fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Dokumen</p>
                                <h6 class="mb-0"><?= number_format($total_dokumentasi ?? 0) ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center p-4">
                            <i class="fa fa-book-open fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Firman</p>
                                <h6 class="mb-0"><?= number_format($total_firman ?? 0) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Cards End -->

            <!-- Recent Data Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Recent Jemaat -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Jemaat Terbaru</h6>
                                <a href="<?= base_url('admin/index.php?page=jemaat-list') ?>">Lihat Semua</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-hover mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recent_jemaat)): ?>
                                            <?php foreach ($recent_jemaat as $jemaat): ?>
                                                <tr>
                                                    <td><?= esc($jemaat['nama_lengkap']) ?></td>
                                                    <td><?= esc($jemaat['telepon'] ?? '-') ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/index.php?page=jemaat-view&id=' . $jemaat['id']) ?>" 
                                                           class="btn btn-sm btn-primary">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Belum ada data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Kegiatan -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Kegiatan Terbaru</h6>
                                <a href="<?= base_url('admin/index.php?page=kegiatan-list') ?>">Lihat Semua</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-hover mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recent_kegiatan)): ?>
                                            <?php foreach ($recent_kegiatan as $kegiatan): ?>
                                                <tr>
                                                    <td><?= esc($kegiatan['judul_kegiatan']) ?></td>
                                                    <td><?= date('d M Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/index.php?page=kegiatan-view&id=' . $kegiatan['id']) ?>" 
                                                           class="btn btn-sm btn-primary">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Belum ada data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Dokumentasi -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Dokumentasi Terbaru</h6>
                        <a href="<?= base_url('admin/index.php?page=dokumentasi-list') ?>">Lihat Semua</a>
                    </div>
                    <div class="row g-3">
                        <?php if (!empty($recent_dokumentasi)): ?>
                            <?php foreach ($recent_dokumentasi as $dok): ?>
                                <div class="col-sm-6 col-md-4 col-lg-2">
                                    <div class="card">
                                        <?php if (!empty($dok['foto'])): ?>
                                            <img src="<?= base_url('uploads/dokumentasi/' . $dok['foto']) ?>" 
                                                 class="card-img-top" 
                                                 alt="<?= esc($dok['judul']) ?>"
                                                 style="height: 150px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                                                 style="height: 150px;">
                                                <i class="fa fa-image fa-3x"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body p-2">
                                            <p class="card-text small mb-0"><?= esc($dok['judul']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <p>Belum ada dokumentasi</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Recent Data End -->

<?= $this->include('admin/layouts/footer') ?>


