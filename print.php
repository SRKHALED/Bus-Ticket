<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BUS TICKET</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 <style>
			h3{
				color:blue;
				font-family: "Comic Sans MS", cursive, sans-serif;
			}
			.panel-body{
				background-image: url(LR5ab.png);
				background-size:cover;
			}
		</style>
	</head>
	<body>
		 <div class="header">
			  <a href="index.php" class="logo">ONLINE BUS TICKET</a>
			  <div class="header-right">
				<a  href="index.php">Home</a>
				<a class="active" href="li.php">Profile</a>
				<a href="login.php" >Log-out</a>
			  </div>
		</div> 	
			<br><br><br><br>
			<div class="container">
			
				<div class="col-md-4 box"></div>
				<div class="col-md-4 box">
					<div class="panel panel-info">
						<div class="panel-body">
							<center>
								<h3>Print Ticket</h3>
								<form form method="post" action="print2.php">
									<div class ="form-group">
										<label for="ref">Reference ID</label>
										<div class="input-group">
										<input type="text" class="form-control" name="ref" placeholder="Enter Reference ID" required/>
										</div>
										<br />
										<label for="tex">Transaction ID</label>
										<div class="input-group">
										<input type="text" class="form-control" name="tex" placeholder="Enter Transaction ID" required/>
										</div>
										<br />
										<input type="submit" class="btn btn-default" value="Submit" />
									</div>
					
								</form>
							</center>
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