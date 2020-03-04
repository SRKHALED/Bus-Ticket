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
				<a class="active" href="confirmPay.php">Confirm Payment</a>
				<a  href="releaseTicket.php">Release Ticket</a>
				<a href="addbus.php" >Add New Bus</a>
				<a  href="addroad.php" >Add New Road</a>
				<a  href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a  href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br><br><br>
			<div class="container">
			
				<div class="col-md-4 box"></div>
				<div class="col-md-4 box">
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
							$ri = $_POST['ref'];
							$ti = $_POST['tex'];
							$sql="SELECT `amount` FROM `booking_info` WHERE `book_id` LIKE '$ri'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
								$amount=$row["amount"];
								}
								echo"<center>
									<h4>Confirm Payment</h4><br>
									<div class='tet'>
									<b>Reference ID : </b>".$ri."<br><br>
									<b>Transaction ID : </b>".$ti."<br><br>
									<b>Amount : </b>".$amount." BDT<br><br></div>
									<a href='confirmPay.php'><button class='btn3 b2'>Confirm</button></a><br>
									</center>";
									$sql1="INSERT INTO `payment`(`tex_id`, `book_id`) VALUES ('$ti','$ri')";
									$result1 = $conn->query($sql1);
							}
							else{
								echo"<center>
									<h4>Invalid Reference ID</h4></center>";
							}
						$conn->close();
						?>
					</div>
				</div>
			</div>
			<br><br><br>


		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>