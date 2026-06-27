<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

// Load configurations
include("../config.php");

$settingsFile = __DIR__ . '/popup_settings.json';
$settings = [
    'mode' => 'automated',
    'enabled' => true
];
if (file_exists($settingsFile)) {
    $settings = json_decode(file_get_contents($settingsFile), true) ?: $settings;
}

// Get active manual gold rates from settings
$rates = get_live_gold_rates();
$rate_22k = isset($rates['gold_22k']) ? number_format($rates['gold_22k']) : '13,430';
$rate_24k = isset($rates['gold_24k']) ? number_format($rates['gold_24k']) : '14,651';
$updated_at = isset($rates['timestamp']) ? date('d M Y, h:i A', $rates['timestamp']) : date('d M Y, h:i A');

// Load backgrounds
$bg_dir = "../uploadedFiles/gold_rate_backgrounds/";
$bg_images = [];
if (file_exists($bg_dir) && is_dir($bg_dir)) {
    $files = glob($bg_dir . "*.{jpg,jpeg,png,webp}", GLOB_BRACE);
    if ($files) {
        foreach ($files as $file) {
            $bg_images[] = basename($file);
        }
    }
}

// Fallback to default files if folder is empty or not yet loaded
$fallback_images = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg'];
$display_images = !empty($bg_images) ? $bg_images : $fallback_images;
$selected_preview_bg = '';

