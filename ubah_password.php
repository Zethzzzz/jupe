<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; // Ambil username dari input form
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Ambil data user dari database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password lama
        if (password_verify($current_password, $user['password'])) {
            // Cek kesesuaian password baru
            if ($new_password === $confirm_password) {
                // Hash password baru dan update ke database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_query = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";
                
                if (mysqli_query($conn, $update_query)) {
                    $success = "Password berhasil diubah!";
                } else {
                    $error = "Gagal mengubah password!";
                }
            } else {
                $error = "Password baru dan konfirmasi tidak sesuai!";
            }
        } else {
            $error = "Password lama salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            background: none;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Ubah Password</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3 password-container">
                <label for="current_password" class="form-label">Password Lama</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                <button type="button" class="toggle-password" onclick="togglePassword('current_password')">👁️</button>
            </div>
            <div class="mb-3 password-container">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <button type="button" class="toggle-password" onclick="togglePassword('new_password')">👁️</button>
            </div>
            <div class="mb-3 password-container">
                <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')">👁️</button>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Password</button>
            <a href="reservasi.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
    </script>
</body>
</html>
