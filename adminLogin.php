<!DOCTYPE html>
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
				background-image:url(p2.jpg);
				background-size:cover;
			}
			h1{
				color:white;
			}
			h4{
				color:#cc3300;
			}
			
	   </style>
	</head>
	<body>
		
		<div class="header">
			 <center> <h1>ONLINE BUS TICKET</h1> </center>	  
		</div>	
			<div class="container">
					<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "bus_ticket";
						$conn = new mysqli($servername,$username,$password,$dbname);
						if($conn->connect_error){
						die("connection failed : ".$conn->connect_error);
						}
						$k = $_POST['email'];
						$t = $_POST['pass'];
						$sql5="SELECT * FROM admin WHERE email LIKE '$k' AND pass LIKE '$t'";
							$result1 = $conn->query($sql5);
							if ($result1->num_rows > 0) {  ?>
							<br>
										<div class='col-md-12 box'>
											<div class="panel panel-info">	  
												<div class='panel-body'>
													<div class='col-md-4 box'>
														<br>
														<center>
														<a href='confirmPay.php'><button class='btn1 b1'>Confirm Ticket</button></a></br></br></br>
														<a href='addbus.php'><button class='btn1 b2'>Add New Bus</button></a></br></br></br>
														<a href='showbus.php'><button class='btn1 b5'>Show All Bus Info</button></a></br></br>
														</center>
													</div>
													<div class='col-md-4 box'>
														</br>
														<center>
														<a href='releaseTicket.php'><button  class='btn1 b3'>Release Ticket</button></a></br></br></br>
														<a href='addroad.php'><button class='btn1 b4'>Add New Road</button></a></br></br></br>
														<a href='showroad.php'><button  class='btn1 b6'>Show All Road Info</button></a></br></br>
														</center>
													</div>
													<div class='col-md-4 box'>
														</br>
														<center>
														<a href='cancel.php'><button  class='btn1 b11'>Cancel Ticket</button></a></br></br></br>
														<a href='set_tp.php'><button  class='btn1 b7'>Set Ticket Price</button></a></br></br></br>
														<a href='chackticket.php'><button  class='btn1 b7'>Check Ticket</button></a></br></br></br>
														<a href='showtp.php'><button  class='btn1 b8'>Show Ticket Price</button></a></br></br>
														</center>
													</div>
												</div>
										
										
							<?php }
							
							else{
								echo "</br></br><div class='col-md-6 box'></div>
										<div class='col-md-6 box'>
										<div class='panel panel-default'>
										<div class='panel-body'>
									<div class='col-md-6 box'>
										<img src='av1.PNG' alt='Avatar' class='avatar'>
										
									</div>
									<div class='col-md-6 box'>
										<center><h4>Invalid e-mail or password</h4></center>
										<form method='post' action='adminLogin.php'>
											<div class ='form-group'>
												<br>
												<label for='mail'>E-mail</label>
												<div class='input-group'>
												<span class='input-group-addon'>@</span>
												<input type='email' class='form-control' name='email' required/>
												</div>
												<label for='pass'>Password</label>
												<input type='password' class='form-control' name='pass' required/>
												<br />
												<input type='submit' class='btn btn-default' value='Log in' />
												
											</div>					
										</form>
									</div>
									</div>
									</div>
									<br><br>";
									
							}
						$conn->close();
					?>
				
	
			</div>
		</div>
		</div>
			
		<br>
		<div class="footer">
			Developed by S.R.Khaled & MD.Delwar
		</div>
	</body>
</html>