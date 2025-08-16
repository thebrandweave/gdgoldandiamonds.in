<?php
include("./adminFiles/config.php");
?>

<!DOCTYPE html>
<html id="documenContainer" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--   seo optimization -->
  <meta name="description" content="Learn about Progeedee Ventures Pvt Ltd. - Your trusted partner for gold & diamonds, bakery products, construction services, and EduTech solutions in Mudipu, Mangalore.">

  <title>About Us - GD Gold and Diamonds</title>
  <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/navBar.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/testimonials.css" />
  <link rel="stylesheet" href="./css/responsive/phone.css">
  <link rel="stylesheet" href="./css/popup.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    body {
      background-color: rgb(255, 255, 255) !important;
      color: #333;
    }

    .hero-section {
      text-align: center;
      padding: 60px 20px;
      background-image: linear-gradient(45deg, #f6e27a 0, #cb9b51 22%, #f6e27a 45%, #f6e27a 50%, #f6e27a 55%, #cb9b51 78%, #f6e27a 100%);
      color: brown;
      border-radius: 15px;
      margin: 20px 0;
    }

    .section-title {
      margin: 50px 0 30px;
      font-size: 2.5rem;
      text-align: center;
      font-weight: bold;
      background-image: linear-gradient(to right, #f6e27a 0, #cb9b51 22%, #f6e27a 45%, #f6f2c0 50%, #f6e27a 55%, #cb9b51 78%, #d3b107 100%);
      color: transparent;
      -webkit-background-clip: text;
      background-clip: text;
    }

    .icon {
      font-size: 2rem;
      color: #cb9b51;
    }

    .col-md-6 {
      text-align: justify !important;
    }

    .card-body {
      text-align: justify;
    }

    .card {
      background-color: #fff;
      border: 1px solid #f6e27a;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(203, 155, 81, 0.3);
      border-color: #cb9b51;
    }

    .bg-golden {
      background-image: linear-gradient(45deg, #f6e27a 0, #cb9b51 22%, #f6e27a 45%, #f6e27a 50%, #f6e27a 55%, #cb9b51 78%, #d3b107 100%);
      color: brown;
    }

    /* Collections.php loader styles */
    .loader-bg {
      position: fixed; z-index: 9999; width: 100vw; height: 100vh;
      background: #000; display: flex; align-items: center; justify-content: center;
      transition: opacity 1s;
    }
    .loader-logo {
      width: 120px; animation: logoPop 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes logoPop {
      0% { transform: scale(0.5); opacity: 0; }
      80% { transform: scale(1.1); opacity: 1; }
      100% { transform: scale(1); }
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
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body class="content">
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- --------------- ----nav bar start ------------------ -->
  <header id="header">
    <img src="./images/liyaslogo1.png" href="#" class="logo" />
    <div class="menu">
      <a href="./">HOME</a>
      <a class="active">ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a href="./plans.php">PLANS</a>
      <span> <a href="https://goldendream.in/login" class="active">LOGIN</a>
      </span>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->

  <!-- ------------------------About Page Start-------------------------------- -->
  <div class="text-center mb-4">
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
          <p class="">At Progeedee Ventures Pvt Ltd., we are committed to excellence and meeting the diverse needs of our valued customers. From gold and diamonds to bakery products, construction services, and EduTech solutions, we offer it all.</p>
        </div>

        <!-- Our Mission Section -->
        <div class="col-md-6 text-center mb-4">
          <h2 class="section-title">Our Mission</h2>
          <p class="">At Progeedee Ventures Pvt Ltd., we believe in building lasting relationships by providing exceptional quality, value, and service. Our mission is to be your trusted partner, offering products and services that enrich your everyday experiences.</p>
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
              <h3 class="card-title mt-3">Liyas gold & diamonds</h3>
              <p class="card-text">Experience the brilliance of our gold and diamond collection. Our exquisite jewelry pieces are designed to celebrate your special moments with elegance and style.</p>
            </div>
          </div>
        </div>

        <!-- Bakery Products -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 text-center shadow-sm">
            <div class="card-body">
              <i class="icon bi bi-basket-fill"></i>
              <h3 class="card-title mt-3">Bakery Products</h3>
              <p class="card-text">Indulge in freshly baked goods from our bakery. From pastries to artisanal bread, we use the finest ingredients to satisfy your cravings.</p>
            </div>
          </div>
        </div>

        <!-- Construction Services -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 text-center shadow-sm">
            <div class="card-body">
              <i class="icon bi bi-building"></i>
              <h3 class="card-title mt-3">Construction Services</h3>
              <p class="card-text">Building your dreams, one project at a time. Our construction services focus on quality and reliability, bringing your visions to life.</p>
            </div>
          </div>
        </div>

        <!-- Edu Tech Solutions -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 text-center shadow-sm">
            <div class="card-body">
              <i class="icon bi bi-laptop"></i>
              <h3 class="card-title mt-3">EduTech Solutions</h3>
              <p class="card-text">Empowering education with technology. Our innovative Edu Tech solutions enhance learning experiences for educators and students alike.</p>
            </div>
          </div>
        </div>
        
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?php include('./footer.php'); ?>

  <script src="./js/main.js"></script>
  <script src="./js/navBar.js"></script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- aos animation script  -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Loader functionality -->
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => {
        document.getElementById('loader').style.opacity = 0;
        setTimeout(() => document.getElementById('loader').style.display = 'none', 1000);
      }, 1500);
    });
  </script>

</body>
</html>
