<?php
include("./adminFiles/config.php");
$item_id = intval($_GET['item_id']);

// Fetch the item details for the specific item_id
$item_sql = "SELECT ci.*, c.collection_name FROM collection_items ci JOIN collections c ON ci.collection_id = c.collection_id WHERE ci.item_id = $item_id LIMIT 1";
$item_result = $conn->query($item_sql);

// Initialize variables for title, favicon URL, and item details
$title = "Item Not Found";
$item = [];

if ($item_result && $item_result->num_rows > 0) {
    $row = $item_result->fetch_assoc();
    $title = htmlspecialchars($row['item_name']);
    $item = [
        "id" => $row['item_id'],
        "image_url" => "./adminFiles/" . str_replace('../', '', htmlspecialchars($row['item_image_url'])),
        "name" => htmlspecialchars($row['item_name']),
        "description" => htmlspecialchars($row['item_description']),
        "original_price" => number_format($row['original_price'], 2),
        "selling_price" => number_format($row['selling_price'], 2),
        "collection_name" => htmlspecialchars($row['collection_name']),
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- SEO Optimization -->
  <meta name="description" content="View detail specs, pricing, and certified quality for <?php echo $title; ?> at Liyas Gold & Diamonds.">
  <title><?php echo $title; ?> - Liyas Gold and Diamonds</title>

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
          <?php if (!empty($item)) { ?>
            <li class="breadcrumb-item"><a href="./collectionItems.php?col_id=<?php echo $row['collection_id']; ?>" style="color: var(--color-rose); text-decoration: none;"><?php echo $item['collection_name']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: var(--color-magenta); font-weight: 600;"><?php echo $item['name']; ?></li>
          <?php } else { ?>
            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
          <?php } ?>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Product Details Section -->
  <section class="section-padding" style="padding: 60px 0;">
    <div class="container">
      <?php if (!empty($item)) { ?>
        
        <div class="row g-5">
          
          <!-- Image Gallery (Left Thumbnails + Center Main Image) -->
          <div class="col-lg-6">
            <div class="row g-3">
              <!-- Thumbnail List (PC) -->
              <div class="col-md-2 col-12 order-2 order-md-1">
                <div class="detail-thumbnail-list">
                  <div class="detail-thumbnail active">
                    <img src="<?php echo $item['image_url']; ?>" alt="Thumbnail 1" onclick="changeDetailImage(this.src, this)" />
                  </div>
                  <!-- Extra thumbnails repeating image or fallback design elements to mimic mockup -->
                  <div class="detail-thumbnail">
                    <img src="<?php echo $item['image_url']; ?>" alt="Thumbnail 2" onclick="changeDetailImage(this.src, this)" style="filter: hue-rotate(15deg);" />
                  </div>
                  <div class="detail-thumbnail">
                    <img src="<?php echo $item['image_url']; ?>" alt="Thumbnail 3" onclick="changeDetailImage(this.src, this)" style="filter: hue-rotate(30deg);" />
                  </div>
                  <div class="detail-thumbnail">
                    <img src="<?php echo $item['image_url']; ?>" alt="Thumbnail 4" onclick="changeDetailImage(this.src, this)" style="filter: opacity(0.85);" />
                  </div>
                </div>
              </div>
              
              <!-- Main Display Image -->
              <div class="col-md-10 col-12 order-1 order-md-2" data-aos="zoom-in">
                <div class="detail-main-image-wrapper">
                  <img id="detail-main-image-display" src="<?php echo $item['image_url']; ?>" class="detail-main-image" alt="<?php echo $item['name']; ?>" />
                </div>
              </div>
            </div>
          </div>
          
          <!-- Specs & Buy Info (Right Column) -->
          <div class="col-lg-6" data-aos="fade-left">
            <div class="detail-sku">SKU: LGD-<?php echo str_pad($item['id'], 5, '0', STR_PAD_LEFT); ?></div>
            <h1 class="detail-title"><?php echo $item['name']; ?></h1>
            
            <!-- Ratings -->
            <div class="detail-rating">
              <div style="color: var(--color-gold);">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <span class="detail-reviews-count">(88 Reviews)</span>
            </div>
            
            <!-- Price Block -->
            <div class="detail-price-box">
              <span class="price">₹ <?php echo $item['selling_price']; ?></span>
              <del>₹ <?php echo $item['original_price']; ?></del>
              <div class="tax-info">(Inclusive of all taxes)</div>
            </div>
            
            <!-- Description -->
            <p class="detail-description">
              <?php echo !empty($item['description']) ? $item['description'] : "A timeless jewelry piece crafted with perfection and ethically sourced gold. Designed to add sparkle and elegance to your special moments."; ?>
            </p>
            
            <!-- Quality badges -->
            <div class="detail-features-row">
              <div class="detail-feature-item">
                <i class="fa fa-check-circle"></i>
                <span>BIS Hallmarked Gold</span>
              </div>
              <div class="detail-feature-item">
                <i class="fa fa-diamond"></i>
                <span>Certified Diamond</span>
              </div>
              <div class="detail-feature-item">
                <i class="fa fa-refresh"></i>
                <span>Lifetime Exchange</span>
              </div>
            </div>
            
            <!-- Actions -->
            <div class="detail-actions">
              <a href="https://wa.me/917349739580?text=Hello,%20I%20am%20interested%20in%20the%20item%20*<?php echo urlencode($item['name']); ?>*%20(SKU:%20LGD-<?php echo $item['id']; ?>).%20Please%20provide%20more%20details." target="_blank" class="detail-btn-wa">
                <i class="fa fa-whatsapp"></i> &nbsp; Whatsapp Enquiry
              </a>
              <a href="./contact.php" class="detail-btn-visit">
                <i class="fa fa-calendar"></i> &nbsp; Book Store Visit
              </a>
            </div>
            
            <!-- Trust badges bar -->
            <div class="detail-trust-bar">
              <div class="row g-2 text-center text-md-start">
                <div class="col-md-6 mb-2">
                  <div class="detail-trust-item">
                    <i class="fa fa-truck"></i>
                    <span>Free Shipping Pan India</span>
                  </div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="detail-trust-item">
                    <i class="fa fa-shield"></i>
                    <span>Secure Payments</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-trust-item">
                    <i class="fa fa-refresh"></i>
                    <span>Lifetime Exchange</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-trust-item">
                    <i class="fa fa-certificate"></i>
                    <span>100% Certified Gold</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
        
      <?php } else { ?>
        <div class="row justify-content-center text-center">
          <div class="col-md-6">
            <h3 class="text-magenta mb-4">Product Not Found</h3>
            <p class="mb-4">The item you are looking for might have been moved or sold. Please explore our other collections.</p>
            <a href="./collections.php" class="btn-magenta-filled">Back to Collections</a>
          </div>
        </div>
      <?php } ?>
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
    
    // Thumbnail toggle function
    function changeDetailImage(src, element) {
        document.getElementById('detail-main-image-display').src = src;
        
        // Remove active class from other thumbnails
        const thumbs = document.querySelectorAll('.detail-thumbnail');
        thumbs.forEach(thumb => thumb.classList.remove('active'));
        
        // Add active class to clicked thumbnail
        element.parentElement.classList.add('active');
    }
  </script>
</body>

</html>
