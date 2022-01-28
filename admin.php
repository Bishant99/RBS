<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:checkout.php");
}
include("config.php");
$email = $_SESSION['email'];
$x = mysqli_query($conn,"SELECT * FROM rbs_user WHERE email = '$email'");
$y = mysqli_fetch_array($x);
$name = $y['id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Restaurent Bill Management</title>
<link type="text/css" href="style.css" rel="stylesheet" />
</head>
<body>
<div id="header" align="center">
	<br>
	<br>
	
<span class="head">Restaurent Management System</span>
<br>
<br>
<br>

<span class="Shead">Welcome to Admin Page</span>
</div>
<br>
<br>

<br>
<br>
<br>

<div align="center">
<div id="boxy">
<span class="Shead">Orders</span>
<form method="post" action="">
<select name="order">
<option value="2" > - - Select Email - - </option>
<?php
$z = mysqli_query($conn,"SELECT DISTINCT email FROM rbs_totalbill");
while ($zz = mysqli_fetch_array($z))
{
		$em = $zz['email'];
		$r = mysqli_query($conn,"SELECT * FROM rbs_user WHERE email ='$em'");
		$rr = mysqli_fetch_array($r);
	?>
<option value="<?php echo $zz['email'];?>"><?php echo $rr['name']."/".$zz['email'];?></option>
<?php } ?>
</select>
<br><br>
<input type="hidden" name="uname" value="<?php echo $rr['name'];?>">
<input type="submit" name="id" value="VIEW" >
</form>
<br>
<br>
<?php
$order_mail = $_POST['order'];
if($_POST['id']=="VIEW")
{
	?>
    
<table border="2" class="table">
<tr style="red;"><td>Food Name</td><td>Quantity</td><td> Amount</td></tr>
<?php 
	$total = 0;
	$o = mysqli_query($conn,"SELECT * FROM rbs_totalbill WHERE email = '$order_mail'");
	while($oo = mysqli_fetch_array($o))
	{
	  $total = $total + $oo['total'];
		?>
        <tr>
        	<td><?php echo $oo['name'];?></td>
            <td><?php echo $oo['quantity'];?></td>
            <td><?php echo $oo['total'];?></td>
        </tr>
     <?php } ?>
     <tr style="red"><td align="center" colspan="3">Email : <?php echo $_POST['email'];?></td></tr>
     <tr style="red"><td align="center" colspan="3">Total Bill : Rs.<?php echo $total;?> /-</td></tr>
   </table>  
   
   <?php } ?>  
   <br>
<br>
<input type="button" onClick="window.location='exit.php'" name="id" value="EXIT" >       
</div>
</div>
</body>
</html>