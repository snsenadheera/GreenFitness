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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputted_student_id = $_POST['student_id'];
    $inputted_student_name = $_POST['student_name'];
    $inputted_password = $_POST['password']; 

    $sql = "SELECT student_password FROM students WHERE student_id = ? AND student_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $inputted_student_id, $inputted_student_name);
    $stmt->execute();
    $stmt->bind_result($stored_hashed_password);
    $stmt->fetch();

    if ($stored_hashed_password) {
        if (password_verify($inputted_password, $stored_hashed_password)) {
            $_SESSION['student_name'] = $inputted_student_name;
            $_SESSION['student_id'] = $inputted_student_id;
            header("Location: index.html");
            exit();
        } else {
            echo '<script>alert("Invalid password.");</script>';
        }
    } else {
        echo '<script>alert("Invalid student ID or name.");</script>';
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="loginjavascript.js" defer></script>
  <link rel="stylesheet" href="signupstyle.css">
  <title>Login</title>
</head>
<body>
    <div class="cont1">
        <h2>Login</h2>
        <form id="form" onsubmit="return Checkerror()" action="" method="post">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" id="student_id" required>
                <div class="errorcss" id="errorname">*Student ID cannot be empty.</div>
            </div>
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" name="student_name" id="student_name" required>
                <div class="errorcss" id="errorname">*Student Name cannot be empty.</div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <div class="errorcss" id="errorname">*Password cannot be empty.</div>
            </div>
            <button type="submit">Login</button><br>
            <button onclick="window.location.href='signup.html'"> Signup</button>
            <div class="login-message">If you don't have an account, please use the Sign Up button.</div>
        </form>
    </div>

    <footer class="footer">
    </footer>
</body>
</html>