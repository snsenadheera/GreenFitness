<?php
session_start();
if (!isset($_SESSION['student_name']) || !isset($_SESSION['student_id'])) {
    header("Location: signup.html");
    exit();
}

$student_name = $_SESSION['student_name'];
$student_id = $_SESSION['student_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Member Profile</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <header class="header">
    <a href="index.html" class="logo">
        <img src="icons8-dumbbell-100.png" alt="Logo" class="logo-icon">
        <span class="logo-text">
          <span class="green">GREEN</span>
          <span class="blue">FITNESS</span>
        </span>
      </a>
      <nav class="nav">
        <a href="index.html" class="nav-link">Home</a>
        <a href="about.html" class="nav-link">About Us</a>
        <a href="membership.html" class="nav-link">Memberships</a>
        <a href="trainers.html" class="nav-link">Trainers</a>
        <a href="shedule.html" class="nav-link">Schedule</a>
        <a href="profile.php" class="profile-icon">
          <img src="user(3).png" alt="Profile">
        </a>
      </nav>
    </header>

    <style>
         body {
        font-family: 'Inter', sans-serif;
        background-color: #000000;
        color: #9DBA9A;
        margin: 0;
        padding: 0;
      }

      .profile-container {
        width: 30%;
        margin: 50px auto;
        background: #121212;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);

      }

      .profile-header {
        display: none; 
      }

      .profile-photo {
        margin: 0 auto;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #9DBA9A;
      }

      .member-info{
        margin: 0;
        font-size: 24px;
        color: #2F9755;
        text-align:center;
        align-items: center;
        padding-bottom: 30px;
      }

      .member-info p {
        margin: 5px 0;
        color: #9DBA9A;
      }

      h2 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #2F9755;
      }

      p {
        margin: 5px 0;
        color: #9DBA9A;
      }

      button {
        background-color: #2F9755;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }

      button:hover {
        background-color: #218838;
      }

      .member-details {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align:center;
      }

      .member-details li {
        margin-bottom: 10px;
      }
    </style>

    <div class="profile-container">
      <h2 class="member-info">Member Details</h2>
      <ul class="member-details">
        <li>Name: <?php echo htmlspecialchars($student_name); ?></li>
        <li>Student ID: <?php echo htmlspecialchars($student_id); ?></li>
        <li>Card Balance: Rs.1000.00</li>
      </ul>
    </div>
    

    <footer class="footer">
      <p>&copy; 2024 GREEN FITNESS. All rights reserved.</p>
      <p>Email: <a href="mailto:contact@greenfitness.com" class="footer-link">contact@greenfitness.com</a></p>
    </footer>
  </div>
</body>
</html>