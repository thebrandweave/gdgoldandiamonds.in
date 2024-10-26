<?php
include("./adminFiles/config.php");
$item_id = intval($_GET['item_id']);

// Fetch the item details for the specific item_id
$item_sql = "SELECT item_name, item_image_url FROM collection_items WHERE item_id = $item_id LIMIT 1";
$item_result = $conn->query($item_sql);

// Initialize variables for title and favicon URL
$title = "Item Not Found";
$favicon_url = "";

if ($item_result->num_rows > 0) {
    $row = $item_result->fetch_assoc();
    $title = htmlspecialchars($row['item_name']);
    $favicon_url = "./adminFiles/CollectionItems/" . htmlspecialchars($row['item_image_url']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php if ($favicon_url): ?>
        <link rel="icon" type="image/png" href="<?php echo $favicon_url; ?>">
    <?php endif; ?>
</head>
<body>
</body>
</html>
