<?php
// Function to clean inputs
function clean_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

// Collect and validate data
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // First Name
  $fname = clean_input($_POST['fname']);
  if (empty($fname) || !preg_match("/^[a-zA-Z ]+$/", $fname)) {
    $errors[] = "First name is required and must contain only letters.";
  }

  // Last Name
  $lname = clean_input($_POST['lname']);
  if (empty($lname) || !preg_match("/^[a-zA-Z ]+$/", $lname)) {
    $errors[] = "Last name is required and must contain only letters.";
  }
  // Age
  $age = clean_input($_POST['age']);
  if (empty($age)) {
  $errors[] = "Age is required.";
  } elseif (!is_numeric($age) || $age < 3 || $age > 40) {
  $errors[] = "Please enter a valid age between 3 and 40.";
  }


  // Address
  $address = clean_input($_POST['address']);
  if (empty($address)) {
    $errors[] = "Address is required.";
  }

  // Phone
  $phone = clean_input($_POST['phone']);
  if (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
    $errors[] = "Enter a valid 10-digit Indian phone number.";
  }

  // Email
  $email = clean_input($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  // Password
  $password = clean_input($_POST['password']);
  if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
  }

  // Show result
  if (count($errors) > 0) {
    echo "<h3 style='color: red;'>Form Errors:</h3><ul>";
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul><a href='index.html'>Go back</a>";
  } else {
    echo "<h3 style='color: green;'>Form Submitted Successfully!</h3>";
    echo "<p><strong>Name:</strong> $fname $lname</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Email:</strong> $email</p>";
   
  }
}
?>
