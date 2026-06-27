<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enabled = (isset($_POST['enabled']) && $_POST['enabled'] == '1') ? true : false;
    
    $settingsFile = __DIR__ . '/popup_settings.json';
    $settings = [
        'mode' => 'manual',
        'enabled' => $enabled,
        'last_updated' => time()
    ];

    if (file_put_contents($settingsFile, json_encode($settings, JSON_PRETTY_PRINT))) {
        header("Location: ./Popups.php?status=settings_saved");
        exit;
    } else {
        header("Location: ./Popups.php?status=settings_error");
        exit;
    }
} else {
    header("Location: ./Popups.php");
    exit;
}
?>
