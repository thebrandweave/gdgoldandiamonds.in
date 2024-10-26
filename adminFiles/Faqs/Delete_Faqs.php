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
    $faq_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM faqs WHERE faq_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $faq_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Check if a row was actually deleted
            if ($stmt->affected_rows > 0) {
                // Deletion successful
                header("Location: Faqs.php?message=FAQ deleted successfully");
                exit();
            } else {
                // No rows were deleted (ID might not exist)
                header("Location: Faqs.php?error=No FAQ found with the provided ID");
                exit();
            }
        } else {
            // Deletion failed
            header("Location: Faqs.php?error=Error deleting FAQ: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: Faqs.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: Faqs.php?error=No FAQ ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>