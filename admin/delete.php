<center>

<?php
require_once('functions/dbconfig.php');				
	require_once('functions/functions.php');						
	$obj = new cls_func();


$qry=$obj->delete_university_management($_GET['id']);
if($qry)
{
	echo"Delete Successful".'</br><a href = "view3.php"><input type = "button" value = "View" ></a>';
}
?>

</center>