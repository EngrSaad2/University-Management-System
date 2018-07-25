<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
		<style>	table, td, th {
    border: 0px solid #DEB887;
}

table {
    border-collapse: collapse;
    width: 20px;
}

th {
    height: 40px;
}
			

</style>

	</head>
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				University management system</p></font>
				
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
					
						<center>
				
		<img src="../img/stl.png" width="500" height="200" align="middle"/><br></center>

			<center><h2>Student Registration Details</h2>
			<br>			


					
<?php 
   $con = mysqli_connect('localhost','root','');
   mysqli_select_db($con,'university_management');
   $sql = "SELECT * FROM std_reg";
   $records = mysqli_query($con,$sql);
?>
<table border="1px" cellpadding="8"
					cellspacing="8px"; width="8px";  align="middle" ;>
  <tr>
	  <th>Name</th>
	  <th>Program</th>
	  <th>Password</th>
	  <th>Date of Birth</th>
	  <th>Blood group</th>
	  <th>Email</th>
	 
   </tr>
   
   <?php
   while($row = mysqli_fetch_array($records))
   {
	   echo "<tr><form action=updatecon.php method=post>";
	   echo "<td><input type=text name=Name value='".$row['Name']."'></td>";
	   echo "<td><input type=text name=Program value='".$row['Program']."'></td>";
	   echo "<td><input type=text name=Password value='".$row['Password']."'></td>";
	   echo "<td><input type=text name=DOB value='".$row['DOB']."'></td>";
	   echo "<td><input type=text name=BG value='".$row['BG']."'></td>";
	   echo "<td><input type=text name=Email value='".$row['Email']."'></td>";  
	   echo "<td><input type=hidden name=id value='".$row['id']."'>";
	   echo "<td><input type=submit>";
	   echo "</form></tr>";
   }
   ?>
</center>
</table>
<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
</body>
</html>