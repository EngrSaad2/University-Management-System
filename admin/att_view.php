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
			<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 84%;
}

th, td {
    padding: 15px;  text-align:center;
}
</style>
	</head>
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4"   >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#555555;">View All Attendance</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			
			<span style="float:left;"><a style="color:#fff;margin-left:50px" href="att_add.php"><button style="background:#555555;border:none;color:#fff;padding:10px;border-radius:60px;">Add student</button></a></span>
			<span style="float:right;"><a style="color:#fff;margin-right:50px" href="class_att.php"> <button style="background:#555555;border:none;color:#fff;padding:10px;border-radius:60px;">Take Attendance</button></a></span>
		
		</div>

		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;"> Attendance Date</th>
				<th style="text-align:center;">Action</th>
				
				
			</tr>
			<?php 
			$i=0;
				$get_date = $user->get_attn_date();
				
				while($rows = $get_date->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['at_date'];?></td>
				<td><a href="att_single_view.php?dt=<?php echo $rows['at_date']; ?>">View Attendance</a></td>
				
			</tr>
			<?php } ?>
			
		</table>
</div>
