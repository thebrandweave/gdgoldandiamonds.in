<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "muhammedazlan11@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    // Email content
    $body = "
    <html>
    <head>
      <title>New Contact Form Submission</title>
    </head>
    <body>
      <h2>Contact Form Details</h2>
      <p><strong>Full Name:</strong> {$name}</p>
      <p><strong>Email:</strong> {$email}</p>
      <p><strong>Phone:</strong> {$phone}</p>
      <p><strong>Message:</strong> {$message}</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
        
    } else {
        echo "Failed to send message. Please try again.";
    }
}
?>
<script>
window.history.back();

</script>