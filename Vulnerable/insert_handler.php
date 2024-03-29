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

  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $blood_type = $_POST['blood_type'];
  $medical_condition = $_POST['medical_condition'];
  $date_of_admission = $_POST['date_of_admission'];
  $doctor = $_POST['doctor'];
  $insurance_provider = $_POST['insurance_provider'];
  $billing_amount = $_POST['billing_amount'];
  $room_number = $_POST['room_number'];
  $admission_type = $_POST['admission_type'];
  $discharge_date = $_POST['discharge_date'];
  $medication = $_POST['medication'];
  $test_results = $_POST['test_results'];


  $sql = "INSERT INTO vpatientsrecord (Name, Age, Gender, Blood_Type, Medical_Condition, Date_of_Admission, Doctor, Insurance_Provider, Billing_Amount, Room_Number, Admission_Type, Discharge_Date, Medication, Test_Results) VALUES ('$name', '$age', '$gender', '$blood_type', '$medical_condition', '$date_of_admission', '$doctor', '$insurance_provider', '$billing_amount', '$room_number', '$admission_type', '$discharge_date', '$medication', '$test_results')";
  echo $sql;

  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>