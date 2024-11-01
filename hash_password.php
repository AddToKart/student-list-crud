<?php
// This script generates a hashed password
$password = 'password123'; // The plain text password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword; // Output the hashed password
?>
