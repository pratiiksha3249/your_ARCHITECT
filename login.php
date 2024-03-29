<?php session_start(); ?>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h2>Login Page</h2><br>
    <div class="login">
    
        <form action="" method="post">
            <label><b>User Name</b></label>
            <input type="text" name="Uname" id="Uname" placeholder="Username">

            <label><b>Password</b></label>
            <input type="password" name="Pass" id="Pass" placeholder="Password">

            <button id="logb" class="link_edit" type="submit" name="submit">Log in here</button>

            <h4>Have you already an account <a href="signup.php">Signup</a></h4>
        </form>
     
    </div>
</body>
</html>

<?php


if(isset($_POST["submit"])){
 

$con=mysqli_connect("localhost","root","","tiksha");
if($con==FALSE){
    die("error in db connection...");
}

$user=$_POST["Uname"];
$password=$_POST["Pass"];


 $sql= "SELECT * FROM signup WHERE user = '$user' and password = '$password'";
 
    
$result=mysqli_query($con,$sql);

     if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
           
            $p = $row['password'];
            if($p === $password) {
            $_SESSION['user1']= $row['user']; 
            $_SESSION['Pass1']= $row['password']; 
            $_SESSION['Eml1']= $row['email']; 
            $_SESSION['ph1']= $row['phone']; 

                echo '<script type="text/javascript">alert("Login successful!");</script>';
                header("Location: index.html");
                exit();
            } else {

                echo '<script type="text/javascript">alert("Incorrect password!");</script>';
           
            }
        } else {
            echo '<script type="text/javascript">alert("User not found!");</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Query error!");</script>';
    }
}
else{
    echo("false");
}
?>

