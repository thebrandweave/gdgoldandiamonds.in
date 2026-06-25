<?php
include("./adminFiles/config.php");

// Fetch the Bridal collection ID if it exists in the database
$bridal_id = 1; // Default fallback
$col_query = "SELECT collection_id FROM collections WHERE collection_name LIKE '%bridal%' OR collection_name LIKE '%wedding%' LIMIT 1";
$col_res = $conn->query($col_query);
if ($col_res && $col_res->num_rows > 0) {
    $row = $col_res->fetch_assoc();
    $bridal_id = intval($row['collection_id']);
}
?>
<!DOCTYPE html>
<html id="documentContainer" lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- SEO Optimization -->
  <meta name="description" content="Discover Liyas Bridal Collection - Exquisite bridal jewellery crafted to make your special day unforgettable. Rings, Nikah, and complete sets.">
  <title>Bridal Collection - Liyas Gold and Diamonds</title>

  <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./css/style.css?v=1.2" />
  <link rel="stylesheet" href="./css/navBar.css?v=1.2" />
  <link rel="stylesheet" href="./css/footer.css?v=1.2" />
  <link rel="stylesheet" href="./css/testimonials.css?v=1.2" />
  <link rel="stylesheet" href="./css/responsive/phone.css?v=1.2">

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
  <section class="bridal-hero" style="background-color: var(--color-magenta); color: #fff; padding: 100px 0; border-bottom: 2px solid var(--color-gold);">
    <div class="container">
      <div class="row align-items-center g-5">
        <!-- Hero Text -->
        <div class="col-lg-6" data-aos="fade-right">
          <h1 class="bridal-title" style="color: #fff; font-family: var(--font-serif); font-size: 3.4rem; font-weight: 700; line-height: 1.2;">
            For The Bride<br>
            Who Deserves Everything
          </h1>
          <p class="bridal-subtitle my-4" style="color: var(--color-gold-hover); font-size: 1.2rem; opacity: 0.9; line-height: 1.7;">
            Exquisite bridal jewellery crafted to make your special day unforgettable. Walk down the aisle draped in gold and diamond treasures carrying the elegance of tradition.
          </p>
          <div class="mt-4">
            <a href="#bridal-explore" class="btn-gold-filled">Discover Collection</a>
          </div>
        </div>
        <!-- Hero Image -->
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="home-hero-image-wrapper">
            <img src="./images/hero1.jpg" class="img-fluid home-hero-image" alt="Bride Wearing Liyas Gold Collection" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. Checklist & Display Section -->
  <section class="section-padding bg-cream-light" id="bridal-explore">
    <div class="container">
      <div class="row align-items-center g-5">
        <!-- Checklist of Sub-collections -->
        <div class="col-lg-6" data-aos="fade-right">
          <div class="section-title-wrapper text-start mb-5">
            <h2 class="text-magenta" style="font-family: var(--font-serif); font-size: 2.6rem; text-align: left;">The Bridal Curation</h2>
            <div class="divider" style="margin: 15px 0 0;"></div>
          </div>
          
          <div class="bridal-checklist">
            <!-- 1. Engagement Rings -->
            <div class="bridal-checklist-item">
              <div class="bridal-checklist-icon"><i class="fa fa-diamond"></i></div>
              <div class="bridal-checklist-content">
                <h5>Engagement Rings</h5>
                <p>Symbol of your forever. Solitaires and gold bands sculpted to perfection.</p>
              </div>
            </div>
            
            <!-- 2. Nikah Collection -->
            <div class="bridal-checklist-item">
              <div class="bridal-checklist-icon"><i class="fa fa-heart"></i></div>
              <div class="bridal-checklist-content">
                <h5>Nikah Collection</h5>
                <p>Timeless pieces for your sacred bond. Classic chokers and detailed bangles.</p>
              </div>
            </div>
            
            <!-- 3. Reception Collection -->
            <div class="bridal-checklist-item">
              <div class="bridal-checklist-icon"><i class="fa fa-star"></i></div>
              <div class="bridal-checklist-content">
                <h5>Reception Collection</h5>
                <p>Shine brighter on your big day. Modern diamond sets and layering necklaces.</p>
              </div>
            </div>
            
            <!-- 4. Complete Bridal Sets -->
            <div class="bridal-checklist-item">
              <div class="bridal-checklist-icon"><i class="fa fa-check-square"></i></div>
              <div class="bridal-checklist-content">
                <h5>Complete Bridal Sets</h5>
                <p>Everything you need, beautifully matched. Harmonized sets representing heritage.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Display Card with Bridal Necklace -->
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div style="background-color: var(--color-magenta); border: 1.5px solid var(--color-gold); padding: 40px; border-radius: 4px; box-shadow: var(--glow-magenta);">
            <img src="./images/bridal_hero_necklace.png" class="img-fluid" alt="Liyas Bridal Necklace Gold" style="border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); border: 1px solid rgba(226, 197, 138, 0.25);" />
          </div>
        </div>
      </div>
      
      <!-- Central CTA button -->
      <div class="row mt-5 text-center" data-aos="fade-up">
        <div class="col-12 mt-4">
          <a href="./collectionItems.php?col_id=<?php echo $bridal_id; ?>" class="btn-magenta-filled px-5 py-3 rounded-pill" style="font-size: 1rem; border-radius: 50px;">Explore Bridal Collection</a>
        </div>
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
