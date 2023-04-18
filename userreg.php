<?php
session_start();
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "multipletables");
if(isset($_POST["submit"])) {

 



  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate password length
  if(strlen($password) < 6) {
    $password_error = "Password must be at least 6 characters long.";
  }

  // Check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Invalid email format.";
  }

  // Check if email already exists in the database
  $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $email_check_query);
  if (mysqli_num_rows($result) > 0) {
    $email_error = "Email already exists.";
  }

  // Check if username already exists in the database
  $username_check_query = "SELECT * FROM users WHERE u_name='$username' LIMIT 1";
  $result = mysqli_query($conn, $username_check_query);
  if (mysqli_num_rows($result) > 0) {
    $username_error = "Username already exists.";
  }

  // Insert data into database if no errors
  if(empty($password_error) && empty($email_error) && empty($username_error)) {
    $NewID="";
      $SQL_ID="SELECT MAX(id)+1 AS NEWID FROM users";
      $result=mysqli_query($conn, $SQL_ID);
      while($row =mysqli_fetch_assoc($result)){
        $NewID= $row['NEWID'];
      }
      if($NewID==0){
        $NewID=1;
      }
      $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (`id`, `name`, `email`, `u_name`, `password`) VALUES ($NewID,'$name', '$email', '$username', '$new_hashed_password')";
    if (mysqli_query($conn, $query)) {
      if (isset($_SESSION['username'])) {
        $_SESSION['usermsg']="User Registerd";

        header('location: index.php');

        exit;
      }
      // Redirect to login page
      header('location: userlogin.php');
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - School Panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">School Panel</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <?php if(isset($email_error)): ?>
                          <p class="text-danger"><?php echo $email_error; ?></p>
                                  <?php endif; ?>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        
                        
                        <div class="invalid-feedback">Please choose a username.</div>
                        
                      </div>
                      <?php if(isset($username_error)): ?>
                          <p class="text-danger">
                            <?php echo $username_error; ?></p>
                                  <?php endif; ?>
                    </div>

                                        <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" style="" id="yourPassword" required>
                      <i class="far fa-eye" id="togglePassword" style="float: right; margin-right:7px; margin-top:-25px; cursor: pointer; display: none;"></i>

                      <?php if(isset($password_error)): ?>
                        <p class="text-danger"><?php echo $password_error; ?></p>
                      <?php endif; ?>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                    </div>
                    <div class="col-6">
                    <div class="col-6">
                      <button class="btn btn-dark w-100" type="button" onclick="history.back()">Cancel</button>
                            </div>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="userlogin.php">Log in</a></p>
                    </div>
                  </form> 


                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">WebDock</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
  const passwordInput = document.getElementById("yourPassword");
const togglePassword = document.getElementById("togglePassword");

passwordInput.addEventListener("input", function () {
  togglePassword.style.display = passwordInput.value === "" ? "none" : "block";
});

togglePassword.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});
</script>

</body>

</html>