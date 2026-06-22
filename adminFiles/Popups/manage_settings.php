<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mode = (isset($_POST['mode']) && $_POST['mode'] === 'manual') ? 'manual' : 'automated';
    $enabled = (isset($_POST['enabled']) && $_POST['enabled'] == '1') ? true : false;
    
    $gold_22k = (isset($_POST['gold_22k'])) ? trim($_POST['gold_22k']) : '13,430';
    $gold_24k = (isset($_POST['gold_24k'])) ? trim($_POST['gold_24k']) : '14,651';

    $settingsFile = __DIR__ . '/popup_settings.json';
    $settings = [
        'mode' => $mode,
        'enabled' => $enabled,
        'gold_22k' => $gold_22k,
        'gold_24k' => $gold_24k,
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
