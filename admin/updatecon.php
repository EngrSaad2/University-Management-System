<?php

   $con = mysqli_connect('localhost','root','');
   mysqli_select_db($con,'university_management');
   $sql = "UPDATE std_reg SET 
   Name='$_POST[Name]', 
   Program='$_POST[Program]',
   Password='$_POST[Password]',
   DOB='$_POST[DOB]',
   BG='$_POST[BG]',
   Email='$_POST[Email]' 
   WHERE ID='$_POST[id]'
   ";
   if (mysqli_query($con,$sql))
	   header("refresh:1; url=update.php");
 
    else
		echo "Not UPDATE!";


?>