<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "multipletables";
$conn = mysqli_connect("$servername", "$username", "$password", "$database");
  $studentId = $_POST['studentId'];

  $query = "SELECT * FROM studentsubject WHERE studentid = $studentId";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    echo "found";
  } else {
    echo "not found";
  }
?>