<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_name = $_POST['student_name'];
$student_id = $_POST['student_id'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO students (student_name, student_id, student_password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $student_name, $student_id, $hashed_password);

if ($stmt->execute() === TRUE) {
    
    $_SESSION['student_name'] = $student_name;
    $_SESSION['student_id'] = $student_id;
    $_SESSION['student_password'] = $hashed_password; 

    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>