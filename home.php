<?php 
session_start();
if(isset($_SESSION['Email'])){
    header("location:index.php");
    }
    include("config.php");
$email = $_SESSION['Email'];
$x = mysqli_query($conn,"SELECT * FROM rbs_user WHERE Email = '$email'");
$y = mysqli_fetch_array($x);
$name = $y['name'];
if(!empty($_POST))
{
	$quantity = $_POST['q'];
	$food_id = $_POST['food'];
	
	$a = mysqli_query($conn,"SELECT * FROM rbs_food WHERE id = '$food_id'");
	$b = mysqli_fetch_array($a);
	$food_name = $b['id'];
	$rate = $b['price'];
	$amount = $price * $quantity;
	$_SESSION['cart'] = $_SESSION['cart'] + 1;
	$sql = mysqli_query($conn,"INSERT INTO rbs_cart(id,Email,quantity,total) VALUES('$food_name','$email','$quantity','$amount')");
	
}
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
<span class="head">Restaurent Bill Management</span>
<br>

</div>
<br>
<br>

<br>
<br>
<br>

<div align="center">
<span style="font-family:'Trebuchet MS';color:red;background-color:darkcyan;font-size:18px;padding:20px;text-align:center;border-radius:250px;"> Your Order : <?php echo $_SESSION['cart'];?></span>
<br>
<br>
<br>
<table align="center" style="background-color:darkcyan">

<tr>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="alu_naan(RS/100) color:black"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add to order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="MOMO (RS/120)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="PIZZA(RS/300)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
</tr>

<tr>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Burger(RS/200)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Pakoda(RS/100)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Chowmin(RS/150)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
</tr>

<tr>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Katti Roll(RS/100)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Hot Wings(RS/120)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
<td align="center"><form method="post" action=""><br><input type="number" size="5" name="q" placeholder="Drumsticks(RS/150)"><input type="" name="food" value="0">&nbsp;&nbsp;<input type="submit" value="Add To order"></form></td>
</tr>
<br>
<br>
<br>
<tr><td align="center" colspan="3"><br><input type="button" value="CHECKOUT" onClick="window.location='checkout.php'"></td></tr>
	
</table>
<br>
<br>
<br>
<br>
<br>

</div>
</body>
</html>