<?php
$id = $_GET['id'];
$con = mysqli_connect("localhost","root","","tiksha");
$sql = "DELETE FROM product WHERE id='$id'";
$result = mysqli_query($con, $sql);
if($result)
{
    header("location: admin.php");
}

?>