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

    // Start transaction
    $conn->begin_transaction();

    try {
        // First, delete all items associated with this collection
        $delete_items_sql = "DELETE FROM collection_items WHERE collection_id = ?";
        $stmt = $conn->prepare($delete_items_sql);
        $stmt->bind_param("i", $collection_id);
        $stmt->execute();
        $stmt->close();

        // Then, delete the collection itself
        $delete_collection_sql = "DELETE FROM collections WHERE collection_id = ?";
        $stmt = $conn->prepare($delete_collection_sql);
        $stmt->bind_param("i", $collection_id);
        $stmt->execute();
        $stmt->close();

        // If we've made it this far without errors, commit the transaction
        $conn->commit();

        // Redirect with success message
        header("Location: Collections.php?message=Collection and its items deleted successfully");
        exit();

    } catch (Exception $e) {
        // An error occurred; rollback the transaction
        $conn->rollback();
        header("Location: Collections.php?error=Error deleting collection: " . $e->getMessage());
        exit();
    }

} else {
    // No ID provided
    header("Location: Collections.php?error=No collection ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>