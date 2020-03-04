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
			h3{
				color:red;
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
				<a  href="addbus.php" >Add New Bus</a>
				<a class="active" href="addroad.php" >Add New Road</a>
				<a  href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a  href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
			<br><br>
			<div class="container">
			
				<div class="col-md-4 box"></div>
				<div class="col-md-5 box">
					<div class="panel-body">
						<center>
							<b><h4>Add New Road</h4></b></center><br>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$c=$_POST['c_no'];
							$sql1="SELECT `bus_id`  FROM `bus` WHERE `coach_no` LIKE '$c'";
							$result = $conn->query($sql1);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$bid = $row["bus_id"];
								}
								$sql="INSERT INTO `path`(`starting_point`, `ending_point`, `starting_time`,`bus_id`)
								VALUES('$_POST[s_point]','$_POST[e_point]','$_POST[time]','$bid')";
								if($conn->query($sql)==true){
									
									echo "<div class='tet'>"."<b>"."STARTING POINT : "."</b>".$_POST["s_point"]."<br />"."<br />";
									echo "<b>"."ENDING POINT : "."</b>".$_POST["e_point"]."<br />"."<br />";
									echo "<b>"."STARTING TIME : "."</b>".$_POST["time"]."<br />"."<br />";
									echo "<b>"."COACH NUMBER : "."</b>".$_POST["c_no"]."<br />"."<br />";
									echo "<center>"."<b>"." "."</b>"."</center>"."</div>";
									echo "<center><a href='addroad.php'><button class='btn sud'>Confirm</button></a></center>";
								}
							}
							else{
								echo "<br><br><br><div class='tet'>"."<center>"."<h3><b>"."INVALID COACH NUMBER "."</b></h3>"."</center>"."</div><br><br>";
								echo "<center><a href='addroad.php'><button class='btn sud'>Back</button></a></center><br><br><br><br>";
							}
							
							$conn->close();
						?>
					</div>
				</div>
			</div>
			<br><br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>