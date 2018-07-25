<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="INSERT INTO std_reg(Name,ID,Program,password,DOB,BG,Email,Father_Name,Full_Address,Phone_no)
VALUES('$_POST[Name]','$_POST[ID]','$_POST[Program]','$_POST[password]','$_POST[DOB]',
'$_POST[Blood_Group]','$_POST[Email]','$_POST[Father_Name]','$_POST[Full_Address]','$_POST[Phone_no]')";


if (mysqli_query($conn, $sql)) {
    echo "Registration  successful...!! Now You Can Login..!"; 
  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
	</head>
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Login</p></font>
				
<div class="secondthree">
					<div class="FIRST">
						<ul><b>
							<li><a href="index.php"><p><font color="red"><img src="../img/h.png" width="16" height="16" align="right"/>Home</p></a></center></li>
							<li><a href="#"><img src="../img/i.png" width="16" height="16" align="right"/>About</a></center></li>
							<li><a href="#"><img src="../img/a.png" width="20" height="20" align="right"/>Administration</a></center></b>
							
							<div class="SEC">
								<ul>
								
								<li><a href="Admin_log.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Admin login</a>
								<li><a href="srch.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Search Student</a>
								<li><a href="view3.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Student Details</a>
								<li><a href="update.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Update Student registration</a>
								</ul>
								</div>
							
								<b>
								<li><a href=""><img src="../img/ac.png" width="20" height="20" align="right"/>Academic</a></center></li>
								<li><a href=""><img src="../img/f.png" width="18" height="18" align="right"/>Faculty</a></center></li>
								<li><a href=""><img src="../img/ad.png" width="18" height="18" align="right"/>Admission</a></center></li>
								<li><a href=""><img src="../img/std.png" width="20" height="20" align="right"/>Student</a></center></b>
								<div class="SEC">
								<ul>
								<li><a href="std_reg.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student Registration</a>
								<li><a href="std_log.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student login</a>
								</ul>
								</div>
							
								</li>
								
								<b>
								<li><a href=""><img src="../img/in.png" width="18" height="18" align="right"/>International</a></center></li>
								<li><a href=""><img src="../img/oth.png" width="16" height="16" align="right"/>Other</a></center></li>
								</b>
								</ul>
							</div>
					
				<div class="MIDDLE1">


					<center>
					<table border="4" cellpadding="0"
					cellspacing="0" width="40%" height="20%" align="middle";>
					<td>

					
						<img src="../img/stl.png" width="20" height="20" align="middle"/><br> <br>
						<form action="connection.php" method="POST">
						<center>
							<table class="reg-table clear">
								<tr>
									<td>ID:</td>
									<td><input type="text" name="ID" placeholder="" /></td>
								</tr>
								
								<tr>
									<td>Password:</td>
									<td><input type="password" name="Password" placeholder=""/></td>
								</tr>
								
							</table>
							<div class="e">
							<center>
							<input class="r-submit" type="submit" name="submit" value="Login"/></form></center>
							<br>
						    </center>
							</div>
							<center><table border="0" cellpadding="0"
							cellspacing="0" width="100%">
							  <tr>
							    <th bgcolor="white"> 
							<p>
								<?php
									date_default_timezone_set('Asia/Dhaka');
									echo date("h:i:sa").", ";
									echo date("d-m-Y");
								?>
							</p>

							</th></tr></table></center>
				</form>
			</section>
			</td>
			</table>
			</center>
			
			
		
		
		


	

					</div>
					
				</div><br><br><br><br>
				
				<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
				
			</div>
			</div>
			</div>
	</body>
</html>