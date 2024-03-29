<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "hospitalserver";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM administrator WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $username, $password);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  header("Location: insert_page.html");
  exit();
} else {
  header("Location: login.php?error=1");
  exit();
}

$stmt->close();
$conn->close();
?>
