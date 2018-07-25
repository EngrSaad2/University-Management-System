
 <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload.css">
<link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui.css">
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

 <script>
    function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
  
</script>

<?php
require_once('functions/dbconfig.php');        
  require_once('functions/functions.php');                       
  $obj = new cls_func();
      session_start();
    if (!isset($_SESSION['id'])){
    header('location:../index.php');
    }

$qry=$obj->edit_university_management($_GET['id']);
$row=$qry->fetch_assoc();
$pic=$row['pic'];
  
  if (isset($_POST['submit']))
  {

  function guid() {
     if (function_exists('com_create_guid')) {
                return com_create_guid();
            } else {
                mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45); // "-"
                $uuid = chr(123)// "{"
                        . substr($charid, 0, 8) . $hyphen
                        . substr($charid, 8, 4) . $hyphen
                        . substr($charid, 12, 4) . $hyphen
                        . substr($charid, 16, 4) . $hyphen
                        . substr($charid, 20, 12)
                        . chr(125); // "}"
                return $uuid;
            }
  }
    if($_FILES["personal_image"]["name"])
    {
          $path_parts = pathinfo($_FILES["personal_image"]["name"]);
                      $ext = $path_parts['extension'];
                      $fileName = trim(guid(), '{}') . '.' . $ext;
    }
    else
    {
      $fileName =$pic;
    }

move_uploaded_file($_FILES['personal_image']['tmp_name'], "../images/$fileName");



   
        $Name = addslashes("$_POST[Name]");
		$id = addslashes("$_POST[id]");
		$Program = addslashes("$_POST[Program]");
		$Password = addslashes("$_POST[Password]");
		$DOB = addslashes("$_POST[DOB]");
		$BG = addslashes("$_POST[BG]");
		$Email = addslashes("$_POST[Email]");
		$Phone_no = addslashes("$_POST[Phone_no]");
     
		$qry = $obj->data_update($Name,$id,$Program,$Password,$DOB,$BG,$Email,$Phone_no,$fileName);
      if ($qry){
        echo "Successfully Updated".'</br><a href = "view3.php"><input type = "button" value = "View" ></a>';
          exit();
      }
      else{
        echo "not posted!";
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
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 8%;
}

td, th {
    border: 1px solid blue;
    text-align: left;
    padding: 8px;
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
<style>
table, th, td {
    border: 1px solid black;
	border-collapse: collapse;
}
</style>



<?php
$qry1=$obj->edit_university_management($_GET['id']);
$rec=$qry1->fetch_assoc();

?>
<form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:30%">
  <tr>
<h3>Student Information</h3>
<h5><?php echo " ".$_SESSION['username']; ?></h5>
  </tr>
  
  <tr>
    <td>Student Name</td>
    <td><input id="Name" name="Name" type="text" value="<?php echo $rec['Name']; ?>" placeholder="Enter Your Name" required=""></td>
  </tr>
  <tr>
    <td>Student Id</td>
    <td><input id="id" name="id" type="text" value="<?php echo $rec['id']; ?>" placeholder="Enter Your Id" readonly></td>
  </tr>
  <tr>
    <td>Program</td>
    <td><input id="Program" name="Program" value="<?php echo $rec['Program']; ?>" type="text"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input id="Password" name="Password" value="<?php echo $rec['Password']; ?>" type="text"></td>
  </tr>
  <tr>
    <td>DOB</td>
    <td><input id="DOB" name="DOB" value="<?php echo $rec['DOB']; ?>" type="text"></td>
  </tr>
  <tr>
    <td>BG</td>
    <td><input id="BG" name="BG" value="<?php echo $rec['BG']; ?>" type="text"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input id="Email" name="Email" value="<?php echo $rec['Email']; ?>" type="text"></td>
  </tr>
    <tr>
    <td>Phone NO:</td>
    <td><input id="Phone_no" name="Phone_no" value="<?php echo $rec['Phone_no']; ?>" type="text"></td>
  </tr>
  <tr>
<td>Picture</td>
  <td>

                    <img id="logo_preview" src="../images/<?php echo $rec['pic']?>" style="height:150px; width:150px; border:2px green solid;"><br><br>                   
                    <input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')">
                    <br><br>
                    

</td>
</tr>
  <tr>
  <td></td>
  <td>
  <button id="submit" name="submit" class="btn btn-primary">Update</button>
  <a href = "view3.php"><input type = "button" value = "Cancel" ></a>
  </td>
  </tr>
</table>

</form></center>


<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
</body>
</html>


 


			
			
	

