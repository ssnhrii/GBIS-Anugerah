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
                <h1>Edit Kegiatan</h1>
                <p>Perbarui informasi kegiatan</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        <div class="admin-section">
            <form action="<?= base_url('admin/kegiatan/update/' . $kegiatan['id']) ?>" method="post" class="form-jemaat">
                <?= csrf_field() ?>

                <div class="form-grid">
                    <!-- Informasi Kegiatan -->
                    <div class="form-section">
                        <h3>Informasi Kegiatan</h3>
                        
                        <div class="form-group">
                            <label for="judul_kegiatan">Judul Kegiatan <span class="required">*</span></label>
                            <input type="text" id="judul_kegiatan" name="judul_kegiatan" 
                                   value="<?= old('judul_kegiatan', $kegiatan['judul_kegiatan']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"><?= old('deskripsi', $kegiatan['deskripsi']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori <span class="required">*</span></label>
                            <select id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Kaum Bapak" <?= old('kategori', $kegiatan['kategori']) === 'Kaum Bapak' ? 'selected' : '' ?>>Kaum Bapak</option>
                                <option value="Kaum Ibu" <?= old('kategori', $kegiatan['kategori']) === 'Kaum Ibu' ? 'selected' : '' ?>>Kaum Ibu</option>
                                <option value="Pemuda" <?= old('kategori', $kegiatan['kategori']) === 'Pemuda' ? 'selected' : '' ?>>Pemuda</option>
                                <option value="Anak-anak" <?= old('kategori', $kegiatan['kategori']) === 'Anak-anak' ? 'selected' : '' ?>>Anak-anak</option>
                                <option value="Umum" <?= old('kategori', $kegiatan['kategori']) === 'Umum' ? 'selected' : '' ?>>Umum</option>
                            </select>
                        </div>
                    </div>

                    <!-- Waktu & Tempat -->
                    <div class="form-section">
                        <h3>Waktu & Tempat</h3>
                        
                        <div class="form-group">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan <span class="required">*</span></label>
                            <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" 
                                   value="<?= old('tanggal_kegiatan', $kegiatan['tanggal_kegiatan']) ?>" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input type="time" id="waktu_mulai" name="waktu_mulai" 
                                       value="<?= old('waktu_mulai', $kegiatan['waktu_mulai']) ?>">
                            </div>

                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" id="waktu_selesai" name="waktu_selesai" 
                                       value="<?= old('waktu_selesai', $kegiatan['waktu_selesai']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" 
                                   value="<?= old('lokasi', $kegiatan['lokasi']) ?>" 
                                   placeholder="Contoh: Gereja GBIS Anugerah">
                        </div>
                    </div>

                    <!-- Detail Tambahan -->
                    <div class="form-section">
                        <h3>Detail Tambahan</h3>
                        
                        <div class="form-group">
                            <label for="pembicara">Pembicara/Pengisi Acara</label>
                            <input type="text" id="pembicara" name="pembicara" 
                                   value="<?= old('pembicara', $kegiatan['pembicara']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_peserta">Target Jumlah Peserta</label>
                            <input type="number" id="jumlah_peserta" name="jumlah_peserta" 
                                   value="<?= old('jumlah_peserta', $kegiatan['jumlah_peserta']) ?>" 
                                   min="0">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="Akan Datang" <?= old('status', $kegiatan['status']) === 'Akan Datang' ? 'selected' : '' ?>>Akan Datang</option>
                                <option value="Sedang Berlangsung" <?= old('status', $kegiatan['status']) === 'Sedang Berlangsung' ? 'selected' : '' ?>>Sedang Berlangsung</option>
                                <option value="Selesai" <?= old('status', $kegiatan['status']) === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                <option value="Dibatalkan" <?= old('status', $kegiatan['status']) === 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>
