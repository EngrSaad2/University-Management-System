<?php

 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) 
{ 
?>
<script>
window.location = "../admin_log.php";
</script>
<?php
}
$session_id=$_SESSION['id'];

$qry=$obj->user_logout_session($session_id);
$user_row = $qry->fetch_array();
$user_username = $user_row['username'];
?>