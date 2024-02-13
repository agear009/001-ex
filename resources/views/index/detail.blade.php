<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">

      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://www.instagram.com/giganfive_crops_universal?igsh=ZGUzMzM3NWJiOQ%3D%3D" target="blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://api.whatsapp.com/send?phone=62811204409" class="linkedin" target="blank"><i class="bi bi-whatsapp"></i></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/index">GIGANFIVE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">

        <ul>
    @auth
          {{--  <li><a class="nav-link scrollto" href="/dashboardindexs#transactions">Transaction</a></li>
          <li><a class="nav-link scrollto" href="/dashboardindexs#myorder">My Order</a></li>  --}}
          <li><a class="nav-link scrollto " href="/dashboardindexs#product">Product</a></li>
          <li><a class="nav-link scrollto" href="/dashboardindexs#contact">Me</a></li>
          <li>
            <form action="/logoutuser" method="POST">
                @csrf
            <li class="nav-item getstarted scrollto">  <button type="submit" class="nav-link bi bi-box-arrow-right {{ ($active==="logout")?'active':'' }}"> Logout</button></li>
            </form>
        </li>
         @else
        <li><a class="nav-link scrollto active" href="/index#index">Home</a></li>
        <li><a class="nav-link scrollto" href="/index#about">About</a></li>
        <li><a class="nav-link scrollto" href="/index#Post">Services</a></li>
        <li><a class="nav-link scrollto " href="/index#Product">Product</a></li>
        {{--  <li><a class="nav-link scrollto" href="/index#contact">Register</a></li>  --}}
        {{--  <li><a class="getstarted scrollto" href="/loginuser">Login</a></li>  --}}



    @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

                    <!-- ======= Breadcrumbs ======= -->
                    <section id="breadcrumbs" class="breadcrumbs">
                    <div class="container">

                        <div class="d-flex justify-content-between align-items-center">
                        <h2>{{ $product->name }} Details</h2>
                        <ol>
                            <li><a href="index">Home</a></li>
                            <li>{{ $product->name }} Details</li>
                        </ol>
                        </div>

                    </div>
                    </section><!-- End Breadcrumbs -->



                    <!-- ======= Portfolio Details Section ======= -->
                    <section id="portfolio-details" class="portfolio-details">
                    <div class="container">

                        <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="">
                                </div>

                                @forelse($product as $product)
                                <div class="swiper-slide">
                                <img src="{{ asset('storage/products/'.$image->image) }}" alt="">
                                </div>
                                @empty
                                //jika tidak ada gambar maka menampilkan gambar yang ada di table peroduk                                <div class="alert alert-danger">
                                 <img src="{{ asset('storage/products/'.$product->image) }}" alt="">
                                </div>
                                @endforelse

                            </div>
                            <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="portfolio-info">
                            <h3>{{ $product->name }} information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $product->category }}</li>
                                <li><strong>Price</strong>: {{ $product->price }}</li>
                                <li><strong>Stock</strong>: {{ $product->stock }}</li>
                                <li><strong>Update</strong>:{{ $product->created_at }}</li>
                            </ul>
                            </div>
                            <div class="portfolio-description">
                            <h2>{{ $product->name }} detail</h2>
                            <p>
                                {{ $product->description}}
                            </p>
                            </div>
                        </div>

                        </div>

                    </div>
                    </section><!-- End Portfolio Details Section -->

                </main>
                <!-- End #main -->

                <!-- ======= Footer ======= -->
                <footer id="footer">
                    <div class="container">
                      <h3>GIGANFIVE</h3>
                      <p>PT Gigan Five Corps Universal is an export company that provides agricultural products, products and mines originating from Indonesia..</p>
                      <div class="social-links">
                        {{--  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>  --}}
                        <a href="https://www.instagram.com/giganfive_crops_universal?igsh=ZGUzMzM3NWJiOQ%3D%3D" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=62811204409" class="" target="blank"><i class="bi bi-whatsapp"></i></i></i></a>
                      </div>

                      <div class="credits">

                      </div>
                    </div>
                  </footer><!-- End Footer -->
                  <a href="https://api.whatsapp.com/send?phone=62811204409" class="back-to-top d-flex align-items-center justify-content-center" target="blank"><i class="bi bi-whatsapp"></i></i></a>
                  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

                  <!-- Vendor JS Files -->
                  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
                  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
                  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                  <script src="assets/vendor/php-email-form/validate.js"></script>

                  <!-- Template Main JS File -->
                  <script src="assets/js/main.js"></script>

</body>

</html>
