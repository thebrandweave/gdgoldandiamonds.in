<?php
include("./adminFiles/config.php");
$col_id = intval($_GET['col_id']);

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
  <link rel="stylesheet" href="./css/collectionItems.css">
  <link rel="stylesheet" href="./css//responsive/phone.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./adminFiles/style.css">

  <style>
    .container2 {
      min-height: 100vh !important;
      height: auto !important;
      padding-bottom: 20px;
      background-image: url(./images/backgrounds/collectionsbg.svg) !important;


    }
  </style>
</head>

<body class="content">
  <div style="display:none;" class="loading">
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
      <a href="./about.php" onclick="closeMenu()">ABOUT</a>
      <a href="./collections.php" class="active">COLLECTIONS</a>
      <a href="./plans.php" onclick="closeMenu()">PLANS</a>
      <a href="./contact.php" onclick="closeMenu()">CONTACT</a>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->
  <div style="height:60px;width:100vw"></div>
  <!-- ------------------------main contents--------------------------------- -->
  <div class="container2">

    <!-- contents here  -->
    <?php

    // Fetch collection items from database
    $ci_sql = "SELECT item_id, item_name, item_image_url, original_price, selling_price, sort_order FROM collection_items WHERE collection_id = $col_id";
    $ci_result = $conn->query($ci_sql);
    ?>
    <br>
    <div class="container mt-5">
      <div class="text-center mb-4 ">
        <h2 data-aos-delay="100" data-aos="fade-up" class="text-light">- Collection Items -</h2>
        <div data-aos-delay="100" data-aos="fade-up" style="margin-top:10px;" class="UnderLine text-center">
          <p></p>
        </div>
      </div>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
        <?php
        if ($ci_result->num_rows > 0) {
          // Output data for each row
          while ($row = $ci_result->fetch_assoc()) {
        ?>
            <div class="col d-flex">
              <div class="CI_Card card h-100 shadow-sm">
                <!-- Image Section -->
                <div class="card-img-top bg-light" style="height: 70%; display: flex; align-items: center; justify-content: center; position: relative;">
                  <img src="./adminFiles/CollectionItems/<?php echo htmlspecialchars($row['item_image_url']); ?>" alt="Product Image" class="img-fluid imageHeight_CI" style="max-height: 100%;">
                </div>

                <!-- Body Section -->
                <div class="card-body text-left" style="height: 30%; padding: 10px;">
                  <!-- Title -->
                  <h6 class="card-title mb-2" style="font-weight: 600; font-size: 0.8rem;">
                    <?php echo htmlspecialchars($row['item_name']); ?>
                  </h6>

                  <!-- Price -->
                  <div class="row" style="justify-content:center !important; display: flex; align-items: center;">
                    <p class="price text-secondary mb-2 col-md" style="font-size: 0.7rem; font-weight: bold; margin-right: 10px;">
                      <del>₹<?php echo $row['original_price']; ?></del> &nbsp;
                      <span class="text-dark">₹<?php echo $row['selling_price']; ?></span>
                    </p>
                  </div>

                  <?php
                  // Ensure original price is greater than selling price to avoid negative discount
                  if ($row['original_price'] > $row['selling_price']) {
                    $discount_percentage = round((($row['original_price'] - $row['selling_price']) / $row['original_price']) * 100);
                  } else {
                    $discount_percentage = 0;
                  }
                  ?>

                  <!-- Add to Cart & Wishlist Buttons -->
                  <div class="d-flex justify-content-between align-items-center">
                    <!-- Discount Information -->
                    <?php if ($discount_percentage > 0) { ?>
                      <p class="text-danger mb-0" style="font-size: 0.7rem; font-weight: bold;">
                        <?php echo $discount_percentage; ?>% off
                      </p>
                    <?php } ?>

                    <!-- Buy Now Button (smaller) -->
                    <a href="https://wa.me/+916361557581?text=Hello,%20I%20would%20like%20to%20learn%20more%20about%20the%20item %20*<?php echo urlencode(htmlspecialchars($row['item_name'])); ?>*%20this Item.%0A%0A<?php echo urlencode('https://gdgoldanddiamonds.in/img.php?item_id=' . $row['item_id']); ?>" class="btn btn-success rounded-pill px-2" style="font-size: 0.7rem; padding: 5px 10px;">
                      <i class="bi bi-whatsapp"></i> &nbsp; Buy Now
                    </a>

                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p>No items found in the collection.</p>";
        }
        ?>
      </div>

    </div>

    <?php
    // Close database connection
    $conn->close();
    ?>




  </div>
  <!-- ------------------------contents end--------------------------------- -->
  <!-- <div style="height: 100px;width:100px;"></div> -->


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

          <div class="mt-2">
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