<?php 
  	require_once('functions/ddbconfig.php');				
	require_once('functions/functions.php');						
	
    session_start();
    if (!isset($_SESSION['id'])){
    header('location:../admin/admin_log.php');
    }
$user = new login_registration_class();

  
  $i=0;
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
				<font size="+4"   >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Attendance Management</p></font>
				
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
					
<div class="all_student fix">
		<center><h3>Attendance Management</h3>
		
			
			
		</div>
		<?php
			if(isset($_POST['sub'])){
				$name = $_POST['name'];
				$stid = $_POST['stid'];
				
				
			$add = $user->add_attn_student($name,$stid);
				if($add){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Successfull!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Failed</p>";
				}
			}
					
		
		
		?>
		<div style="margin-left:330px;padding-top:30px;">
			<center><table>
			<form action="" method="post">
				<table>
					<tr>
						<td>Student Name: </td>
						<td><input type="text" name="name"  required/></td>
					</tr>
					<tr>
						<td>Student Id: </td>
						<td><input type="text" name="stid" required /></td>
					</tr>
					
						
					
				</table>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="sub" value="Add student" />
						<input type="reset" />
						<a href = "class_att.php"><input type = "button" value = "Back" ></a>
				</center>
				
			</form>
		
		</div>
		
</div></center>
</body>
</html>