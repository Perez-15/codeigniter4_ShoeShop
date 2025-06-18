<?php
// The password you want to hash
$password = 'perez';

// Generate the hashed password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password so you can copy it and insert it into your database
echo 'Hashed Password: ' . $hashedPassword;
?>
