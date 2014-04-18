<?php
	include("conn.php");
	if(isset($_POST['submit']))
	{
		$usertype=$_POST['usertype'];
		$emailid=$_POST['emailid'];
		$username=$_POST['username']; 
		$password=$_POST['password'];
		$securityquestion=$_POST['securityquestion'];
		$answer=$_POST['answer'];
				
		$sql="insert into login (usertype,emailid,username,password,securityquestion,answer) values ('$usertype','$emailid','$user','$password','$securityquestion','$answer')";
		mysql_query($sql);
	}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="shortcut icon" href="g.ico">
  <title>Packet-SPY : Register here</title>
  <link rel="stylesheet" href= "signup.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <style type="text/css">
  #answer:active
  {
  	border:none;
  }
  </style>
</head>
<body>
  <h1 class="register-title">Packet SPY:Register Here!</h1>
  <form class="register" method="post">
  	<table>
      <tr>
	  <td>
    <div class="register-switch">
	  <input type="radio" name="usertype" value="normal" id="normal" class="register-switch-input" checked>
      <label for="normal" class="register-switch-label">Normal</label>
      <input type="radio" name="usertype" value="admin" id="admin" class="register-switch-input">
      <label for="admin" class="register-switch-label">Admin</label>
    </div></td></tr>
	<tr><td><input type="text" name="emailid" class="register-input" placeholder="Email address" ></td></tr>
	<tr><td><input type="text" name="username" class="register-input" placeholder="Choose User Id" ></td></tr>
	<tr><td height="55"><input type="password"   name="password" class="register-input" placeholder="Password"></td></tr>
	<tr><td height="43"><select style="color:#999999;" name="securityquestion">
	<option value="Security Quetion" placeholder="Security Question">Security question</option>
	<option value="Where was your first work place">Where was your first work place</option>
	<option value="Who is your childhood best friend">Who is your childhood best friend</option>
	</select></td></tr>
	<tr><td><input type="text" name="answer" id="answer" size="30" style="border:none; border-bottom:1px solid #CCCCCC; background:none;" placeholder="Answer"></td></tr>
  	<tr><td><input type="submit" value="Create Account" class="register-button" name="submit"></td></tr>
	</table>
	<div class="btn"><a href="main.html" style="text-decoration:none; text-align:center;">Go to Main page</a></div>
  </form>
</body>
</html>
