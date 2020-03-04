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
				<a  href="addroad.php" >Add New Road</a>
				<a class="active" href="set_tp.php" >Set Ticket Price</a>
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
							<b><h4>Set Ticket Price</h4></b></center><br>
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
							$bt=$_POST['b_type'];
							$sql="INSERT INTO `ticket_price`(`t_type`, `t_price`, `starting_point`, `ending_point`)
							VALUES('$_POST[b_type]','$_POST[tp]','$sp','$ep')";
							if($conn->query($sql)==true){
								
								echo "<div class='tet'>"."<b>"."STARTING POINT : "."</b>".$_POST["s_point"]."<br />"."<br />";
								echo "<b>"."ENDING POINT : "."</b>".$_POST["e_point"]."<br />"."<br />";
								echo "<b>"."BUS TYPE : "."</b>".$_POST["b_type"]."<br />"."<br />";
								echo "<b>"."PER TICKET PRICE : "."</b>".$_POST["tp"]." TAKA<br />"."<br /></div>";
								echo "<center><a href='set_tp.php'><button class='btn sud'>Confirm</button></a></center>";
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