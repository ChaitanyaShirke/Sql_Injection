<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitalserver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['pname'], $_POST['patient_id'])) {
  $name = trim($_POST['pname']);
  $patient_id = trim($_POST['patient_id']);


  $stmt = $conn->prepare("SELECT * FROM spatientsrecord WHERE Name = ? AND patient_id = ?");
  

  $stmt->bind_param("si", $name, $patient_id);


  $stmt->execute();


  $result = $stmt->get_result();

  if ($result->num_rows > 0) {

    echo "<table id='results-table'>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Blood Type</th>
                <th>Medical Condition</th>
                <th>Date of Admission</th>
                <th>Doctor</th>
                <th>Insurance Provider</th>
                <th>Billing Amount</th>
                <th>Room Number</th>
                <th>Admission Type</th>
                <th>Discharge Date</th>
                <th>Medication</th>
                <th>Test Results</th>
              </tr>
            </thead>
            <tbody>";

    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>" . $row["patient_id"] . "</td>
              <td>" . $row["Name"] . "</td>
              <td>" . $row["Age"] . "</td>
              <td>" . $row["Gender"] . "</td>
              <td>" . $row["Blood_Type"] . "</td>
              <td>" . $row["Medical_Condition"] . "</td>
              <td>" . $row["Date_of_Admission"] . "</td>
              <td>" . $row["Doctor"] . "</td>
              <td>" . $row["Insurance_Provider"] . "</td>
              <td>" . $row["Billing_Amount"] . "</td>
              <td>" . $row["Room_Number"] . "</td>
              <td>" . $row["Admission_Type"] . "</td>
              <td>" . $row["Discharge_Date"] . "</td>
              <td>" . $row["Medication"] . "</td>
              <td>" . $row["Test_Results"] . "</td>
            </tr>";
    }
    echo "</tbody></table>";
  } else {
    echo "<p style='color:red; font-weight:bold;'>No records found for the provided parameters. Please double-check the Patient name and Patient ID.</p>";
  }


  $stmt->close();
} else {
  echo "<p style='color:red; font-weight:bold;'>Invalid credentials. Please provide valid Patient name and Patient ID.</p>";
}


$conn->close();
?>
