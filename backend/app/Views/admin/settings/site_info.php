<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Informasi Situs</h6>
                
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <?= csrf_field() ?>
                    
                    <?php foreach ($settings as $setting): ?>
                        <div class="mb-3">
                            <label class="form-label"><?= esc($setting['setting_label']) ?></label>
                            
                            <?php if ($setting['setting_type'] === 'textarea'): ?>
                                <textarea name="<?= esc($setting['setting_key']) ?>" class="form-control" rows="3"><?= old($setting['setting_key'], $setting['setting_value']) ?></textarea>
                            <?php else: ?>
                                <input type="<?= $setting['setting_type'] ?>" name="<?= esc($setting['setting_key']) ?>" class="form-control" value="<?= old($setting['setting_key'], $setting['setting_value']) ?>">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
