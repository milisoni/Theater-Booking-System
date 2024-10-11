<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="loginstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="headerstyle.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <?php include('connect.php') ?>
  <div class="container-fluid">

    <header id="header" class="header sticky-top">

      <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a
                href="mailto:contact@example.com">contact@example.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div> <!-- End Top Bar -->

      <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
          <a href="dashboard.php" class="logo d-flex align-items-center">
            <h1 class="sitename">Cloud Seats</h1>
          </a>

          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="index.php" class="active">Home</a></li>

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

        </div>

      </div>

    </header>

  </div>

  <div class="login-box">
    <h2>Login</h2>
    <form action="login.php" method="post">
      <div class="user-box">
        <input type="email" name="email" required="" placeholder=" ">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="" placeholder=" ">
        <label>Password</label>
      </div>
      <button type="submit" class="btn" name="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </button>
      <a href="register.php" class="register_btn"> Register New User</a>
    </form>
  </div>
</body>

</html>
<?php
if(isset($_POST['login'])){

  $email    = $_POST['email'];
  $password = $_POST['password'];
  
  
  $sql = "SELECT * FROM `users` WHERE email = '$email' and password='$password'";

  $rs = mysqli_query($conn,$sql);

  if(mysqli_num_rows($rs)>0){
    $data=mysqli_fetch_array($rs);


    $role = $data['rotype'];
    $_SESSION['uid'] = $data['userId'];
    $_SESSION['type'] = $role;

    if($role == 1){
      echo "<script> alert('Admin logged in successfully') </script>";
      echo "<script> window.location.href='admin/dashboard.php' </script>";
    }
    else if($role == 2){
      echo "<script> alert('User logged in successfully') </script>";
      echo "<script> window.location.href='index.php' </script>";
    }

  }else {
    echo "<script> alert('Invalid Email or Password!') </script>";
  }

  }
?>
