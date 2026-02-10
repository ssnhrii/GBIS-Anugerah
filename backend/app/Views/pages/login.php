<!-- Login Start -->
<div class="container-fluid py-6">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-light rounded p-5 shadow">
                    <!-- Logo & Title -->
                    <div class="text-center mb-2">
                        <h2 class="text-primary mb-2">Login</h2>
                        <p class="text-muted">Masuk ke dashboard admin GBIS Anugerah</p>
                    </div>
                    
                    <!-- Alert Messages -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Login Form -->
                    <form action="<?= base_url('login') ?>" method="post" id="loginForm">
                        <?= csrf_field() ?>
                        
                        <!-- Username Field -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-user text-primary"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="username" 
                                       name="username" 
                                       placeholder="Masukkan username"
                                       required 
                                       autocomplete="username"
                                       minlength="3"
                                       maxlength="50"
                                       pattern="[a-zA-Z0-9_]+"
                                       title="Username hanya boleh huruf, angka, dan underscore">
                            </div>
                            <small class="text-muted">Min. 3 karakter, hanya huruf, angka, dan underscore</small>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-lock text-primary"></i>
                                </span>
                                <input type="password" 
                                       class="form-control" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Masukkan password"
                                       required 
                                       autocomplete="current-password"
                                       minlength="6"
                                       maxlength="100">
                                <button class="btn btn-outline-secondary" 
                                        type="button" 
                                        id="togglePassword"
                                        title="Tampilkan/Sembunyikan password">
                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                            <small class="text-muted">Min. 6 karakter</small>
                        </div>
                        
                        <!-- Remember Me & Forgot Password -->
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input" 
                                       id="remember" 
                                       name="remember"
                                       value="1">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="#" 
                               class="text-primary text-decoration-none" 
                               data-bs-toggle="modal" 
                               data-bs-target="#forgotPasswordModal">
                                Lupa password?
                            </a>
                        </div>
                        
                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" 
                                    class="btn btn-primary py-3" 
                                    id="loginBtn"
                                    data-is-locked="<?= isset($isLocked) && $isLocked ? 'true' : 'false' ?>"
                                    data-remaining-time="<?= isset($remainingTime) ? $remainingTime : 0 ?>">
                                <span id="loginBtnText">
                                    <i class="fa fa-sign-in-alt me-2"></i>Login
                                </span>
                                <span id="loginBtnLoading" style="display: none;">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Memproses...
                                </span>
                                <span id="loginBtnLocked" style="display: none;">
                                    <i class="fa fa-lock me-2"></i>Akses Terkunci
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lupa Password -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="forgotPasswordModalLabel">
                    <i class="fa fa-key me-2"></i>Lupa Password?
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fa fa-info-circle fa-3x text-primary mb-3"></i>
                    <h6>Hubungi Administrator</h6>
                </div>
                <p class="text-muted">
                    Untuk reset password, silakan hubungi administrator gereja melalui:
                </p>
                <div class="list-group">
                    <a href="tel:<?= esc($siteSettings['contact_phone'] ?? '(031) 1234567') ?>" 
                       class="list-group-item list-group-item-action">
                        <i class="fa fa-phone text-primary me-2"></i>
                        <strong>Telepon:</strong> <?= esc($siteSettings['contact_phone'] ?? '(031) 1234567') ?>
                    </a>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $siteSettings['whatsapp'] ?? '628123456789') ?>" 
                       target="_blank"
                       class="list-group-item list-group-item-action">
                        <i class="fab fa-whatsapp text-success me-2"></i>
                        <strong>WhatsApp:</strong> <?= esc($siteSettings['whatsapp'] ?? '0812-3456-789') ?>
                    </a>
                    <a href="mailto:<?= esc($siteSettings['contact_email'] ?? 'admin@gbis.org') ?>" 
                       class="list-group-item list-group-item-action">
                        <i class="fa fa-envelope text-danger me-2"></i>
                        <strong>Email:</strong> <?= esc($siteSettings['contact_email'] ?? 'admin@gbis.org') ?>
                    </a>
                </div>
                <div class="alert alert-info mt-3 mb-0">
                    <small>
                        <i class="fa fa-info-circle me-1"></i>
                        Siapkan informasi identitas Anda untuk verifikasi
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Login Page Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Password Visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    }
    
    // Form Submit Animation
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const loginBtnText = document.getElementById('loginBtnText');
    const loginBtnLoading = document.getElementById('loginBtnLoading');
    const loginBtnLocked = document.getElementById('loginBtnLocked');
    const lockoutInfo = document.getElementById('lockoutInfo');
    const countdownTimer = document.getElementById('countdownTimer');
    const lockoutMinutes = document.getElementById('lockoutMinutes');
    const lockoutSeconds = document.getElementById('lockoutSeconds');
    
    // Check if account is locked
    const isLocked = loginBtn.getAttribute('data-is-locked') === 'true';
    let remainingTime = parseInt(loginBtn.getAttribute('data-remaining-time')) || 0;
    
    let countdownInterval = null;
    
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
    }
    
    function updateCountdown() {
        if (remainingTime > 0) {
            const mins = Math.floor(remainingTime / 60);
            const secs = remainingTime % 60;
            
            countdownTimer.textContent = formatTime(remainingTime);
            lockoutMinutes.textContent = mins;
            lockoutSeconds.textContent = secs;
            
            remainingTime--;
        } else {
            // Unlock button
            clearInterval(countdownInterval);
            loginBtn.disabled = false;
            loginBtn.classList.remove('btn-danger');
            loginBtn.classList.add('btn-primary');
            loginBtn.title = '';
            loginBtnLocked.style.display = 'none';
            loginBtnText.style.display = 'inline-block';
            lockoutInfo.style.display = 'none';
            
            // Reload page to reset session
            setTimeout(function() {
                window.location.reload();
            }, 500);
        }
    }
    
    function lockButton() {
        loginBtn.disabled = true;
        loginBtn.classList.remove('btn-primary');
        loginBtn.classList.add('btn-danger');
        loginBtn.title = 'Akun terkunci. Tunggu hingga waktu habis.';
        loginBtnText.style.display = 'none';
        loginBtnLoading.style.display = 'none';
        loginBtnLocked.style.display = 'inline-block';
        lockoutInfo.style.display = 'block';
        
        updateCountdown();
        countdownInterval = setInterval(updateCountdown, 1000);
    }
    
    function resetButton() {
        if (loginBtn && !loginBtn.disabled) {
            loginBtn.disabled = false;
        }
        if (loginBtnText) {
            loginBtnText.style.display = 'inline-block';
        }
        if (loginBtnLoading) {
            loginBtnLoading.style.display = 'none';
        }
    }
    
    // Initialize lockout state
    if (isLocked && remainingTime > 0) {
        lockButton();
    } else {
        resetButton();
    }
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            // Check if button is locked
            if (loginBtn.disabled && remainingTime > 0) {
                e.preventDefault();
                alert('Akun terkunci. Silakan tunggu hingga waktu habis.');
                return false;
            }
            
            // Show loading animation
            loginBtn.disabled = true;
            loginBtnText.style.display = 'none';
            loginBtnLoading.style.display = 'inline-block';
            
            // Validasi client-side
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            if (username.length < 3) {
                e.preventDefault();
                alert('Username minimal 3 karakter');
                resetButton();
                return false;
            }
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password minimal 6 karakter');
                resetButton();
                return false;
            }
            
            // Timeout fallback: reset button setelah 10 detik jika tidak ada response
            setTimeout(function() {
                resetButton();
            }, 10000);
        });
    }
    
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
    
    // Cleanup interval on page unload
    window.addEventListener('beforeunload', function() {
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }
    });
});

