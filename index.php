<?php
session_start();
if(isset($_SESSION['email'])){
header("location:home.php");
}
include("config.php");
if(!empty($_POST))
{
	if($_POST['email']=="Admin@gmail.com" && $_POST['password']=="12345")
	{
		$_SESSION['admin'] = $_POST['email'];
		header('location:admin.php');
	}
  if($_POST['email']=="maggots@gmail.com" && $_POST['password']=="slipknot")
	{
		$_SESSION['home'] = $_POST['email'];
		header('location:home.php');
  }
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,sha1($_POST['password']));
	$sql = mysqli_query($conn,"SELECT * FROM rbs_user WHERE email = '$email' AND password = '$pass'");
	if(mysqli_fetch_array($sql)!=0)
	{
		$_SESSION['email'] = $email;
		header("location:home.php");
	}
	else
	{
		?><script type="text/javascript">alert("Check your email or password");</script>
        <?php } 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Resturant Management System</title>
    <link type="text/css" href="style.css" rel="stylesheet" />
  </head>
  <body>
  <div id="header" align="center">
<span class="head" mt-4>Restaurent Management System</span>
</div>
<br>
<br>
<br>
<br>
<br>
<div align="center">
<div id="boxy">
<span class="Shead">User/Admin Login</span>
<br>
<br>
<form method="post" action="">
<input type="email" name="email"  placeholder="Enter your Email" />
<br>
<br>
<input type="password" name="password"  placeholder="Enter your Password" />
<br>
<br>
<input type="submit" value="Login" />
</form>
</div>
</div>
</body>
</html>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>














