<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');

if(isset($_POST['addclassname'])){
    $class_name=$_POST['classname'];
    $is_active=isset($_POST['is_active']);
    if($is_active=="no"){
        $active=1;
      }else{
        $active=0;
      }
      $NewID="";
      $SQL_ID="SELECT MAX(ID)+1 AS NEWID FROM classname";
      $result=mysqli_query($conn, $SQL_ID);
      while($row =mysqli_fetch_assoc($result)){
        $NewID= $row['NEWID'];
      }
      if($NewID==0){
        $NewID=1;
      }
      $sql="INSERT INTO `classname` (`ID`,`ClassName`, `Is Active`) VALUES ('$NewID','$class_name','$active')";
        $query=mysqli_query($conn,$sql);
        if (mysqli_errno($conn)) {
      echo("Error description: " . mysqli_error($conn));
      exit();}
      else{
        $_SESSION['classadd']="New Class Added";
        header("location:classlst.php");
      }
}








?>