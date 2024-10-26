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
    $subscriber_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM subscribers WHERE subscriber_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $subscriber_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Check if a row was actually deleted
            if ($stmt->affected_rows > 0) {
                // Deletion successful
                header("Location: Subscribers.php?message=Subscriber deleted successfully");
                exit();
            } else {
                // No rows were deleted (ID might not exist)
                header("Location: Subscribers.php?error=No subscriber found with the provided ID");
                exit();
            }
        } else {
            // Deletion failed
            header("Location: Subscribers.php?error=Error deleting subscriber: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: Subscribers.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: Subscribers.php?error=No subscriber ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>