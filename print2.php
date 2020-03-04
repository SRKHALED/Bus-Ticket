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
		
	<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
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
			<br><br>
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
							$ri = $_POST['ref'];
							$ti = $_POST['tex'];
							$sql0="SELECT `pay_id` FROM `payment` WHERE `book_id` LIKE '$ri' AND`tex_id` LIKE '$ti'";
							$result0 = $conn->query($sql0);
							if ($result0->num_rows > 0) {
							
								$sql="SELECT * FROM `booking_info` WHERE `book_id` LIKE '$ri'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
										$bookid = $row["book_id"];
										$d=$row["day"];
										$t=$row["s_time"];
										$s1=$row["seat_no1"];
										$s2=$row["seat_no2"];
										$pid=$row["path_id"];
										$bid=$row["bus_id"];
										$uid=$row["u_id"];
										$amount=$row["amount"];
									}
									$sql1="SELECT `name`, `mobile` FROM `user_info` WHERE `u_id` LIKE '$uid'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row = $result1->fetch_assoc()){
											$name=$row["name"];
											$mobile=$row["mobile"];
											}
									}
									$sql1="SELECT `starting_point`, `ending_point` FROM `path` WHERE `path_id` LIKE '$pid'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row = $result1->fetch_assoc()){
											$sp=$row["starting_point"];
											$ep=$row["ending_point"];
											}
									}
									$sql1="SELECT `coach_no`,`bus_type` FROM `bus` WHERE `bus_id` LIKE '$bid'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										while($row = $result1->fetch_assoc()){
											$coach=$row["coach_no"];
											$bt=$row["bus_type"];
											}
									}
									echo"<div id='printMe'><center><h3>ONLINE BUS TICKET</h3></center>
										<div class='col-md-6 box'><hr/>
												<div class='tet'>
												<b>Name : </b>".$name."<hr/>
												<b>Mobile No : </b>".$mobile."<hr/>
												<b>Seat NO  : </b>".$s1." ".$s2."<hr/>
												<b>Bus Type  :  </b>".$bt."<hr/>
												<b>Amount  : </b>".$amount." BDT<hr/> </div>
												
											</div>
											<div class='col-md-6 box'><hr/>
												<div class='tet'>
												<b>Date : </b>".$d."<hr/>
												<b>Departure Time : </b>".$t."<hr/>
												<b>Departure  : </b>".$sp."<hr/>
												<b>Arrival  : </b>".$ep."<hr/>
												<b>Reference ID : </b>".$bookid."<hr/>
												</div></div></div>
											";?>
									<center><button onclick="printDiv('printMe')" class="btn3 b3">Print</button></center>
								<?php
								}
							}
							else{
							?>
								<center>
									<h3>Print Ticket</h3>
									<form form method="post" action="print2.php">
										<div class ="form-group">
											<label for="ref">Reference ID</label>
											<div class="input-group">
											<input type="text" class="form-control" name="ref" placeholder="Enter Reference ID" required/>
											</div>
											<br />
											<label for="tex">Transaction ID</label>
											<div class="input-group">
											<input type="text" class="form-control" name="tex" placeholder="Enter Transaction ID" required/>
											</div>
											<br />
											<input type="submit" class="btn btn-default" value="Submit" />
											<h4>Invalid Reference ID OR Transaction ID</h4>
										</div>
						
									</form>
								</center>
								<?php
							}
							$conn->close();
							?>
						</div>
					</div>
				</div>
			</div>


		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>