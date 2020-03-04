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
				font-size:22px;
			}
			.tet{
			font-size:22px;
		
			}
			button{
			color:white;
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
				<a class="active" href="addbus.php" >Add New Bus</a>
				<a  href="addroad.php" >Add New Road</a>
				<a  href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a  href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br><br><br><br>
			<div class="container">
			
				<div class="col-md-4 box"></div>
				<div class="col-md-4 box">
					<div class="panel-body">
						<center>
							<b><h4>Add New Bus</h4></b></center><br>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$sql="INSERT INTO `bus`( `bus_type`, `coach_no`, `number_of_seat`)
							VALUES('$_POST[b_type]','$_POST[coach]','$_POST[nos]')";
							if($conn->query($sql)==true){
								
								echo "<div class='tet'>"."<b>"."BUS TYPE : "."</b>".$_POST["b_type"]."<br />"."<br />";
								echo "<b>"."COACH NO : "."</b>".$_POST["coach"]."<br />"."<br />";
								echo "<b>"."NUMBER OF SEAT : "."</b>".$_POST["nos"]."<br />"."<br />";
								echo "<center>"."<b>"." "."</b>"."</center>"."</div>";
							}
							
							$conn->close();
						?>
						<center><a href="addbus.php"><button class="btn sud">Confirm</button></a></center>
					</div>
				</div>
			</div>
			<br><br><br><br><br><br>
	

		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>