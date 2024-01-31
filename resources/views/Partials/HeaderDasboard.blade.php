@auth
<!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="#">Welcome Back {{ auth()->user()->name}}</a>

      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Green</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->



      <nav id="navbar" class="navbar">
        <ul>

            <li><a class="nav-link scrollto" href="/dashboardindexs#transactions">Transaction</a></li>
            <li><a class="nav-link scrollto" href="/dashboardindexs#myorder">My Order</a></li>
            <li><a class="nav-link scrollto " href="/dashboardindexs#product">Product</a></li>
            <li><a class="nav-link scrollto" href="/dashboardindexs#contact">Me</a></li>
          <li>
            <form action="/logoutuser" method="POST">
                @csrf
            <li class="nav-item getstarted scrollto">  <button type="submit" class="nav-link bi bi-box-arrow-right {{ ($active==="logout")?'active':'' }}"> Logout</button></li>
            </form>
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
@else


<!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class=""></i><a href="#"></a>

      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Green</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto active" href="index">Home</a></li>
      <li><a class="getstarted scrollto {{ ($active==="login")?'active':'' }}" href="/loginuser">Login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->

</div>
</header><!-- End Header -->

  @endauth
