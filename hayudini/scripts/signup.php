<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hayudini";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fname = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $conn->prepare("INSERT INTO users (fullname,email, password) VALUES ( ?, ?,?)");
$stmt->bind_param("sss", $fname, $email, $password);

if ($stmt->execute() === TRUE) {
    echo "You have Registered Successfully!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>