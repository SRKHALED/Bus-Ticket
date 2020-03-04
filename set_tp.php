<html lang="en">
	<head>
		<title>BUS TICKET ADMIN</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <style>
			.fild{
				 background-image:url(bus1.png);
				 background-position: center;
				 background-repeat: no-repeat;
				 background-size:cover:
			}
			.panel-body{
				background-image: url(LR5ab.png);
				background-size:100%;
				border-top-left-radius: 50px;
				border-top-right-radius: 50px;
				border-bottom-right-radius: 50px;
				border-bottom-left-radius: 50px;
			}
			h1{
				color:white;
			}
			h4{
				color:blue;
				font-family: "Comic Sans MS", cursive, sans-serif;
			}
			.header {
			  overflow: hidden;
			 background-image:url(h2.jpg);
			 background-size:cover;
			  padding: 0px 0px;
			}
	   </style>
	</head>
	<body>
		
		<div class="header">
			  <a class="logo">ONLINE BUS TICKET</a>
			  <div class="header-right">
				<a  href="confirmPay.php">Confirm Payment</a>
				<a  href="releaseTicket.php">Release Ticket</a>
				<a href="addbus.php" >Add New Bus</a>
				<a  href="addroad.php" >Add New Road</a>
				<a class="active" href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a  href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br>
			<div class="container">
			
				<div class="col-md-4 box"></div>
				<div class="col-md-5 box">
					<div class="panel-body">
						<center>
							<h4>Set Ticket Price</h4>
							<form form method="post" action="set_tp2.php">
								<label for="form">Form</label>
								<div class="input-group">
									<select name ="s_point" class="form-control" required>
										<option value="">Select starting point</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chittagang">Chittagang</option>
										<option value="Khulna">Khulna</option>
										<option value="Rajsahi">Rajsahi</option>
									</select>
								</div>
								<br>
								<label for="to">To</label>
								<div class="input-group">
									<select name ="e_point" class="form-control" required>
										<option value="">Select ending point</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chittagang">Chittagang</option>
										<option value="Khulna">Khulna</option>
										<option value="Rajsahi">Rajsahi</option>
									</select>
								</div>
								<br>
									<label for="type">Bus Type</label>
										<div class="input-group">
													<select name ="b_type" class="form-control" required>
														<option value="">Select Bus Type</option>
														<option value="AC BUS">AC BUS</option>
														<option value="NON-AC BUS">NON-AC BUS</option>
													</select>
													</div>
										<br />
										<label for="caoch">Ticket Price</label>
										<div class="input-group">
										<input type="text" class="form-control" name="tp" placeholder="Enter Per Ticket Price" required/>
										</div>
										<br />
										<input type="submit" class="btn btn-default" value="Set Now" />
								</div>
				
							</form>
						</center>
					</div>
				</div>
			</div>
			<br><br>


		<div class="footer">
			Developed by S.R.Khaled
		</div>
	</body>
</html>