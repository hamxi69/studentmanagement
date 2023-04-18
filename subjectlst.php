
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header("Location: userlogin.php");
  exit;
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "multipletables";
$conn = mysqli_connect("$servername", "$username", "$password", "$database");
$delete=false;
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    //delete query  
    $sql="DELETE from `subjectname` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $delete=true;
    }else{

        die(mysqli_error($conn));
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Subject List</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">School Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/hamza.webp" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$_SESSION['username']?></h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="usersprofile.php?uid=<?=$_SESSION['user_id']?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="usersprofile.php?uid=<?=$_SESSION['user_id']?>">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

  

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentlst.php">
              <i class="bi bi-circle"></i><span>Student List</span>
            </a>
          </li>
          <li>
            <a href="subjectlst.php">
              <i class="bi bi-circle"></i><span>Subject List</span>
            </a>
          </li>
          <li>
            <a href="classlst.php">
              <i class="bi bi-circle"></i><span>Class List</span>
            </a>
          </li>
          <li>
            <a href="shiftlst.php">
              <i class="bi bi-circle"></i><span>Shift List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Registeration Form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentnewadd.php" class="active">
              <i class="bi bi-circle"></i><span>Student Registeration</span>
            </a>
          </li>
         
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-heading">Pages</li>

<li class="nav-item">
  <a class="nav-link " href="usersprofile.php?uid=<?=$_SESSION['user_id']?>">
    <i class="bi bi-person"></i>
    <span>Profile</span>
  </a>
</li><!-- End Profile Page Nav -->


<li class="nav-item">
  <a class="nav-link collapsed" href="userreg.php">
    <i class="bi bi-card-list"></i>
    <span>Register</span>
  </a>
</li>
<li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>
      <!-- End Register Page Nav -->


     

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
<!------dialog modal icons-------->
 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  <symbol fill='red' id='bi-archive-fill' viewBox='0 0 16 16'>
  <path d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'  />
</symbol>
<symbol xmlns="http://www.w3.org/2000/svg" fill="green" id="bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</symbol>
</svg>
<!--------- End dialog modal icons --------->

<!--------- Delete msg--------->
<?php
  if($delete==true){
    echo "
          
          <div id='dltmsg' class='alert alert-danger align-items-center' style='float:right;'>
          <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='archive:'><use xlink:href='#bi-archive-fill'/></svg>

          <strong class='text-dark'> Subject Deleted ID is: ".$id."</strong>
          
          </div>";
          
          ?><script>
              function hideMessage() {
              document.getElementById("dltmsg").style.display = "none";
                    };
              setTimeout(hideMessage, 3000);
            </script><?php
  }
  ?>
<!--------- end Delete msg--------->

<!--------- Add dialog msg---------->
<?php
  if(isset($_SESSION['subjectadd'])){
    echo "<div id='msg' class='alert alert-success  align-items-center' style='float:right;'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <strong>".$_SESSION['subjectadd']."</strong>
            </div>";
           
            // echo  "<h4 id='msg' style='text-align:center; color:green;'>".$_SESSION['status']."</h4>";
            ?><script>
              function hideMessage() {
              document.getElementById("msg").style.display = "none";
                    };
              setTimeout(hideMessage, 3000);
            </script><?php
            unset($_SESSION['subjectadd']);
  }
  ?>

<!--------- end Add dialog msg---------->

<!--------- Edit dialog msg---------->

<?php
  if(isset($_SESSION['subjectedit'])){
    echo "<div id='edtstatus' class='alert alert-warning align-items-center' style='float:right;'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='pencil:'><use xlink:href='#bi-pencil-square'/></svg>
    <strong class='text-dark'>".$_SESSION['subjectedit']."</strong>
    
    </div>";
      // echo  "<h4 id='edtstatus' style='text-align:center; color:green;'>".$_SESSION['editstatus']."</h4>";
      ?><script>
      function hideMessage() {
      document.getElementById("edtstatus").style.display = "none";
            };
      setTimeout(hideMessage, 3000);
    </script><?php
      unset($_SESSION['subjectedit']);
  }
  ?>


<!--------- End Edit dialog msg---------->

  
  
  <div class="pagetitle">
      <h1>Subject Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
  <div class="card">
      <div class="card-body mt-3">
        <!-- Button trigger modal -->
  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addstudentmodal">
  ADD NEW SUBJECT
  </button>
  
 
  
  <div class="modal fade" id="addstudentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">ADD NEW SUBJECT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action ="subjectadd.php" method="POST">
        <input type="hidden" name="hiddenedit_id">
        <div class="modal-body row g-3">
      
      <div class="col-md-5">
    <label for="subjectname1" class="form-label" >Subject Name</label>
    <input type="text" class="form-control center"  name="subjectname" id="subjectname1" placeholder="Subject Name" required>

</div>
  <div class="form-check">
    <input class="center" name="is_active" id="is_active1" type="checkbox" value="" >
    <label class="form-check-label" for="is_active1">
      Is Active
    </label>
  </div> </br>
  <div class="col-md-12 ">
    <button type="submit" name="addsubjectname" class="btn btn-outline-primary ">Submit</button>
  </div>
      
      </div>
        </form>

      </div>
    </div>
  </div>
  </div>
   

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subject Data Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
                //select database data show in table    
                    $select_data="SELECT * FROM `subjectname`";
                    $result=mysqli_query($conn, $select_data);
                    while($row =mysqli_fetch_assoc($result)){ ?>
                    <tr>
                            <td scope='row'><?=$row['ID']?></td>
                            <td><?=$row['Subject Name']?></td>
                            <td><?php
                            if($row['Is Active']==1){
                                    echo "<span class='badge bg-success'>Active</span></td>";
                                  }else{
                                    echo "<span class='badge bg-danger'>In Active</span></td>";
                                  }
                                  
                                  
                                  ?></td>
                            <td>
                            <button class='editbtn btn btn-sm btn-dark tblbtn'><a href='#editmodal?editid=<?=$row['ID']?>' class='tb' style="color:white;" ><i class='bi bi-pencil-square'></i></a></button>
                            <button class='delete btn btn-sm btn-danger tblbtn' ><a href='?deleteid=<?=$row['ID']?>' class='tb' style="color:white;"><i class='bi bi-trash'></i></a></button>

                         </td>
                        </tr>
                   <?php 
                   }
                    ?>
  </tbody>
              </table>
              <button type="button" class="btn btn-md btn-danger"><a href="index.php" style='color:white;'>Cancel</a></button>

              <!-- End Default Table Example -->
            </div>
          </div>

      </div>
    </section>



    <!-------------------------------------------------EDIT FORM----------------------------------------------------------->

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Subject Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action ="subjectedit.php" method="POST">
        <input type="hidden" name="hiddenedit_id">
        <div class="modal-body row g-3">
    <input type="hidden" class="form-control"  name="Id_number" id="Id_number" placeholder="Id Number" readonly>
  <div class="col-md-6">
    <label  class="form-label" for="SubjectName">Subject Name:</label>
    <input type="text" class="form-control"  name="SubjectName" id="SubjectName" placeholder="Enter Subject Name" required>
  </div>
  <div class="form-check ">
    <input  name="is_active" id="is_active" type="checkbox" value="" >
    <label class="form-check-label" for="is_active">
      Is Active
    </label>
  </div> </br>
  <div class="col-md-12 ">
    <button type="submit" name="Submit" class="btn btn-outline-primary ">Submit</button>
  </div>
      </form>


      </div>
    </div>
  </div>





    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>WebDock</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">WebDock</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" ></script>
  <script>

$(document).ready(function() {
        $('.editbtn').on('click', function(){

            $('#editmodal').modal('show');
            $tr=$(this).closest('tr');
            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();
            console.log(data);

            $('#Id_number').val(data[0]);
            $('#SubjectName').val(data[1]);
            $('#is_active').attr('checked', false);
            if(data[2]=="Active")
            $('#is_active').attr('checked',true);
            });
});
  </script>
</body>

</html>