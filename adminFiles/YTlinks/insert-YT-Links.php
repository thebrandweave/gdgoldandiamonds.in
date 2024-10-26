<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

?>
<?php
include("../config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the YouTube link from the form
    $ytLink = $_POST['yt_link']; 
    $sortOrder = $_POST['sort_order']; // Optional; defaults to 0 if not set

    // Prepare and bind the statement
    $sql = "INSERT INTO youtube_links (yt_link, sort_order) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $ytLink, $sortOrder); // "si" indicates string, int

    // Execute the statement
    if ($stmt->execute()) {
        echo "New YouTube link added successfully.";
        header("Location: ./YT-Links.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
