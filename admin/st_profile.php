<?php 
  	require_once('functions/ddbconfig.php');				
	require_once('functions/functions.php');						
	
    
$user = new login_registration_class();
 session_start();
    if (!isset($_SESSION['id'])){
    header('location:../admin/std_log.php');
    }
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Welcome : <?php $user->getusername($id); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table>
			<?php
				$getuser = $user->getuserbyid($id);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['pic'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="../images/<?php echo $row['pic']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr >
				<td>Student ID: </td>
				<td><?php echo $row['id']; ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $row['Name']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['Email']; ?></td>
			</tr>
			<tr>
				<td>Birthday: </td>
				<td><?php echo $row['DOB']; ?></td>
			</tr>
			<tr>
				<td>Program: </td>
				<td><?php echo $row['Program']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['Phone_no']; ?></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><?php echo $row['Full_Address']; ?></td>
			</tr>
			<?php if($row['id'] == $id){ ?>
			<tr>
				<td>Update Profile: </td>
				<td><a href="st_update.php?id=<?php echo $row['id'];?>"><button class="editbtn">Edit Profile</button></a></td>
			</tr>
			<?php } } ?>
		</table>

</div>
