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
				background-size:cover;
				border-top-left-radius: 50px;
				border-top-right-radius: 50px;
				border-bottom-right-radius: 50px;
				border-bottom-left-radius: 50px;
			}
			h1{
				color:white;
			}
			h3{
				color:red;
				font-size:22px;
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
				<a class="active" href="releaseTicket.php">Release Ticket</a>
				<a  href="addbus.php" >Add New Bus</a>
				<a  href="addroad.php" >Add New Road</a>
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
							<b><h4>Release Ticket</h4></b></center><br>
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bus_ticket";
							$conn = new mysqli($servername,$username,$password,$dbname);
							if($conn->connect_error){
								die("connection failed : ".$conn->connect_error);
							}
							$t=$_POST['time'];
							$sp=$_POST['s_point'];
							$ep=$_POST['e_point'];
							$bt=$_POST['b_type'];
							$sql1="SELECT * FROM `path` WHERE `starting_time` LIKE '$t' AND `starting_point` LIKE '$sp' AND `ending_point` LIKE '$ep'";
							$result = $conn->query($sql1);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$bid = $row["bus_id"];
									$pid = $row["path_id"];
									$sql2="SELECT `bus_type` FROM `bus` WHERE `bus_id` LIKE '$bid'";
									$result2 = $conn->query($sql2);
									if ($result2->num_rows > 0) {
										while($row = $result2->fetch_assoc()){
											$bt1 = $row["bus_type"];	
										}
										if ($bt==$bt1){
											break;
										}
									}
									
								}
								$sql2="SELECT `number_of_seat` FROM `bus` WHERE `bus_id` LIKE '$bid'";
								$result2 = $conn->query($sql2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()){
										$nos = $row["number_of_seat"];
										
									}
								}
								$sql="INSERT INTO `available_ticket`(`day`, `s_time`, `number_of_avt`, `bus_id`, `path_id`)
								VALUES('$_POST[day]','$t','$nos','$bid','$pid')";
								if($conn->query($sql)==true){
									echo "<div class='tet'>"."<b>"."DATE : "."</b>".$_POST["day"]."<br />"."<br />";
									echo "<b>"."STARTING POINT : "."</b>".$_POST["s_point"]."<br />"."<br />";
									echo "<b>"."ENDING POINT : "."</b>".$_POST["e_point"]."<br />"."<br />";
									echo "<b>"."STARTING TIME : "."</b>".$_POST["time"]."<br />"."<br />";
									echo "<b>"."BUS TYPE : "."</b>".$_POST["b_type"]."<br />"."<br />";
									echo "<b>"."NUMBER OF TICKET : "."</b>".$nos."<br />"."<br />";
									echo "<center>"."<b>"." "."</b>"."</center>"."</div>";
									echo "<center><a href='releaseTicket.php'><button class='btn sud'>Confirm</button></a></center>";
								}
							}
							else{
								echo "<br><br><div class='tet'>"."<center>"."<h3><b>"."INVALID STARTING AND ENDING PONT "."</b></h3>"."</center>"."</div><br>";
								echo "<center><a href='releaseTicket.php'><button class='btn sud'>Back</button></a></center><br><br><br><br><br>";
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