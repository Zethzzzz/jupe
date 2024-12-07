<?php
include 'koneksi.php';

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect ke halaman login jika belum login
    header('Location: login.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM reservasi_temp WHERE id = $delete_id";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Redirect to avoid repeated deletion on page refresh
    header("Location: reservasi.php");
    exit;
}

// Fetch data from database
$result = mysqli_query($conn, "SELECT * FROM reservasi_temp ORDER BY waktuPemesanan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn a {
        color: white; /* Mengubah warna teks menjadi putih */
        text-decoration: none; /* Menghilangkan garis bawah pada link */
    }
    </style>
    <title>Data Reservasi</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Reservasi</a>
            <div class="d-flex align-items-center">
                <span class="me-3">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="ubah_password.php" class="btn btn-secondary mx-2">Ubah Password</a>
                <?php endif; ?>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4 ml-0">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>ID Pemesanan</th>
                    <th>Nama</th>
                    <th>WhatsApp</th>
                    <th>Waktu Pemesanan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Jumlah Orang</th>
                    <th>Cabang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php 
            $no = 1; // Inisialisasi nomor
            while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $no++; ?></td> <!-- Kolom No. -->
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['whatsapp']; ?></td>
                <td><?php echo $row['waktuPemesanan']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['waktu']; ?></td>
                <td><?php echo $row['jumlah_orang']; ?></td>
                <td><?php echo $row['cabang']; ?></td>
                <td>
                    <!-- Tombol Hapus -->
                    <button class="btn btn-danger btn-sm"><a href="reservasi.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a></button>
                    
                    <!-- Tombol WhatsApp -->
                    | <button class="btn btn-success btn-sm"><a href="https://wa.me/<?php echo $row['whatsapp']; ?>?text=Hallo%20Bapak/Ibu%20<?php echo urlencode($row['nama']); ?>,%20Saya%20ingin%20mengonfirmasi%20pemesanan%20Anda%20untuk%20tanggal%20<?php echo urlencode($row['tanggal']); ?>%20pada%20jam%20<?php echo urlencode($row['waktu']); ?>.%20Apakah%20semua%20informasi%20sudah%20benar?" target="_blank">WhatsApp</a></button>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
