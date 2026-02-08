<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GBIS Anugerah</title>
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
                    <h1>Login</h1>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-error">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('index.php?page=login') ?>" method="POST" class="login-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <span class="eye-icon" id="eyeIcon">👁️</span>
                            </button>
                        </div>
                    </div>

                    <div class="form-group checkbox-group">
                        <label>
                            <input type="checkbox" name="remember" value="1">
                            <span>Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit">Login</button>
                </form>

                <div class="login-footer">
                    <a href="<?= base_url() ?>">← Kembali</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }
    </script>
