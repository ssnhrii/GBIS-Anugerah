<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Konten: <?= esc($page['page_title']) ?></h6>
                
                <form action="" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Kunci Halaman</label>
                        <input type="text" class="form-control" value="<?= esc($page['page_key']) ?>" disabled>
                        <small class="text-muted">Kunci halaman tidak dapat diubah</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Halaman *</label>
                        <input type="text" name="page_title" class="form-control <?= isset($validation) && $validation->hasError('page_title') ? 'is-invalid' : '' ?>" value="<?= old('page_title', $page['page_title']) ?>" required>
                        <?php if (isset($validation) && $validation->hasError('page_title')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('page_title') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konten *</label>
                        <textarea name="content" class="form-control <?= isset($validation) && $validation->hasError('content') ? 'is-invalid' : '' ?>" rows="15" required><?= old('content', $page['content']) ?></textarea>
                        <?php if (isset($validation) && $validation->hasError('content')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('content') ?></div>
                        <?php endif; ?>
                        <small class="text-muted">Anda dapat menggunakan HTML untuk format konten</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2"><?= old('meta_description', $page['meta_description']) ?></textarea>
                        <small class="text-muted">Deskripsi untuk SEO (opsional)</small>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" <?= old('is_active', $page['is_active']) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Aktifkan halaman ini</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('admin/settings/pages') ?>" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
