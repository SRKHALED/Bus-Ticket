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
			</br>
			<div class="container">
				<div class="col-md-8 box">
				</div>
				<div class="col-md-4 box">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<form method="post" action="book2.php">
								<br>
								<div class ="form-group">
									<label for="ex1">From</label>
									<select name ="s_point" class="form-control" required>
										<option value="">Select starting point</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chittagang">Chittagang</option>
										<option value="Khulna">Khulna</option>
										<option value="Rajsahi">Rajsahi</option>
									</select>
								
									</br>
									<label for="ex2">To</label>
									<select name ="e_point" class="form-control" required>
										<option value="">Select ending point</option>
										<option value="Dhaka">Dhaka</option>
										<option value="Sylhet">Sylhet</option>
										<option value="Chittagang">Chittagang</option>
										<option value="Khulna">Khulna</option>
										<option value="Rajsahi">Rajsahi</option>
									</select>
									</br>
									<label for="ex3">Date</label>
									<div class="input-group">
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span></span>
										<input class="form-control" id="ex4" type="date" name="day" required/>
									</div>
									</br>
									<label for="time">Schedule </label>
										<select name ="time" class="form-control" required>
											<option value="">Select Schedule</option>
											<option value="06.00">06.00 AM</option>
											<option value="08.00">08.00 AM</option>
											<option value="10.00">10.00 AM</option>
											<option value="12.00">12.00 PM</option>
											<option value="14.00">02.00 PM</option>
											<option value="16.00">04.00 PM</option>
											<option value="18.00">06.00 PM</option>
											<option value="20.00">08.00 PM</option>
											<option value="22.00">10.00 PM</option>
											<option value="24.00">12.00 AM</option>
										</select>
									<br>
									<label for="type">Bus Type</label>
										<select name ="b_type" class="form-control" required>
											<option value="">Select Bus Type</option>
											<option value="AC BUS">AC BUS</option>
											<option value="NON-AC BUS">NON-AC BUS</option>
										</select>
										<br>
									
										<input type="submit" class="form-control" value="Search" />
								</div>
							</form>
						</div>
					</div>	
				</div>
		
			</div>	
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>
