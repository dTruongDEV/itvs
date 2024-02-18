<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Process and store the data in your database or send it to your email list.
    // Example: Save to a text file with email and timestamp
    $data = "Email: $email\nTime: " . date('Y-m-d H:i:s') . "\n\n";

    // Save to subscribers.txt
    file_put_contents("../subscribers.txt", $data, FILE_APPEND);

    // Respond with a JSON message indicating success
    echo json_encode(array("success" => true, "message" => "Thanks for Subscribing to Our Newsletter."));
    exit();
} else {
    // Respond with a JSON message indicating failure
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
    exit();
}
?>
