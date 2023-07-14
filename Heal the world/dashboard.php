<?php
session_start();

include 'dbconnect.php'; 

if(empty($_SESSION['username']) || empty($_SESSION['id'])){
    header('Location: login.php');
}

$result = mysqli_query($conn, "SELECT * FROM `registrationdb`  WHERE id = '".$_SESSION['id']."'");

while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// read the data from the database based on the user's id stored in the session 

// if(isset($_POST['delete'])){
//     $deleteQuery = mysqli_query($conn, "DELETE FROM `registrationdb` WHERE id = '".$_SESSION['id']."'");

//     if($deleteQuery == true){
//         echo("Account Deleted!");
//     }else{
//         echo("Try Again!");
//     }
// }
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
 // Get current time

$currentTime = date("H:i:s"); // Get current time in 24-hour format
    
    //echo $currentTime;

// Fetch username from database

$userName = $_SESSION['username'] ;

if ($currentTime >= '00:00' && $currentTime <= '11:59') {
    echo "Good morning, " . $userName . "!";
} elseif ($currentTime >= '12:00' && $currentTime <= '17:59') {
    echo "Good afternoon, " . $userName . "!";
} else {
    echo "Good evening, " . $userName . "!";
}
?>




<h2 style="text-align: center;">WELCOME TO YOUR DASHBOARD</h2>



<!-- <pre><code><?=  var_export(["session" => $_SESSION, "db_data" => $rows], true) ?></code></pre> -->
<!-- <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>GENDER</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>DATE OF BIRTH</th>
            <th>STATE OF ORIGIN</th>
            <th>STATE OF RESIDENCE</th>
            <th>ADDRESS</th>
            <th>ACCOUNT NAME</th>
            <th>ACCOUNT NUMBER
            <th>BANK NAME</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>IMAGEPATH</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($rows as $row): ?>
            <tr>
                <?= $row['ID'] ?>
                <th><?= $row['FULL NAME'] ?></th>
                <th><?= $row['GENDER'] ?></th>
                <th><?= $row['PHONE'] ?></th>
                <th><?= $row['EMAIL'] ?></th>
                <th><?= $row['DATE OF BIRTH'] ?></th>
                <th><?= $row['STATE OF ORIGIN'] ?></th>
                <th><?= $row['STATE OF RESIDENCE'] ?></th>
                <th><?= $row['ADDRESS'] ?></th>
                <th><?= $row['ACCOUNT NAME'] ?></th>
                <th><?= $row['ACCOUNT NUMBER'] ?>
                <th><?= $row['BANK NAME'] ?></th>
                <th><?= $row['USERNAME'] ?></th>
                <th><?= $row['PASSWORD'] ?></th>
                <th>
                    <?php if(!empty($row['IMAGEPATH'])): ?>
                        <img src="uploads/<?= $row['IMAGEPATH'] ?>" width="100" height="100" alt="">
                    <?php endif;?>
                    
                </th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->

<?php foreach($rows as $row): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        
    </head>
    <body style="background: linear-gradient(rgba(0, 0, 0, 0.685), rgba(0, 0, 0, 0.685)), url(assets/images/main-removebg-preview.png);background-size: contain;background-repeat: no-repeat; background-position: center; color: #ffff;">
       <section class="container justify-content:center;" style="text-align: center;">
            <div class=" col-8">
                        <div style= "background:rgba(0, 0, 0, 0.569); ">
                            <b> </b><br>
                             <?php if(!empty($row['IMAGEPATH'])): ?>
                                <div style="border-radius: 50%; overflow: hidden; width: 200px; height: 200px; display: flex;justify-content: center; align-items: center;">
                                    <img src="uploads/<?= $row['IMAGEPATH'] ?>" width="200" height="auto" alt="">
                                </div>
                            
                             <?php endif;?>
                                                        
                            <h3>Personal Data</h3>
                            <b>ID</b><?= $row['ID'] ?> <br>
                            <b id = 'name'>Name: </b><?= $row['FULL NAME'] ?><br>
                            <b>Gender: </b><?= $row['GENDER'] ?><br>
                          
                        </div>

                        <div  class="" style= "background:rgba(0, 0, 0, 0.569);">
                            <?php endforeach; ?> <br><br>
                            <h3>Account Information</h3>
                            <b>Balance: #</b><?= $row['BALANCE'] ?><br>
                            <a href="#"><button class="btn btn-danger my-5" style="border-radius: 25px;">Withdraw Fund</button></a>
                    
                        </div>
             </div> 
                
       </section>
       
       



            <a href="update.php"><button class="btn btn-danger" style="border-radius: 25px;">Update Information</button></a>
            <a href="delete.php"><button class="btn btn-danger" style="border-radius: 25px;">Delete Account</button></a>

            <a href="logout.php">Logout</a>
    </body>
    </html>


 