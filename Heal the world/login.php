<?php
  include 'dbconnect.php'; 
  session_start();
  
  if (isset($_POST["login"])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT id, username FROM `registrationdb` WHERE username='$username' and password='$password'");
    // $cross_check = mysqli_fetch_row($check);
    $cross_check = mysqli_fetch_array($check);

    if($cross_check > 0){
        $_SESSION['id'] = $cross_check['id'];
        $_SESSION['username'] = $cross_check['username'];
        header('Location: dashboard.php');
    }else{
        echo('Invalid Username Or Password');
    }
  }
   ?>

 
 
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <form action="" method="POST" class="container">
    <div >
	    <div class="d-flex justify-content-center h-100">
		    <div class="card">
			    <div class="card-header">
				   <h3>Sign In</h3>
				
			    </div>

			  <div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="uname" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="registration.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			  
	    </div>
    </div>
  </form>

</body>
</html>


  </html>