<?php 
  	require_once('functions/ddbconfig.php');				
	require_once('functions/functions.php');						
	
    
$user = new login_registration_class();
session_start();
  
?>
<?php
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
			$uname	  = $_POST['uname'];
				$password = $_POST['password'];

					if(empty($uname) or empty($password)){
						echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							
						$login = $user->f_userlogin($uname, $password);
						if($login){
						header('Location:class_att.php');
						}else{
						echo "<p style='color:red;text-align:center'>Incorrect Username or password</p>";
							}
						}
					}
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
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faculty Login</p></font>
				
			<div class="secondthree">
					<div class="FIRST">
						<ul><b>
							<li><a href="index.php"><p><font color="red"><img src="../img/h.png" width="16" height="16" align="right"/>Home</p></a></center></li>
							<li><a href="#"><img src="../img/i.png" width="16" height="16" align="right"/>About</a></center></li>
							<li><a href="#"><img src="../img/a.png" width="20" height="20" align="right"/>Administration</a></center></b>
							
						<div class="SEC">
								<ul>
								
								<li><a href="Admin_log.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Admin login</a>
								
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

					<br>
						<img src="../img/f.png" width="20" height="20" align="middle"/><br> <br>
						 <form method="post" action="">
						<center>
							<table class="reg-table clear">
								<tr>
									<td>Username:</td>
									<td><input type="text" name="uname" placeholder="" required autofocus/></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="password" placeholder="" required/></td>
								</tr>
								

								
							</table>
							<div class="g">
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