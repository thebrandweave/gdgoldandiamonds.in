<?php
include("./adminFiles/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Liyas gold & diamonds</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/navBar.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/testimonials.css" />
  <link rel="stylesheet" href="./css//responsive/phone.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    .container4 {
      height: auto;
      min-height: 100vh;
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
      <a href="./about.php">ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a class="active">PLANS</a>
      <a href="https://goldendream.in/landing" >Login</a>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->
  <div style="height:80px;width:100vw;background:#000;"></div>
  <!-- ------------------------Collections Start-------------------------------- -->


  <div class="container4 d-flex justify-content-center">
    <div class="col-12 col-md-6 mb-3">
      <h5 class="text-light">Mega Gold Savings Plan</h5> <br>

      <iframe src="https://drive.google.com/file/d/12hA0S1-X15IKP1k6eCHI6zKHjSEoruki/preview" width="100%" height="600" frameborder="0"></iframe>
      
      <iframe src="https://drive.google.com/file/d/1V_Nas4bwU1f7Ih9VTlpxbg2No_1SO9R-/preview" width="100%" height="600" frameborder="0" style="margin-top: 20px;"></iframe>
      <div class="row justify-content-center bg-dark">
        <div class="row col-md-8 justify-content-between"> <a href="./files/gb.pdf" class="btn col-md bg-golden "> <strong>Download brochure </strong> &nbsp; <i class="fa fa-download"></i>
        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn col-md btn-light">Register Now &nbsp; <i class="fa fa-external-link"></i>
          </a>
        </div>

      </div>
    </div>

  </div>

  <?php include('./footer.php'); ?>

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