<?php
    //done
require_once('functions/dbconfig.php');       
  require_once('functions/functions.php');
  
  $obj = new cls_func();

      if (isset($_POST['submit'])) 
      {
      $UserName=$_POST['username'];
      $Password=$_POST['password'];
      $result=$obj->user_login($UserName,$Password);
      $count = $result->num_rows;
      $row = $result->fetch_array();
      
      
    
      if ($count > 0){
      session_start();
      $_SESSION['id']=$row['id'];
      $_SESSION['username']=$row['username'];
      $level=$row['level'];
      switch($level)
      {
        case 1:
        header('location:view3.php?id='.$row['id'].'');
        break;
        case 2:
        header('location:view3.php?id='.$row['id'].'');
        break;

      }
      
      }
      else
      {
       echo "Invalid Username or Password! Please Try again..!";
        ;
        
      }
    }
  ?>  

<?php 
require_once('functions/dbconfig.php');       
  require_once('functions/functions.php');            
  						
	$obj = new cls_func();	
	$qry=$obj->view_university_management();

	
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
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Login</p></font>
				
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
						<img src="../img/adminlog.png" width="20" height="20" align="middle"/><br> <br>
						 <form method="post" action="admin_log.php">
						<center>
							<table class="reg-table clear">
								<tr>
									<td>UserName:</td>
									<td><input type="text" name="username" placeholder="" required autofocus/></td>
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