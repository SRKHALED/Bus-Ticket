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
				<a  href="set_tp.php" >Set Ticket Price</a>
				<a  href="showbus.php" >All Bus Info</a>
				<a  href="showroad.php" >All Road Info</a>
				<a class="active" href="showtp.php" >Ticket Prices</a>
				<a  href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br><br><br><br>
			<div class="container">
			
				<div class="col-md-3 box">
				</div>
				<div class="col-md-6 box">
					<div class="panel-body">
						<center>
							<h4>Ticket Prices</h4>
						</center>
						<table class="table table-bordered">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Starting Point</th>
							  <th scope="col">Ending Point</th>
							  <th scope="col">Bus Type</th>
							  <th scope="col">Ticket Price</th>
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
							$sql1="SELECT * FROM `ticket_price`";
							$result = $conn->query($sql1);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$id = $row["tp_id"];
									$bt = $row["t_type"];
									$tp = $row["t_price"];
									$sp = $row["starting_point"];
									$ep = $row["ending_point"];
									echo"<tr>
									  <th scope='row'>".$id."</th>
									  <td><center>".$sp."</center></td>
									  <td><center>".$ep."</center></td>
									  <td><center>".$bt."</center></td>
									  <td><center>".$tp." TK</center></td>
									</tr>";
								}
							}
								$conn->close();
							?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			<br><br><br>


		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>