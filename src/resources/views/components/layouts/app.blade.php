<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-SIGMA (Eletronik Samsat Digital Untuk Masyarakat)</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset ('front/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset ('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset ('front/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    @include('livewire.components.header')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Welcome To </span><span class="accent">E-SIGMA</span></h2>
            <p>Pembayaran Online: Dukungan berbagai metode pembayaran, dari mobile banking hingga e-wallet..</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://youtu.be/E-8YyvrY1Js?si=LTfAzphGiET82fL7" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset ('front/assets/img/hero.png') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            <div class="col-xl-3 col-md-6">
           
              <div class="icon-box">
                
                <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
                <h4 class="title"><a href="https://esigma.test/masyarakat/login/" class="stretched-link">Perpanjang STNK</a></h4>
              </div>
            </a>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-car-front-fill"></i> </div>
                <h4 class="title"><a href="https://esigma.test/masyarakat/login/" class="stretched-link">Kepemilikan Kendaraan</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-card-heading"></i></div>
                <h4 class="title"><a href="https://esigma.test/pendaftaran-sim" class="stretched-link">Pendaftaran SIM</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-camera-video-fill"></i></div>
                <h4 class="title"><a href="/cek-tilang" class="stretched-link">E-TILANG</a></h4>
              </div>
            </div><!--End Icon Box -->

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p>E-SIGMA adalah platform Elektronik Samsat Digital Masyarakat yang dirancang untuk memudahkan masyarakat dalam pengurusan layanan kendaraan, baik mobil maupun sepeda motor.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Layanan Digital Terpadu untuk Mobil dan Sepeda Motor</h3>
            <img src="{{ asset ('front/assets/img/about.png') }}" class="img-fluid rounded-4 mb-4" alt="">
            <p>E-SIGMA menyediakan layanan publik yang efisien, transparan dan mudah diakses. Kami berkomitmen meningkatkan kualitas pelayanan pengurusan mobil dan sepeda motor.</p>
            <p>Tim E-SIGMA terdiri dari profesional teknologi dan pelayanan publik yang berfokus pada kemudahan, keamanan, dan efisiensi sebagai solusi digital pengurusan kendaraan di Indonesia.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                E-SIGMA menyediakan akses mudah untuk layanan pajak, kepemilikan mobil dan motor, pendaftaran SIM, serta cek e-tilang dalam satu platform terintegrasi.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Perpanjangan STNK dan pembayaran pajak kendaraan bermotor secara online.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Pendaftaran SIM online dengan upload dokumen dan pemilihan jadwal ujian yang fleksibel.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Pengecekan status e-tilang dengan memasukkan nomor polisi, rangka, dan mesin kendaraan.</span></li>
              </ul>
              <p>
                yayaya
              </p>

              <div class="position-relative mt-4">
                <img src="{{ asset ('front/assets/img/about1.png') }}" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->

  </main>

  @include('livewire.components.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/php-email-form/validate.j') }}s"></script>
  <script src="{{ asset ('front/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset ('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset ('front/assets/js/main.js') }}"></script>

</body>

</html>