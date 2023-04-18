<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');
if(isset($_POST['Submit'])){
    $id=$_POST['student_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $Class_Name=$_POST['selectclass'];
    $Shift_Name=$_POST['selectShift'];
    $Gender=(isset($_POST['Gender']) ? $_POST['Gender'] : '');
    $is_active=isset($_POST['Is_Active']);
  if($is_active=="no"){
    $active=1;
  }else{
    $active=0;
  }
  if(empty($Gender)){
    $conn->error;
  }
  $sql="UPDATE `studentregisteration` SET `First Name`='$fname',`Last Name`='$lname',`DOB`='$dob',`Class_ID`='$Class_Name',
  `Shift_ID`='$Shift_Name',`Gender`='$Gender',`Is Active`='$active' where Student_id=$id";
    $query_run=mysqli_query($conn,$sql);
    if (mysqli_errno($conn)) {
      echo("Error description: " . mysqli_error($conn));
     exit();
   }else{
    $_SESSION['editstatus']= "Student Updated Id is:<span style='color:black;'> ".$id."</span>";
      header("location:studentlst.php");
 }
      }





?>