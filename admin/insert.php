
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
require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');                       
  $obj = new cls_func();
      session_start();
    if (!isset($_SESSION['id'])){
    header('location:../index.php');
    }
  
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

move_uploaded_file($_FILES['personal_image']['tmp_name'], "../images/$fileName");



    $id = addslashes("$_POST[id]");
    $name = addslashes("$_POST[name]");
    $contact = addslashes("$_POST[contact]");
    $email = addslashes("$_POST[email]");

    

    $qry = $obj->data_insert($id,$name,$contact,$email,$fileName);
      if ($qry){
        echo "Successfully Inserted".'</br><a href = "index.php"><input type = "button" value = "View" ></a>';
          exit();
      }
      else{
        echo "not posted!";
        }
  }
?>
<style>

<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
			<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}</style>
	
	</head>
	<body >
			<div class="container">
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
								
								</ul>
								</div>
							
								<b>
								<li><a href=""><img src="../img/ac.png" width="20" height="20" align="right"/>Academic</a></center></li>
								<li><a href=""><img src="../img/f.png" width="18" height="18" align="right"/>Faculty</a></center></li>
								<li><a href=""><img src="../img/f.png" width="18" height="18" align="right"/>Admission</a></center></li>
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

<header>
   <h1>Student Information System</h1>
   <h5><?php echo " ".$_SESSION['username']; ?></h5>
</header>
  
<nav>
  <ul>
     <li><a href="index.php">Log in</a></li>
    <li><a href="#">Paris</a></li>
    <li><a href="#">Tokyo</a></li>
  </ul>
</nav>

<article>

<form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:50%">
  <tr>
<h3>Student Information</h3>
  </tr>
  <tr>
    <td>Student Id</td>
    <td><input id="id" name="id" type="text"  placeholder="Enter Your Id" required=""></td>
  </tr>
  <tr>
    <td>Student Name</td>
    <td><input id="name" name="name" type="text" placeholder="Enter Your Name" required=""></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input id="contact" name="contact" type="text"></td>
  </tr>
    <tr>
    <td>Contact</td>
    <td><input id="email" name="email" type="text"></td>
  </tr>

<tr>
<td>Picture</td>
  <td>

                    <img id="logo_preview" src="../images/no_image.png" style="height:150px; width:150px; border:2px green solid;"><br><br>                   
                    <input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')">
                    <br><br>
                    

</td>
</tr>

  <tr>
  <td></td>
  <td>
  <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href = "home.php"><input type = "button" value = "Cancel" ></a>
  </td>
  </tr>
</table>

</form>



  </article>

<footer>Copyright © iubat.edu</footer>

</div>

</body>
</html>

