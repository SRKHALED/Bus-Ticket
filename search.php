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
			  <a  href="index.php" class="logo">ONLINE BUS TICKET</a>
			  <div class="header-right">
				<a class='active' href="index.php">Home</a>
				<?php 
				if (isset($_SESSION["id"])){
					
					echo "<a href='li.php'>Profile</a>
						  <a href='login.php' >Log-out</a>";
				}
				else{
					echo "<a  href='reg.php'>Registration</a>
						  <a href='login.php' >Login</a>";
					}
				?>
			  </div>
		</div> 
		<br><br><br>
		<div class="container">
			<div class="col-md-6 box">	
			</div>
			<div class="col-md-6 box">
				<div class="panel-body">
					<center><h4>Available Ticket</h4></center>
					<table class="table table-bordered">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">Starting Point</th>
							  <th scope="col">Ending Point</th>
							  <th scope="col">Starting Time</th>
							  <th scope="col">Bus Type</th>
							  <th scope="col">Available Seat</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$sp=$_POST['s_point'];
							$ep=$_POST['e_point'];
							$d=$_POST['day'];
							$sql="SELECT `path_id` FROM `path` WHERE `starting_point` LIKE '$sp' AND `ending_point` LIKE '$ep'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$pid = $row["path_id"];
									$sql1="SELECT `s_time`, `number_of_avt`, `bus_id` FROM `available_ticket` WHERE `path_id` LIKE '$pid' AND `day` LIKE '$d'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row = $result1->fetch_assoc()){
											$st = $row["s_time"];
											$nos = $row["number_of_avt"];
											$bid = $row["bus_id"];
											$sql2="SELECT `bus_type`  FROM `bus` WHERE `bus_id` LIKE '$bid'";
											$result2 = $conn->query($sql2);
											if ($result2->num_rows > 0) {
												while($row = $result2->fetch_assoc()){
													$bt = $row["bus_type"];
												}
											}
						
											echo"<tr>
											  <td><center>".$sp."</center></td>
											  <td><center>".$ep."</center></td>
											  <td><center>".$st."</center></td>
											  <td><center>".$bt."</center></td>
											  <td><center>".$nos."</center></td>
											</tr>";
										}
									}
								}
								
							}
							$conn->close();
							?>
						  </tbody>
						</table>
				</div>
			</div>
		</div>
		<br><br><br><br><br><br><br><br><br><br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>