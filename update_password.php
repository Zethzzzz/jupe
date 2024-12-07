<?php
$conn = mysqli_connect('localhost', 'root', '', 'dbjupe');

// Ambil user dengan password plain text
$query = "SELECT * FROM users WHERE id = 2";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Hash ulang password
$new_password = password_hash($user['password'], PASSWORD_DEFAULT);
$update_query = "UPDATE users SET password = '$new_password' WHERE id = 2";
if (mysqli_query($conn, $update_query)) {
    echo "Password berhasil diperbarui!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
