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
    $popup_id = $_GET['id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // First, get the popup image URL
        $select_sql = "SELECT popup_image_url FROM popups WHERE popup_id = ?";
        $select_stmt = $conn->prepare($select_sql);
        $select_stmt->bind_param("i", $popup_id);
        $select_stmt->execute();
        $result = $select_stmt->get_result();
        $row = $result->fetch_assoc();
        $image_url = $row['popup_image_url'];
        $select_stmt->close();

        // Then, delete the popup record
        $delete_sql = "DELETE FROM popups WHERE popup_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $popup_id);
        $delete_stmt->execute();

        // Check if a row was actually deleted
        if ($delete_stmt->affected_rows > 0) {
            // Deletion successful, now try to delete the image file
            $image_path = $_SERVER['DOCUMENT_ROOT'] . $image_url;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // Commit the transaction
            $conn->commit();

            header("Location: Popups.php?message=Popup deleted successfully");
            exit();
        } else {
            throw new Exception("No popup found with the provided ID");
        }

    } catch (Exception $e) {
        // An error occurred; rollback the transaction
        $conn->rollback();
        header("Location: Popups.php?error=Error deleting popup: " . $e->getMessage());
        exit();
    }

} else {
    // No ID provided
    header("Location: Popups.php?error=No popup ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>