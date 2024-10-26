<?php
include("./adminFiles/config.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Link Tree</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .link-tree-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .link-tree-item {
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="link-tree-container text-center">
    <h4>Follow Us</h4>
    <div class="link-tree-list">
        <?php
        // Database connection

        // Fetch social media links sorted by sort_order
        $sql = "SELECT platform_name, link_url FROM social_media_links ORDER BY sort_order";
        $result = $conn->query($sql);

        // Define icons for each platform
        $icons = [
            'facebook' => 'fab fa-facebook',
            'instagram' => 'fab fa-instagram',
            'youtube' => 'fab fa-youtube',
            'whatsapp' => 'fab fa-whatsapp'
        ];

        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                $platform = strtolower($row["platform_name"]);
                $iconClass = isset($icons[$platform]) ? $icons[$platform] : 'fas fa-link'; // default icon
                echo '<div class="link-tree-item">';
                echo '<a href="' . $row["link_url"] . '" target="_blank" class="btn btn-primary btn-block">';
                echo '<i class="' . $iconClass . '"></i> ' . ucfirst($platform);
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "<p>No social media links found.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
