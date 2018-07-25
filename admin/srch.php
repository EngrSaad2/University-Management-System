<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
			<style>
			table, td, th {
				border: 1px solid #ddd;
				text-align: middle;
			}

			table {
				border-collapse: collapse;
				width: 65%;
			}

			th, td {
				padding: 15px;
			}
			</style>
	</head>
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University Management System</p></font>
				
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
					
									<div class="MIDDLE">
							<center>
	
	   <center><h1>Search Student</h1></center><br><br>

	   
	 
	    <form method="POST">
	   <input type="text" name="search" required autofocus />
	   <input type="submit" name="submit"placeholder="ID" value="search" required autofocus/>
	   
	   <br>
	   
	   


<?php	
		$output=NULL;   
	   if(isset($_POST['submit'])){
	   
	   $mysqli = new mysqli("localhost","root","","university_management");
	   
	   $search = $mysqli->real_escape_string($_POST['search']);
	   
	    $resultset=$mysqli->query("select * from std_reg where name='$search' or ID='$search' or name like '%$search'or name like '$search%'");
	   
	   
	   if($resultset->num_rows>0)
	   {
		   echo "<table border=1>
	<tr>
	<th>Name</th>
	<th>ID</th>
	<th>Program</th>
	<th>Password</th>
	<th>Date of Birth</th>
	<th>Blood Group</th>
	<th>Email</th>
	
	</tr>
	
	"  ;
		echo"<br>";   
	   		while($rows=$resultset->fetch_assoc())
			{
				$NNAME=$rows['Name'];
				$output=$NNAME;
				echo"<td>". $output."</td>";
				$IID=$rows['id'];
				$output=$IID;
				echo"<td>". $output."</td>";
				$CONN=$rows['Program'];
				$output=$CONN;
				echo"<td>". $output."</td>";
				
				$CONN=$rows['Password'];
				$output=$CONN;
				echo"<td>". $output."</td>";
				$CONN=$rows['DOB'];
				$output=$CONN;
				echo"<td>". $output."</td>";
				$CONN=$rows['BG'];
				$output=$CONN;
				echo"<td>". $output."</td>";
				$CONN=$rows['Email'];
				$output=$CONN;
				echo"<td>". $output."</td>";
				
				echo "</table>";
			}
	   
	   
	   } else 
	   {
	   	echo $output="Sorry! No Result Found. Try with another valid ID.";
	   }
	   
	   }
	   
 ?>
 <td></table> </center>
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