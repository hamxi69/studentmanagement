<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');
if(isset($_POST['Submit'])){
    $Id_number=$_POST['Id_number'];
    $class_name=$_POST['classname'];
    $is_active=isset($_POST['is_active']);
    if($is_active=="no"){
      $active=1;
    }else{
      $active=0;
    }

   $query ="UPDATE `classname` SET `ClassName`='$class_name',`Is Active`='$active' where ID=$Id_number ";
   $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['classedit']="Class Updated Id is:<span style='color:black;'> ".$Id_number."</span>";       
        header("location:classlst.php");
}
    
}

  


?>