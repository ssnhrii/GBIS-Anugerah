<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Detail Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Detail Jemaat</h6>
                        <div>
                            <a href="<?= base_url('admin/index.php?page=jemaat-edit&id=' . $jemaat['id']) ?>" class="btn btn-primary">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            <a href="<?= base_url('admin/index.php?page=jemaat-list') ?>" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                    
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Nama Lengkap</th>
                            <td><?= esc($jemaat['nama_lengkap']) ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?= esc($jemaat['jenis_kelamin']) ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?= esc($jemaat['kategori']) ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td><?= esc($jemaat['tempat_lahir'] ?? '-') ?>, <?= $jemaat['tanggal_lahir'] ? date('d-m-Y', strtotime($jemaat['tanggal_lahir'])) : '-' ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= esc($jemaat['alamat'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><?= esc($jemaat['telepon'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= esc($jemaat['email'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Status Pernikahan</th>
                            <td><?= esc($jemaat['status_pernikahan'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td><?= esc($jemaat['pekerjaan'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Baptis</th>
                            <td><?= $jemaat['tanggal_baptis'] ? date('d-m-Y', strtotime($jemaat['tanggal_baptis'])) : '-' ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Sidi</th>
                            <td><?= $jemaat['tanggal_sidi'] ? date('d-m-Y', strtotime($jemaat['tanggal_sidi'])) : '-' ?></td>
                        </tr>
                    </table>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>


