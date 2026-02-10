<main class="admin-main">
    <div class="admin-container">
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="admin-header">
            <div class="admin-welcome">
                <h1>Tambah Jemaat</h1>
                <p>Daftarkan anggota jemaat baru</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/jemaat') ?>" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        <div class="admin-section">
            <form action="<?= base_url('admin/jemaat/simpan') ?>" method="post" class="form-jemaat">
                <?= csrf_field() ?>

                <div class="form-grid">
                    <!-- Data Pribadi -->
                    <div class="form-section">
                        <h3>Data Pribadi</h3>
                        
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" 
                                   value="<?= old('nama_lengkap') ?>" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span></label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" <?= old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori <span class="required">*</span></label>
                                <select id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Kaum Bapak" <?= old('kategori') === 'Kaum Bapak' ? 'selected' : '' ?>>Kaum Bapak</option>
                                    <option value="Kaum Ibu" <?= old('kategori') === 'Kaum Ibu' ? 'selected' : '' ?>>Kaum Ibu</option>
                                    <option value="Pemuda" <?= old('kategori') === 'Pemuda' ? 'selected' : '' ?>>Pemuda</option>
                                    <option value="Anak-anak" <?= old('kategori') === 'Anak-anak' ? 'selected' : '' ?>>Anak-anak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" 
                                       value="<?= old('tempat_lahir') ?>">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                                       value="<?= old('tanggal_lahir') ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3"><?= old('alamat') ?></textarea>
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="form-section">
                        <h3>Kontak</h3>
                        
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" 
                                   value="<?= old('nomor_telepon') ?>" 
                                   placeholder="08123456789">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" 
                                   value="<?= old('email') ?>" 
                                   placeholder="contoh@email.com">
                        </div>
                    </div>

                    <!-- Data Tambahan -->
                    <div class="form-section">
                        <h3>Data Tambahan</h3>
                        
                        <div class="form-group">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select id="status_pernikahan" name="status_pernikahan">
                                <option value="">Pilih Status</option>
                                <option value="Belum Menikah" <?= old('status_pernikahan') === 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                                <option value="Menikah" <?= old('status_pernikahan') === 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                                <option value="Duda" <?= old('status_pernikahan') === 'Duda' ? 'selected' : '' ?>>Duda</option>
                                <option value="Janda" <?= old('status_pernikahan') === 'Janda' ? 'selected' : '' ?>>Janda</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" 
                                   value="<?= old('pekerjaan') ?>">
                        </div>
                    </div>

                    <!-- Data Gereja -->
                    <div class="form-section">
                        <h3>Data Gereja</h3>
                        
                        <div class="form-group">
                            <label for="tanggal_baptis">Tanggal Baptis</label>
                            <input type="date" id="tanggal_baptis" name="tanggal_baptis" 
                                   value="<?= old('tanggal_baptis') ?>">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_sidi">Tanggal Sidi</label>
                            <input type="date" id="tanggal_sidi" name="tanggal_sidi" 
                                   value="<?= old('tanggal_sidi') ?>">
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="<?= base_url('admin/jemaat') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>
