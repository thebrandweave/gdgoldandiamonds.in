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
  </style>
</head>

<body class="content">
  <div class="loading">
    <div class="loadingAnimation">

      <div class="circle"></div>
      <div class="circle"></div>
      <img height="160" style="margin-top: -35px;" src="./images/liyaslogo.png" alt="">

    </div>
  </div>

  <!-- --------------- ----nav bar start ------------------ -->
  <header id="header">
    <img src="./images/liyaslogo.png" href="#" class="logo" />
    <div class="menu">
      <a href="./">HOME</a>
      <a href="./about.php" >ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a  href="./plans.php">PLANS</a>
      <a class="https://goldendream.in/login">Login</a>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->
  <div style="height:90px;width:100vw;background:#fff;"></div>
  <!-- ------------------------Collections Start-------------------------------- -->




  <!-- ------------------------contact Start-------------------------------- -->
  <div class="text-center mb-4 ">
    <h2 data-aos-delay="100" data-aos="fade-up" class="">- Contact us -</h2>
    <div data-aos-delay="100" data-aos="fade-up" style="margin-top:10px;" class="UnderLine text-center">
      <p></p>
    </div>
  </div>
  <div class="container5" style="margin-top: -100px;">

    <div data-aos-delay="100" data-aos="fade-up" class="cont5top">
      <h4>Need Help?</h4>
      <p>+91 8867575821 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+91 8867575821</p>
    </div>
    <!-- <div style="background: white; width: 100%; height: 20px"></div> -->
    <div data-aos-delay="100" data-aos="fade-up" class="container my-5">
      <div class="row">
        <!-- Info Section -->
        <div class="col-lg-6">
          <div class="info-section contactSectionHeight">
            <h2 class="mb-4 golden_Text">Let's get in touch</h2>
            <p class="text-justify">Whether you have a question, need support, or just want to collaborate, we're here to help. Feel free to reach out to us through the contact details provided or by filling out the form. We look forward to hearing from you!</p>
            <p>#2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p>lorem@ipsum.com</p>
            <p>123-456-789</p>
            <h5>Connect with us:</h5>
            <div class="mt-2 socialBtns" title="Social Accounts">
              <span class="social-icon"><i class="fa fa-whatsapp"></i> </span>
              <span class="social-icon"><i class="fa fa-instagram"></i> </span>
              <span class="social-icon"><i class="fa fa-twitter"></i> </span>
            </div>
          </div>
        </div>

        <!-- Contact Form Section -->
        <div class="col-lg-6">
          <div class="contact-section contactSectionHeight">
            <h2 class="text-white mb-4">Contact us</h2>
            <form method="POST" action="./sendMail.php">
              <div class="mb-3">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required />
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required />
              </div>
              <div class="mb-3">
                <input type="tel" class="form-control" name="phone" placeholder="Phone" required />
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="message" rows="4" placeholder="Message" style="resize: none" required></textarea>
              </div>
              <button type="submit" class="btn w-100 contactBtn">Send Message</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="site-footer">
    <div class="footer-content">
      <div style="width: 150% !important" class="footer-info second-column">
        <div class="footer-row">
          <img class="footerLogo" src="./images/liyaslogo1.png" alt="Liyas Logo" />
          <div class="footer-info">
            <p class="footer-business-address"><strong>Locations:</strong> #2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p class="footer-business-phone"><strong>Phone: </strong>+91 73497 39580</p>
          </div>
        </div>
      </div>
      <div style="width: 100% !important" class="footer-info second-column">
        <p class="footer-business-name pcFooterCopyright">Copyrights &copy; Liyas gold & diamonds</p>
        <a href="https://intelexsolutions.in" class="logo-column">
          <img height="85" src="./images/footerCreditsIS.png" alt="" />
        </a>
      </div>
      <nav class="footer-nav third-column">
        <ul>
          <li><a href="./">Home</a></li>
          |&nbsp;&nbsp;
          <li><a href="./about.php">About us</a></li>
          |&nbsp;&nbsp;
          <li><a href="./collections.php">Collections</a></li>
          |&nbsp;&nbsp;
          <li><a href="./plans.php">Plans</a></li>
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
    <p class="">Copyrights &copy; Liyas gold & diamonds</p>
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