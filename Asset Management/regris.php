 <?php
session_start();
if(!isset($_SESSION['username'])) {
	// Jika pengguna belum masuk, arahkan ke halaman login
	header('Location: halaman.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
 <!-- nav -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-text">
     
    </span>
  </div>
</nav>
<br><br>
<!-- body -->
<section class="vh-80">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-75">
        <div class="col-md-9 col-lg-8 col-xl-3">
          <img src="img/it3.jpg" class="img-fluid" alt="Sample image">
        </div>

      
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="halaman.php" method="POST" enctype="multipart/form-data">
            <!-- Name -->
            
              <div class="form-outline mb-4">
                <input type="text" name="username" id="username" class="form-control form-control-lg"
                  placeholder="Enter Name" />
                <label class="form-label" for="form3Example3">Name </label>
              </div>

              <!-- email -->
              <div class="form-outline mb-4">
                <input type="text" name="email" id="email" class="form-control form-control-lg"
                  placeholder="Enter email" />
                <label class="form-label" for="form3Example3">Email </label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" name="pass" id="pass" class="form-control form-control-lg"
                  placeholder="Enter password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="halaman.php"
                    class="link-danger">Register</a></p>
              </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
</form>
</body>
</html>