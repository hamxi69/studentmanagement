<?php
session_start();
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,'multipletables');
$err_gender=false;

if(isset($_POST['addstudent'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $className=$_POST['selectclass'];
        $shiftName=$_POST['selectShift'];
        $subject_Name=$_POST['selectsubject']; 
        $Gender=(isset($_POST['Gender']) ? $_POST['Gender'] : '');
        $is_active=isset($_POST['Is_Active']);
          
        if($is_active=="no"){
        $active=1;
      }else{
        $active=0;
      }
      ////////////// studentsubject db /////////////////////////////
      //$NEWSB_ID="";
     // $sb_sql="SELECT MAX(id)+1 AS NEWSB_ID FROM studentsubject";
     // $hit_query=mysqli_query($conn,$sb_sql);
     // while($row1=mysqli_fetch_assoc($hit_query)){
     //   $NEWSB_ID=$row1['NEWSB_ID'];
    //  }
     // if($NEWSB_ID==0){
    //    $NEWSB_ID=1;
   //   }
     
      ///////////////// for studentreg db//////////////
      $NEWID="";
      $SQL_ID="SELECT MAX(Student_id)+1 AS NEWID FROM studentregisteration";
      $result=mysqli_query($conn, $SQL_ID);
      while($row =mysqli_fetch_assoc($result)){
        $NEWID= $row['NEWID'];
      }
      if($NEWID==0){
        $NEWID=1;
      }
      ////////////////////////////////////////////////////////////////////////
      $sql="INSERT INTO studentregisteration (`Student_id`, `First Name`, `Last Name`, `DOB`, `Class_ID`, `Shift_ID`,`Gender`, `Is Active`) 
      VALUES ('$NEWID','$fname','$lname','$dob','$className','$shiftName','$Gender','$active')";
       $execute_quer=mysqli_query($conn,$sql);
     //////// for student subject ////////////////
     foreach($subject_Name as $subjectID){
      //  echo" $subjectID";
         $sql2="INSERT INTO studentsubject (`studentid`,`subjectid`) 
       VALUES ('$NEWID','$subjectID')";
        $hit_sql2=mysqli_query($conn,$sql2);
      }
      if (mysqli_errno($conn)) {
       echo("Error description: " . mysqli_error($conn));
      exit();
    }else{
     $_SESSION['status']= "Student Added Id Is:<span style='color:black;'> ".$NEWID."</span>";
       header("location:studentlst.php");
      }
  }
      ?>