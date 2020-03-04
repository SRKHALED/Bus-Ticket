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
				<a  href="showtp.php" >Ticket Prices</a>
				<a  class="active" href="cancel.php" >Cancel Ticket </a>
				<a href="admin.php" >Log-Out</a>
			  </div>
		</div>	
		
			<br><br><br><br>
			<div class="container">
			
				<div class="col-md-2 box">
				</div>
				<div class="col-md-8 box">
					<div class="panel-body">
						<center>
							<h4>All Booking Information</h4>
						</center>
						<table class="table table-bordered">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">#</th>
							  <th scope="col"><center>Reference ID</center></th>
							  <th scope="col"><center>Booked Time</center></th>
							  <th scope="col"><center>Current Time</center></th>
							  <th scope="col"><center> Time Difference</center></th>
							  <th scope="col"><center>Cancel Booking</center></th>
							  
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
							$id=$_POST['id'];
							$sql="SELECT `day`, `s_time`, `seat_no1`, `seat_no2`, `path_id`, `bus_id` FROM `booking_info` WHERE `book_id`LIKE '$id'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$d=$row["day"];
									$t=$row["s_time"];
									$s1=$row["seat_no1"];
									$s2=$row["seat_no2"];
									$pid=$row["path_id"];
									$bid=$row["bus_id"];
								}
								$sql1="SELECT `avt_id`,`number_of_avt` FROM `available_ticket` WHERE `day`LIKE '$d'AND `s_time` LIKE '$t' AND `bus_id` LIKE '$bid' AND `path_id` LIKE '$pid'";
								$result1 = $conn->query($sql1);
								if ($result1->num_rows > 0) {
									while($row = $result1->fetch_assoc()){
										$avtid=$row["avt_id"];
										$noas=$row["number_of_avt"];
									}
								}
								if($s2==null){
									$noas=$noas+1;
									$sql4="UPDATE `available_ticket` SET `$s1`='0',`number_of_avt`='$noas' WHERE `avt_id`LIKE '$avtid'";
									if($conn->query($sql4)==true){
									}
								}
								if($s2!=null){
									$noas=$noas+2;
									$sql4="UPDATE `available_ticket` SET `$s1`='0',`$s2`='0',`number_of_avt`='$noas' WHERE `avt_id` LIKE '$avtid'";
									if($conn->query($sql4)==true){
									}
								}
							}
							$sql1="DELETE FROM `booking_info` WHERE `book_id` LIKE '$id'";
							$result = $conn->query($sql1);
							
							$i=1;
							$bot=date('H:i:s');
							$p=explode(':',$bot);
							$ch=($p[0]);
							$cm=($p[1]);
							$b2=$p[0]+5;
							$sql="SELECT * FROM `booking_info`";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$bookid = $row["book_id"];
									$t = $row["book_time"];
									$sql1="SELECT `pay_id` FROM `payment` WHERE `book_id` LIKE '$bookid'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
									}
									else{
										$q=explode(':',$t);
										$ch1=($q[0]);
										$cm1=($q[1]);
										$nt=(($ch-$ch1)*60)+($cm-$cm1);
										$b1=$q[0]+5;
										echo"<tr>
										  <th scope='row'>".$i."</th>
										  <td><center>".$bookid."</center></td>
										  <td><center>".$b1.":".$q[1].":".$q[0]."</center></td>
										  <td><center>".$b2.":".$p[1].":".$p[0]."</center></td>
										  <td><center>".$nt."-min</center></td>
										  <td><center>
										  <form action='cancel2.php' method='post'>
											<input type='hidden' name='id' value='".$row["book_id"]."'/>
											<input type='submit' value='X'/>
										  </form>"."</center></td>
										</tr>";
									}
									$i++;
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