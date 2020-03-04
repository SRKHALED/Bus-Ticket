<html lang="en">
	<head>
		<title>BUS TICKET ADMIN</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <style>
			
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
				<a  href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a  href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a class="active" href="chackticket.php">Check Ticket</a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br><br><br><br>
			<div class="container">
			
				<div class="col-md-2 box"></div>
				<div class="col-md-8 box">
					<div class="panel-body">
						<center>
							<h4>Check Ticket</h4>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$uid = $_POST['bid'];;
							$sql="SELECT * FROM `booking_info` WHERE `book_id` LIKE '$uid'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
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
										echo"<center><h3>Reference ID : ".$uid."</h3></center><hr/>";
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
									}
								}
								$conn->close();
							?>
						</center>
					</div>
				</div>
			</div>
			<br><br><br><br>


		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>