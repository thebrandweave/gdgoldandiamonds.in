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
  body {
    background: linear-gradient(-45deg, #ffd700, #fff, #bfa14a, #000);
    background-size: 400% 400%;
    animation: gradientBG 12s ease infinite;
  }
  @keyframes gradientBG {
    0% {background-position:0% 50%;}
    50% {background-position:100% 50%;}
    100% {background-position:0% 50%;}
  }
  .card {
    transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }
  .card:hover {
    transform: translateY(-10px) scale(1.04);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
    z-index: 2;
  }
  .collection-card {
    border-radius: 18px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s, border 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border: 2px solid transparent;
    background: rgba(255,255,255,0.03);
  }
  .collection-card:hover {
    transform: translateY(-12px) scale(1.04);
    box-shadow: 0 8px 32px 0 rgba(218,165,32,0.18), 0 2px 8px rgba(0,0,0,0.12);
    border: 2px solid #ffd700;
    z-index: 2;
  }
  .card-img-top-wrapper {
    background: #222;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 220px;
  }
  .card-img-top {
    max-height: 200px;
    width: auto;
    object-fit: contain;
    transition: filter 0.3s;
  }
  .collection-card:hover .card-img-top {
    filter: brightness(1.1) drop-shadow(0 0 8px #ffd70088);
  }
  .card-title {
    font-weight: 600;
    color: #ffd700;
    font-size: 1.2rem;
    margin: 0;
    letter-spacing: 0.5px;
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
    
    // Debug information
    if ($col_result === FALSE) {
        echo "<p>Error fetching data: " . $conn->error . "</p>";
    } else {
        echo "<p>Number of collections found: " . $col_result->num_rows . "</p>";
    }
?>

<!-- ------------------------Collections Start-------------------------------- -->
<div class="container4 text-center">
    <h2 data-aos-delay="100" data-aos="fade-up">-  our Collections -</h2>
    <div data-aos-delay="100" data-aos="fade-up" class="UnderLine text-center ourCollectionsUnderline ourCollectionsUnderlinePhone"><p></p></div>
    <div class="row justify-content-center">
    <?php
    if ($col_result === FALSE) {
        echo "<p>Error fetching data: " . $conn->error . "</p>";
    } elseif ($col_result->num_rows > 0) {
        $count = 0;
        while ($row = $col_result->fetch_assoc()) {
    ?>
        <div class="col-md-4 mb-4">
          <div class="card collection-card" data-aos="fade-up" data-aos-delay="<?php echo $count * 100; ?>">
            <div class="card-img-top-wrapper">
              <img src="<?php 
                $fallback_images = [
                  'Wedding Collection' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80',
                  'Diamond Jewelry' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80',
                  'Gold Bangles' => 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=800&q=80',
                  'Pearl Sets' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=800&q=80',
                  'Antique Collection' => 'https://images.unsplash.com/photo-1506224771801-833c19b47b66?auto=format&fit=crop&w=800&q=80'
                ];
                $img_url = !empty($row['collection_image_url']) ? htmlspecialchars($row['collection_image_url']) : (isset($fallback_images[$row['collection_name']]) ? $fallback_images[$row['collection_name']] : $fallback_images['Wedding Collection']);
                echo $img_url;
              ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" class="card-img-top" />
            </div>
            <div class="card-body">
              <p class="card-title"><?php echo htmlspecialchars($row['collection_name']); ?></p>
            </div>
          </div>
        </div>
    <?php
        $count++;
        }
    } else {
        // If no collections in database, show default collections
        $default_collections = [
            ['name' => 'Wedding Collection', 'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80'], // Bridal jewelry set
            ['name' => 'Diamond Jewelry', 'image' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80'], // Diamond necklace/earrings
            ['name' => 'Gold Bangles', 'image' => 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=800&q=80'], // Gold bangles
            ['name' => 'Pearl Sets', 'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=800&q=80'], // Pearl necklace
            ['name' => 'Antique Collection', 'image' => 'https://images.unsplash.com/photo-1506224771801-833c19b47b66?auto=format&fit=crop&w=800&q=80'] // Antique/vintage jewelry
        ];
        
        foreach ($default_collections as $index => $collection) {
    ?>
        <div class="col-md-4 mb-4">
          <div class="card collection-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
            <div class="card-img-top-wrapper">
              <img src="<?php echo $collection['image']; ?>" alt="<?php echo $collection['name']; ?>" class="card-img-top" />
            </div>
            <div class="card-body">
              <p class="card-title"><?php echo $collection['name']; ?></p>
            </div>
          </div>
        </div>
    <?php
        }
    }
    ?>
    </div>
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
              <?php
                $item_image_path = './images/' . htmlspecialchars($item['item_image_url']);
                $default_images = [
                  'Wedding Collection' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
                  'Diamond Jewelry' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80',
                  'Gold Bangles' => 'https://images.unsplash.com/photo-1522312346375-d1a52e2b99b3?auto=format&fit=crop&w=800&q=80',
                  'Pearl Sets' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80',
                  'Antique Collection' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=800&q=80'
                ];
                $img_url = '';
                if (!empty($item['item_image_url']) && file_exists($item_image_path)) {
                  $img_url = $item_image_path;
                } else {
                  $img_url = isset($default_images[$item['collection_name']]) ? $default_images[$item['collection_name']] : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80';
                }
              ?>
              <img src="<?php echo $img_url; ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>" class="img-fluid imageHeight_CI" style="max-height: 100%;">
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
<script>AOS.init({ duration: 900, once: true });</script>

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

