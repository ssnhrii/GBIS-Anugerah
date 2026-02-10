<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <h6 class="mb-4">Tambah Firman</h6>
                    
                    <form action="<?= base_url('admin/index.php?page=firman-simpan') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ayat Alkitab</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ayat_alkitab" value="<?= old('ayat_alkitab') ?>" placeholder="Contoh: Yohanes 3:16">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Isi Ayat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="isi_ayat" rows="3"><?= old('isi_ayat') ?></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Isi Renungan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="isi_renungan" rows="8" required><?= old('isi_renungan') ?></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="penulis" value="<?= old('penulis') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Publikasi <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_publikasi" value="<?= old('tanggal_publikasi', date('Y-m-d')) ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori">
                                    <option value="Renungan Harian">Renungan Harian</option>
                                    <option value="Khotbah">Khotbah</option>
                                    <option value="Artikel">Artikel</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status">
                                    <option value="Draft">Draft</option>
                                    <option value="Published">Published</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Gambar Cover (URL)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gambar_cover" value="<?= old('gambar_cover') ?>" placeholder="https://...">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/index.php?page=firman-list') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>

