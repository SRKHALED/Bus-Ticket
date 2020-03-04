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
			</br>
			<div class="container">
				<div class="col-md-6 box">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<center><h3>Booking Information</h3></center>
							<?php
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "bus_ticket";
								$conn = new mysqli($servername,$username,$password,$dbname);
								if($conn->connect_error){
									die("connection failed : ".$conn->connect_error);
								}
								$uid = $_SESSION["id"];
								$sp = $_SESSION["sp"];
								$ep = $_SESSION["ep"];
								$d = $_SESSION["d"];
								$t = $_SESSION["t"];
								$bt = $_SESSION["bt"];
								$pid = $_SESSION["pid"];
								$bid = $_SESSION["bid"];
								$s1 = $_SESSION["s1"];
								$s2 = NULL;
								$nos = 1;
								if(isset($_SESSION["s2"]))
								{
									$s2 = $_SESSION["s2"];
									$nos=2;
								}
								$bot=date('H:i:s');
								$sql1="SELECT `t_price` FROM `ticket_price` WHERE `starting_point` LIKE '$sp' AND `ending_point` LIKE '$ep' AND `t_type` LIKE '$bt'";
								$result1 = $conn->query($sql1);
								if ($result1->num_rows > 0) {
									while($row = $result1->fetch_assoc()){
										$tp = $row["t_price"];
									}
								}
								$amount = $nos*$tp;
								$sql="INSERT INTO `booking_info`(`day`, `s_time`, `book_time`, `seat_no1`, `seat_no2`, `amount`, `path_id`, `bus_id`, `u_id`) 
								VALUES('$d','$t','$bot','$s1','$s2','$amount','$pid','$bid','$uid')";
								if($conn->query($sql)==true){
									echo"<div class='col-md-6 box'><hr/>
											<div class='tet'><b>Date : </b>".$d."<hr/>
											<b>Departure  : </b>".$sp."<hr/>
											<b>Seat NO  : </b>".$s1." ".$s2."<hr/>
											<b>Amount  : </b>".$amount." BDT<hr/>
											<b>AC-NO : </b>+8801741618005 </div>
										</div>
										<div class='col-md-6 box'><hr/>
											<div class='tet'><b>Time : </b>".$t."<hr/>
											<b>Arrival  :</b>".$ep."<hr/>
											<b>Bus Type  :  </b>".$bt."<hr/>
											<b>Counter No : </b>01 <hr/>
										";
								}
								$sql2="SELECT `book_id` FROM `booking_info` WHERE `day` LIKE '$d' AND `seat_no1` LIKE '$s1' AND `s_time` LIKE '$t' AND `path_id` LIKE '$pid' AND `bus_id` LIKE '$bid' AND `u_id` LIKE '$uid'";
								$result2 = $conn->query($sql2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()){
										$bookid = $row["book_id"];
									}
								}
										echo"<b>Reference ID : </b>".$bookid."</div>
										</div>
										";
								$sql3="SELECT `avt_id`, `number_of_avt` FROM `available_ticket` WHERE `day` LIKE '$d' AND `s_time` LIKE '$t' AND `bus_id` LIKE '$bid' AND `path_id` LIKE '$pid'";
								$result3 = $conn->query($sql3);
								if ($result3->num_rows > 0) {
									while($row = $result3->fetch_assoc()){
										$avtid = $row["avt_id"];
										$avt = $row["number_of_avt"];
									}
								}
								
								$newavt=$avt-$nos;
								$sql4="UPDATE `available_ticket` SET `number_of_avt`='$newavt' WHERE `avt_id` LIKE '$avtid'";
									if($conn->query($sql4)==true){
									}
								if($nos==1)
								{
									$sql4="UPDATE `available_ticket` SET `$s1`='1' WHERE `avt_id` LIKE '$avtid'";
									if($conn->query($sql4)==true){
									}
								}
								if($nos==2)
								{
									$sql4="UPDATE `available_ticket` SET `$s1`='1',`$s2`='1' WHERE `avt_id` LIKE '$avtid'";
									if($conn->query($sql4)==true){
									}
								}
							$conn->close();	
							?>
						</div>
					</div>	
				</div>
				<div class="col-md-6 box">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<center><h3>Make Payment Using Bkash</h3></center>
							<div class='tet'>
								<div class="col-md-6 box"><hr/>
								<b>STEP 1: </b>Dial *247#<hr/>
								<b>STEP 3: </b> Account NO <hr/>
								<b>STEP 5: </b>Reference ID<hr/>
								<b>STEP 7: </b>Your Pin<hr/>
								</div>
								<div class="col-md-6 box"><hr/>
								<b>STEP 2: </b>Payment<hr/>
								<b>STEP 4: </b>Amount  <hr/>
								<b>STEP 6: </b>Counter No <hr/>
								<b>STEP 8: </b>Send<hr/>
								</div>
								<center><b>Complete Payment With in 30 Minutes</b></center>
							</div>
						</div>
					</div>	
				</div>
		
			</div>	
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>
