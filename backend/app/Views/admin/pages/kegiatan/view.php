<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Detail Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Detail Kegiatan</h6>
                        <div>
                            <a href="<?= base_url('admin/kegiatan/edit/' . $kegiatan['id']) ?>" class="btn btn-primary">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            <a href="<?= base_url('admin/index.php?page=kegiatan-list') ?>" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                    
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Judul Kegiatan</th>
                            <td><?= esc($kegiatan['judul_kegiatan']) ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?= esc($kegiatan['kategori']) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kegiatan</th>
                            <td><?= date('d-m-Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td><?= $kegiatan['waktu_mulai'] ?? '-' ?> - <?= $kegiatan['waktu_selesai'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td><?= esc($kegiatan['lokasi'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Pembicara</th>
                            <td><?= esc($kegiatan['pembicara'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <td><?= esc($kegiatan['jumlah_peserta'] ?? 0) ?> orang</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge bg-info"><?= esc($kegiatan['status'] ?? 'Akan Datang') ?></span></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td><?= nl2br(esc($kegiatan['deskripsi'] ?? '-')) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>


