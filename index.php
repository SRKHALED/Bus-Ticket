<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BUS TICKET</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			h1{
				color:blue;
				font-family: ;
				text-align:center;
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
				<a class="active" href="index.php">Home</a>
				<?php 
				if (isset($_SESSION["id"])){
					
					echo "<a href='li.php'>Profile</a>
						  <a href='login.php' >Log-out</a>";
				}
				else{
					echo "<a href='reg.php'>Registration</a>
						  <a href='login.php' >Login</a>";
					}
				?>
			 </div>
		</div> 		
		<br>
		<div class="container">
			<br>
			<div class="col-md-8 box">
			 <br>
				<div class="w3-content w3-section" style="max-size:100%">
				  <img class="mySlides w3-animate-fading" src="bus1.jpg" style="width:100%">
				  <img class="mySlides w3-animate-fading" src="bus2.jpg" style="width:100%">
				  <img class="mySlides w3-animate-fading" src="bus3.jpg" style="width:100%">
				  <img class="mySlides w3-animate-fading" src="bus5.jpg" style="width:100%">
				</div>	
			</div>
			<br>
			<div class="col-md-4 box">
				<div class="panel panel-info">
					<div class="panel-body">
						<form method="post" action="search.php">
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
								<label for="ex4"></label>
								<div class="input-group">
									<input type="submit" class="form-control" value="Search" />
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-search"></span></span>
								</div>
								<br/>
							</div>
						</form>
					</div>
				</div>
				<br><br>
			</div>
			<br><br><br>
		</div>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>		
		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
				   x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 9000);    
			}
		</script>
	</body>
</html>