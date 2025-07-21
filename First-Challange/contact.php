<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'] ?? '';
    $email = $_POST['user_Email'] ?? '';
    $message = $_POST['user_Message'] ?? '';

    echo "User name is: $name <br>";
    echo "User email is: $email <br>";
    echo "User message is: $message <br>";
}
?>
