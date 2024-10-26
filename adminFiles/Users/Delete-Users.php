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
    $user_id = $_GET['id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Prepare the SQL statement to delete the user
        $delete_user_sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($delete_user_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        // If we've made it this far without errors, commit the transaction
        $conn->commit();

        // Redirect with success message
        header("Location: Users.php?message=User deleted successfully");
        exit();

    } catch (Exception $e) {
        // An error occurred; rollback the transaction
        $conn->rollback();
        header("Location: Users.php?error=Error deleting user: " . urlencode($e->getMessage()));
        exit();
    }

} else {
    // No ID provided
    header("Location: Users.php?error=No user ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>
