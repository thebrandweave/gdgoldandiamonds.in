<?php
include("./adminFiles/config.php");
$col_id = intval($_GET['col_id']);

// Fetch collection details
$col_query = "SELECT collection_name FROM collections WHERE collection_id = $col_id LIMIT 1";
$col_res = $conn->query($col_query);
$collection_name = "Collection Items";
if ($col_res && $col_res->num_rows > 0) {
    $row = $col_res->fetch_assoc();
    $collection_name = htmlspecialchars($row['collection_name']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- SEO Optimization -->
  <meta name="description" content="Explore exqusite pieces in our <?php echo $collection_name; ?>. Intricate detailing, certified diamonds, and hallmarked gold.">
  <title><?php echo $collection_name; ?> - Liyas Gold and Diamonds</title>

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

<body class="content" style="background-color: var(--color-cream-light);">

  <!-- Loader Screen -->
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- Include Shared Header Component -->
  <?php include("./header.php"); ?>

  <div style="height:80px; width:100vw"></div>

  <!-- Breadcrumbs -->
  <section class="bg-cream" style="padding: 15px 0; border-bottom: 1px solid rgba(197, 155, 39, 0.1);">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0" style="font-size: 0.9rem;">
          <li class="breadcrumb-item"><a href="./index.php" style="color: var(--color-rose); text-decoration: none;">Home</a></li>
          <li class="breadcrumb-item"><a href="./collections.php" style="color: var(--color-rose); text-decoration: none;">Collections</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: var(--color-magenta); font-weight: 600;"><?php echo $collection_name; ?></li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Items list section -->
  <section class="section-padding" style="padding: 60px 0; min-height: 70vh;">
    <div class="container">
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2><?php echo $collection_name; ?></h2>
        <div class="divider"></div>
        <p>Intricate detailing and pure craftsmanship.</p>
      </div>

      <?php
      // Fetch collection items from database
      $ci_sql = "SELECT item_id, item_name, item_image_url, original_price, selling_price, item_description FROM collection_items WHERE collection_id = $col_id ORDER BY sort_order ASC";
      $ci_result = $conn->query($ci_sql);
      ?>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3" data-aos="fade-up" data-aos-delay="200">
        <?php
        if ($ci_result && $ci_result->num_rows > 0) {
            while ($row = $ci_result->fetch_assoc()) {
                $item_id = $row['item_id'];
                $item_name = htmlspecialchars($row['item_name']);
                $item_img = './adminFiles/' . str_replace('../', '', htmlspecialchars($row['item_image_url']));
                $orig_price = number_format($row['original_price'], 2);
                $sell_price = number_format($row['selling_price'], 2);
        ?>
              <div class="col">
                <div class="product-card-premium">
                  <!-- Image -->
                  <div class="product-card-image-wrapper">
                    <img src="<?php echo $item_img; ?>" class="product-card-image" alt="<?php echo $item_name; ?>" />
                  </div>
                  <!-- Details -->
                  <div class="product-card-body">
                    <h4 class="product-card-title"><?php echo $item_name; ?></h4>
                    <div class="product-card-price">
                      <del>₹ <?php echo $orig_price; ?></del>
                      <span>₹ <?php echo $sell_price; ?></span>
                    </div>
                    <!-- Actions -->
                    <div class="product-card-actions">
                      <a href="./img.php?item_id=<?php echo $item_id; ?>" class="product-card-btn-view">View Details</a>
                      <a href="https://wa.me/917349739580?text=Hello,%20I%20am%20interested%20in%20the%20item%20*<?php echo urlencode($item_name); ?>*%20(ID:%20<?php echo $item_id; ?>).%20Please%20provide%20more%20details." target="_blank" class="product-card-btn-wa">
                        <i class="fa fa-whatsapp"></i> WhatsApp
                      </a>
                    </div>
                  </div>
                </div>
              </div>
        <?php
            }
        } else {
            // Mock Fallback items if collection is empty
            $fallback_items = [
                ['Royal Gold Necklace', './images/about_hero_necklace.png', 190000, 175000],
                ['Heritage Bridal Set', './images/bridal_hero_necklace.png', 290000, 260000],
                ['Classic Wedding Ring', './images/showroom_interior.png', 45000, 40000],
                ['Temple Bangle Set', './images/bangle1.png', 98000, 90000],
            ];
            foreach ($fallback_items as $idx => $fi) {
        ?>
              <div class="col">
                <div class="product-card-premium">
                  <div class="product-card-image-wrapper">
                    <img src="<?php echo $fi[1]; ?>" class="product-card-image" alt="<?php echo $fi[0]; ?>" />
                  </div>
                  <div class="product-card-body">
                    <h4 class="product-card-title"><?php echo $fi[0]; ?></h4>
                    <div class="product-card-price">
                      <del>₹ <?php echo number_format($fi[2], 2); ?></del>
                      <span>₹ <?php echo number_format($fi[3], 2); ?></span>
                    </div>
                    <div class="product-card-actions">
                      <a href="./collections.php" class="product-card-btn-view">View Details</a>
                      <a href="#" class="product-card-btn-wa"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                    </div>
                  </div>
                </div>
              </div>
        <?php
            }
        }
        $conn->close();
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
  </script>
</body>

</html>