<?php
    include("./adminFiles/config.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
  .container4{
    height:auto;
    min-height:100vh;
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
      <img src="./images/liyaslogo1.png" href="#" class="logo" />
      <div class="menu">
        <a href="./"  >HOME</a>
        <a href="./about.php" onclick="closeMenu()">ABOUT</a>
        <a class="active" >COLLECTIONS</a>
        <a href="./plans.php" onclick="closeMenu()">PLANS</a>
        <a href="https://goldendream.in/login" onclick="closeMenu()">Login</a>
        <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
      </div>
      <div class="menu-shadow" onclick="closeMenu()"></div>
      <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
    </header>
    <!-- --------------- ----nav bar end ------------------ -->
<div style="height:60px;width:100vw"></div>
    <!-- ------------------------Collections Start-------------------------------- -->
    <?php



    $col_sql = "SELECT collection_id, collection_name, collection_image_url FROM collections ORDER BY sort_order ASC";
    $col_result = $conn->query($col_sql);
?>

<!-- ------------------------Collections Start-------------------------------- -->
<div class="container4 text-center">
    <h2  data-aos-delay="100"  data-aos="fade-up">-  our Collections -</h2>
    <div  data-aos-delay="100"  data-aos="fade-up" class="UnderLine text-center ourCollectionsUnderline ourCollectionsUnderlinePhone"><p></p></div>
    <?php
if ($col_result === FALSE) {
    echo "<p>Error fetching data: " . $conn->error . "</p>";
} elseif ($col_result->num_rows > 0) {
    $count = 0; // to keep track of items per row
    while ($row = $col_result->fetch_assoc()) {
        // if ($count >= 6) {
        //     break; // stop displaying items after 6
        // }

        if ($count % 3 == 0) { // start a new row every 3 items
            if ($count > 0) {
                echo "</div><br>"; // close previous row and add space between rows
            }
            echo '<div class="row" style="justify-content: space-around">';
        }
        ?>
        <a href="./collectionItems.php?col_id=<?php echo $row['collection_id']; ?>"   data-aos-delay="100"  data-aos="fade-up" class="col-md-3 Coll_Container btn">
            <img src="./adminFiles/CollectionItems/<?php echo htmlspecialchars($row['collection_image_url']); ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
            <p><?php echo htmlspecialchars($row['collection_name']); ?></p>
        </a>
        <?php
        $count++;
    }
    // Close the last row div if there are any remaining items
    if ($count % 3 != 0) {
        echo "</div>";
    }
} else {
    echo "<p>No collections found.</p>";
}
?>


</div>

<!-- ------------------------All Collection Items Start-------------------------------- -->
<div class="container4 text-center mt-5">
  <h2 data-aos-delay="100" data-aos="fade-up">- All Collection Items -</h2>
  <div data-aos-delay="100" data-aos="fade-up" class="UnderLine text-center ourCollectionsUnderline ourCollectionsUnderlinePhone"><p></p></div>
  <?php
  $items_sql = "SELECT ci.*, c.collection_name FROM collection_items ci JOIN collections c ON ci.collection_id = c.collection_id ORDER BY ci.sort_order ASC";
  $items_result = $conn->query($items_sql);
  if ($items_result === FALSE) {
      echo "<p>Error fetching items: " . $conn->error . "</p>";
  } elseif ($items_result->num_rows > 0) {
      echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">';
      while ($item = $items_result->fetch_assoc()) {
  ?>
        <div class="col d-flex">
          <div class="CI_Card card h-100 shadow-sm">
            <div class="card-img-top bg-light" style="height: 200px; display: flex; align-items: center; justify-content: center; position: relative;">
              <img src="./adminFiles/CollectionItems/<?php echo htmlspecialchars($item['item_image_url']); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>" class="img-fluid imageHeight_CI" style="max-height: 100%;">
            </div>
            <div class="card-body text-left" style="padding: 10px;">
              <h6 class="card-title mb-2" style="font-weight: 600; font-size: 1rem;">
                <?php echo htmlspecialchars($item['item_name']); ?>
              </h6>
              <div class="row" style="justify-content:center !important; display: flex; align-items: center;">
                <p class="price text-secondary mb-2 col-md" style="font-size: 0.9rem; font-weight: bold; margin-right: 10px;">
                  <del>₹<?php echo $item['original_price']; ?></del> &nbsp;
                  <span class="text-dark">₹<?php echo $item['selling_price']; ?></span>
                </p>
              </div>
              <div class="text-muted" style="font-size: 0.8rem;">Collection: <?php echo htmlspecialchars($item['collection_name']); ?></div>
            </div>
          </div>
        </div>
  <?php
      }
      echo '</div>';
  } else {
      echo "<p>No collection items found.</p>";
  }
  $conn->close();
  ?>
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

