<?php
// Active page helper function
function isActive($pageName) {
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page == $pageName) {
        return 'active';
    }
    return '';
}

// Special helper for Collections pages
function isCollectionsActive() {
    $current_page = basename($_SERVER['PHP_SELF']);
    if (in_array($current_page, ['collections.php', 'collectionItems.php', 'img.php', 'bridal.php'])) {
        return 'active';
    }
    return '';
}
?>
<!-- Navigation Header Start -->
<header id="header" style="display: flex; justify-content: space-between; align-items: center; position: fixed; top: 0; width: 100%; height: 80px; z-index: 999; padding: 0 40px; transition: background-color white, border-color 0.3s ease, height 0.3s ease;">
  <a href="./index.php">
    <img src="./images/liyaslogo1.png" class="logo" alt="Liyas Gold & Diamonds Logo" style="width: 120px; height: 150px; object-fit: contain;" />
  </a>
  <div class="menu" style="display: flex; align-items: center; height: 100%;">
    <a href="./index.php" class="<?php echo isActive('index.php'); ?>">HOME</a>
    <a href="./collections.php" class="<?php echo isCollectionsActive(); ?>">COLLECTIONS</a>
    <a href="./plans.php" class="<?php echo isActive('plans.php'); ?>">GOLD SCHEME</a>
    <a href="./about.php" class="<?php echo isActive('about.php'); ?>">ABOUT US</a>
    <a href="./contact.php" class="<?php echo isActive('contact.php'); ?>">CONTACT US</a>
    
    <!-- Mobile Book Visit Button -->
    <div class="d-md-none text-center my-3">
      <a href="./contact.php#book-visit" class="btn-gold-filled py-2 px-4 rounded-pill" onclick="closeMenu()">BOOK VISIT</a>
    </div>
    
    <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
  </div>
  
  <!-- Book Visit Button on PC navbar -->
  <div class="header-btn-wrapper d-none d-md-block">
    <a href="./contact.php#book-visit" class="btn-gold-filled py-2 px-4 rounded-pill" style="border-radius: 50px; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; padding: 10px 24px;">BOOK VISIT</a>
  </div>
  
  <div class="menu-shadow" onclick="closeMenu()"></div>
  <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
</header>
<!-- Navigation Header End -->
