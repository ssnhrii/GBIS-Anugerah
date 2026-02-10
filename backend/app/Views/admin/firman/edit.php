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
                <h1>Edit Firman</h1>
                <p>Perbarui renungan atau artikel rohani</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/firman') ?>" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        <div class="admin-section">
            <form action="<?= base_url('admin/firman/update/' . $firman['id']) ?>" method="post" class="form-jemaat">
                <?= csrf_field() ?>

                <div class="form-grid">
                    <!-- Informasi Dasar -->
                    <div class="form-section">
                        <h3>Informasi Dasar</h3>
                        
                        <div class="form-group">
                            <label for="judul">Judul <span class="required">*</span></label>
                            <input type="text" id="judul" name="judul" 
                                   value="<?= old('judul', $firman['judul']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select id="kategori" name="kategori">
                                <option value="Renungan Harian" <?= old('kategori', $firman['kategori']) === 'Renungan Harian' ? 'selected' : '' ?>>Renungan Harian</option>
                                <option value="Renungan Minggu" <?= old('kategori', $firman['kategori']) === 'Renungan Minggu' ? 'selected' : '' ?>>Renungan Minggu</option>
                                <option value="Artikel Rohani" <?= old('kategori', $firman['kategori']) === 'Artikel Rohani' ? 'selected' : '' ?>>Artikel Rohani</option>
                                <option value="Kesaksian" <?= old('kategori', $firman['kategori']) === 'Kesaksian' ? 'selected' : '' ?>>Kesaksian</option>
                                <option value="Lainnya" <?= old('kategori', $firman['kategori']) === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" id="penulis" name="penulis" 
                                   value="<?= old('penulis', $firman['penulis']) ?>" 
                                   placeholder="Nama penulis">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="tanggal_publikasi">Tanggal Publikasi <span class="required">*</span></label>
                                <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" 
                                       value="<?= old('tanggal_publikasi', $firman['tanggal_publikasi']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status">
                                    <option value="Draft" <?= old('status', $firman['status']) === 'Draft' ? 'selected' : '' ?>>Draft</option>
                                    <option value="Terbit" <?= old('status', $firman['status']) === 'Terbit' ? 'selected' : '' ?>>Terbit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Ayat Alkitab -->
                    <div class="form-section">
                        <h3>Ayat Alkitab</h3>
                        
                        <div class="form-group">
                            <label for="ayat_alkitab">Referensi Ayat</label>
                            <input type="text" id="ayat_alkitab" name="ayat_alkitab" 
                                   value="<?= old('ayat_alkitab', $firman['ayat_alkitab']) ?>" 
                                   placeholder="Contoh: Yohanes 3:16">
                        </div>

                        <div class="form-group">
                            <label for="isi_ayat">Isi Ayat</label>
                            <textarea id="isi_ayat" name="isi_ayat" rows="4" 
                                      placeholder="Tulis isi ayat Alkitab di sini"><?= old('isi_ayat', $firman['isi_ayat']) ?></textarea>
                        </div>
                    </div>

                    <!-- Isi Renungan -->
                    <div class="form-section full-width">
                        <h3>Isi Renungan <span class="required">*</span></h3>
                        
                        <div class="form-group">
                            <textarea id="isi_renungan" name="isi_renungan" rows="12" 
                                      required><?= old('isi_renungan', $firman['isi_renungan']) ?></textarea>
                        </div>
                    </div>

                    <!-- Gambar Cover -->
                    <div class="form-section">
                        <h3>Gambar Cover</h3>
                        
                        <div class="form-group">
                            <label for="gambar_cover">URL Gambar Cover</label>
                            <input type="text" id="gambar_cover" name="gambar_cover" 
                                   value="<?= old('gambar_cover', $firman['gambar_cover']) ?>" 
                                   placeholder="https://example.com/image.jpg">
                            <small>Kosongkan jika tidak ada gambar</small>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    <a href="<?= base_url('admin/firman') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>
