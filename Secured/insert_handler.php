<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitalserver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "INSERT INTO spatientsrecord (Name, Age, Gender, Blood_Type, Medical_Condition, Date_of_Admission, Doctor, Insurance_Provider, Billing_Amount, Room_Number, Admission_Type, Discharge_Date, Medication, Test_Results) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


  $stmt = $conn->prepare($sql);


  $stmt->bind_param("sissssssdississ", $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['blood_type'], $_POST['medical_condition'], $_POST['date_of_admission'], $_POST['doctor'], $_POST['insurance_provider'], $_POST['billing_amount'], $_POST['room_number'], $_POST['admission_type'], $_POST['discharge_date'], $_POST['medication'], $_POST['test_results']);


  if ($stmt->execute()) {
    echo "Record inserted successfully";
  } else {
    echo "Error: " . $stmt->error;
  }


  $stmt->close();
}


$conn->close();
?>