if (!empty($bg_images)) {
    $selected_preview_bg = '../uploadedFiles/gold_rate_backgrounds/' . $bg_images[0];
} else {
    $selected_preview_bg = '../../images/backgrounds/' . $fallback_images[0];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Popups & Gold Rate Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .preview-container {
            border: 2px dashed #ccc;
            border-radius: 12px;
            padding: 20px;
            background: #f8f9fa;
            text-align: center;
        }
        /* Glassmorphism Popup Preview Styles */
        .gold-rate-popup-preview {
            position: relative;
            max-width: 360px;
            width: 100%;
            height: 480px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            border: 2px solid #E2C58A;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background-size: cover;
            background-position: center;
            text-align: left;
        }
        .gold-rate-popup-preview::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.75) 100%);
            z-index: 1;
        }
        .preview-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            color: #FAF6F0;
            z-index: 3;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            text-decoration: none;
            cursor: pointer;
        }
        .popup-preview-content {
            position: relative;
            z-index: 2;
            padding: 25px 20px;
            color: #FAF6F0;
        }
        .popup-preview-glass-card {
            background: rgba(184, 40, 95, 0.35); /* Magenta tinted glass */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 197, 138, 0.4); /* Gold border translucent */
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
        }
        .popup-preview-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #E2C58A; /* Gold color */
            margin-bottom: 5px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .popup-preview-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        .preview-rate-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 8px 0;
        }
        .preview-rate-row:last-child {
            border-bottom: none;
        }
        .preview-rate-label {
            font-weight: 600;
            font-size: 0.9rem;
        }
        .preview-rate-val {
            font-weight: 700;
            font-size: 1.1rem;
            color: #E2C58A;
        }
        .preview-timestamp {
            font-size: 0.75rem;
            opacity: 0.7;
            text-align: center;
            margin-top: 8px;
            font-style: italic;
        }
        .btn-preview-cta {
            background-color: #b8285f;
            color: #FAF6F0;
            border: 1px solid #E2C58A;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            display: block;
        }
        .btn-preview-cta:hover {
            background-color: #FAF6F0;
            color: #b8285f;
            border-color: #b8285f;
        }
        .bg-thumb-container {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 120px;
            border: 2px solid #ddd;
        }
        .bg-thumb-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .bg-thumb-delete {
            position: absolute;
            top: 5px;
            right: 5px;
            padding: 2px 6px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border-radius: 4px;
            border: none;
            font-size: 0.8rem;
            cursor: pointer;
        }
        .bg-thumb-badge {
            position: absolute;
            bottom: 5px;
            left: 5px;
            background: rgba(0, 0, 0, 0.7);
            color: #E2C58A;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0 d-block text-center" href="../index.php"><img src="../images/liyaslogo11-1.png" alt="Logo"></a>
                
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
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
                        <li class="nav-item active ">
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
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">

                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
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
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <h1 class="h2 mb-0 ls-tight">Popups Management</h1>
                            </div>
                        </div>
                        
                        <!-- Simplified Header Info -->
                        <span class="text-muted small">Configure promotional popups and banner advertisements displayed on homepage load.</span>
                    </div>
                </div>
            </header>

            <!-- Main Container -->
            <div class="container-fluid mt-5 px-lg-8">
                
                <!-- Status Alerts -->
                <?php if (isset($_GET['status'])): ?>
                    <div class="alert alert-dismissible fade show <?php 
                        if (strpos($_GET['status'], 'success') !== false || strpos($_GET['status'], 'saved') !== false) {
                            echo 'alert-success';
                        } else {
                            echo 'alert-danger';
                        }
                    ?>" role="alert">
                        <i class="bi <?php 
                            if (strpos($_GET['status'], 'success') !== false || strpos($_GET['status'], 'saved') !== false) {
                                echo 'bi-check-circle-fill';
                            } else {
                                echo 'bi-exclamation-triangle-fill';
                            }
                        ?> me-2"></i>
                        <?php
                            switch ($_GET['status']) {
                                case 'settings_saved':
                                    echo 'Popup settings successfully saved.';
                                    break;
                                case 'settings_error':
                                    echo 'Error: Failed to save popup settings.';
                                    break;
                                default:
                                    echo 'Operation completed.';
                            }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Configuration Card -->
                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-body">
                        <h3 class="card-title mb-3 text-magenta"><i class="bi bi-gear me-2"></i>Popup Display Configuration</h3>
                        <form action="manage_settings.php" method="POST">
                            <div class="mb-4">
                                <label class="form-label d-block fw-semibold mb-2">Display State</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="enabledSwitch" name="enabled" value="1" <?php echo $settings['enabled'] ? 'checked' : ''; ?>>
                                    <label class="form-check-label text-dark fw-medium" for="enabledSwitch">Enable promotional popup banner on homepage</label>
                                </div>
                                <div class="form-text mt-2 text-muted">When enabled, the latest active banner uploaded below will display automatically to visitors on page load.</div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4" style="background-color: var(--color-magenta); border-color: var(--color-magenta);"><i class="bi bi-save me-2"></i>Save Configuration</button>
                        </form>
                    </div>
                </div>

                <!-- Manual Popups List Card -->
                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0 text-magenta"><i class="bi-card-image me-2"></i>Promotional Popup Banners</h3>
                            <a href="./Add-Popups.php" class="btn btn-primary btn-sm" style="background-color: var(--color-magenta); border-color: var(--color-magenta);"><i class="bi bi-plus-lg me-1"></i>Add New Banner</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>Banner ID</th>
                                        <th>Image Preview</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Re-fetch all popups from the database
                                    $sql = "SELECT * FROM popups ORDER BY created_at DESC";
                                    $result = $conn->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>" . htmlspecialchars($row['popup_id']) . "</td>
                                                 <td>
    <img src='" . htmlspecialchars($row['popup_image_url']) . "'
         class='rounded border preview-img'
         style='width:70px;height:70px;object-fit:cover;cursor:pointer;transition:transform .2s;'
         onmouseover='this.style.transform=\"scale(1.05)\"'
         onmouseout='this.style.transform=\"scale(1)\"'
         data-bs-toggle='modal'
         data-bs-target='#imagePreviewModal'
         data-img='" . htmlspecialchars($row['popup_image_url']) . "'
         alt='Popup image'>
</td>
                                                    <td><strong class='text-dark'>" . htmlspecialchars($row['title']) . "</strong></td>
                                                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                                                    <td>
                                                        <a href='Edit-Popups.php?id=" . $row['popup_id']  . "' class='btn d-inline-flex btn-sm btn-neutral border-base mx-1'>
                                                            <span class='pe-2'>
                                                                <i class='bi bi-pencil'></i>
                                                            </span>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a href='Delete_Popups.php?id=" . $row['popup_id']  . "' onclick='return confirm(\"Are you sure you want to delete this popup?\")' class='btn d-inline-flex btn-sm btn-danger border-base mx-1'>
                                                            <span class='pe-2'>
                                                                <i class='bi bi-trash'></i>
                                                            </span>
                                                            <span>Delete</span>
                                                        </a>
                                                    </td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center py-4'>No custom promotional banners found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer bootstrap bundles -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </div>
    </div>
    <!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1">
<div class="modal-dialog modal-dialog-centered modal-md" style="max-width:500px;">
                <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

           <div class="modal-body text-center p-2">
    <img id="previewImage"
         src=""
         class="img-fluid rounded"
         style="max-height:450px; max-width:100%; object-fit:contain;">
</div>
        </div>
    </div>
</div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("imagePreviewModal");

    modal.addEventListener("show.bs.modal", function (event) {
        const img = event.relatedTarget;
        const imageUrl = img.getAttribute("data-img");

        document.getElementById("previewImage").src = imageUrl;
    });
});
</script>
<?php $conn->close(); ?>
</html>