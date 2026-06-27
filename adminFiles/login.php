<?php
session_start(); // Start the session

// Include your database configuration file
require 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize and assign form input to variables
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists in the database
    $query = "SELECT id, fullname, email, password FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            // Fetch the result into variables
            $stmt->bind_result($id, $fetched_username, $fetched_email, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, create session variables
                $_SESSION['user_id'] = $id;
                $_SESSION['fullname'] = $fetched_username; // Store username in session
                $_SESSION['email'] = $fetched_email; // Store email in session

                // Redirect to a dashboard or another page
                header("Location: ./");
                exit;
            } else {
                // Password is incorrect
                echo "Invalid email or password.";
            }
        } else {
            // User not found
            echo "Invalid email or password.";
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Liyas Admin Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background: var(--bg-gradient-main);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <img src="./images/liyaslogo11-1.png" alt="Liyas Logo" style="max-height: 90px; object-fit: contain;">
                </div>
                <div class="card shadow-premium border-0" style="border-radius: 16px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="text-center mb-4 text-magenta fw-bold" style="font-family: var(--font-serif); font-size: 1.8rem;">Admin Login</h3>
                        
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                            <!-- Show error directly if login failed -->
                            <div class="alert alert-danger py-2 px-3 small mb-4" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> Invalid email or password.
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding: 12px !important;">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
