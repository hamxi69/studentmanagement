<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');
if(isset($_POST['Submit'])){
    $id=$_POST['Id_number'];
    $Subject_Name=$_POST['SubjectName'];
    $is_active=isset($_POST['is_active']);
    if($is_active=="no"){
      $active=1;
    }else{
      $active=0;
    }

   $query ="UPDATE `subjectname` SET `Subject Name`='$Subject_Name',`Is Active`='$active' where ID=$id";
   $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['subjectedit']= "Subject Updated Id Is:<span style='color:black;'> ".$id."</span>";
         header("location:subjectlst.php");
}

}

  


?>