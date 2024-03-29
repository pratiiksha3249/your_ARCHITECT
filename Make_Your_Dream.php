<?php session_start(); 
// echo($_GET['id'])
?>

<html>
  <head>

<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="Make_Your_Dream.css">
    <link rel="stylesheet" href="Make_Your_Dream.css">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;

        }
        
.msg{
  width: 40%;
  background: rgb(75, 69, 72);

  background: linear-gradient(90deg, rgb(128, 123, 125) 0%, rgb(222, 238, 237) 100%);
  
  margin-left: 29%;

  margin-top: 10px;
   padding: 10px 20px 20px 20px; 
  border-radius: 10px;
  text-align: center;
  margin-bottom: 10px;
  font-family:cursive ;
  font-size:x-large;
  /* margin-left: 80px; */


}

    </style>
</head>

<body>
<nav>
        <div class="logo">
            <div>
                <font class="font1">your_</font>
                <font class="font2">ARCHITECT </font>
            </div>
        </div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
          

            <li><a href="product.php">Products</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <li><a href="Make_Your_Dream.php">Make_Your_Dream</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <!-- <li><a href="History.php">History</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp -->

            <li><a href="admin_validation.php">Admin</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

        </ul>
        <div class="auth-buttons">
        <button class="login-btn"><a href="login.php">Login</a></button>
            <button class="signup-btn"><a href="signup.php">Signup</a></button>
        </div>
    </nav>
    <button class="back_button"><a href="product.php">GoBack</a></button>

<div class="img-flex-container">
    <div class="inner-img-flex-container"></div>
    <br><br>
    <!-- <div class="inner-img-flex-container">2</div>
    <br><br>
    <div class="inner-img-flex-container">3</div> -->
  </div>

<!-- get info (form code) -->
<div class="msg">
Share Your Requirments 
    </div>
<div class="container">
       
        <div class="signup">
            <form method="post" action="">
                <label><b>Maximum Your Budget</b></label>
                <input type="text" name="Mbudget" &#x20B9 placeholder="Amount">
                <br><br>
                <label><b>Space for build plan</b></label>
                <input type="text" name="Size" placeholder="Space">
                <br><br>
                <label><b>Total Floor</b><br></label>
                <input type="text" name="Tfloor" placeholder="Total Floor">
                <br><br>
                <label><b>Total Room</b><br></label>
                <input type="text" name="Troom" placeholder="Total Room">
                <br><br>
                <label><b>Parking Area</b><br></label>
                <input type="checkbox"  name="Parea">
                <br><br>
                <div class="login">
                    <input type="submit" class="btn btn-signup" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div> 
    <footer>
        <div class="footer-container">
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-info">
                <p>&copy; 2024 Your Company. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>

<?php
$k=false;
if (isset($_POST["submit"])) {
   

    $con = mysqli_connect("localhost", "root", "", "tiksha");
    if ($con == FALSE) {
        die("error in db connection...");
    }

    $Mbudget= $_POST["Mbudget"];
    $Size= $_POST["Size"];
    $Tfloor = $_POST["Tfloor"];
    $Troom = $_POST["Troom"];
    $Parea = $_POST["Parea"];
    $P=$_SESSION['ph1'];
    $Uname=$_SESSION['user1'];
    
if($Parea){    
  $Parea="true";
}
else{
  $Parea="false";
}
        $sql = "insert into dream_info(Max_budget,Space,T_floor,T_room,Parking_area,Name,Phone) values('$Mbudget','$Size','$Tfloor','$Troom','$Parea','$Uname','$P')";

        $k = mysqli_query($con, $sql);
 
    if ($k) {

        echo '<script type="text/JavaScript">  alert("Insert Succ...");</script>';


        mysqli_close($con);

    }
     else {
      echo '<script type="text/JavaScript">  alert(" Not Insert...");</script>';

        mysqli_close($con);
    }



}

?> 

