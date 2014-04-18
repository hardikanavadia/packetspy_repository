<?php
include("conn.php");
$msg="";
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$_SESSION['username']=$username;
	
	$sql="select * from login where username='$username' and password='$password'";	
	$res=mysql_query($sql);
	if($row=mysql_fetch_array($res))
	{	
		$_SESSION['is_log_in']=true;
		header("location:welcome.php");
	}
	else
	{
		$msg="username or password is invalid!";
	}
}
?>
<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Packet-SPY : Log In here</title>
<link rel="shortcut icon" href="g.ico">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Log In here!</h1>
			<div>
				<input type="text" placeholder="username" required="" id="username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="password" required="" id="password" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in"  name="submit"/>
				<a href="#">Lost your password?</a>
				<a href="register.php">New? Register here!</a>			
			</div>
			<?php  echo $msg;?>
		</form>
		<!-- form -->
		<div class="button">
			<a href="main.html">Go to Main page</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
