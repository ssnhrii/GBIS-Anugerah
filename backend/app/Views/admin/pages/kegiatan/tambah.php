<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <h6 class="mb-4">Tambah Kegiatan</h6>
                    
                    <form action="<?= base_url('admin/index.php?action=kegiatan-simpan') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul_kegiatan" value="<?= old('judul_kegiatan') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Kaum Bapak">Kaum Bapak</option>
                                    <option value="Kaum Ibu">Kaum Ibu</option>
                                    <option value="Pemuda">Pemuda/i</option>
                                    <option value="Anak-anak">Anak-anak</option>
                                    <option value="Umum">Umum</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_kegiatan" value="<?= old('tanggal_kegiatan') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Waktu Mulai</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="waktu_mulai" value="<?= old('waktu_mulai') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Waktu Selesai</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="waktu_selesai" value="<?= old('waktu_selesai') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lokasi" value="<?= old('lokasi') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pembicara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pembicara" value="<?= old('pembicara') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="deskripsi" rows="4"><?= old('deskripsi') ?></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status">
                                    <option value="Akan Datang">Akan Datang</option>
                                    <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/index.php?page=kegiatan-list') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>


