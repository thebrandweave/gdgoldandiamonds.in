<?php 
$host = $_SERVER['HTTP_HOST'];

if (strpos($host, 'liyasgoldanddiamonds.com') !== false) {
    // If the URL contains 'gdgoldanddiamonds.in', use this connection
    $conn = new mysqli("localhost", "u232955123_brandweave24", "Brandweave@24", "u232955123_liyasdiamond");
    // echo "this is in server";

} else {
    // Otherwise, use this connection
    $conn = new mysqli("localhost", "root", "", "gd-gold");
    // echo "this is in local host";

}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

?>
