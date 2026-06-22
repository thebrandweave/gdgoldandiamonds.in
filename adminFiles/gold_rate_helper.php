<?php
/**
 * Utility function to fetch live gold rates from public keyless APIs
 * and cache them locally in a JSON file to prevent rate limits and load latency.
 */
function get_live_gold_rates($ignore_overrides = false) {
    $settingsFile = __DIR__ . '/Popups/popup_settings.json';
    
    // Default fallback rates
    $rates = [
        "gold_22k" => 13430,
        "gold_24k" => 14651,
        "timestamp" => time()
    ];
    
    if (file_exists($settingsFile)) {
        $settings = json_decode(file_get_contents($settingsFile), true);
        if ($settings) {
            if (isset($settings['gold_22k']) && trim($settings['gold_22k']) !== '') {
                $rates['gold_22k'] = floatval($settings['gold_22k']);
            }
            if (isset($settings['gold_24k']) && trim($settings['gold_24k']) !== '') {
                $rates['gold_24k'] = floatval($settings['gold_24k']);
            }
            if (isset($settings['last_updated'])) {
                $rates['timestamp'] = intval($settings['last_updated']);
            }
        }
    }
    
    return $rates;
}
?>
