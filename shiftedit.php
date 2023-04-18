<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');
if(isset($_POST['Submit'])){
    $Id_number=$_POST['Id_number'];
    $shift_name=$_POST['shiftname'];
    $is_active=isset($_POST['is_active']);
    if($is_active=="no"){
      $active=1;
    }else{
      $active=0;
    }

   $query ="UPDATE `shiftname` SET `ShiftName`='$shift_name',`IsActive`='$active'  where id_shift=$Id_number";
   $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['shiftedt']="Shift Updated Id is:<span style='color:black;'> ".$Id_number."</span>"; 
        header("location:shiftlst.php");
}
    
}

  


?>