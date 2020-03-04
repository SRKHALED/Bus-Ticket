<!DOCTYPE html>
<?php 
session_start();
session_unset();
session_destroy();
?>
<html lang="en">
	<head>
		 <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BUS TICKET</title>
		<link rel="stylesheet" href="style.css">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 
		 <style>
		
		.panel-body{
			background-image: url(p1.jpg);
			background-size:cover;
			border-top-left-radius: 50px;
			border-top-right-radius: 50px;
			border-bottom-right-radius: 50px;
			border-bottom-left-radius: 50px;
		}
		
	</style>
	</head>
	<body>
		<div class="header">
			  <a href="index.php" class="logo">ONLINE BUS TICKET</a>
			  <div class="header-right">
				<a  href="index.php">Home</a>
				<a  href="reg.php">Registration</a>
				<a href="login.php" class="active"  >Login</a>
			  </div>
		</div> 	
		<br><br><br><br>
			<div class="container">
			<div class="col-md-5 box">
					
			</div>
			<div class="col-md-1 box">
			</br>
			</div>
			<div class="col-md-6 box">
			  
				<div class="panel-body">
				<div class="col-md-6 box"><img src="av1.PNG" alt="Avatar" class="avatar"></div>
				<div class="col-md-6 box">
					<form method="post" action="li.php">
						<div class ="form-group">
							<br><br>
							<label for="mail">E-mail</label>
							<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" name="email" placeholder="Enter E-mail" required/>
							</div>
							<label for="pass">Password</label>
							<input type="password" class="form-control" name="pass" placeholder="Enter Password" required/>
							<br />
							<input type="submit" class="btn btn-default" value="Log in" />
							<a href="reg.php"><input type="button" class="btn btn-default" value="Sign up" /></a>
						</div>					
					</form>
				</div>
	</div></div>
	

		</div>	
		<br><br><br><br><br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>