<?php session_start(); ?>
<html>

<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="container">
        <h2>Signup Page</h2>
        <div class="signup">
            <form method="post" action="#">
                <label><b>User Name</b></label>
                <input type="text" name="Uname" placeholder="Username">
                <br><br>
                <label><b>Password</b></label>
                <input type="Password" name="Pass" placeholder="Password">
                <br><br>
                <label><b>Email</b><br></label>
                <input type="email" name="Eml" placeholder="Email">
                <br><br>
                <label><b>Phone</b><br></label>
                <input type="text" name="ph" placeholder="Phone">
                <br><br>
                <div class="login">
                    <input type="submit" class="btn btn-signup" value="Signup" name="submit">
                    <p style="color: aliceblue;">Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
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
    $password = $_POST["Pass"];
    $email = $_POST["Eml"];
    $phone = $_POST["ph"];
    $str = strval($phone);




    if((strlen($phone) == 10) && ( strlen($password)>=5)) {

        $sql = "insert into signup(user,password,email,phone) values('$user','$password','$email','$phone')";
        $k = mysqli_query($con, $sql);
    } 
    
    else {
        if((strlen($phone)< 10)||(strlen($phone)>10))
        echo '<script type="text/JavaScript">  alert("phone no is invalide..");</script>';
else if( ( strlen($password)<5)){
    echo '<script type="text/JavaScript">  alert("password no is invalide..");</script>';

}
    }


    //email function close


    if ($k === TRUE) {
            $_SESSION['user1']=$_POST['Uname']; 
            $_SESSION['Pass1']=$_POST['Pass']; 
            $_SESSION['Eml1']=$_POST['Eml']; 
            $_SESSION['ph1']=$_POST['ph']; 
        echo '<script type="text/JavaScript">  alert("Account  create succ... ");</script>';
        //    header('location:index.html');

        mysqli_close($con);
        header('location:index.html');


    } else {

        mysqli_close($con);
    }



}

?>