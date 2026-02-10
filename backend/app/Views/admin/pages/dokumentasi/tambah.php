<?= $this->include('admin/layouts/header') ?>
<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <h6 class="mb-4">Tambah Dokumentasi</h6>
                    
                    <form action="<?= base_url('admin/index.php?page=dokumentasi-simpan') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kategori <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Foto">Foto</option>
                                    <option value="Video">Video</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jenis_kegiatan" required>
                                    <option value="">Pilih Jenis</option>
                                    <option value="Kaum Bapak">Kaum Bapak</option>
                                    <option value="Kaum Ibu">Kaum Ibu</option>
                                    <option value="Pemuda">Pemuda/i</option>
                                    <option value="Anak-anak">Anak-anak</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Ibadah">Ibadah</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Metode Upload</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="upload_method" id="uploadMethod">
                                    <option value="file">Upload File</option>
                                    <option value="url">URL</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3" id="fileUploadDiv">
                            <label class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file_upload" accept="image/*,video/*">
                                <small class="text-muted">Max 5MB untuk foto, 50MB untuk video</small>
                            </div>
                        </div>
                        
                        <div class="row mb-3" id="urlUploadDiv" style="display:none;">
                            <label class="col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="file_path" placeholder="https://...">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_kegiatan" value="<?= old('tanggal_kegiatan') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Fotografer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fotografer" value="<?= old('fotografer') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="deskripsi" rows="3"><?= old('deskripsi') ?></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/index.php?page=dokumentasi-list') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?= $this->include('admin/layouts/footer') ?>

<script>
document.getElementById('uploadMethod').addEventListener('change', function() {
    if (this.value === 'url') {
        document.getElementById('fileUploadDiv').style.display = 'none';
        document.getElementById('urlUploadDiv').style.display = 'flex';
    } else {
        document.getElementById('fileUploadDiv').style.display = 'flex';
        document.getElementById('urlUploadDiv').style.display = 'none';
    }
});
</script>

