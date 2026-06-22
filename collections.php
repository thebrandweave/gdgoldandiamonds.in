<?php
include("./adminFiles/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- SEO Optimization -->
  <meta name="description" content="Explore our exqusite jewelry collections including Bridal, Diamond, Gold, Necklaces, Earrings, Rings, and Daily Wear at Liyas Gold & Diamonds.">
  <title>Our Collections - Liyas Gold and Diamonds</title>

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

  <div style="height:80px; width:100vw"></div>

  <!-- Hero Section -->
  <section class="section-padding bg-cream" style="padding: 60px 0 30px;">
    <div class="container">
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2>Our Collections</h2>
        <div class="divider"></div>
        <p>Exquisite designs for every occasion.</p>
      </div>
    </div>
  </section>

  <!-- Filter Pill Bar -->
  <section class="bg-cream-light" style="padding-bottom: 20px;">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="filter-pill-bar">
        <button class="filter-pill active" onclick="filterCategory('all')">All</button>
        <button class="filter-pill" onclick="filterCategory('bridal')">Bridal</button>
        <button class="filter-pill" onclick="filterCategory('diamond')">Diamond</button>
        <button class="filter-pill" onclick="filterCategory('gold')">Gold</button>
        <button class="filter-pill" onclick="filterCategory('necklaces')">Necklaces</button>
        <button class="filter-pill" onclick="filterCategory('earrings')">Earrings</button>
        <button class="filter-pill" onclick="filterCategory('rings')">Rings</button>
      </div>
    </div>
  </section>

  <!-- Collections Grid Section -->
  <section class="section-padding bg-cream-light" style="padding-top: 30px; min-height: 60vh;">
    <div class="container">
      <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center" id="collections-grid">
        
        <?php
        // Fetch collections from database
        $col_sql = "SELECT collection_id, collection_name, collection_image_url FROM collections ORDER BY sort_order ASC";
        $col_result = $conn->query($col_sql);
        
        if ($col_result && $col_result->num_rows > 0) {
            $index = 0;
            while ($row = $col_result->fetch_assoc()) {
                $col_name = htmlspecialchars($row['collection_name']);
                $col_img = './adminFiles/' . str_replace('../', '', htmlspecialchars($row['collection_image_url']));
                
                // Determine category filter tags dynamically
                $tags = ['all'];
                $col_name_lower = strtolower($col_name);
                
                if (strpos($col_name_lower, 'bridal') !== false || strpos($col_name_lower, 'wedding') !== false) {
                    $tags[] = 'bridal';
                }
                if (strpos($col_name_lower, 'diamond') !== false) {
                    $tags[] = 'diamond';
                } else {
                    $tags[] = 'gold'; // non-diamond collections default as gold
                }
                if (strpos($col_name_lower, 'necklace') !== false || strpos($col_name_lower, 'set') !== false) {
                    $tags[] = 'necklaces';
                }
                if (strpos($col_name_lower, 'earring') !== false) {
                    $tags[] = 'earrings';
                }
                if (strpos($col_name_lower, 'ring') !== false) {
                    $tags[] = 'rings';
                }
                
                $tag_string = implode(' ', $tags);
        ?>
              <div class="col collection-item-card" data-tags="<?php echo $tag_string; ?>" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <a href="./collectionItems.php?col_id=<?php echo $row['collection_id']; ?>" class="collection-grid-card">
                  <img src="<?php echo $col_img; ?>" alt="<?php echo $col_name; ?>" />
                  <div class="collection-grid-card-overlay">
                    <h4><?php echo $col_name; ?></h4>
                  </div>
                </a>
              </div>
        <?php
                $index++;
            }
        } else {
            // Static Fallback collections if DB is empty
            $fallback_cols = [
                ['Bridal Collection', './images/bridal_hero_bride.png', 'all bridal'],
                ['Diamond Collection', './images/about_hero_necklace.png', 'all diamond necklaces'],
                ['Gold Necklaces', './images/bridal_hero_necklace.png', 'all gold necklaces'],
                ['Earrings', './images/earring12.png', 'all gold earrings'],
                ['Rings', './images/showroom_interior.png', 'all gold diamond rings'],
                ['Daily Wear', './images/bangle1.png', 'all gold'],
                ['Wedding Sets', './images/bridal_hero_necklace.png', 'all bridal necklaces'],
                ['Kids Collection', './images/bangle6.png', 'all gold'],
                ['Bangles', './images/bangle1.png', 'all gold'],
            ];
            foreach ($fallback_cols as $idx => $fc) {
        ?>
              <div class="col collection-item-card" data-tags="<?php echo $fc[2]; ?>" data-aos="fade-up" data-aos-delay="<?php echo $idx * 100; ?>">
                <a href="./collections.php" class="collection-grid-card">
                  <img src="<?php echo $fc[1]; ?>" alt="<?php echo $fc[0]; ?>" />
                  <div class="collection-grid-card-overlay">
                    <h4><?php echo $fc[0]; ?></h4>
                  </div>
                </a>
              </div>
        <?php
            }
        }
        ?>

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
    
    // Interactive Javascript Filtering
    function filterCategory(category) {
        // Toggle active class on buttons
        const pills = document.querySelectorAll('.filter-pill');
        pills.forEach(pill => pill.classList.remove('active'));
        
        // Add active class to clicked button
        event.target.classList.add('active');
        
        // Filter cards
        const cards = document.querySelectorAll('.collection-item-card');
        cards.forEach(card => {
            const tags = card.getAttribute('data-tags').split(' ');
            if (category === 'all' || tags.includes(category)) {
                card.style.display = 'block';
                // Trigger AOS
                card.classList.add('aos-animate');
            } else {
                card.style.display = 'none';
                card.classList.remove('aos-animate');
            }
        });
    }
  </script>
</body>

</html>
