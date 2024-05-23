<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/loginsystem">MyLoginSystem</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/login.php">Home</a>
        </li>';
        if(!$loggedin){
          echo '<li class="nav-item">
            <a class="nav-link" href="/loginsystem/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/loginsystem/signup.php">Signup</a>
          </li>';
        }
        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/loginsystem/logout.php">Logout</a>
        </li>';
        }
      
      echo '</ul>
    </div>
  </div>
</nav>';
?>