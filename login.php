<?php
session_start();
$con=mysqli_connect("localhost","root","","user");
$usertrim=trim($_POST['username']);
$userstrip=stripcslashes($usertrim);
$finaluser=htmlspecialchars($userstrip);
$passtrim=trim($_POST['password']);
$passstrip=stripcslashes($passtrim);
$finalpass=htmlspecialchars($passstrip);
$sql="SELECT * FROM user_tbl where username='$finaluser' AND password='$finalpass'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>=1)
{
    $_SESSION['myuser']=$finaluser;
    header("Location:waste_recycling.html");
}
else{
    $_SESSION['error']="wrong user used id";
}
?>