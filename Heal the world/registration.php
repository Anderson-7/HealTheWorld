<?php
  include 'dbconnect.php';

  if(isset($_POST['submit'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $sofo = $_POST['SofO'];
    $sofr = $_POST['SofR'];
    $address = $_POST['address'];
    $bank = $_POST['bank'];
    $accname = $_POST['acname'];
    $accnumber = $_POST['acnumber'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    if(!empty($_FILES['passport'])) {
      $new_name = uniqid().$_FILES['passport']['name'];
      move_uploaded_file($_FILES['passport']['tmp_name'], __DIR__.'/uploads/'.$new_name);
    }

    $inputdata = mysqli_query($conn, "INSERT INTO `registrationdb`(`FULL NAME`, `GENDER`, `PHONE`, `EMAIL`, `DATE OF BIRTH`, `STATE OF ORIGIN`, `STATE OF RESIDENCE`, `ADDRESS`, `ACCOUNT NAME`, `ACCOUNT NUMBER`, `BANK NAME`, `USERNAME`, `PASSWORD`, `IMAGEPATH`) VALUES ('$name','$gender','$phone','$email','$dob','$sofo','$sofr','$address','$accname','$accnumber','$bank','$username','$password', '$new_name')");
  
    if ($inputdata == true){
      echo ("Registration Successful!");
    }else{
      echo ("Registration failed!");
    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <style>
      .reg{
          background: linear-gradient(rgba(0, 0, 0, 0.685), rgba(0, 0, 0, 0.515)), url(assets/images/main-removebg-preview.png);
            padding: 10rem 0rem 10rem 0rem;
          background-size: contain;
          background-repeat:no-repeat;
          /* text-align: center; */
          color: #fff;
        }
        /* #form{
          align-content: center;
        } */
    </style>
</head>
<body class="container reg">
  <section id="form" class="row justify-content-center">
            <form action="" method="POST" class="col-8" enctype="multipart/form-data">
              <div class="row">

                  <div class="form-group col-12" >
                    Full Name: <input type="text" class="form-control" name="fullname" required>
                  </div>
                  <div class="form-group col-4">
                    <label for="gender">Gender:</label> <br>
                    <select name="gender" class="form-control" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="category">Category:</label> <br>
                    <select name="category" class="form-control" id="category">
                        <option value="student">Student</option>
                        <option value="entrepreneur">Entrepreneur</option>
                        <option value="others">Others</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="">Select a passport:</label>
                     <input type="file" class="form-control" name="passport" required accept="image/jpeg,image/png">
                  </div>
                    
                    <div class="col-6 form-group">
                      phone: <input type="tel" class="form-control" name="phone" required> 
                    </div>
                    <div class="col-6 form-group">
                      Email: <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-12">
                      Date Of Bith: <input type="date" class="form-control" name="dob" required> <br>
                    </div>
                    <div class="form-group col-12">
                      State Of Origin: <input type="text" class="form-control" name="SofO" required>
                    </div>
                    <div class="form-group col-12">
                      State Of Residence: <input type="text" class="form-control" name="SofR" required>
                    </div>
                    <div class="form-group col-12">
                      Address: <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group col-12">
                      Bank Name: <input type="text" class="form-control" name="bank" required>
                    </div>
                    <div class="form-group col-12">
                      Account Name: <input type="text" class="form-control" name="acname" required>
                    </div>
                    <div class="form-group col-12">
                      Account Number: <input type="text" class="form-control" name="acnumber" required>
                    </div>
                    <div class="form-group col-12">
                      Username: <input type="text" class="form-control" name="uname" required> <br>
                    </div>
                    <div class="form-group col-12">
                      Password: <input type="password" class="form-control" name="password" required> <br>
                    </div>
                    <div class="form-group col-12">
                      Confirm Password: <input type="password" class="form-control" name="cpassword" required> <br>
                    </div>
                    <div class="col-12">
                      <button name="submit" class="btn btn-danger" style="border-radius: 25px;">Register</button>
                    </div>
                  </div>
              </div>
              <br>
              <div>
      <p>Already have an account? Click here to <a href="login.php">Log In</a></p>
    </div>
        </form>
  </section>

</body>

</html>