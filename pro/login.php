<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<link rel="stylesheet" href="style1.css">
	</head>
	<body>
		<div class="loginBox">
			<img src="login.png" class="user">
			<h2>Log In Here</h2>
			<form method="POST" action="#">
				<p>User Name</p>
				<input type="text" name="username" placeholder="Enter Name">
				<p>Password</p>
				<input type="password" name="password" placeholder="*******">
				<input type="submit" name="submit" value="Sign In">
				</form>
				<!--<form action='insertuser.php' method = 'post'>
				<input type='submit' name='submit' value='Sign_up' class='btn-login' />
				</form>-->
			
		</div>
		<?php
			$con = mysqli_connect('localhost','root','lenovo','Wholesale');
			if(isset($_POST['username'])){
				$uname=$_POST['username'];
				$password=$_POST['password'];
				$sql="select id,user,password from login where user='$uname' and password='$password' limit 1";
				$result=mysqli_query($con,$sql);
				if (mysqli_num_rows($result) ==1) {
					echo "You Have successfully logged in";
					header('Location: /pro/home.html');
					exit();
				}
				else{
					#echo "You Have Entered Incorrect Password";
					exit();
				}
			}
		?>
	</body>
</html>