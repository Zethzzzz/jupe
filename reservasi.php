<?php
include 'koneksi.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM users WHERE id = $delete_id";

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
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Data Reservasi</title>
</head>
<body>
    <h1>Data Reservasi</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>id pemesanan</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Waktu Pemesanan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Jumlah Orang</th>
            <th>Cabang</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor
        while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $no++; ?></td> <!-- Kolom No. -->
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['waktuPemesanan']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['waktu']; ?></td>
            <td><?php echo $row['jumlah_orang']; ?></td>
            <td><?php echo $row['cabang']; ?></td>
            <td>
                <a href="reservasi.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
