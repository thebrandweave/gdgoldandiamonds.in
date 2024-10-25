<?php
include("../config.php");

// Check if an ID was provided
if (isset($_GET['id'])) {
    $link_id = $_GET['id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Prepare the SQL statement to delete the YouTube link
        $delete_link_sql = "DELETE FROM youtube_links WHERE id = ?";
        $stmt = $conn->prepare($delete_link_sql);
        $stmt->bind_param("i", $link_id);
        $stmt->execute();
        $stmt->close();

        // If we've made it this far without errors, commit the transaction
        $conn->commit();

        // Redirect with success message
        header("Location: YT-Links.php");
        exit();

    } catch (Exception $e) {
        // An error occurred; rollback the transaction
        $conn->rollback();
        header("Location: YT-Links.php.php " . $e->getMessage());
        exit();
    }

} else {
    // No ID provided
    header("Location: YT-Links.php.php");
    exit();
}

// Close connection
$conn->close();
?>
