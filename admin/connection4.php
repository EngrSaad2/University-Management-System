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

$sql="INSERT INTO admin_log(Name,ID,Password)VALUES('$_POST[Name]','$_POST[ID]','$_POST[Password]')";


if (mysqli_query($conn, $sql)) {
    echo "Here You can see Student Details...!!!";
  
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
						<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 84%;
}

td, th {
    border: 1px solid blue;
    text-align: middle;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</style>
	</head>
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
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
				
		<img src="../img/adminlog.png" width="500" height="200" align="middle"/><br></center>

<center><h2>Student Registration Details</h2>
			<br>
			<?php 
			
			require_once('functions/dbconfig.php');				
			require_once('functions/functions.php');						
			$obj = new cls_func();
				
			$qry=$obj->view_university_management();

			
			$i=0;
		?>

	<table>
  <tr>
   
    <th>Name</th> 
	<th>ID</th>
	<th>Program</th>
	<th>Password</th>
	<th>DOB</th>
    <th>BG</th>
    <th>Email</th>
    <th>Phone No</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php
  while($rec=$qry->fetch_assoc())							
						{
  ?>
  <tr>
   
    <td><?php echo $rec['Name']; ?></td>
	<td><?php echo $rec['id']; ?></td>
	<td><?php echo $rec['Program']; ?></td>
	<td><?php echo $rec['Password']; ?></td>
    <td><?php echo $rec['DOB']; ?></td>
    <td><?php echo $rec['BG']; ?></td>
	<td><?php echo $rec['Email']; ?></td>
	<td><?php echo $rec['Phone_no']; ?></td>
    <td><a href='edit.php?id=<?php echo $rec['id']?>'> Edit</a></td>
    <td><a href='delete.php?id=<?php echo $rec['id']?>'> Delete</a></td>

  </tr>
<?php
$i++;
						}
?>
</table>
</br>
<a href = "std_reg.php"><input type = "button" value = "Registration Now..!!"></a>

<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
</body>
</html>