// Reset button saat halaman ditampilkan kembali (browser back/forward)
window.addEventListener('pageshow', function(event) {
    const loginBtn = document.getElementById('loginBtn');
    const loginBtnText = document.getElementById('loginBtnText');
    const loginBtnLoading = document.getElementById('loginBtnLoading');
    
    // Only reset if not locked
    const isLocked = loginBtn && loginBtn.getAttribute('data-is-locked') === 'true';
    const remainingTime = loginBtn ? parseInt(loginBtn.getAttribute('data-remaining-time')) || 0 : 0;
    
    if (!isLocked || remainingTime <= 0) {
        if (loginBtn) {
            loginBtn.disabled = false;
        }
        if (loginBtnText) {
            loginBtnText.style.display = 'inline-block';
        }
        if (loginBtnLoading) {
            loginBtnLoading.style.display = 'none';
        }
    }
});
</script>

<style>
/* Login Page Custom Styles */
.input-group-text {
    border-right: 0;
}

.input-group .form-control {
    border-left: 0;
}

.input-group .form-control:focus {
    border-color: #ced4da;
    box-shadow: none;
}

.input-group-text {
    background-color: white !important;
}

#togglePassword {
    border-left: 0;
}

#togglePassword:hover {
    background-color: #f8f9fa;
}

.btn-primary {
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.btn-danger:disabled {
    cursor: not-allowed;
    opacity: 0.8;
}

.btn-danger:disabled:hover {
    transform: none;
    box-shadow: none;
}

.spinner-border-sm {
    width: 1rem;
    height: 1rem;
    border-width: 0.15em;
}

.list-group-item {
    transition: all 0.2s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}
</style>
<!-- Login End -->
