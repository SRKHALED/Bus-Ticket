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
			.y{
				background-color: dodgerblue;
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
				</div>
				<div class="col-md-3 box">
					<br><br><br><br><br>
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
							$sp = $_SESSION["sp"];
							$ep = $_SESSION["ep"];
							$d = $_SESSION["d"];
							$t = $_SESSION["t"];
							$bt = $_SESSION["bt"];
							$pid = $_SESSION["pid"];
							$bid = $_SESSION["bid"];
							
						
								$sql3="SELECT * FROM `available_ticket` WHERE `day` LIKE '$d' AND `s_time` LIKE '$t' AND `path_id` LIKE '$pid' AND `bus_id` LIKE '$bid'";
								$result3 = $conn->query($sql3);
								if ($result3->num_rows > 0) {
									while($row = $result3->fetch_assoc()){
										$nos = $row["number_of_avt"];
										$A1 = $row["A1"];
										$A2 = $row["A2"];
										$B1 = $row["B1"];
										$B2 = $row["B2"];
										$C1 = $row["C1"];
										$C2 = $row["C2"];
										$C3 = $row["C3"];
										$D1 = $row["D1"];
										$D2 = $row["D2"];
										$D3 = $row["D3"];
										$E1 = $row["E1"];
										$E2 = $row["E2"];
										$E3 = $row["E3"];
										$F1 = $row["F1"];
										$F2 = $row["F2"];
										$F3 = $row["F3"];
										$G1 = $row["G1"];
										$G2 = $row["G2"];
										$G3 = $row["G3"];
										$H1 = $row["H1"];
										$H2 = $row["H2"];
										$H3 = $row["H3"];
									}
									if(isset($_SESSION["s1"]))
									{
										$id=$_POST['id'];
										$s1=$_SESSION["s1"];
										echo "<br><br><center>SEAT NO-1  : ". $s1."<hr/>";
										echo "SEAT NO - 2 : ". $id."<hr/>";
										$_SESSION["s2"]=$id;
										echo"<a href='book4.php'><button class='btn3 b6'> Book </button></a></center>";
									}
									else
									{
										$id=$_POST['id'];
										$s1=$id;
										$_SESSION["s1"]=$s1;
										echo "<center><hr/>SEAT NO-1 :".$id."<hr/>";
										echo"<a href='book4.php'><button class='btn3 b6'> Book </button></a></center>";
									}
									echo"</div></div></div>
									
									<div class='col-md-3 box'>
										<div class='panel panel-info'>
											<div class='panel panel-body'>";
				
									echo "<table class='table'>
												<tbody>";
										echo "  ";
										echo"<tr>";
										echo "<td></td>";
										if($A1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='A1'/>
												  <button class='btn2 b9' type='submit' >A1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>A1</button></td>";
										}
										if($A2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='A2'/>
												  <button class='btn2 b9' type='submit' >A2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>A2</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										echo "<td></td>";
										if($B1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='B1'/>
												  <button class='btn2 b9' type='submit' >B1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>B1</button></td>";
										}
										if($B2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='B2'/>
												  <button class='btn2 b9' type='submit' >B2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>B2</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($C1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='C1'/>
												  <button class='btn2 b9' type='submit' >C1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>C1</button></td>";
										}
										if($C2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='C2'/>
												  <button class='btn2 b9' type='submit' >C2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>C2</button></td>";
										}
										if($C3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='C3'/>
												  <button class='btn2 b9' type='submit' >C3</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>C3</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($D1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='D1'/>
												  <button class='btn2 b9' type='submit' >D1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>D1</button></td>";
										}
										if($D2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='D2'/>
												  <button class='btn2 b9' type='submit' >D2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>D2</button></td>";
										}
										if($D3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='D3'/>
												  <button class='btn2 b9' type='submit' >D3</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>D3</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($E1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='E1'/>
												  <button class='btn2 b9' type='submit' >E1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>E1</button></td>";
										}
										if($E2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='E2'/>
												  <button class='btn2 b9' type='submit' >E2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>E2</button></td>";
										}
										if($E3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='E3'/>
												  <button class='btn2 b9' type='submit' >E3</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>E3</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($F1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='F1'/>
												  <button class='btn2 b9' type='submit' >F1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>F1</button></td>";
										}
										if($F2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='F2'/>
												  <button class='btn2 b9' type='submit' >F2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>F2</button></td>";
										}
										if($F3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='F3'/>
												  <button class='btn2 b9' type='submit' >F3</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>F3</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($G1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='G1'/>
												  <button class='btn2 b9' type='submit' >G1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>G1</button></td>";
										}
										if($G2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='G2'/>
												  <button class='btn2 b9' type='submit' >G2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>G2</button></td>";
										}
										if($G3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='G3'/>
												  <button class='btn2 b9' type='submit' >G3</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>G3</button></td>";
										}
										echo"</tr>";
										echo"<tr>";
										if($H1==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='H1'/>
												  <button class='btn2 b9' type='submit' >H1</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>H1</button></td>";
										}
										if($H2==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='H2'/>
												  <button class='btn2 b9' type='submit' >H2</button></form></td>";
										}
										else{
											echo "<td><button class='btn2 b10'>H2</button></td>";
										}
										if($H3==0){
											echo "<td><form action='book3.php' method='post'>
													<input type='hidden' name='id' value='H3'/>
												  <button class='btn2 b9' type='submit' >H3</button></form></td>";
										}										
										else{
											echo "<td><button class='btn2 b10'>H3</button></td>";
										}
										echo"</tr>";
											echo"</tbody>
										</table>";
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
