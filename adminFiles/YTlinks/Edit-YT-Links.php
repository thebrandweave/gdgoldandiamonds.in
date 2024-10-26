<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

?>
<?php
// Include database connection
include '../config.php';

// Check if id is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("YouTube Link ID is required");
}

$youtube_id = $_GET['id'];

// Fetch the YouTube link details
$sql = "SELECT * FROM youtube_links WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $youtube_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("YouTube link not found");
}

$youtube_link = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yt_link = $_POST['yt_link'];
    $sort_order = $_POST['sort_order'];

    // Update the YouTube link in the database
    $update_sql = "UPDATE youtube_links SET yt_link = ?, sort_order = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sii", $yt_link, $sort_order, $youtube_id);
    
    if ($update_stmt->execute()) {
        // Redirect to the YouTube links list page after successful update
        header("Location: YT-Links.php");
        exit();
    } else {
        die("Error updating YouTube link: " . $conn->error);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit YouTube Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <img src="../images/gdlogo.png" alt="...">
                    GD Gold & Diamonds
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <div class="dropdown">
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Billing</a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active" href="../index.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="../Trending_Collections/TrendingCollections.php">
                            <i class="bi bi-bar-chart"></i> Trending Collections
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="../Collections/Collections.php">
                            <i class="bi bi-chat"></i> Collections
                            <!-- <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../CollectionItems/CollectionItems.php">
                            <i class="bi bi-bookmarks"></i> Collection Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Testimonials/Testimonials.php">
                            <i class="bi bi-people"></i> Testimonials
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Social Media/Social_media.php">
                            <i class="bi bi-people"></i> Social Media Links
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Popups/Popups.php">
                            <i class="bi bi-people"></i> Popups
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../Subscribers/Subscribers.php">
                            <i class="bi bi-people"></i> Subscribers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Faqs/Faqs.php">
                            <i class="bi bi-people"></i> Faqs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Users/Users.php">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                </ul>
                    <hr class="navbar-divider my-5 opacity-20">
                    <div class="mt-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <h1 class="h2 mb-0 ls-tight">Edit YouTube Link</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="ytLink" class="form-label">YouTube Link</label>
                                    <input type="url" class="form-control" id="ytLink" name="yt_link" value="<?php echo htmlspecialchars($youtube_link['yt_link']); ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="sortOrder" class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" id="sortOrder" name="sort_order" value="<?php echo htmlspecialchars($youtube_link['sort_order']); ?>" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update YouTube Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
