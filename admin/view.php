<?php 
session_start();
  	require_once('functions/dbconfig.php');				
	require_once('functions/functions.php');						
			   
  $obj = new cls_func();
    
    if (!isset($_SESSION['id'])){
    header('location:../admin/std_log.php');
    }
    
  $qry=$obj->vw_university_management($_SESSION['id']);
	//var_dump($qry);
  
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
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 20px;
    text-align: right;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:44%
}
.button2 {background-color: #008CBA;border-radius:60px;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 35%;
}

td, th {
    border: 1px solid #FFFDD0;
    text-align: middle;
    padding: 20px;
}

tr:nth-child(even) {
    background-color: #dddddd;
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
					
									



			<center><h3 style="margin:0;padding:0">Profile</h3>
			<br><br><br>
			

<table>
  
   
   
   
	

  
  
	
  
  <?php
  while($rec=$qry->fetch_assoc())							
						{
  ?>
<tr>
    <td></td>
   <td><img src="../images/<?php echo $rec['pic']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
</tr>
<tr>
	 <th>Name</th> 
    <td><?php echo $rec['Name']; ?></td>
</tr>
<tr>
	<th>ID</th>
	<td><?php echo $rec['id']; ?></td>
</tr>
<tr>
    
	<th>Program</th>
	<td><?php echo $rec['Program']; ?></td>
</tr>
<tr>
	<th>DOB</th>
    <td><?php echo $rec['DOB']; ?></td>
</tr>
<tr>
	
    <th>BG</th>
    <td><?php echo $rec['BG']; ?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?php echo $rec['Email']; ?></td>
</tr>
<tr>
    <th>Phone No</th>
	<td><?php echo $rec['Phone_no']; ?></td>
</tr>
    
<?php
$i++;
						}
?>
</table></center>

</br><center>

 <a href = "stlogout.php"><input class="button button2" type = "button" value = "Logout" ></a>
 
</center>
</table>
<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
</body>
</html>