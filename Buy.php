<?php session_start(); 
// echo($_GET['id'])
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link rel="stylesheet" href="buy.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
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
            <button class="login-btn">Login</button>
            <button class="signup-btn">Sign Up</button>
        </div>
    </nav>

    <div class="text-box1">
    <p> <h2>Create Your Own Plane</h2>
        </p>
                 
    </div>
    <div class="container">
        <div class="signup">
            <form method="post" action="#">
                <label><b> Name</b></label>
                <input type="text" name="Uname" placeholder="name">
                <br><br>
                
                <label><b>Email</b><br></label>
                <input type="email" name="Eml" placeholder="Email">
                <br><br>
                <label><b>Phone</b><br></label>
                <input type="text" name="Ph" placeholder="Phone which filled with signup">
                <br><br>
                <label><b> Address </b><br></label>
                <input type="text" name="Add" placeholder="Address">
                <br><br>
                <label><b>Plan Name</b><br></label>
                <input type="text" name="Pname" placeholder="Plan Name">
                <br><br>
                <label><b>Amount</b><br></label>
                <input type="text" name="Amt" placeholder="Amount">
                <br><br>
                <div class="login">
                    <input type="submit" class="btn btn-signup" value="Buy" name="submit">
                </div>
            </form>
        </div>
    </div> <br><br><br><br><br><br>
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

    $user = $_POST["Uname"];
    $email = $_POST["Eml"];
    $phone = $_POST["Ph"];
    $address = $_POST["Add"];
    $plane_name = $_POST["Pname"];
    $amount = $_POST["Amt"];
    // $str = strval($phone);


    $price=$_GET['price'];
    $title=$_GET['title'];

         $Pid = $_GET['id'];
    if(strlen($phone) == 10) {

        $sql = "insert into Buy (user,email,phone,address,plane_name,amount,Pid,price,title) values('$user','$email','$phone','$address','$plane_name','$amount','$Pid','$price','$title')";
        $k = mysqli_query($con, $sql);
    } 
     else {
        if((strlen($phone)< 10)||(strlen($phone)>10))
        echo '<script type="text/JavaScript">  alert("phone no is invalide..");</script>';

    }


    //email function close


    if ($k === TRUE) {

        echo '<script type="text/JavaScript">  alert("congratulations Your Rquest Is Submited...");</script>';


        mysqli_close($con);

    } else {

        mysqli_close($con);
    }



}

?>


