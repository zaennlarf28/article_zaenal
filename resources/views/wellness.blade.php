<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About - ZenBlog Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Aug 08 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="about-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
     @include('layouts.dashboard-user.nav')
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
  <h3 class="mb-4">Kalkulator BMI (Body Mass Index)</h3>

  <!-- Gender -->
  <!-- Gender Pilihan -->
<div class="d-flex justify-content-center mb-3">
  <div class="form-check me-4 text-center">
    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
    <label class="form-check-label" for="male">
      <img src="https://img.icons8.com/ios-filled/100/000000/user-male-circle.png" width="60" /><br>
      <span class="fw-bold">Laki-laki</span>
    </label>
  </div>
  <div class="form-check text-center">
    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
    <label class="form-check-label" for="female">
      <img src="https://img.icons8.com/ios-filled/100/000000/user-female-circle.png" width="60" /><br>
      <span class="fw-bold">Perempuan</span>
    </label>
  </div>
</div>


  <!-- Form -->
  <form id="bmiForm" class="p-3 border rounded bg-light">
    <div class="mb-3">
      <label for="usia" class="form-label">Usia</label>
      <div class="input-group">
        <input type="number" id="usia" class="form-control" required>
        <span class="input-group-text">thn</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="berat" class="form-label">Berat Badan</label>
      <div class="input-group">
        <input type="number" id="berat" class="form-control" required>
        <span class="input-group-text">kg</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="tinggi" class="form-label">Tinggi Badan</label>
      <div class="input-group">
        <input type="number" id="tinggi" class="form-control" required>
        <span class="input-group-text">cm</span>
      </div>
    </div>

    <div class="d-flex justify-content-between">
      <button type="reset" class="btn btn-outline-secondary w-50 me-2">Reset</button>
      <button type="submit" class="btn btn-success w-50">Hitung</button>
    </div>
  </form>

  <!-- Hasil -->
  <div id="hasilBmi" class="mt-4 p-4 border rounded" style="display:none; background-color:#f9f9f9;">
    <h4 class="fw-bold">Hasil BMI Anda</h4>
    <p class="fs-3 fw-bold" id="bmiValue" style="color: #2ecc71;"></p>
    <p id="kategoriBmi" class="mb-2 fw-semibold"></p>
    <div class="mb-3">
      <div class="d-flex justify-content-between small">
        <span><strong>BMI</strong></span><span><strong>Klasifikasi</strong></span>
      </div>
      <ul class="list-group list-group-flush small">
        <li class="list-group-item d-flex justify-content-between px-1"><span>< 18.5</span><span>Kurus</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>18.5 – 24.9</span><span>Normal</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>25 – 29.9</span><span>Gemuk</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>30 – 34.9</span><span>Obesitas 1</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>>= 35</span><span>Obesitas 2</span></li>
      </ul>
    </div>
    <div id="saranBmi" class="fw-semibold"></div>
  </div>
</div>
        
          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              @foreach ($diet->take(6) as $data)
                <div class="col-lg-6 col-md-6">
                  @if ($data->gambar)
                  <img src="{{ asset('storage/diet/' . $data->gambar) }}" alt="Gambar" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;">
                  @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 100%; height: 150px;">
                  Tidak ada gambar
                </div>
                @endif

          {{-- Judul dan deskripsi --}}
              <div class="mt-2">
                <h5 class="mb-1">{{ $data->judul }}</h5>
                  <p class="mb-0 text-muted" style="font-size: 14px;">
                    {{ Str::limit($data->deskripsi, 100) }}
                  </p>
                </div>
              </div>
            @endforeach
            </div>
          </div>

      </div>
    </section><!-- /About Section -->

    <!-- Team Section -->
    <!-- /Team Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <span class="sitename">ZenBlog</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">ZenBlog</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  document.getElementById("bmiForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const berat = parseFloat(document.getElementById("berat").value);
    const tinggi = parseFloat(document.getElementById("tinggi").value) / 100; // cm ke meter
    const usia = parseInt(document.getElementById("usia").value);
    const gender = document.querySelector('input[name="gender"]:checked');

    // Validasi gender (kalau belum dipilih)
    if (!gender) {
      alert("Silakan pilih jenis kelamin terlebih dahulu.");
      return;
    }

    const bmi = berat / (tinggi * tinggi);

    let kategori = '';
    let warna = '';
    let saran = '';

    if (bmi < 18.5) {
      kategori = "Kurus";
      warna = "#3498db";
      saran = "Perbaiki pola makan dan asupan nutrisi harian.";
    } else if (bmi < 25) {
      kategori = "Normal";
      warna = "#2ecc71";
      saran = "Pertahankan pola makan seimbang dan olahraga rutin.";
    } else if (bmi < 30) {
      kategori = "Gemuk";
      warna = "#f39c12";
      saran = "Kurangi kalori dan tingkatkan aktivitas fisik.";
    } else if (bmi < 35) {
      kategori = "Obesitas 1";
      warna = "#e67e22";
      saran = "Konsultasi ke ahli gizi dan lakukan olahraga teratur.";
    } else {
      kategori = "Obesitas 2";
      warna = "#e74c3c";
      saran = "Perlu penanganan medis dan diet intensif.";
    }

    document.getElementById("bmiValue").innerText = bmi.toFixed(1);
    document.getElementById("bmiValue").style.color = warna;
    document.getElementById("kategoriBmi").innerText = "Kategori: " + kategori;
    document.getElementById("saranBmi").innerHTML = "<strong>Saran:</strong> " + saran;
    document.getElementById("hasilBmi").style.display = "block";
  });
  </script>




</body>

</html>