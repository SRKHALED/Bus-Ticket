<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BUS TICKET</title>
		<link rel="stylesheet" href="style.css">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 
		 <style>
		 
						<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "bus_ticket";
						$conn = new mysqli($servername,$username,$password,$dbname);
						if($conn->connect_error){
						die("connection failed : ".$conn->connect_error);
						}
						if (isset($_SESSION["id"])){
						$id=$_SESSION["id"];
						$sql5="SELECT `email`,`pass` FROM `user_info` WHERE `u_id` LIKE '$id'";
							$result1 = $conn->query($sql5);
							if ($result1->num_rows > 0){
								while($row = $result1->fetch_assoc()){
									$k = $row["email"];
									$t = $row["pass"];
								}
							}
						}
						else{
							$k = $_POST['email'];
							$t = $_POST['pass'];
							}
						$sql5="SELECT * FROM user_info WHERE email LIKE '$k' AND pass LIKE '$t'";
							$result1 = $conn->query($sql5);
							if ($result1->num_rows > 0) {?>
		
		
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
				<?php
				while($row = $result1->fetch_assoc()){
					$id = $row["u_id"];
					$_SESSION["id"]=$id;
					$name = $row["name"];
					$mobil = $row["mobile"];
					$email = $row["email"];
					$address = $row["address"];
					echo"<div class='col-md-3 box'>
							<div class='panel panel-info'>
								<div class='panel panel-body'>
									<img  src='pp1.png' style='width:100%'><br><br>
									<center><b>".$name."</b></center><br>
									<span class='input-group-addon'>
									<a href='index.php'><span class='glyphicon glyphicon-home'></span>  Home</a></span></br>
									<span class='input-group-addon'>
									<a href='edit_pro.php'><span class='glyphicon glyphicon-user'></span>  Edit Profile</a></span></br>
									<span class='input-group-addon'>
									<a href='book.php'><span class='glyphicon glyphicon-tags'></span>  Book Tickets</a></span></br>
									<span class='input-group-addon'>
									<a href='bookingInfo.php'><span class='glyphicon glyphicon-book'></span>  Booking information</a></span></br>
									<span class='input-group-addon'>
									<a href='print.php'><span class='glyphicon glyphicon-print'></span>  Print Ticket</a></span>
								</div>
							</div>
						</div>
						<div class='col-md-9 box'>
							<div class='panel panel-info'>
								<div class='panel panel-body'>";
									echo "<hr><div class='tet'>"."<b>"."Name :"."</b><br><br>".$name."<hr>";
									echo "<b>"."Cell : "."</b><br><br>".$mobil."<hr>";
									echo "<b>"."E-mail : "."</b><br><br>".$email."<hr>";
									echo "<b>"."Address : "."</b><br><br>".$address."<hr></div>";			
			?>
								</div>
							</div>
						</div>
				</div>
				
				
				<?php }}
				else{?>
				
		h4{
				color:#FFFFFF;
			}
		.panel-body{
			background-image: url(p1.jpg);
			background-size:cover;
			border-top-left-radius: 50px;
			border-top-right-radius: 50px;
			border-bottom-right-radius: 50px;
			border-bottom-left-radius: 50px;
		}
		
	</style>
	</head>
	<body>
		
		 <div class="header">
			  <a href="index.php" class="logo">ONLINE BUS TICKET</a>
			  <div class="header-right">
				<a  href="index.php">Home</a>
				<a  href="reg.php">Registration</a>
				<a href="login.php" class="active"  >Login</a>
			  </div>
		</div> 
						
			
			
		<br><br><br><br><br>
		<div class="container">
			<div class="col-md-5 box">
					
			</div>
			<div class="col-md-1 box">
			</br>
			</div>
			<div class="col-md-6 box">
			  
				<div class="panel-body">
				<div class="col-md-6 box"><img src="av1.PNG" alt="Avatar" class="avatar"></div>
				<div class="col-md-6 box">
					<form method="post" action="li.php">
						<div class ="form-group">
							<br><br>
							<label for="mail">E-mail</label>
							<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" name="email" placeholder="Enter E-mail" required/>
							</div>
							<label for="pass">Password</label>
							<input type="password" class="form-control" name="pass" placeholder="Enter Password" required/>
							<br />
							<input type="submit" class="btn btn-default" value="Log in" />
							<a href="reg.php"><input type="button" class="btn btn-default" value="Sign up" /></a>
						</div>					
					</form>
				</div>
				<center><h4>Invalid e-mail or password</h4></center>
	</div></div>
		

		</div>
		<br><br><br><br>
			<?php }
			$conn->close();
			?>
			
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>
