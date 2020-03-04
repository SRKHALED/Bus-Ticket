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
			
				<div class="col-md-2 box"></div>
				<div class="col-md-8 box">
					<div class="panel panel-info">
						<div class="panel-body">
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$i=1;
							$uid = $_SESSION["id"];
							$sql="SELECT * FROM `booking_info` WHERE `u_id` LIKE '$uid'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
										$bookid =$row["book_id"];
										$d=$row["day"];
										$t=$row["s_time"];
										$s1=$row["seat_no1"];
										$s2=$row["seat_no2"];
										$pid=$row["path_id"];
										$bid=$row["bus_id"];
										$bookid=$row["book_id"];
										$amount=$row["amount"];
										$payment='Not Complet';
										$sql0="SELECT `pay_id` FROM `payment` WHERE `book_id` LIKE '$bookid'";
										$result0 = $conn->query($sql0);
										if ($result0->num_rows > 0) {
											$payment='Complet';
										}
										$sql1="SELECT `starting_point`, `ending_point` FROM `path` WHERE `path_id` LIKE '$pid'";
										$result1 = $conn->query($sql1);
										if ($result1->num_rows > 0) {
											while($row = $result1->fetch_assoc()){
												$sp=$row["starting_point"];
												$ep=$row["ending_point"];
												}
										}
										$sql1="SELECT `bus_type` FROM `bus` WHERE `bus_id` LIKE '$bid'";
										$result1 = $conn->query($sql1);
										if ($result1->num_rows > 0) {
											while($row = $result1->fetch_assoc()){
												$bt=$row["bus_type"];
												}
										}
										echo"<center><h3>Booking Number : ".$i."</h3></center><hr/>";
										echo"<div class='col-md-6 box'>
												<div class='tet'>
												<b>Date : </b>".$d."<hr/>
												<b>Departure  : </b>".$sp."<hr/>
												<b>Seat NO  : </b>".$s1." ".$s2."<hr/>
												<b>Amount  : </b>".$amount." BDT<hr/> </div>
												
											</div>
											<div class='col-md-6 box'>
												<div class='tet'>
												<b>Departure Time : </b>".$t."<hr/>
												<b>Arrival  : </b>".$ep."<hr/>
												<b>Reference ID :  </b>".$bookid."<hr/>
												<b>Payment :  </b>".$payment."<hr/>
											</div></div>";
											$i++;
									}
								}
								$conn->close();
							?>
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