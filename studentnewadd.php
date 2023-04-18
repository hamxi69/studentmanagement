<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = 'multipletables';
  $conn = mysqli_connect($servername, $username, $password,$database);
  $msg=false;
  $err_Class=false;
  $err_shift=false;

  if(isset($_POST['Submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $Class_Name=(isset($_POST['selectclass']) ? $_POST['selectclass'] : '');
    $Shift_Name=(isset($_POST['selectshift']) ? $_POST['selectshift'] : '');
    $subject_Name=(isset($_POST['selectsubject']) ? $_POST['selectsubject'] : '');
    $Gender=(isset($_POST['Gender']) ? $_POST['Gender'] : '');
    $is_active=isset($_POST['Is_Active']);
    if($is_active=="no"){
      $active=1;
    }else{
      $active=0;
    }
    if(empty($Class_Name)){
      $err_Class=true;
    }elseif(empty($Shift_Name)){
      $err_shift=true;
    }else{
    $NEW_ID="";
    $sql_id="SELECT MAX(Student_id)+1 AS NEWID From studentregisteration";
    $result=mysqli_query($conn, $sql_id);
    while($row=mysqli_fetch_assoc($result)){
      $NEW_ID=$row['NEWID'];
    }
    if($NEW_ID==0){
      $NEW_ID=1;
    }
    foreach($subject_Name as $subjectID){
      //  echo" $subjectID";
         $sql2="INSERT INTO studentsubject (`studentid`,`subjectid`) 
       VALUES ('$NEW_ID','$subjectID')";
        $hit_sql2=mysqli_query($conn,$sql2);
      }
    $sql="INSERT INTO studentregisteration (`Student_id`, `First Name`, `Last Name`, `DOB`, `Class_ID`, `Shift_ID`, `Gender`, `Is Active`) 
    VALUES ('$NEW_ID','$fname','$lname','$dob','$Class_Name','$Shift_Name','$Gender','$active')";
    $execute_quer=mysqli_query($conn,$sql);
   if (mysqli_errno($conn)) {
       echo("Error description: " . mysqli_error($conn));
      exit();
    }else{
      $_SESSION['indexstudent']="Student Add Id Is:<span style='color:black;'> ".$NEW_ID."</span>";
       header("location:studentlst.php");
      }
  }
    //if (mysqli_errno($conn)) {
    // echo("Error description: " . mysqli_error($conn));
    //  exit();
  // }else{
    // $msg=true;
    // 
    }









  ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Registeration Form</title>
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
        <input type="search" name="query" placeholder="Search" title="Enter search keyword">
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
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentlst.php" class="active">
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
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Registeration Form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentnewadd.php">
              <i class="bi bi-circle"></i><span>Student Registeration Form</span>
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

    <div class="pagetitle">
      <h1>Student Registeration Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admission Form</h5>

              <!-- General Form Elements -->
              <form action="" method="post" onsubmit="return validateForm()">
                <div class="row mb-3">
                  <label for="inputfname" class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="inputfname"  name="fname" class="form-control" placeholder="Enter First Name" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputlname" class="col-sm-2 col-form-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="inputlname" name="lname" class="form-control" placeholder="Enter Last Name" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="dob" id="inputDate" class="form-control" onchange="validateDOB()">
                    <div id="errorMessage" style="color:red;"></div>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Gender" id="gridRadios1" value="Male" >
                      <label class="form-check-label" for="gridRadios1">
                                  Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="Gender" id="gridRadios2" value="Female">
                      <label class="form-check-label" for="gridRadios2">
                        Female
                      </label>
                    </div>
                    
                  </div>
                </fieldset>
  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="class">Class</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="class" name="selectclass" aria-label="Default select example">
                      <option selected disabled value="">Open this select menu</option>
                     <?php
                     $sql_class = "SELECT * FROM `classname`";
                     $allClass=mysqli_query($conn,$sql_class);
                     while($row =mysqli_fetch_assoc($allClass)):;
                     ?>
                       <option value="<?php echo $row['ID'] ?>">
                       <?php
                       echo $row['ClassName'];
                       ?>
                     </option>
                     <?php
                     endwhile;
                     ?>
                    </select>
                    <?php
                    if($err_Class==true){
                      echo "<p style='color:red;'>Please Select Class</p>";
                    }
                    ?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="shift">Shift</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="shift" name="selectshift" aria-label="Default select example" >
                      <option selected disabled value="">Open this select menu</option>
                      <?php
                        $sql_class = "SELECT * FROM `shiftname`";
                        $allClass=mysqli_query($conn,$sql_class);
                        while($row =mysqli_fetch_assoc($allClass)):;
                        ?>
                      <option value="<?php echo $row['id_shift'] ?>" >
                      <?php
                        echo $row['ShiftName'];
                            ?>
        </option>
        <?php
        endwhile;
        ?>
                    </select>
                    <?php
                            if($err_shift==true){
                              echo "<p style='color:red;'>Please Select Shift</p>";
                            }
                    ?>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="subject">Subjects</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="subject" name="selectsubject[]" multiple aria-label="multiple select example">
                      <option  value=""  disabled >Please Select Subject</option>
                      <?php
                        $sql_subject="SELECT * FROM subjectname";
                          $all_subject=mysqli_query($conn,$sql_subject);
                          if(mysqli_num_rows($all_subject)>0){
                                foreach($all_subject as $row){
                              ?> 
                            <option value="<?php echo $row['ID'] ?>">
                      <?php
                        echo $row['Subject Name'];
                            ?>
                           </option>
                           <?php
                               }
                                 }
                  ?>
  
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-form-label col-sm-2 pt-0" for="gridCheck1">Is Active</label>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" name="Is_Active" type="checkbox" id="gridCheck1">
                      
                    </div><br/>


                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" id="submit-button" name="Submit" class="btn btn-dark">Submit Form</button>
                    <button type="button" class="btn btn-md btn-danger"><a href="studentlst.php" style='color:white;'>Cancel</a></button>

                  </div>
                </div>
              </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

       
    </section>

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
      Designed by <a href="#">Webdock</a>
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
<script>

function validateForm() {
  let isValid = true;
  const inputs = document.querySelectorAll("input, select");
  //const dobInput = document.querySelector("#inputDate");
  const radioButtons = document.querySelectorAll("input[type='radio']");

  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].type === "search") {
      continue;
    }
    inputs[i].style.borderColor = "";
    inputs[i].addEventListener("input", function () {
      const errorMsg = this.parentNode.querySelector("span");
      if (errorMsg) {
        errorMsg.remove();
      }
      this.style.borderColor = "";
    });
  }

  let genderSelected = false;
  for (let i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      genderSelected = true;
      break;
    }
  }
  if (!genderSelected) {
    isValid = false;
    const errorContainer = radioButtons[0].parentNode;
    if (!errorContainer.querySelector("span")) {
      var errorMsg = document.createElement("span");
      errorMsg.innerHTML = "Gender is required";
      errorMsg.style.color = "red";
      errorContainer.appendChild(errorMsg);
    }
  }

  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].type === "search") {
      continue;
    }
    if (!inputs[i].value) {
      if (inputs[i].tagName === "SELECT" && inputs[i].multiple) {
        if (inputs[i].selectedOptions.length === 0) {
          isValid = false;
          const errorContainer = inputs[i].parentNode;
          if (!errorContainer.querySelector("span")) {
            var errorMsg = document.createElement("span");
            errorMsg.innerHTML = "This field is required";
            errorMsg.style.color = "red";
            inputs[i].style.borderColor = "red";
            errorContainer.appendChild(errorMsg);
          }
        }
      } else {
        isValid = false;
        const errorContainer = inputs[i].parentNode;
        if (!errorContainer.querySelector("span")) {
          var errorMsg = document.createElement("span");
          errorMsg.innerHTML = "This field is required";
          errorMsg.style.color = "red";
          inputs[i].style.borderColor = "red";
          errorContainer.appendChild(errorMsg);
        }
      }
    }
  }


return isValid;
}



function validateDOB() {
  
  let inputDate = document.getElementById("inputDate").value;

  let minAge = new Date(new Date().setFullYear(new Date().getFullYear() - 22));
  let maxAge = new Date(new Date().setFullYear(new Date().getFullYear() - 12));

  let enteredDate = new Date(inputDate);

  if (enteredDate > maxAge || enteredDate < minAge) {
    document.getElementById("errorMessage").innerHTML = "Age must be between 12 and 22 years";
    document.getElementById("inputDate").style.border = "1px solid red";
    //event.preventDefault();

  } else {
    document.getElementById("errorMessage").innerHTML = "";
    document.getElementById("inputDate").style.border = "";
    return true;

  }
}

document.getElementById("submit-button").addEventListener("click", function(event){
  if (!validateDOB() || !validateForm()) {
        event.preventDefault();
      }
  })
</script>
</body>

</html>