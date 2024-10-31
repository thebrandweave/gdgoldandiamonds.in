<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!-- insert_Popups.php -->
<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $linkUrl = $_POST['link_url'];

    // Check if file was uploaded
    if (isset($_FILES["popup_image_url"]) && $_FILES["popup_image_url"]["error"] == 0) {
        // Handle the file upload
        $targetDir = "../uploadedFiles/Popups/";
        $targetFile = $targetDir . basename($_FILES["popup_image_url"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a real image
        $check = getimagesize($_FILES["popup_image_url"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (optional, set to 5MB in this example)
        if ($_FILES["popup_image_url"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Try to upload file
            if (move_uploaded_file($_FILES["popup_image_url"]["tmp_name"], $targetFile)) {
                // Insert into database
                $sql = "INSERT INTO popups (popup_image_url, title, link_url) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $targetFile, $title, $linkUrl); // sss: string, string, string

                if ($stmt->execute()) {
                    echo "New popup added successfully.";
                    header("Location: ./Popups.php");
                    exit;
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
    }
}

$conn->close();
?>
