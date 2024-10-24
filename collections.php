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
        <img height="160" style="margin-top: -35px;" src="./images/gdlogo.png" alt="">
    
      </div>
    </div>
    
    <!-- --------------- ----nav bar start ------------------ -->
    <header id="header">
      <img src="./images/gdlogo.png" href="#" class="logo" />
      <div class="menu">
        <a href="./"  >HOME</a>
        <a href="./about.php" onclick="closeMenu()">ABOUT</a>
        <a class="active" >COLLECTIONS</a>
        <a href="./plans.php" onclick="closeMenu()">PLANS</a>
        <a href="./contact.php" onclick="closeMenu()">CONTACT</a>
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
    <div  data-aos-delay="100"  data-aos="fade-up" class="UnderLine text-center"><p></p></div>
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

<?php
    $conn->close();
?>


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
          <a href="https://intelexsolutions.site" class="logo-column">
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

