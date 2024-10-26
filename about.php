<?php
include("./adminFiles/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GD Gold and Diamonds</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/navBar.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/testimonials.css" />
  <link rel="stylesheet" href="./adminFiles/style.css">
  <link rel="stylesheet" href="./css//responsive/phone.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
body {
  background: black !important;
  color: white;
}

.hero-section {
  color: white;
  text-align: center;
  padding: 60px 20px;
  color: black;
}

.section-title {
  margin: 50px 0 30px;
  font-size: 2.5rem;
  text-align: center;
  font-weight: bold;
}

.icon {
  font-size: 2rem;
  color: #ffc107;
}

.col-md-6 {
  text-align: justify !important;
}

.card-body {
  text-align: justify;
}

@media (max-width: 767px) {
  .hero-section {
    padding: 20px 10px;
  }

  .section-title {
    font-size: 1.5rem;
  }

  .icon {
    font-size: 1.2rem;
  }

  .col-md-6 {
    text-align: justify !important;
  }

  .card-body {
    text-align: justify;
    font-size: 0.9rem; /* Adjust text size */
  }
}

  </style>
</head>

<body class="content">
  <div class="loading">
    <div class="loadingAnimation">

      <div class="circle"></div>
      <div class="circle"></div>
      <img height="160" style="margin-top: -35px;" src="./images/gdlogo.png" alt="">

    </div>
  </div>

  <!-- --------------- ----nav bar start ------------------ -->
  <header id="header">
    <img src="./images/gdlogo.png" href="#" class="logo" />
    <div class="menu">
      <a href="./">HOME</a>
      <a class="active">ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a href="./plans.php">PLANS</a>
      <a href="https://goldendream.in/login">Login</a>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->
  <div style="height:90px;width:100vw;background:#000;"></div>
  <!-- ------------------------Collections Start-------------------------------- -->


  <div class="text-center mb-4 ">
    <h2 data-aos-delay="100" data-aos="fade-up" class="">- About us -</h2>
    <div data-aos-delay="100" data-aos="fade-up" style="margin-top:10px;" class="UnderLine text-center">
      <p></p>
    </div>
  </div>
<div class="contents">
  
<!-- Hero Section -->
<div class="hero-section bg-golden">
  <h1>Welcome to Progeedee Ventures Pvt Ltd.</h1>
  <p>Your one-stop destination for quality products and services</p>
</div>

<!-- About Us Section -->
<section class="container my-5">
  <div class="row justify-content-center">
    <!-- About Us Section -->
    <div class="col-md-6 text-center mb-4">
      <h2 class="section-title">About Us</h2>
      <p class=" ">At Progeedee Ventures Pvt Ltd., we are committed to excellence and meeting the diverse needs of our valued customers. From gold and diamonds to bakery products, construction services, and EduTech solutions, we offer it all.</p>
    </div>

    <!-- Our Mission Section -->
    <div class="col-md-6 text-center mb-4">
      <h2 class="section-title">Our Mission</h2>
      <p class=" ">At Progeedee Ventures Pvt Ltd., we believe in building lasting relationships by providing exceptional quality, value, and service. Our mission is to be your trusted partner, offering products and services that enrich your everyday experiences.</p>
    </div>
  </div>
</section>


<!-- Services Section -->
<section class="container my-5">
  <div class="row g-4">
    
    <!-- Gold and Diamonds -->
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 text-center shadow-sm">
        <div class="card-body">
          <i class="icon bi bi-gem"></i>
          <h3 class="card-title mt-3">Gold and Diamonds</h3>
          <p class="card-text ">Experience the brilliance of our gold and diamond collection. Our exquisite jewelry pieces are designed to celebrate your special moments with elegance and style.</p>
        </div>
      </div>
    </div>

    <!-- Bakery Products -->
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 text-center shadow-sm">
        <div class="card-body">
          <i class="icon bi bi-basket-fill"></i>
          <h3 class="card-title mt-3">Bakery Products</h3>
          <p class="card-text ">Indulge in freshly baked goods from our bakery. From pastries to artisanal bread, we use the finest ingredients to satisfy your cravings.</p>
        </div>
      </div>
    </div>

    <!-- Construction Services -->
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 text-center shadow-sm">
        <div class="card-body">
          <i class="icon bi bi-building"></i>
          <h3 class="card-title mt-3">Construction Services</h3>
          <p class="card-text ">Building your dreams, one project at a time. Our construction services focus on quality and reliability, bringing your visions to life.</p>
        </div>
      </div>
    </div>

    <!-- Edu Tech Solutions -->
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 text-center shadow-sm">
        <div class="card-body">
          <i class="icon bi bi-laptop"></i>
          <h3 class="card-title mt-3">EduTech Solutions</h3>
          <p class="card-text ">Empowering education with technology. Our innovative Edu Tech solutions enhance learning experiences for educators and students alike.</p>
        </div>
      </div>
    </div>
    
  </div>
</section>


</div>
  <footer class="site-footer">
    <div class="footer-content">


      <div style="width: 150% !important" class="footer-info second-column">
        <!-- <p class="footer-business-name">Copyrights &copy; GD Golds and Diamonds</p> -->
        <div class="row">
          <div class="col-3">
            <img height="100" src="./images/gdlogo.png" alt="" />
          </div>
          <div class="col-8" style="text-align: left;">
            <p class="footer-business-address "><strong>Locations:</strong> #2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p class="footer-business-phone"><strong>Phone: </strong>+91 73497 39580</p>
          </div>
        </div>
      </div>
      <div style="width: 100% !important; text-align:center;" class="footer-info second-column">
      <p class="footer-business-name pcFooterCopyright">Copyrights &copy; GD Golds and Diamonds</p>
      <a href="https://intelexsolutions.in" class="logo-column">
          <img style="height:85px;" src="./images/footerCreditsIS.png" alt="" />
        </a>
      </div>
      <nav class="footer-nav third-column ">
        <ul>
          <li><a href="./">Home</a></li>
          |&nbsp;&nbsp;
          <li><a href="./privacy-policy/"> About us</a></li>
          |&nbsp;&nbsp;
          <li><a href="./contact">Collections</a></li>
          |&nbsp;&nbsp;
          <li><a href="./privacy-policy/">Plans</a></li>
        </ul>
        <div style="width: 100%;text-align: center;">

          <div class="mt-2 socialBtns" title="Social Accounts" onclick="window.location.href='./socials.php'">
            <span class="social-icon"><i class="fa fa-whatsapp"></i> </span>
            <span class="social-icon"><i class="fa fa-instagram"></i> </span>
            <span class="social-icon"><i class="fa fa-twitter"></i> </span>
          </div>
        </div>
      </nav>
    </div>
  </footer>
  <div class="phoneFooterCopyright">
    <p class="">Copyrights &copy; GD Golds and Diamonds</p>

  </div>

  <script src="./js/main.js"></script>
  <script src="./js/navBar.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    // Manually initialize the carousel with auto-slide and set interval of 5000ms
    var myCarousel = document.querySelector("#carouselExample");
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 5000, // 5 seconds
      ride: "carousel", // Auto-start the carousel
    });
  </script>

  <!-- aos animation script  -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>