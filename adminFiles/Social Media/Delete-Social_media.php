<?php
session_start(); 

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

?>
<?php
include("../config.php");

// Check if an ID was provided
if (isset($_GET['id'])) {
    $social_media_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM social_media_links WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $social_media_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Check if a row was actually deleted
            if ($stmt->affected_rows > 0) {
                // Deletion successful
                header("Location: Social_media.php?message=Social media link deleted successfully");
                exit();
            } else {
                // No rows were deleted (ID might not exist)
                header("Location: Social_media.php?error=No social media link found with the provided ID");
                exit();
            }
        } else {
            // Deletion failed
            header("Location: Social_media.php?error=Error deleting social media link: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: Social_media.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: Social_media.php?error=No social media link ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>