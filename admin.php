<!DOCTYPE html>
<html lang="en">
	<head>
		 <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BUS TICKET ADMIN</title>
		<link rel="stylesheet" href="style.css">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 
		 <style>
		
		.panel-body{
			background-image: url(p1.jpg);
			background-size:100%;
		}
		h1{
			color:white;
		}
		
	</style>
	</head>
	<body>
		 <div class="header">
			 <center> <h1>ONLINE BUS TICKET</h1> </center> 
		 </div>
		<br><br><br><br>
		<div class="container">
			<div class="col-md-6 box">		
			</div>
			<div class="col-md-6 box">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6 box">
							<img src="av1.PNG" alt="Avatar" class="avatar">
						</div>
						<div class="col-md-6 box">
							<form method="post" action="adminLogin.php">
								<div class ="form-group">
									<br><br>
									<label for="mail">E-mail</label>
									<div class="input-group">
									<span class="input-group-addon">@</span>
									<input type="email" class="form-control" name="email" required/>
									</div>
									<label for="pass">Password</label>
									<input type="password" class="form-control" name="pass" required/>
									<br />
									<input type="submit" class="btn btn-default" value="Log in" />
									
								</div>					
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>	
		<br><br><br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>