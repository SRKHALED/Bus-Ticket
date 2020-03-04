<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BUS TICKET</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style>
			h4{
				color:blue;
			}
			.panel-body{
				background-image: url(LR5ab.png);
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
				<a class="active" href="reg.php">Registration</a>
				<a href="login.php" >Login</a>
			  </div>
		</div> 
		<br>
		<div class="container">
			<div class="col-md-7 box">	
			</div>
			<div class="col-md-5 box">
				<div class="panel-body">
					<center><h4>Registration Form</h4></center>
					<form form method="post" action="reg2.php">
						<div class ="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter Name" required/>
							<br />
							<label for="email">E-mail</label>
							<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" name="email" placeholder="Enter E-mail" required/>
							</div>
							<br />
							<label for="mobile">Mobile</label>
							<div class="input-group">
							<span class="input-group-addon">+88</span>
							<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" required/>
							</div>
							<br />
							<label for="mobil">Address</label>
							<span class="glyphicon glyphicon"> </span>
							<input type="text" class="form-control" name="address" placeholder="Enter Address" required/>
							<br />
							<label for="pass">Password</label>
							<input type="password" class="form-control" name="pass" placeholder="Enter Password" required/>
							<br />
							<input type="submit" class="btn btn-default" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>