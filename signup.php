<?php
  $showAlert = false;
  $showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'partials/db_connect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  //Check whether this username Exist
  $existSql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    // $exists = true;
    $showError = "Username already exist";
  } else {
    // $exists = false;
    if (($password == $cpassword)) {
      $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
      header("Location: login.php");
    } 
    else {
      $showError = "Password do not match";
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SignUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require 'partials/_nav.php' ?>
  <?php
  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created and you can login
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> ' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

  ?>

  <div class="container my-4">
    <h1 class="text-center">Sign up to our Website</h1>
    <div class="mb-3 row">
      <form action="/loginsystem/signup.php" method="post" style="display: flex; flex-direction:column; align-items:center;">
        <div class="form-group col-md-6">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group col-md-6">
          <label for="cpassword">Confirm Passowrd</label>
          <input type="password" class="form-control" id="cpassword" name="cpassword">
          <small id="emailHelp" class="form-text-muted">Make sure to type the same passowrd</small>
        </div>
        <button type="submit" class="btn btn-primary col-md-6">SignUp</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>