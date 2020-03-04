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
				<div class="col-md-3 box">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<img class="" src="pp1.png" style="width:100%">
							<center><b><?php $n=$_POST["name"];
								echo "<br>".$n;
							?></b></center><br>
							<span class="input-group-addon">
							<a href="index.php"><span class="glyphicon glyphicon-home"></span>  Home</a></span></br>
							<span class="input-group-addon">
							<a href="edit_pro.php"><span class="glyphicon glyphicon-user"></span>  Edit Profile</a></span></br>
							<span class="input-group-addon">
							<a href="book.php"><span class="glyphicon glyphicon-tags"></span>  Book Tickets</a></span></br>
							<span class="input-group-addon">
							<a href="bookingInfo.php"><span class="glyphicon glyphicon-book"></span>  Booking information</a></span></br>
							<span class="input-group-addon">
							<a href="print.php"><span class="glyphicon glyphicon-print"></span>  Print Ticket</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-9 box">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<?php
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "bus_ticket";
								$conn = new mysqli($servername,$username,$password,$dbname);
								if($conn->connect_error){
									die("connection failed : ".$conn->connect_error);
								}
								$sql="INSERT INTO user_info (name, email,address,mobile,pass)
								VALUES('$_POST[name]','$_POST[email]','$_POST[address]','$_POST[mobile]','$_POST[pass]')";
								if($conn->query($sql)==true){
									
									echo "<hr><div class='tet'>"."<b>"."Name :"."</b><br><br>".validate($_POST["name"])."<hr>";
									echo "<b>"."Cell : "."</b><br><br>".validate($_POST["mobile"])."<hr>";
									echo "<b>"."E-mail : "."</b><br><br>".validate($_POST["email"])."<hr>";
									echo "<b>"."Address : "."</b><br><br>".validate($_POST["address"])."<hr></div>";
								}
								function validate($data){
									$data = trim($data);
									$data = stripcslashes($data);
									$data = htmlspecialchars($data);
									return $data;
								};
								$k = $_POST["email"];
								$t = $_POST["pass"];
								$sql1="SELECT `u_id` FROM `user_info` WHERE `email` LIKE '$k' AND `pass` LIKE '$t'";
								$result = $conn->query($sql1);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
										$id = $row["u_id"];
									}
								}
								$_SESSION["id"]=$id;
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
