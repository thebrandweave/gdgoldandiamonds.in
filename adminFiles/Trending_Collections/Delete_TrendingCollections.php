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
    $collection_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM trending_collections WHERE collection_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $collection_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Deletion successful
            header("Location: TrendingCollections.php?message=Trending collection deleted successfully");
            exit();
        } else {
            // Deletion failed
            header("Location: TrendingCollections.php?error=Error deleting trending collection: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: TrendingCollections.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: TrendingCollections.php?error=No trending collection ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>