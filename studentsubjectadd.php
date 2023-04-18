<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');

if(isset($_POST['addnewsubject'])){
    $id = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : '';
        if (empty($id)) {
    header("location:error.php");
    exit();
    }
    $selectSubject=(isset($_POST['newsubjectstudent']) ? $_POST['newsubjectstudent'] : '');
    if(isset($_GET['sid'])){
        $id1=$_GET['sid'];
    }
    if(!empty($selectSubject)){
         $sql="INSERT INTO studentsubject (`studentid`,`subjectid`) Values ('$id','$selectSubject')";
            $query=mysqli_query($conn,$sql);
            if($query){
                    $_SESSION['studentsubjectadd']="Added New Student Subject";
                    header("location:studentsubjectlst.php?sid=".$id."");
            } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            
            }


    }    

}







?>