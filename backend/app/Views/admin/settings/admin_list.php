<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Kelola Admin</h6>
                    <a href="<?= base_url('admin/settings/admins/add') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Admin
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($admins as $admin): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($admin['username']) ?></td>
                                <td><?= esc($admin['full_name']) ?></td>
                                <td><?= esc($admin['email']) ?></td>
                                <td><?= esc($admin['role'] ?? 'admin') ?></td>
                                <td>
                                    <a href="<?= base_url('admin/settings/admins/edit/' . $admin['id']) ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <?php if ($admin['id'] != session()->get('user_id')): ?>
                                        <a href="<?= base_url('admin/settings/admins/delete/' . $admin['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
