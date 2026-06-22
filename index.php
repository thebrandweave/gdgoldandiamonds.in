<?php
include("./adminFiles/config.php");
?>
<!DOCTYPE html>
<html id="documentContainer" lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- SEO Optimization -->
  <meta name="description" content="Liyas Gold & Diamonds in Bejai, Mangalore offers exclusive bridal and diamond jewelry collections, live gold rates, and flexible gold savings schemes. Visit us today!">
  <title>Liyas Gold and Diamonds - Timeless Elegance</title>
  
  <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./css/style.css?v=1.2" />
  <link rel="stylesheet" href="./css/navBar.css?v=1.2" />
  <link rel="stylesheet" href="./css/footer.css?v=1.2" />
  <link rel="stylesheet" href="./css/testimonials.css?v=1.2" />
  <link rel="stylesheet" href="./css/responsive/phone.css?v=1.2">
  <link rel="stylesheet" href="./css/popup.css?v=1.2">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    /* Custom modifications to align with the mockup styling */
    body {
      background-color: var(--color-cream-light);
      font-family: var(--font-sans);
    }
  </style>
</head>

<body class="content home-page">
  
  <!-- Loader Screen -->
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- Include Shared Header Component -->
  <?php include("./header.php"); ?>

  <!-- Popup Ad Logic -->
  <?php
  // Load settings
  $settingsFile = __DIR__ . '/adminFiles/Popups/popup_settings.json';
  $popup_settings = [
      'mode' => 'automated',
      'enabled' => true
  ];
  if (file_exists($settingsFile)) {
      $popup_settings = json_decode(file_get_contents($settingsFile), true) ?: $popup_settings;
  }

  if ($popup_settings['enabled']) {
      if ($popup_settings['mode'] === 'manual') {
          // Manual database-driven popup
          $pop_sql = "SELECT * FROM popups ORDER BY created_at DESC LIMIT 1";
          $pop_result = $conn->query($pop_sql);
          if ($pop_result && $pop_result->num_rows > 0) {
              $ad = $pop_result->fetch_assoc();
              ?>
              <div class="popupAd" id="offerModal">
                <div class="custom-modal" style="border: 2px solid var(--color-gold); background-color: var(--color-cream-light);">
                  <a onclick="closePopup()" class="close-btn" style="color: var(--color-magenta);">&times;</a>
                  <img src="<?php echo htmlspecialchars(str_replace('../', './adminFiles/', $ad['popup_image_url'])); ?>"
                    alt="<?php echo htmlspecialchars($ad['title']); ?>" class="promo-image" style="border: 1px solid var(--color-gold);">
                  <h5 class="text-magenta mt-3"><?php echo htmlspecialchars($ad['title']); ?></h5>
                  <a onclick="closePopup()" class="btn btn-magenta-filled w-100 mt-2">Close</a>
                </div>
              </div>
              <?php
          }
      } else {
          // Automated Gold Rate Popup
          $rates = get_live_gold_rates();
          $rate_22k = isset($rates['gold_22k']) ? number_format($rates['gold_22k']) : '13,370';
          $rate_24k = isset($rates['gold_24k']) ? number_format($rates['gold_24k']) : '14,585';
          $updated_at = isset($rates['timestamp']) ? date('d M Y, h:i A', $rates['timestamp']) : date('d M Y, h:i A');

          // Find backgrounds
          $bg_dir = __DIR__ . '/adminFiles/uploadedFiles/gold_rate_backgrounds/';
          $bg_images = [];
          if (file_exists($bg_dir) && is_dir($bg_dir)) {
              $files = glob($bg_dir . "*.{jpg,jpeg,png,webp}", GLOB_BRACE);
              if ($files) {
                  foreach ($files as $file) {
                      $bg_images[] = './adminFiles/uploadedFiles/gold_rate_backgrounds/' . basename($file);
                  }
              }
          }

          if (empty($bg_images)) {
              $bg_images = [
                  './images/backgrounds/bg1.jpg',
                  './images/backgrounds/bg2.jpg',
                  './images/backgrounds/bg3.jpg'
              ];
          }

          // Cycle backgrounds daily
          $day_index = (int)date('z') % count($bg_images);
          $selected_bg = $bg_images[$day_index];
          ?>
          <div class="popupAd" id="offerModal">
            <div class="gold-rate-popup-card" style="background-image: url('<?php echo htmlspecialchars($selected_bg); ?>');">
              <a onclick="closePopup()" class="close-popup-btn">&times;</a>
              <div class="gold-rate-popup-content">
                <div class="gold-rate-glass-card">
                  <h4 class="gold-rate-popup-title">Today's Gold Rate</h4>
                  <p class="gold-rate-popup-subtitle">Liyas Gold & Diamonds</p>
                  
                  <div class="gold-rate-popup-row">
                    <span class="gold-rate-popup-label"><i class="fa fa-certificate"></i> 22K Gold (916)</span>
                    <span class="gold-rate-popup-value">₹ <?php echo $rate_22k; ?> / gm</span>
                  </div>
                  <div class="gold-rate-popup-row">
                    <span class="gold-rate-popup-label"><i class="fa fa-star"></i> 24K Gold (Pure)</span>
                    <span class="gold-rate-popup-value">₹ <?php echo $rate_24k; ?> / gm</span>
                  </div>
                  
                  <div class="gold-rate-popup-timestamp">
                    Last Updated: <?php echo $updated_at; ?>
                  </div>
                </div>
                
                <a href="https://wa.me/917349739580?text=Hello%20Liyas%20Gold%20and%20Diamonds,%20I'm%20inquiring%20about%20today's%20gold%20rate%20and%20collections." target="_blank" class="btn-gold-rate-cta">
                  <i class="fa fa-whatsapp"></i> Enquire on WhatsApp
                </a>
              </div>
            </div>
          </div>
          <?php
      }
  }
  ?>

  <!-- 1. Hero Section -->
  <section class="home-hero">
    <div class="container-fluid px-4 px-lg-5">
      <div class="row align-items-center g-5">
        <!-- Hero Text -->
        <div class="col-lg-6 home-hero-text" data-aos="fade-right" data-aos-duration="1000">
          <h1 style="font-family: var(--font-serif); font-size: 3.6rem; font-weight: 700; line-height: 1.2; color: #ffffff;">
            Timeless Elegance,<br>
            Crafted For<br>
            Generations
          </h1>
          <p class="my-4" style="font-size: 1.1rem; opacity: 0.85; line-height: 1.6; color: #f5e6ec; max-width: 460px;">
            Where every piece tells a story<br>
            of purity, trust and elegance.
          </p>
            <div class="d-flex gap-3 flex-wrap">
              <a href="./collections.php" class="btn-hero-filled">Explore Collection</a>
              <a href="./contact.php#book-visit" class="btn-hero-outline">Book A Visit</a>
            </div>
          </div>
          <!-- Hero Image -->
          <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-duration="1000">
            <div class="home-hero-image-wrapper">
              <!-- <img src="./images/model.png" class="img-fluid home-hero-image" alt="Liyas Bridal Collection Model" /> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. Our Collections Section -->
  <section class="section-padding bg-cream">
    <div class="container">
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2>Our Collections</h2>
        <div class="divider"></div>
        <p>Crafted with passion. Designed for you.</p>
      </div>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <?php
        $col_sql = "SELECT collection_id, collection_name, collection_image_url FROM collections ORDER BY sort_order ASC LIMIT 5";
        $col_result = $conn->query($col_sql);
        if ($col_result && $col_result->num_rows > 0) {
            while ($row = $col_result->fetch_assoc()) {
                $col_img = './adminFiles/' . str_replace('../', '', htmlspecialchars($row['collection_image_url']));
        ?>
              <div class="col">
                <a href="./collectionItems.php?col_id=<?php echo $row['collection_id']; ?>" class="rectangular-collection-card">
                  <div class="rectangular-image-wrapper">
                    <img src="<?php echo $col_img; ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
                  </div>
                  <h4 class="rectangular-title"><?php echo htmlspecialchars($row['collection_name']); ?></h4>
                </a>
              </div>
        <?php
            }
        } else {
            // Mock Fallback cards if no collections in DB
            $mock_cols = [
                ['Bridal Collection', './images/bridal_hero_bride.png', 1],
                ['Diamond Collection', './images/about_hero_necklace.png', 2],
                ['Daily Wear', './images/bangle1.png', 3],
                ['Wedding Sets', './images/bridal_hero_necklace.png', 4],
                ['Kids Collection', './images/bangle6.png', 5],
            ];
            foreach ($mock_cols as $mc) {
        ?>
              <div class="col">
                <a href="./collections.php" class="rectangular-collection-card">
                  <div class="rectangular-image-wrapper">
                    <img src="<?php echo $mc[1]; ?>" alt="<?php echo $mc[0]; ?>" />
                  </div>
                  <h4 class="rectangular-title"><?php echo $mc[0]; ?></h4>
                </a>
              </div>
        <?php
            }
        }
        ?>
      </div>
    </div>
  </section>

  <!-- 3. Bridal Edit Callout Banner -->
  <section class="section-padding bg-cream-light">
    <div class="container">
      <div class="bridal-edit-card" data-aos="fade-up">
        <div class="row align-items-center g-0">
          <div class="col-md-6 p-5 text-white d-flex flex-column justify-content-center">
            <h4 class="text-uppercase" style="color: var(--color-gold); font-size: 0.95rem; letter-spacing: 2px; font-weight: 600;">The Bridal Edit 2025</h4>
            <h2 class="my-3 text-white" style="font-family: var(--font-serif); font-size: 2.8rem; line-height: 1.2;">Designed for the moments that become memories.</h2>
            <p class="mb-4" style="opacity: 0.9; font-size: 1.05rem;">
              Step into your new beginning with bridal sets that blend heritage craftsmanship and contemporary luxury. Find the treasure designed for your forever.
            </p>
            <div>
              <a href="./bridal.php" class="btn-gold-filled">Explore Bridal</a>
            </div>
          </div>
          <div class="col-md-6">
            <img src="./images/bridal_hero_bride.png" class="w-100 bridal-edit-img" alt="Liyas Bridal Collection" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Gold Rate & Why Choose Liyas Section -->
  <section class="section-padding bg-cream">
    <div class="container">
      <div class="row g-5">
        <!-- Live Gold Rates -->
        <div class="col-lg-5" data-aos="fade-right">
          <?php
          $rates = get_live_gold_rates();
          $rate_22k = isset($rates['gold_22k']) ? number_format($rates['gold_22k']) : '13,370';
          $rate_24k = isset($rates['gold_24k']) ? number_format($rates['gold_24k']) : '14,585';
          $updated_at = isset($rates['timestamp']) ? date('d M Y, h:i A', $rates['timestamp']) : date('d M Y, h:i A');
          ?>
          <div class="gold-rate-widget">
            <h3>Today's Gold Rate</h3>
            <p class="mb-4" style="opacity: 0.85; font-size: 0.95rem;">Stay updated with our live gold rates</p>
            
            <div class="gold-rate-box">
              <h4>22K Gold</h4>
              <div class="gold-rate-price">₹ <?php echo $rate_22k; ?> / gm</div>
            </div>
            
            <div class="gold-rate-box">
              <h4>24K Gold</h4>
              <div class="gold-rate-price">₹ <?php echo $rate_24k; ?> / gm</div>
            </div>
            
            <p class="gold-rate-date">Updated on: <?php echo $updated_at; ?></p>
            <div class="mt-4">
              <a href="./plans.php" class="btn-gold-filled w-100">View Gold Scheme</a>
            </div>
          </div>
        </div>
        
        <!-- Brand Badges -->
        <div class="col-lg-7" data-aos="fade-left">
          <div class="h-100 d-flex flex-column justify-content-between p-4" style="background-color: #fff; border: 1px solid rgba(197, 155, 39, 0.12); border-radius: 4px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div class="p-3 text-center text-lg-start">
              <h2 class="text-magenta" style="font-family: var(--font-serif); font-size: 2.4rem; font-weight: 700; margin-bottom: 20px;">Why Choose Liyas?</h2>
              <p style="opacity: 0.8; font-size: 1.05rem; line-height: 1.7; margin-bottom: 30px;">
                Since our inception, we have stood by our core principles of purity, transparency, and outstanding customer service. Every piece you purchase is backed by our lifetime guarantees and certifications.
              </p>
            </div>
            
            <div class="row g-4 justify-content-center text-center">
              <div class="col-sm-4 col-6">
                <div class="why-liyas-box">
                  <div class="why-liyas-icon"><i class="fa fa-certificate"></i></div>
                  <h4>100% BIS</h4>
                  <p>Hallmarked Gold</p>
                </div>
              </div>
              <div class="col-sm-4 col-6">
                <div class="why-liyas-box">
                  <div class="why-liyas-icon"><i class="fa fa-diamond"></i></div>
                  <h4>Certified</h4>
                  <p>Diamonds</p>
                </div>
              </div>
              <div class="col-sm-4 col-6">
                <div class="why-liyas-box">
                  <div class="why-liyas-icon"><i class="fa fa-handshake-o"></i></div>
                  <h4>Transparent</h4>
                  <p>Pricing Policy</p>
                </div>
              </div>
              <div class="col-sm-6 col-6">
                <div class="why-liyas-box">
                  <div class="why-liyas-icon"><i class="fa fa-refresh"></i></div>
                  <h4>Lifetime</h4>
                  <p>Exchange & Buyback</p>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="why-liyas-box">
                  <div class="why-liyas-icon"><i class="fa fa-users"></i></div>
                  <h4>Trusted By</h4>
                  <p>Thousands of Families</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. Testimonials & Instagram Journey Section -->
  <section class="section-padding bg-cream-light">
    <div class="container">
      <div class="row g-5">
        <!-- Testimonials -->
        <div class="col-lg-6" data-aos="fade-right">
          <div class="section-title-wrapper text-start mb-4">
            <h2 style="font-size: 2.2rem; text-align: left;">What Our Customers Say</h2>
            <div class="divider" style="margin: 15px 0 0;"></div>
          </div>
          
          <div class="testimonial-card-premium mt-4">
            <div class="testimonial-feedback">
              "Our wedding jewellery from Liyas was beyond perfect. The designs, the quality, and the customer experience were exceptional. Every detail was crafted beautifully!"
            </div>
            <h5 class="testimonial-name">Aisha Fathima</h5>
            <div class="testimonial-rating" style="justify-content: center; gap: 5px;">
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
              <i class="fa fa-star text-warning"></i>
            </div>
          </div>
        </div>

        <!-- Follow Our Journey / Instagram Grid -->
        <div class="col-lg-6" data-aos="fade-left">
          <div class="section-title-wrapper text-start mb-4">
            <h2 style="font-size: 2.2rem; text-align: left;">Follow Our Journey</h2>
            <div class="divider" style="margin: 15px 0 0;"></div>
            <p style="text-align: left; font-size: 1rem; color: var(--color-rose);">@liyasgoldanddiamonds</p>
          </div>
          
          <div class="instagram-grid mt-4">
            <div class="instagram-item">
              <img src="./images/bangle1.png" alt="Bangle Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
            <div class="instagram-item">
              <img src="./images/chain11.png" alt="Chain Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
            <div class="instagram-item">
              <img src="./images/earring12.png" alt="Earring Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
            <div class="instagram-item">
              <img src="./images/chain13.png" alt="Chain Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
            <div class="instagram-item">
              <img src="./images/bracelet11.png" alt="Bracelet Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
            <div class="instagram-item">
              <img src="./images/about_hero_necklace.png" alt="Necklace Design" />
              <div class="instagram-overlay"><i class="fa fa-instagram"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. Trusted Features Banner -->
  <section class="trusted-bar">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-md-2-4 col-sm-6 col-6">
          <div class="trusted-item">
            <i class="fa fa-check-square-o"></i>
            <span>100% Hallmarked Jewellery</span>
          </div>
        </div>
        <div class="col-md-2-4 col-sm-6 col-6">
          <div class="trusted-item">
            <i class="fa fa-exchange"></i>
            <span>Lifetime Exchange</span>
          </div>
        </div>
        <div class="col-md-2-4 col-sm-6 col-6">
          <div class="trusted-item">
            <i class="fa fa-shield"></i>
            <span>Secure Payments</span>
          </div>
        </div>
        <div class="col-md-2-4 col-sm-6 col-6">
          <div class="trusted-item">
            <i class="fa fa-truck"></i>
            <span>Free Shipping Pan India</span>
          </div>
        </div>
        <div class="col-md-2-4 col-sm-6 col-6">
          <div class="trusted-item">
            <i class="fa fa-money"></i>
            <span>Easy Buyback Guarantee</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Showroom CTA Banner -->
  <section class="cta-showroom" style="background-image: url('./images/showroom_interior.png');">
    <div class="cta-showroom-content" data-aos="zoom-in" data-aos-duration="1000">
      <h2 style="font-family: var(--font-serif); font-weight: 700;">Visit Our Showroom Today</h2>
      <p>
        Experience the weight of purity and sparkle of certified diamonds in person. Our expert team is ready to guide you to the perfect jewelry piece.
      </p>
      <div>
        <a href="./contact.php" class="btn-gold-filled px-5 py-3">Book Your Visit</a>
      </div>
    </div>
  </section>

  <!-- Include Shared Footer Component -->
  <?php include('./footer.php'); ?>

  <script src="./js/main.js?v=1.2"></script>
  <script src="./js/navBar.js?v=1.2"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true });
  </script>
  <script>
    function closePopup() {
      const modal = document.getElementById('offerModal');
      if (modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>
