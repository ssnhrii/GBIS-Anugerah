            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex mx-auto position-relative" style="width: 400px;">
                    <i class="fa fa-search position-absolute" style="left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                    <input class="form-control border-0 ps-5" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <!-- Message Dropdown - Hidden
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="<?= base_url('admin/img/user.jpg') ?>" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    -->
                    
                    <!-- Notification Dropdown - Hidden
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    -->
                    
                    <!-- User Profile Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <div class="position-relative me-2">
                                <i class="fa fa-user" style="font-size: 20px; color: #009CFF;"></i>
                                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1" style="bottom: -2px; right: -2px;"></div>
                            </div>
                            <span class="d-none d-lg-inline-flex"><?= esc($user_name ?? 'Admin') ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= base_url('admin/index.php?page=profile') ?>" class="dropdown-item">
                                <i class="fa fa-user-circle me-2"></i>My Profile
                            </a>
                            <a href="<?= base_url('admin/index.php?page=settings') ?>" class="dropdown-item">
                                <i class="fa fa-cog me-2"></i>Settings
                            </a>
                            <hr class="dropdown-divider">
                            <a href="<?= base_url('logout') ?>" class="dropdown-item text-danger">
                                <i class="fa fa-sign-out-alt me-2"></i>Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

