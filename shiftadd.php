<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');

if(isset($_POST['addshiftname'])){
    $shift_name=$_POST['shiftname'];
    $is_active=isset($_POST['is_active']);
    if($is_active=="no"){
        $active=1;
      }else{
        $active=0;
      }
      $NewID="";
      $SQL_ID="SELECT MAX(id_shift)+1 AS NEWID FROM shiftname";
      $result=mysqli_query($conn, $SQL_ID);
      while($row =mysqli_fetch_assoc($result)){
        $NewID= $row['NEWID'];
      }
      if($NewID==0){
        $NewID=1;
      }
      $sql="INSERT INTO `shiftname` (`id_shift`,`ShiftName`, `IsActive`) VALUES ('$NewID','$shift_name','$active')";
        $query=mysqli_query($conn,$sql);
        if (mysqli_errno($conn)) {
      echo("Error description: " . mysqli_error($conn));
      exit();}
      else{
        $_SESSION['shiftadd']="New Shift Added";
        header("location:shiftlst.php");
      }
}








?>