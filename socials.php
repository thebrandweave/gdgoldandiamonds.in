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
  <link rel="stylesheet" href="./adminFiles/style.css">k

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
      <a href="./about.php">ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a class="active">PLANS</a>
      <a href="https://goldendream.in/login" >Login</a>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->
  <div style="height:80px;width:100vw;background:#000;"></div>
  <!-- ------------------------Collections Start-------------------------------- -->

<style>
  .link-tree-container{
    min-height: 50vh;
  }
  body{
    background: black;
  }
  .bg-golden{
    width: 200px;
    text-align: left;
  }
</style>

  <div class="link-tree-container text-center">
    <h4>Follow Us</h4>
    <div class="link-tree-list">
        <?php
        // Database connection

        // Fetch social media links sorted by sort_order
        $sql = "SELECT platform_name, link_url FROM social_media_links ORDER BY sort_order";
        $result = $conn->query($sql);

        // Define icons for each platform
        $icons = [
            'facebook' => 'fab fa-facebook',
            'instagram' => 'fab fa-instagram',
            'youtube' => 'fab fa-youtube',
            'whatsapp' => 'fab fa-whatsapp'
        ];

        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                $platform = strtolower($row["platform_name"]);
                $iconClass = isset($icons[$platform]) ? $icons[$platform] : 'fas fa-link'; // default icon
                echo '<div class="link-tree-item ">';
                echo '<a href="' . $row["link_url"] . '" target="_blank" class="btn bg-golden btn-block">';
                echo '<i class="' . $iconClass . '"></i> &nbsp; &nbsp;&nbsp;&nbsp;' . ucfirst($platform);
                echo '</a>';
                echo '</div>';
                
            }
        } else {
            echo "<p>No social media links found.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>



  <!-- footer start  -->
  <footer class="site-footer">
    <div class="footer-content">


      <div style="width: 150% !important" class="footer-info second-column">
        <!-- <p class="footer-business-name">Copyrights &copy; GD Golds and Diamonds</p> -->
        <div class="row">
          <div class="col-3">
            <img height="100" src="./images/liyaslogo.png" alt="" />
          </div>
          <div class="col-8" style="text-align: left;">
            <p class="footer-business-address "><strong>Locations:</strong> #2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p class="footer-business-phone"><strong>Phone: </strong>+91 73497 39580</p>
          </div>
        </div>
      </div>
      <div style="width: 100% !important; text-align:center;" class="footer-info second-column">
      <p class="footer-business-name pcFooterCopyright">Copyrights &copy; Liyas gold & diamonds</p>
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

          <div class="mt-2 socialBtns" title="Social Accounts">
            <span class="social-icon"><i class="fab fa-facebook"></i> </span>
            <span class="social-icon"><i class="fab fa-instagram"></i> </span>
            <span class="social-icon"><i class="fab fa-twitter"></i> </span>
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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