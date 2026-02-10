<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <h6 class="mb-4">Tambah Jemaat</h6>
                    
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?= base_url('admin/index.php?action=jemaat-simpan') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Kaum Bapak" <?= old('kategori') == 'Kaum Bapak' ? 'selected' : '' ?>>Kaum Bapak</option>
                                    <option value="Kaum Ibu" <?= old('kategori') == 'Kaum Ibu' ? 'selected' : '' ?>>Kaum Ibu</option>
                                    <option value="Pemuda" <?= old('kategori') == 'Pemuda' ? 'selected' : '' ?>>Pemuda/i</option>
                                    <option value="Anak-anak" <?= old('kategori') == 'Anak-anak' ? 'selected' : '' ?>>Anak-anak</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" rows="3"><?= old('alamat') ?></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telepon" value="<?= old('telepon') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status Pernikahan</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status_pernikahan">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Menikah" <?= old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                                    <option value="Menikah" <?= old('status_pernikahan') == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                                    <option value="Duda/Janda" <?= old('status_pernikahan') == 'Duda/Janda' ? 'selected' : '' ?>>Duda/Janda</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pekerjaan" value="<?= old('pekerjaan') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Baptis</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_baptis" value="<?= old('tanggal_baptis') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Sidi</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_sidi" value="<?= old('tanggal_sidi') ?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/index.php?page=jemaat-list') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>


