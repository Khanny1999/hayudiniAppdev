<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hayudini";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT fullname FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($fullName);
    $stmt->fetch();
    echo "Login Successful|" . $fullName;
} else {
    echo "Login Failed. Check your email and password.";
}

$stmt->close();
$conn->close();
?>
