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
  <meta name="description" content="Learn about Liyas Gold & Diamonds - Mangalore's trusted source of quality jewelry and flexible gold plans built on trust and legacy.">
  <title>About Us - Liyas Gold and Diamonds</title>

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
</head>

<body class="content">

  <!-- Loader Screen -->
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- Include Shared Header Component -->
  <?php include("./header.php"); ?>

  <!-- 1. Hero Section -->
  <section class="about-hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <!-- Hero Text -->
        <div class="col-lg-6" data-aos="fade-right">
          <h1 style="font-family: var(--font-serif); font-size: 3.4rem; font-weight: 700; line-height: 1.2;">
            A Legacy Of Trust<br>
            Since Generations
          </h1>
          <p class="mt-4" style="font-size: 1.1rem; opacity: 0.9; line-height: 1.7; text-align: justify;">
            Liyas Gold & Diamonds is built on a foundation of trust, transparency, and timeless values. We are committed to providing the finest gold and diamond jewellery with unmatched quality and craftsmanship. Every piece we create is designed to carry the legacy of love and celebrations across generations.
          </p>
        </div>
        <!-- Hero Image -->
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="about-hero-img-wrapper">
            <img src="./images/about_hero_necklace.png" class="img-fluid about-hero-img" alt="Liyas Gold Necklace" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. Our Journey Section -->
  <section class="section-padding bg-cream">
    <div class="container">
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2>Our Journey</h2>
        <div class="divider"></div>
        <p>Growing with trust, celebrating milestones.</p>
      </div>

      <!-- Timeline Component -->
      <div class="timeline-row" data-aos="fade-up" data-aos-delay="200">
        <div class="timeline-line"></div>
        
        <div class="row g-4">
          <!-- 1995 Node -->
          <div class="col-md col-12 timeline-node-col">
            <div class="timeline-circle">1995</div>
            <div class="timeline-year">1995</div>
            <div class="timeline-desc">The Beginning</div>
          </div>
          
          <!-- 2005 Node -->
          <div class="col-md col-12 timeline-node-col">
            <div class="timeline-circle">2005</div>
            <div class="timeline-year">2005</div>
            <div class="timeline-desc">First Showroom in Mangalore</div>
          </div>
          
          <!-- 2012 Node -->
          <div class="col-md col-12 timeline-node-col">
            <div class="timeline-circle">2012</div>
            <div class="timeline-year">2012</div>
            <div class="timeline-desc">Expanded Our Collections</div>
          </div>
          
          <!-- 2020 Node -->
          <div class="col-md col-12 timeline-node-col">
            <div class="timeline-circle">2020</div>
            <div class="timeline-year">2020</div>
            <div class="timeline-desc">New Showroom At Bejai</div>
          </div>
          
          <!-- Today Node -->
          <div class="col-md col-12 timeline-node-col">
            <div class="timeline-circle"><i class="fa fa-star"></i></div>
            <div class="timeline-year">Today</div>
            <div class="timeline-desc">Growing With Your Trust</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Our Promise Section -->
  <section class="section-padding bg-cream-light">
    <div class="container">
      <div class="row align-items-center g-5">
        <!-- Showroom Interior Image -->
        <div class="col-lg-6" data-aos="fade-right">
          <div style="border: 1px solid var(--color-gold); border-radius: 4px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
            <img src="./images/showroom_interior.png" class="w-100 img-fluid" alt="Liyas Gold Showroom" style="object-fit: cover; max-height: 400px;" />
          </div>
        </div>
        
        <!-- Promise Checklist -->
        <div class="col-lg-6" data-aos="fade-left">
          <h2 class="text-magenta mb-4" style="font-family: var(--font-serif); font-size: 2.6rem; font-weight: 700;">Our Promise</h2>
          <p class="mb-4" style="opacity: 0.85; font-size: 1.05rem; line-height: 1.7;">
            We believe that purchasing jewelry is an emotional experience. To assure you of the highest quality standards, we offer concrete promises on every purchase:
          </p>
          <ul class="promise-list">
            <li><i class="fa fa-check-circle"></i> 100% BIS Hallmarked Jewellery</li>
            <li><i class="fa fa-check-circle"></i> Certified Diamonds (IGI/GIA)</li>
            <li><i class="fa fa-check-circle"></i> Transparent Pricing & Billing</li>
            <li><i class="fa fa-check-circle"></i> Customer First Approach & Assistance</li>
            <li><i class="fa fa-check-circle"></i> Lifetime Exchange & Buyback Guarantee</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Callout Banner -->
  <section class="about-cta-banner">
    <div class="about-cta-content" data-aos="zoom-in" data-aos-duration="1000">
      <h2 style="font-family: var(--font-serif); font-weight: 700;">Crafting Happiness<br>For Generations</h2>
      <div class="mt-4">
        <a href="./contact.php" class="btn-gold-filled py-3 px-5">Book A Store Visit</a>
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
</body>
</html>
