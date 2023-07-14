<?php
    session_start();
  include 'dbconnect.php';

  if(isset($_POST['update'])){
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
    // $username = $_POST['uname'];
    // $password = $_POST['password'];
    // $cpassword = $_POST['cpassword'];
    
    if(!empty($_FILES['passport'])) {
      $new_name = uniqid().$_FILES['passport']['name'];
      move_uploaded_file($_FILES['passport']['tmp_name'], __DIR__.'/uploads/'.$new_name);
    }

    // $userid = $_SESSION['ID'];
    $inputdata = mysqli_query($conn, "UPDATE `registrationdb` SET `FULL NAME`='$name',`GENDER`='$gender',`PHONE`='$phone',`EMAIL`='$email',`DATE OF BIRTH`='$dob',`STATE OF ORIGIN`='$sofo',`STATE OF RESIDENCE`='$sofr',`ADDRESS`='$address',`ACCOUNT NAME`='$accname',`ACCOUNT NUMBER`='$accnumber',`BANK NAME`='$bank',`IMAGEPATH`='$new_name' WHERE id = '".$_SESSION['id']."'");
  
    if ($inputdata == true){
      echo ("Update Successful!");
      header("Location: dashboard.php");
    }else{
      echo ("Update failed!");
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
</head>
<body class="container">
    <?php
        $query = mysqli_query($conn, "SELECT * FROM registrationdb WHERE id = '".$_SESSION['id']."'");
        while($info = mysqli_fetch_array($query)){
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group w-50" >
        Select a passport: <input type="file" class="form-control" value="<?php echo $info['IMAGEPATH'] ?>" name="passport" accept="image/jpeg,image/png">
      </div>
      <div class="form-group w-50" >
        Full Name: <input type="text" class="form-control" value="<?php echo $info['FULL NAME'] ?>" name="fullname">
      </div>
      <div class="form-group w-50">
        Email: <input type="email" class="form-control" value="<?php echo $info['EMAIL'] ?>" name="email">
      </div>
      <div class="form-group w-50">
         <label for="gender">Gender:</label>
         <select name="gender" id="gender">
         <option value="male">Male</option>
            <option value="female">Female</option>
         </select>
      </div>
         
        <div class="form-group w-50">
          phone: <input type="phone" class="form-control" value="<?php echo $info['PHONE']; ?>" name="phone"> <br>
        </div>
        
        <div class="form-group w-50">
          Date Of Bith: <input type="date" class="form-control" value="<?php echo $info['DATE OF BIRTH']; ?>" name="dob"> <br>
        </div>
        <div class="form-group w-50">
          State Of Origin: <input type="text" class="form-control" value="<?php echo $info['STATE OF ORIGIN']; ?>" name="SofO">
        </div>
        <div class="form-group w-50">
          State Of Residence: <input type="text" class="form-control" value="<?php echo $info['STATE OF RESIDENCE']; ?>" name="SofR">
        </div>
        <div class="form-group w-50">
          Address: <input type="text" class="form-control" value="<?php echo $info['ADDRESS']; ?>" name="address">
        </div>
        <div class="form-group w-50">
          Bank Name: <input type="text" class="form-control" value="<?php echo $info['BANK NAME']; ?>" name="bank">
        </div>
        <div class="form-group w-50">
          Account Name: <input type="text" class="form-control" value="<?php echo $info['ACCOUNT NAME']; ?>" name="acname">
        </div>
        <div class="form-group w-50">
          Account Number: <input type="text" class="form-control" value="<?php echo $info['ACCOUNT NUMBER']; ?>" name="acnumber">
        </div>
        <!-- <div class="form-group w-50">
          Username: <input type="text" class="form-control" name="uname"> <br>
        </div>
        <div class="form-group w-50">
          Password: <input type="password" class="form-control" name="password"> <br>
        </div>
        <div class="form-group w-50">
          Confirm Password: <input type="password" class="form-control" name="cpassword"> <br>
        </div> -->
        <div class="">
          <button name="update" class="btn btn-danger" style="border-radius: 25px;">Update Informations</button>
        </div>
      

    </form>
    <?php } ?>
    <div>
      <h4>Already have an account? Click here to <a href="login.php">Log In</a></h4>
    </div>
</body>
</html>