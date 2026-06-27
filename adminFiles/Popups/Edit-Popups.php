<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

// Include database connection
include '../config.php';

// Check if id is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Popup ID is required");
}

$popup_id = $_GET['id'];

// Fetch the popup details
$sql = "SELECT * FROM popups WHERE popup_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $popup_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Popup not found");
}

$popup = $result->fetch_assoc();
$error = null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $linkUrl = isset($_POST['link_url']) ? trim($_POST['link_url']) : '';
    if ($linkUrl === '') {
        $linkUrl = './collections.php';
    }

    $image_url = $popup['popup_image_url'];
    $uploadOk = 1;

    // Check if a new file is uploaded
    if (isset($_FILES["popup_image_url"]) && $_FILES["popup_image_url"]["error"] == 0) {
        $targetDir = "../uploadedFiles/Popups/";
        $targetFile = $targetDir . basename($_FILES["popup_image_url"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a real image
        $check = getimagesize($_FILES["popup_image_url"]["tmp_name"]);
        if ($check === false) {
            $error = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (5MB max)
        if ($_FILES["popup_image_url"]["size"] > 5000000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["popup_image_url"]["tmp_name"], $targetFile)) {
                // Delete old image file if it exists, is different, and is on disk
                $old_image_path = __DIR__ . '/' . $popup['popup_image_url'];
                if ($popup['popup_image_url'] !== $targetFile && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
                $image_url = $targetFile;
            } else {
                $error = "Sorry, there was an error uploading your file.";
                $uploadOk = 0;
            }
        }
    }

    if ($uploadOk == 1) {
        // Update popup record in database
        $update_sql = "UPDATE popups SET title = ?, link_url = ?, popup_image_url = ? WHERE popup_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssi", $title, $linkUrl, $image_url, $popup_id);
        
        if ($update_stmt->execute()) {
            header("Location: Popups.php?status=settings_saved");
            exit();
        } else {
            $error = "Error updating popup: " . $conn->error;
        }
        $update_stmt->close();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Promotional Popup Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand Logo -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0 d-block text-center" href="../index.php">
                    <img src="../images/liyaslogo11-1.png" alt="Logo">
                </a>
                
                <!-- Collapse Navigation -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../Trending_Collections/TrendingCollections.php">
                                <i class="bi bi-bar-chart"></i> Trending Collections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Collections/Collections.php">
                                <i class="bi bi-chat"></i> Collections
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../CollectionItems/CollectionItems.php">
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
                        <li class="nav-item active">
                            <a class="nav-link active" href="../Popups/Popups.php">
                                <i class="bi bi-window-stack"></i> Popups
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
                            <a class="nav-link" href="../logout.php">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Main Content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center mb-4">
                            <div class="col-sm-6 col-12">
                                <h1 class="h2 mb-0 ls-tight">Edit Popup Banner</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid mt-5 px-lg-8">
                    <!-- Error Alert -->
                    <?php if ($error !== null): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow border-0 mb-7">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-semibold">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($popup['title']); ?>" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="link_url" class="form-label fw-semibold">Link URL (Optional)</label>
                                    <input type="text" class="form-control" id="link_url" name="link_url" value="<?php echo htmlspecialchars($popup['link_url']); ?>" placeholder="e.g. ./collections.php (default)">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold d-block">Current Image</label>
                                    <div class="mb-3">
                                        <a href="<?php echo htmlspecialchars($popup['popup_image_url']); ?>" target="_blank">
                                            <img src="<?php echo htmlspecialchars($popup['popup_image_url']); ?>" class="img-thumbnail rounded border" style="max-height: 180px; object-fit: contain;" alt="Current Popup Image">
                                        </a>
                                        <div class="form-text mt-1 text-muted small"><i class="bi bi-info-circle me-1"></i>Click the thumbnail to view the full-sized image in a new tab.</div>
                                    </div>
                                    <label for="popup_image_url" class="form-label fw-semibold">Change Image (Optional)</label>
                                    <input type="file" class="form-control" id="popup_image_url" name="popup_image_url">
                                    <div class="form-text">Leave this field blank to keep the current image.</div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4" style="background-color: var(--color-magenta); border-color: var(--color-magenta);"><i class="bi bi-save me-2"></i>Save Changes</button>
                                    <a href="Popups.php" class="btn btn-neutral px-4"><i class="bi bi-arrow-left me-2"></i>Cancel</a>
                                </div>
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
<?php $conn->close(); ?>
