<?php
include 'koneksi.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $tanggal = $_POST['tanggal'];
  $waktu = $_POST['waktu'];
  $jumlah_orang = $_POST['jumlah_orang'];
  $cabang = $_POST['cabang'];

  // Insert data into database
  $query = "INSERT INTO users (nama, email, tanggal, waktu, jumlah_orang, cabang) VALUES ('$nama', '$email', '$tanggal', '$waktu', '$jumlah_orang', '$cabang')";
  if (mysqli_query($conn, $query)) {
      echo "Data berhasil disimpan!";
  } else {
      echo "Error: " . mysqli_error($conn);
  }
  
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Penyet Ju-Pe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'?>

    <div class="container-fluid p-0 position-relative">
        <div class="row">
            <div class="col-12">
                <img src="img/banner2.png" class="img-fluid w-100" alt="Banner Ayam Penyet Ju-Pe">
                <!-- Text on top of image -->
                <div class="text-overlay">
                    <h1>Ayam Penyet Ju-Pe</h1>
                    <p>Jujur Pedasnya, Jujur Puasnya!</p>
                    <a href="?page=reservasi" class="btn btn-primary btn-lg">Reservasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>


    <main class="container my-5">
        <section class="hero text-center mb-5">
            <h2>Selamat Datang di Ayam Penyet Ju-Pe</h2>
            <p class="lead">Restoran modern dengan menu spesial Ayam Penyet yang menggugah selera.</p>
        </section>

        <section class="container mt-5">
        <div class="horizontal-scroll">
            <ul>
                <!-- Menu Items -->
                <li>
                <p>Ayam Penyet Ju-Pe</p>
                <img src="img/menu/menu1.png" alt="Menu 1">
                </li>
                <li>
                <p>Cumi Cabe ijo</p>
                <img src="img/menu/menu2.png" alt="Menu 2">
                </li>
                <li>
                <p>Ayam Bakar Ju-Pe</p>
                <img src="img/menu/menu3.png" alt="Menu 3">
                </li>
                <li>
                <p>Bebek Penyet Ju-Pe</p>
                <img src="img/menu/menu4.png" alt="Menu 4">
                </li>
                <li>
                <p>Bebek Bakar Ju-Pe</p>
                <img src="img/menu/menu5.png" alt="Menu 5">
                </li>
                <li>
                <p>Aneka Soto</p>
                <img src="img/menu/menu6.png" alt="Menu 6">
                </li>
                <li>
                <p>Mie Goreng</p>
                <img src="img/menu/menu7.png" alt="Menu 7">
                </li>
                <li>
                <p>Nasi Goreng Ju-Pe</p>
                <img src="img/menu/menu8.png" alt="Menu 8">
                </li>
                <li>
                <p>Ikan Gurame</p>
                <img src="img/menu/menu9.png" alt="Menu 9">
                </li>
                <li>
                <p>Ikan Nila</p>
                <img src="img/menu/menu10.png" alt="Menu 10">
                </li>
                <li>
                <p>Aneka Sambel</p>
                <img src="img/menu/menu11.png" alt="Menu 11">
                </li>
                <li>
                <p>Ayam Kampung Goreng</p>
                <img src="img/menu/menu12.png" alt="Menu 12">
                </li>
                <li>
                <p>Ayam Kampung Bakar</p>
                <img src="img/menu/menu13.png" alt="Menu 13">
                </li>
                <li>
                <p>Ayam Kampung Bakar 1 Ekor</p>
                <img src="img/menu/menu14.png" alt="Menu 14">
                </li>
                <li>
                <p>Paket Sayur Asem Ikan Asin</p>
                <img src="img/menu/menu15.png" alt="Menu 15">
                </li>
                <li>
                <p>Paket Sayur Asem Cumi Asin</p>
                <img src="img/menu/menu16.png" alt="Menu 16">
                </li>
                <li>
                <p>Aneka Snack/Kerupuk</p>
                <img src="img/menu/menu17.png" alt="Menu 17">
                </li>
                <li>
                <p>Z'Gerr Mangga</p>
                <img src="img/menu/menu18.png" alt="Menu 18">
                </li>
                <li>
                <p>Z'Gerr Chocolate</p>
                <img src="img/menu/menu19.png" alt="Menu 19">
                </li>
            </ul>
            </div>
        </section>

        <section class="features mb-5">
            <h2 class="text-center">Fasilitas Kami</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h3>Ruang Makan Nyaman</h3>
                    <p>Ruang makan yang nyaman untuk keluarga dan teman.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Pemesanan Online</h3>
                    <p>Pemesanan dapat dilakukan melalui website dan aplikasi kami.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Menu Variatif</h3>
                    <p>Menawarkan berbagai pilihan menu yang lezat.</p>
                </div>
            </div>
        </section>

        <section class="container my-5">
    <h2 class="text-center mb-4">Cabang Restoran Ayam Penyet Ju-Pe</h2>
    <div class="row justify-content-center">
      <!-- Cabang 1 -->
      <div class="col-md-4">
        <div class="card">
          <img src="img/cabang1.png" class="card-img-top" alt="Cabang 1">
          <div class="card-body">
            <h5 class="card-title">Restoran Utama</h5>
            <p class="card-text">Jl. Cendrawasih Raya RT 04/ RW 03 No.54 Sawah Baru, Ciputat-Bintaro (Samping Kampus UPJ-Bintaro)</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg> 0878 8992 0457</p> 
          </div>
        </div>
      </div>
      <!-- Cabang 2 -->
      <div class="col-md-4">
        <div class="card">
          <img src="img/cabang2.png" class="card-img-top" alt="Cabang 2">
          <div class="card-body">
            <h5 class="card-title">Cabang Graha</h5>
            <p class="card-text">Taman Jajan Graha Raya Jl. Amd Pondok Kacang Barat, Pondok Aren</p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg> 0814 0168 9878</p> 
          </div>
        </div>
      </div>
    </div>
  </section>

        <section class="testimonial text-center mb-5">
            <h2>Apa Kata Pengunjung</h2>
            <blockquote class="blockquote">
                <p class="mb-0">"Ayam penyetnya enak sekali! Tempat yang nyaman untuk berkumpul."</p>
                <footer class="blockquote-footer">Pengunjung</footer>
            </blockquote>
        </section>
    </main>

    <section class="container my-5 p-3 bg-warning col-md-6" style="border-radius: 50px;">
    <h2 class="text-center mb-4 ">Reservasi Online Ayam Penyet Ju-Pe</h2>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <form action="" method="POST">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal Reservasi</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
          </div>
          <div class="form-group">
            <label for="waktu">Waktu Reservasi</label>
            <input type="time" class="form-control" id="waktu" name="waktu" min="08:00" max="19:30" required>
            <small class="form-text text-muted">Reservasi dibuka dari 08:00 hingga 19:30.</small>
          </div>
          <div class="form-group">
            <label for="jumlah_orang">Jumlah Orang</label>
            <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" min="1" placeholder="Masukkan jumlah orang" required>
          </div>
          <div class="form-group">
            <label for="cabang">Pilih Cabang Restoran</label>
            <select class="form-control" id="cabang" name="cabang" required>
              <option value="" disabled selected>Pilih cabang</option>
              <option value="cabang1">Cabang 1 - Sawah Baru</option>
              <option value="cabang2">Cabang 2 - Graha Raya</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Kirim Reservasi</button>
        </form>
      </div>
    </div>
  </section>

    <?php include 'footer.php'?>    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
