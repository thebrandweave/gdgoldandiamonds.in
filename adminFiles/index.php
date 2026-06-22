<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include("config.php");

// Fetch database counts for dashboard statistics
$collections_count = 0;
$res = $conn->query("SELECT COUNT(*) as count FROM collections");
if ($res) {
    $collections_count = $res->fetch_assoc()['count'];
}

$testimonials_count = 0;
$res = $conn->query("SELECT COUNT(*) as count FROM testimonials");
if ($res) {
    $testimonials_count = $res->fetch_assoc()['count'];
}

$subscribers_count = 0;
$res = $conn->query("SELECT COUNT(*) as count FROM subscribers");
if ($res) {
    $subscribers_count = $res->fetch_assoc()['count'];
}

$yt_count = 0;
$res = $conn->query("SELECT COUNT(*) as count FROM youtube_links");
if ($res) {
    $yt_count = $res->fetch_assoc()['count'];
}

// Load current popup settings
$settingsFile = __DIR__ . '/Popups/popup_settings.json';
$popup_settings = [
    'mode' => 'automated',
    'enabled' => true
];
if (file_exists($settingsFile)) {
    $popup_settings = json_decode(file_get_contents($settingsFile), true) ?: $popup_settings;
}

// Fetch current gold rates
$rates = get_live_gold_rates();
$rate_22k = isset($rates['gold_22k']) ? number_format($rates['gold_22k']) : '13,430';
$rate_24k = isset($rates['gold_24k']) ? number_format($rates['gold_24k']) : '14,651';
$updated_at = isset($rates['timestamp']) ? date('d M Y, h:i A', $rates['timestamp']) : date('d M Y, h:i A');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liyas Gold & Diamonds - Management Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Dashboard Layout -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <img src="./images/liyaslogo.png" alt="Logo">
                    GD Gold & Diamonds
                </a>
                
                <!-- Collapse Nav -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Trending_Collections/TrendingCollections.php">
                                <i class="bi bi-bar-chart"></i> Trending Collections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Collections/Collections.php">
                                <i class="bi bi-chat"></i> Collections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./CollectionItems/CollectionItems.php">
                                <i class="bi bi-bookmarks"></i> Collection Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Testimonials/Testimonials.php">
                                <i class="bi bi-people"></i> Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Social Media/Social_media.php">
                                <i class="bi bi-share"></i> Social Media Links
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Popups/Popups.php">
                                <i class="bi bi-window-stack"></i> Popups
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Subscribers/Subscribers.php">
                                <i class="bi bi-envelope-at"></i> Subscribers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Faqs/Faqs.php">
                                <i class="bi bi-question-circle"></i> Faqs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Users/Users.php">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                   
                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User Control -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-circle text-gold"></i> <?php echo htmlspecialchars($_SESSION['fullname']); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Main Content Panel -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6 pb-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Management Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contents Container -->
            <div class="container-fluid mt-6 px-lg-8">
                
                <!-- Welcome alert -->
                <div class="alert alert-info py-4 mb-6 shadow-sm d-flex align-items-center border-0" role="alert">
                    <span class="fs-4 me-3"><i class="bi bi-emoji-smile"></i></span>
                    <div>
                        <h5 class="alert-heading fw-bold mb-0">Welcome Back, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</h5>
                        <p class="small mb-0 text-muted">Liyas Gold & Diamonds website controls are fully loaded and operational.</p>
                    </div>
                </div>

                <!-- 1. Stats Counter Grid -->
                <div class="row g-6 mb-6">
                    <!-- Collections -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Collections</span>
                                        <span class="h3 font-bold mb-0"><?php echo $collections_count; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-soft-primary text-magenta text-lg rounded-circle">
                                            <i class="bi bi-chat-square-text-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="./Collections/Collections.php" class="text-xs text-gold font-semibold"><i class="bi bi-arrow-right me-1"></i>Manage Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonials -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Testimonials</span>
                                        <span class="h3 font-bold mb-0"><?php echo $testimonials_count; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-soft-primary text-magenta text-lg rounded-circle">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="./Testimonials/Testimonials.php" class="text-xs text-gold font-semibold"><i class="bi bi-arrow-right me-1"></i>View Feedback</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscribers -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Subscribers</span>
                                        <span class="h3 font-bold mb-0"><?php echo $subscribers_count; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-soft-primary text-magenta text-lg rounded-circle">
                                            <i class="bi bi-envelope-open-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="./Subscribers/Subscribers.php" class="text-xs text-gold font-semibold"><i class="bi bi-arrow-right me-1"></i>View Email List</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube links -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">YouTube Links</span>
                                        <span class="h3 font-bold mb-0"><?php echo $yt_count; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-soft-primary text-magenta text-lg rounded-circle">
                                            <i class="bi bi-youtube"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="./YTlinks/YT-Links.php" class="text-xs text-gold font-semibold"><i class="bi bi-arrow-right me-1"></i>Manage Video Links</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Content Row: Live Rates + Quick Links -->
                <div class="row g-6">
                    <!-- Left: Gold Rate Overview Widget -->
                    <div class="col-xl-6">
                        <div class="card shadow-sm border-0 h-full">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="card-title mb-0"><i class="bi bi-cash-coin text-gold me-2"></i>Active Gold Rates</h3>
                                    <span class="badge bg-soft-primary"><i class="bi bi-person-check-fill me-1"></i>Admin Managed</span>
                                </div>

                                <div class="p-4 bg-light rounded border border-base mb-4">
                                    <div class="row g-3">
                                        <div class="col-6 text-center border-end">
                                            <div class="text-muted small fw-semibold">22K Gold (916)</div>
                                            <div class="h3 font-bold text-gold mt-1">₹ <?php echo $rate_22k; ?> / g</div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="text-muted small fw-semibold">24K Gold (Pure)</div>
                                            <div class="h3 font-bold text-gold mt-1">₹ <?php echo $rate_24k; ?> / g</div>
                                        </div>
                                    </div>
                                    <div class="text-center text-muted small mt-3 italic border-top pt-2">
                                        Last Updated: <?php echo $updated_at; ?>
                                    </div>
                                </div>

                                <div class="text-muted small mb-4">
                                    Popup Status: 
                                    <strong><?php echo $popup_settings['enabled'] ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>'; ?></strong>
                                    | Content Mode: 
                                    <strong><?php echo htmlspecialchars($popup_settings['mode']); ?></strong>
                                </div>

                                <a href="./Popups/Popups.php" class="btn btn-primary w-100"><i class="bi bi-sliders me-2"></i>Configure Rates & Popups</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quick Actions Navigation List -->
                    <div class="col-xl-6">
                        <div class="card shadow-sm border-0 h-full">
                            <div class="card-body">
                                <h3 class="card-title mb-4"><i class="bi bi-lightning-charge text-gold me-2"></i>Quick Navigation Panel</h3>
                                
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <a href="./CollectionItems/CollectionItems.php" class="btn btn-neutral w-100 text-start py-3 px-4 d-flex align-items-center">
                                            <i class="bi bi-gem text-magenta fs-5 me-3"></i>
                                            <div>
                                                <div class="font-bold">Collection Items</div>
                                                <span class="text-xs text-muted">Add necklaces, rings, bangles</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="./Trending_Collections/TrendingCollections.php" class="btn btn-neutral w-100 text-start py-3 px-4 d-flex align-items-center">
                                            <i class="bi bi-star-fill text-magenta fs-5 me-3"></i>
                                            <div>
                                                <div class="font-bold">Trending Sets</div>
                                                <span class="text-xs text-muted">Featured seasonal jewelry</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="./Faqs/Faqs.php" class="btn btn-neutral w-100 text-start py-3 px-4 d-flex align-items-center">
                                            <i class="bi bi-info-circle text-magenta fs-5 me-3"></i>
                                            <div>
                                                <div class="font-bold">FAQs Admin</div>
                                                <span class="text-xs text-muted">Edit business details & policies</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="./Social Media/Social_media.php" class="btn btn-neutral w-100 text-start py-3 px-4 d-flex align-items-center">
                                            <i class="bi bi-link-45deg text-magenta fs-5 me-3"></i>
                                            <div>
                                                <div class="font-bold">Social Links</div>
                                                <span class="text-xs text-muted">Update WhatsApp & Instagram</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </div>
    </div>
</body>

</html>
<?php $conn->close(); ?>