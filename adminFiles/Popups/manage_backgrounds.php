<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

$targetDir = "../uploadedFiles/gold_rate_backgrounds/";

// Create directory if not exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Handle Delete Action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['file'])) {
    $filename = basename($_GET['file']); // sanitize input
    $filePath = $targetDir . $filename;
    
    if (file_exists($filePath) && is_file($filePath)) {
        if (unlink($filePath)) {
            header("Location: ./Popups.php?status=delete_success");
            exit;
        } else {
            header("Location: ./Popups.php?status=delete_failed");
            exit;
        }
    } else {
        header("Location: ./Popups.php?status=file_not_found");
        exit;
    }
}

// Handle Upload Action
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["bg_image"])) {
    if ($_FILES["bg_image"]["error"] == 0) {
        $rawFilename = basename($_FILES["bg_image"]["name"]);
        $cleanFilename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $rawFilename);
        
        $tempName = pathinfo($cleanFilename, PATHINFO_FILENAME);
        $ext = strtolower(pathinfo($cleanFilename, PATHINFO_EXTENSION));
        $targetFile = $targetDir . $cleanFilename;
        
        // Prevent overwriting existing files
        $counter = 1;
        while (file_exists($targetFile)) {
            $cleanFilename = $tempName . '_' . $counter . '.' . $ext;
            $targetFile = $targetDir . $cleanFilename;
            $counter++;
        }

        // Validate image
        $check = getimagesize($_FILES["bg_image"]["tmp_name"]);
        if ($check === false) {
            header("Location: ./Popups.php?status=invalid_image");
            exit;
        }

        // Limit size to 5MB
        if ($_FILES["bg_image"]["size"] > 5000000) {
            header("Location: ./Popups.php?status=too_large");
            exit;
        }

        // Allow only typical image formats
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            header("Location: ./Popups.php?status=invalid_format");
            exit;
        }

        if (move_uploaded_file($_FILES["bg_image"]["tmp_name"], $targetFile)) {
            header("Location: ./Popups.php?status=upload_success");
            exit;
        } else {
            header("Location: ./Popups.php?status=upload_failed");
            exit;
        }
    } else {
        header("Location: ./Popups.php?status=upload_error");
        exit;
    }
}

header("Location: ./Popups.php");
exit;
?>
