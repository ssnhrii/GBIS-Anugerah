<?= $this->include('admin/layouts/header') ?>

<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

<!-- Settings Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Account Settings</h6>
                
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <!-- Notification Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fa fa-bell me-2"></i>Notification Preferences</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/index.php?page=settings-update&action=notifications') ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" <?= ($email_notifications ?? true) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="email_notifications">
                                    Email Notifications
                                </label>
                            </div>
                            
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="new_jemaat" name="new_jemaat" <?= ($new_jemaat ?? true) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="new_jemaat">
                                    Notify when new jemaat is added
                                </label>
                            </div>
                            
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="new_kegiatan" name="new_kegiatan" <?= ($new_kegiatan ?? true) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="new_kegiatan">
                                    Notify when new kegiatan is created
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Preferences
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Security Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fa fa-shield-alt me-2"></i>Security Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/index.php?page=settings-update&action=security') ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="two_factor" name="two_factor" <?= ($two_factor ?? false) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="two_factor">
                                    Enable Two-Factor Authentication
                                </label>
                            </div>
                            
                            <div class="mb-3">
                                <label for="session_timeout" class="form-label">Session Timeout (minutes)</label>
                                <select class="form-select" id="session_timeout" name="session_timeout">
                                    <option value="15" <?= ($session_timeout ?? 30) == 15 ? 'selected' : '' ?>>15 minutes</option>
                                    <option value="30" <?= ($session_timeout ?? 30) == 30 ? 'selected' : '' ?>>30 minutes</option>
                                    <option value="60" <?= ($session_timeout ?? 30) == 60 ? 'selected' : '' ?>>1 hour</option>
                                    <option value="120" <?= ($session_timeout ?? 30) == 120 ? 'selected' : '' ?>>2 hours</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Security Settings
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Display Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fa fa-desktop me-2"></i>Display Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/index.php?page=settings-update&action=display') ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="mb-3">
                                <label for="items_per_page" class="form-label">Items Per Page</label>
                                <select class="form-select" id="items_per_page" name="items_per_page">
                                    <option value="10" <?= ($items_per_page ?? 10) == 10 ? 'selected' : '' ?>>10</option>
                                    <option value="25" <?= ($items_per_page ?? 10) == 25 ? 'selected' : '' ?>>25</option>
                                    <option value="50" <?= ($items_per_page ?? 10) == 50 ? 'selected' : '' ?>>50</option>
                                    <option value="100" <?= ($items_per_page ?? 10) == 100 ? 'selected' : '' ?>>100</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="date_format" class="form-label">Date Format</label>
                                <select class="form-select" id="date_format" name="date_format">
                                    <option value="d/m/Y" <?= ($date_format ?? 'd/m/Y') == 'd/m/Y' ? 'selected' : '' ?>>DD/MM/YYYY</option>
                                    <option value="m/d/Y" <?= ($date_format ?? 'd/m/Y') == 'm/d/Y' ? 'selected' : '' ?>>MM/DD/YYYY</option>
                                    <option value="Y-m-d" <?= ($date_format ?? 'd/m/Y') == 'Y-m-d' ? 'selected' : '' ?>>YYYY-MM-DD</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Save Display Settings
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="<?= base_url('admin/index.php') ?>" class="btn btn-secondary">
                        <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings End -->

<?= $this->include('admin/layouts/footer') ?>
