<?php
include("../config.php");

// Check if an ID was provided
if (isset($_GET['id'])) {
    $testimonial_id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM testimonials WHERE testimonial_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $testimonial_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Check if a row was actually deleted
            if ($stmt->affected_rows > 0) {
                // Deletion successful
                header("Location: Testimonials.php?message=Testimonial deleted successfully");
                exit();
            } else {
                // No rows were deleted (ID might not exist)
                header("Location: Testimonials.php?error=No testimonial found with the provided ID");
                exit();
            }
        } else {
            // Deletion failed
            header("Location: Testimonials.php?error=Error deleting testimonial: " . $conn->error);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        header("Location: Testimonials.php?error=Error preparing delete statement: " . $conn->error);
        exit();
    }

} else {
    // No ID provided
    header("Location: Testimonials.php?error=No testimonial ID provided for deletion");
    exit();
}

// Close connection
$conn->close();
?>