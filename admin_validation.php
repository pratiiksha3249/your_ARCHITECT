<html>

<head>
    <title>Login Form for Admin</title>
    <link rel="stylesheet" href="admin_validation.css">
</head>

<body>
    <div class="container">
        <h2>Login Page for Admin</h2>
        <div class="signup">
            <form method="post" action="#">
                <label><b>Admin Id</b></label>
                <input type="text" name="Uname" placeholder="Username">
                <br><br>
                <label><b>Password</b></label>
                <input type="Password" name="Pass" placeholder="Password">
                <br><br>
                
                <div class="login">
                    <input type="submit" class="btn btn-signup" value="Login" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>




<?php

if (isset($_POST["submit"])) {
   
if(($_POST['Uname']=='MYadmin') && ($_POST['Pass']=='123')){
    header("location:admin.php");
}
else{
    echo '<script type="text/JavaScript">  alert(" invalide password ID..");</script>';
 
}




}

?>