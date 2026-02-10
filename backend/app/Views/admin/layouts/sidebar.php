        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?= base_url('admin/index.php') ?>" class="navbar-brand mx-4 mb-3 d-flex align-items-center">
                    <img src="<?= base_url('images/logo GBIS.png') ?>" alt="Logo GBIS" style="height: 40px; margin-right: 10px;">
                    <h3 class="text-primary mb-0">GBIS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= esc($user_name ?? 'Admin') ?></h6>
                        <span><?= esc($user_role ?? 'Administrator') ?></span>
                    </div>
                </div>
                <br class="mx-4 my-3" style="border-top: 5px solid #dee2e6;">
                <div class="navbar-nav w-100">
                    <a href="<?= base_url('admin/index.php') ?>" class="nav-item nav-link <?= ($active_menu ?? '') == 'dashboard' ? 'active' : '' ?>">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    
                    <a href="<?= base_url('admin/index.php?page=jemaat-list') ?>" class="nav-item nav-link <?= in_array(($active_menu ?? ''), ['jemaat', 'jemaat-list', 'jemaat-tambah', 'jemaat-edit', 'jemaat-view']) ? 'active' : '' ?>">
                        <i class="fa fa-users me-2"></i>Jemaat
                    </a>
                    
                    <a href="<?= base_url('admin/index.php?page=kegiatan-list') ?>" class="nav-item nav-link <?= in_array(($active_menu ?? ''), ['kegiatan', 'kegiatan-list', 'kegiatan-tambah', 'kegiatan-edit', 'kegiatan-view']) ? 'active' : '' ?>">
                        <i class="fa fa-calendar-alt me-2"></i>Kegiatan
                    </a>
                    
                    <a href="<?= base_url('admin/index.php?page=dokumentasi-list') ?>" class="nav-item nav-link <?= in_array(($active_menu ?? ''), ['dokumentasi', 'dokumentasi-list', 'dokumentasi-tambah', 'dokumentasi-edit']) ? 'active' : '' ?>">
                        <i class="fa fa-images me-2"></i>Dokumentasi
                    </a>
                    
                    <a href="<?= base_url('admin/index.php?page=firman-list') ?>" class="nav-item nav-link <?= in_array(($active_menu ?? ''), ['firman', 'firman-list', 'firman-tambah', 'firman-edit']) ? 'active' : '' ?>">
                        <i class="fa fa-book-open me-2"></i>Firman
                    </a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?= strpos(($active_menu ?? ''), 'pengaturan') === 0 ? 'active' : '' ?>" data-bs-toggle="dropdown">
                            <i class="fa fa-cog me-2"></i>Pengaturan
                        </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= base_url('admin/index.php?page=pengaturan-konten') ?>" class="dropdown-item <?= ($active_menu ?? '') == 'pengaturan-konten' ? 'active' : '' ?>">
                                <i class="fa fa-file-alt me-2"></i>Kelola Konten
                            </a>
                            <a href="<?= base_url('admin/index.php?page=pengaturan-info') ?>" class="dropdown-item <?= ($active_menu ?? '') == 'pengaturan-info' ? 'active' : '' ?>">
                                <i class="fa fa-info-circle me-2"></i>Informasi Situs
                            </a>
                            <a href="<?= base_url('admin/index.php?page=pengaturan-admin') ?>" class="dropdown-item <?= ($active_menu ?? '') == 'pengaturan-admin' ? 'active' : '' ?>">
                                <i class="fa fa-user-shield me-2"></i>Kelola Admin
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

