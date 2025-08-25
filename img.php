<?php
include("./adminFiles/config.php");
$item_id = intval($_GET['item_id']);

// Fetch the item details for the specific item_id
$item_sql = "SELECT * FROM collection_items WHERE item_id = $item_id LIMIT 1";
$item_result = $conn->query($item_sql);

// Initialize variables for title, favicon URL, and item details
$title = "Item Not Found";
$favicon_url = "";
$item = [];

if ($item_result->num_rows > 0) {
    $row = $item_result->fetch_assoc();
    $title = htmlspecialchars($row['item_name']);
    $favicon_url = "./adminFiles/" . str_replace('../', '', htmlspecialchars($row['item_image_url']));
    $item = [
        "image_url" => "./adminFiles/" . str_replace('../', '', htmlspecialchars($row['item_image_url'])),
        "name" => htmlspecialchars($row['item_name']),
        "description" => htmlspecialchars($row['item_description']),
        "original_price" => number_format($row['original_price'], 2),
        "selling_price" => number_format($row['selling_price'], 2),
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= $item['image_url']; ?>" />
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/navBar.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/testimonials.css" />
    <link rel="stylesheet" href="./css/collectionItems.css">
    <link rel="stylesheet" href="./css//responsive/phone.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./adminFiles/style.css">

    <style>
        .container2 {
            min-height: 100vh !important;
            padding-bottom: 20px;
            background-image: url(./images/backgrounds/collectionsbg.svg) !important;
        }
        .CI_Card{
            min-height: 70vh;
        }
        .imageHeight_CI{
/* height: auto !important; */
/* width: 100%; */
width: 200px;
height: 200px;
object-fit: cover;
        }
    </style>
</head>

<body class="content">
    <header id="header">
        <img src="./images/liyaslogo.png" href="#" class="logo" />
        <div class="menu">
            <a href="./">HOME</a>
            <a href="./about.php">ABOUT</a>
            <a href="./collections.php" class="active">COLLECTIONS</a>
            <a href="./plans.php">PLANS</a>
            <a href="https://goldendream.in/landing ">Login</a>
            <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
        </div>
        <div class="menu-shadow" onclick="closeMenu()"></div>
        <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
    </header>
    <div style="height:60px;width:100vw"></div>

    <div class="container2 d-flex flex-column align-items-center">
        <br>
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h2 data-aos-delay="100" data-aos="fade-up" class="text-light">- Collection Item -</h2>
                <div data-aos-delay="100" data-aos="fade-up" class="UnderLine text-center"></div>
            </div>

            <div class="row justify-content-center">
                <?php if (!empty($item)) {
                    $discount = round((($item['original_price'] - $item['selling_price']) / $item['original_price']) * 100);
                ?>
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="CI_Card card h-100 shadow-sm text-center">
                            <div class="card-img-top bg-light" style="height: 70%; display: flex; align-items: center; justify-content: center; position: relative;">
                                <img src="<?= $item['image_url']; ?>" alt="<?= $item['name']; ?>" class="img-fluid imageHeight_CI">
                            </div>
                            <div class="card-body" style="height: 30%; padding: 10px;">
                                <h6 class="card-title mb-2" style="font-weight: 600; font-size: 0.8rem;"><?= $item['name']; ?></h6>
                                <p class="description mb-2" style="font-size: 0.7rem;"><?= $item['description']; ?></p>
                                <p class="price text-secondary mb-2" style="font-size: 0.7rem; font-weight: bold;">
                                    <del>₹<?= $item['original_price']; ?></del> &nbsp; <span class="text-dark">₹<?= $item['selling_price']; ?></span>
                                </p>
                                <p class="text-danger mb-0" style="font-size: 0.7rem; font-weight: bold;"><?= $discount; ?>% off</p>
                                <p style="text-align: justify;"><?= $item['description']; ?></p>
                                <a href="https://wa.me/+916361557581?text=Hello,%20I%20would%20like%20to%20learn%20more%20about%20the%20item%20*<?= urlencode($item['name']); ?>*" class="btn btn-success rounded-pill px-2" style="font-size: 0.7rem; padding: 5px 10px;">
                                    <i class="bi bi-whatsapp"></i> &nbsp; Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <p class="text-light">Item not found.</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-content">
            <!-- Footer Info and Links -->
        </div>
    </footer>

    <script src="./js/main.js"></script>
    <script src="./js/navBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
