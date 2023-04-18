<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "multipletables";
$conn = mysqli_connect("$servername", "$username", "$password", "$database");

if (isset($_POST['search'])) {
  $search_id = $_POST['search_id'];
  $s_t_i = intval($search_id);
  $sql_search = "SELECT * from studentsubject";

  $query_search = mysqli_query($conn, $sql_search);
  $match_found = false;
  if (mysqli_num_rows($query_search) > 0) {
    foreach ($query_search as $search) {
      $id = $search['studentid'];
      if ($s_t_i == $id) {
        $match_found = true;
        header("location:studentsubjectlst.php?sid=" . $s_t_i . "");
      }
    }
  }
  if (!$match_found) {
    header("location:studentsubjectlst.php?error=no_match");
  }
}

    ?>
    
    
    
    
    
