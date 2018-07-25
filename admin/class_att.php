<?php 
  	require_once('functions/ddbconfig.php');				
	require_once('functions/functions.php');						
	
    session_start();
    
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
.button5 {background-color: #555555;border-radius:60px;} /* Black */
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 35%;
}
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
				<font size="+4"   >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

		
		
			<span style="float:left;"><a style="color:#fff;margin-left:50px" href="att_add.php"><button style="background:#566573;border:none;color:#fff;padding:10px;border-radius:60px;">Add student</button></a></span>
			<span style="float:right;"><a style="color:#fff;margin-right:50px" href="att_view.php"> <button style="background:#566573;border:none;color:#fff;padding:10px;border-radius:60px;">View Attendance</button></a></span>
		
		<?php
			if(isset($_REQUEST['res'])){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Data deleted successfully !</h3>";
			}
		?>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$cur_date = $_POST['attndate'];
				$atten = $_POST['attn'];
				$res = $user->insertattn($cur_date,$atten);
				if($res){
					echo "<h2 style='color:green;margin:0;padding:0;text-align:center'>Attendance data successfully inserted!</h2>";
				}else{
					echo  "<p style='color:red;text-align:center'>Failed to insert data</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
		
			<center><mark><h3>Select date: <input type="date" name="attndate" required/></h3></mark></center>
		
		<center><table>
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Attendance</th>
				<th style="text-align:center;">Delete student</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->attn_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" checked/>Absent</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" />Present</label>
				</td>
				<td><a href="att_del.php?dl=<?php echo $rows['id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
	
		</table></center>
		<center><span><input style="<text-align:right></text-align:>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" /></span></center>
	
	</form>
		
<p style="text-align:right"><a href = "flogout.php"><input class="button button5" type = "button" value = "Logout" ></a></p>
		
</div>
</body>
</html>