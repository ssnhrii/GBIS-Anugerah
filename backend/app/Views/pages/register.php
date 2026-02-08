<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GBIS Anugerah</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/logo GBIS.png') ?>">
    <link rel="stylesheet" href="<?= base_url('css/design-system.css') ?>">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        body {
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <main class="login-page">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h1>Registrasi</h1>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-error">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-error">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('register') ?>" method="POST" class="login-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" 
                               value="<?= old('username') ?>" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email" 
                               value="<?= old('email') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password', 'eyeIcon1')">
                                <span class="eye-icon" id="eyeIcon1">👁️</span>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirm">Konfirmasi Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password_confirm" name="password_confirm" 
                                   placeholder="Konfirmasi password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirm', 'eyeIcon2')">
                                <span class="eye-icon" id="eyeIcon2">👁️</span>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Daftar</button>
                </form>

                <div class="login-footer">
                    <a href="<?= base_url('login') ?>">Sudah punya akun? Login</a>
                    <a href="<?= base_url() ?>">← Kembali</a>
                </div>
            </div>
        </div>
    </main>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
