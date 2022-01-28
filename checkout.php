<?php
session_start();
if(!isset($_SESSION['Email']))
{
	header("location:index.php");
}
include("config.php");
$email = $_SESSION['Email'];
$x = mysqli_query($conn,"SELECT * FROM rbs_user WHERE Email = '$email'");
$y = mysqli_fetch_array($x);

$sql = mysqli_query($conn,"SELECT * FROM rbs_cart WHERE Email = '$email'");
while($f = mysqli_fetch_array($sql))
{
	$na = $f['name'];
	$em = $f['Email'];
	$qu = $f['Quantity'];
	$to = $f['Total'];
	mysqli_query($conn,"INSERT INTO rbs_totalbill( name,Email,Quantity,Total) VALUES('$na','$em','$qu','$to')");
}
echo ' sucessfully checkout';
mysqli_query($conn,"DELETE FROM rbs_cart WHERE Email='$email'");
$_SESSION['cart'] = 0;
header("location:exit.php");
?>