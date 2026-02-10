<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Admin</h6>
                
                <form action="" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Username *</label>
                        <input type="text" name="username" class="form-control <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>" value="<?= old('username', $admin['username']) ?>" required>
                        <?php if (isset($validation) && $validation->hasError('username')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="full_name" class="form-control <?= isset($validation) && $validation->hasError('full_name') ? 'is-invalid' : '' ?>" value="<?= old('full_name', $admin['full_name']) ?>" required>
                        <?php if (isset($validation) && $validation->hasError('full_name')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('full_name') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" value="<?= old('email', $admin['email']) ?>" required>
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        <?php if (isset($validation) && $validation->hasError('password')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="confirm_password" class="form-control <?= isset($validation) && $validation->hasError('confirm_password') ? 'is-invalid' : '' ?>">
                        <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('confirm_password') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="admin" <?= ($admin['role'] ?? 'admin') === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="superadmin" <?= ($admin['role'] ?? '') === 'superadmin' ? 'selected' : '' ?>>Super Admin</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('admin/settings/admins') ?>" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
