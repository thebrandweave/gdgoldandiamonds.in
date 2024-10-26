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
    $item_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM collection_items WHERE item_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $item_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Deletion successful
            header("Location: CollectionItems.php?message=Item deleted successfully");
            exit();
        } else {
            // Deletion failed
            header("Location: CollectionItems.php?error=Error deleting item: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: CollectionItems.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: CollectionItems.php?error=No item ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>