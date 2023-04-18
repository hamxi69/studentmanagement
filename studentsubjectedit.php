<?php
        session_start();
        $conn=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($conn,'multipletables');
            
        if(isset($_POST['Submit'])){
            $id=$_POST['Id_number'];
            $multi_Select=$_POST['selectsubject'];
            $query="SELECT studentid from studentsubject where id=$id";
            $hit=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($hit);
             

            if(!empty($multi_Select)){
                    //  echo" $subjectID";
                    $sql2="UPDATE `studentsubject` SET `subjectid`='$multi_Select' where id='$id'";
                    $hit_sql2=mysqli_query($conn,$sql2);
                    }
                if (mysqli_errno($conn)) {
                    echo("Error description: " . mysqli_error($conn));
                exit();
                }else{
                    
                $_SESSION['studentsubjectedit']="Student Subject Updated";             
                header("location:studentsubjectlst.php?sid=".$row['studentid']."");                
             }
                } 
            

