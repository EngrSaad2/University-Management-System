<?php
class cls_func{
	
	public function con(){
		$connect = new dbconfig();
		return $connect->connection();
	}
	
//Admin Login
	public function user_login($UserName,$Password){
		
		$result = $this->con()->query("select * from users where username='$UserName' and password='$Password'");
		return $result;
	}
	
//Update Student Profile
	public function updateprofile($sid,$st_name,$st_email,$st_dept,$st_gender,$st_contact,$st_add,$file){
		global $conn;
		$query = $conn->query("update st_info set name='$st_name',email='$st_email',program='$st_dept',gender='$st_gender',contact='$st_contact', address='$st_add',img='$file' where st_id='$sid'");
		return true;
	}
	

//Admin Logout Session
		public function user_logout_session($session_id){
		$result = $this->con()->query("select * from users where id = '$session_id'");
		return $result;
	}
//Search Query
		public function search($query){
		$result = $this->con()->query("SELECT * FROM p_info WHERE (id LIKE '%".$query."%'
							OR `name` LIKE '%".$query."%'
								OR `contact` LIKE '%".$query."%'
									OR `email` LIKE '%".$query."%') order by id");
		return $result;
	}

	public function view_university_management(){
		$result = $this->con()->query("Select * from std_reg");
		return $result;
	}
	
		public function vw_university_management($id){
		$result = $this->con()->query("select * from std_reg where id='$id'");
		return $result;
	}
	
	public function data_insert($name,$id,$prog,$password,$dob,$bg,$email,$father,$addr,$phone,$fileName){

		       if ($fileName == '') {
               $fileName = "no_image.png";
            }
			
		
		$result = $this->con()->query("INSERT INTO std_reg(Name,id,Program,Password,DOB, BG,Email,Father_Name,Full_Address,Phone_no,pic)
		VALUES('$name','$id','$prog','$password','$dob','$bg','$email','$father','$addr','$phone','$fileName')");
		return $result;
	}
	
	public function data_update($Name,$id,$Program,$Password,$DOB,$BG,$Email,$Phone_no,$fileName){
		$result = $this->con()->query("UPDATE std_reg set Name ='$Name', Program= '$Program', Password = '$Password', DOB = '$DOB', BG ='$BG',Email = '$Email', Phone_no = '$Phone_no', pic='$fileName'  where id='$id' ");
		return $result;
	}

public function edit_university_management($id){
		$result = $this->con()->query("Select * from std_reg where id='$id'");
		return $result;
	}

	public function delete_university_management($id){
		$result = $this->con()->query("delete from std_reg where id='$id'");
		return $result;
	}

	//All functions for faculty section

	public function faculty_insert($name,$uname,$password,$email,$dob,$education,$contact,$address,$fileName){

		       if ($fileName == '') {
               $fileName = "no_image.png";
            }
		
		$result = $this->con()->query("INSERT INTO feculty(name,uname,password,email,dob,education,contact,address,pic)
		VALUES('$name','$uname','$password','$email','$dob','$education','$contact','$address','$fileName')");
		return $result;
	}
	
	}
	?>
	
	
<?php
	class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
	}
	//attandence system
	
	public function attn_student(){
		global $conn;
		$sql = "select * from at_student";
		$result = $conn->query($sql);
		return $result;
	}
	
	
	
		//function for get student Name 
	public function getusername($id){
		
		$query = $conn->query("select Name from std_reg where id='$id'");
		$result = $query->fetch_assoc();
		echo $result['Name'];
	}
	public function add_attn_student($name,$id){
		global $conn;
		$sql = "insert into at_student(name,st_id) values('$name','$id')";
		$result = $conn->query($sql);
		
		$sql2 = "insert into attn(st_id) values('$id')";
		$result = $conn->query($sql2);
		return $result;
	}
	public function insertattn($cur_date,$atten = array()){
		global $conn;
		$sql = "select distinct at_date from attn";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$db_date = $row['at_date'];
			if($cur_date == $db_date){
				return false;
			}
		}
		foreach($atten as $key =>$attn_value ){
			if($attn_value == "present"){
				$sql = "insert into attn(st_id,atten,at_date) values('$key','present','$cur_date')";
				$att_res = $conn->query($sql);
			}elseif($attn_value == "absent"){
				$sql = "insert into attn(st_id,atten,at_date) values('$key','absent','$cur_date')";
				$att_res = $conn->query($sql);
			}
		}
		if($att_res){
			return true;
		}else{
			return false;
		}
		
	}
	public function delete_atn_student($at_id){
		global $conn;
		$res = $conn->query("delete from at_student where id = '$at_id' ");
		return $res;
	}
	public function get_attn_date(){
		global $conn;
		$res = $conn->query("select distinct at_date from attn ");
		return $res;
		
	}
	public function attn_all_student($date){
		global $conn;
		$res = $conn->query("select at_student.name, attn.*
			from at_student
			inner join attn
			on at_student.st_id = attn.st_id
			where at_date = '$date' ");
		return $res;
	}
	
	
	//function for student login
	public function st_userlogin($id, $Password){
		global $conn;
		$sql = "SELECT id,Name FROM std_reg WHERE id='$id' and Password='$Password'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['id'] = $userdata['id']; 
			$_SESSION['Name'] = $userdata['Name']; 
			//$_SESSION['login_msg'] = "Login Success"; 
			return true;
		}else{
			return false;
		}
		
	}
	
	//function for Feculty login
	public function f_userlogin($uname, $password){
		global $conn;
		$sql = "SELECT uname,name FROM feculty WHERE uname='$uname' and Password='$password'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['uname'] = $userdata['uname']; 
			$_SESSION['name'] = $userdata['name']; 
			//$_SESSION['login_msg'] = "Login Success"; 
			return true;
		}else{
			return false;
		}
		
	}
	
	
	
	
	
	
	
	// Get all info of a specific student by Student ID
	public function getuserbyid($id){
		global $conn;
		$query = $conn->query("select * from std_reg where id='$id'");
		return $query;
	}
	//Update Student Profile
	public function updateprofile($id,$Name,$Email,$Program,$Phone_no,$Full_Address,$file){
		global $conn;
		$query = $conn->query("update std_reg set Name='$Name',Email='$Email',Program='$Program',Phone_no='$Phone_no', Full_Address='$Full_Address',pic='$file' where id='$id'");
		return true;
	}
	
	//Change Student Password
	public function updatePassword($sid, $newpass, $oldpass){
		global $conn;
		$query = $conn->query("select st_id from st_info where st_id='$sid' and password='$oldpass' ");
		$count = $query->num_rows;
		if($count == 0){
			return print("<p style='color:red;text-align:center'>old password not exist.</p>");
		}else{
			$update = $conn->query("update st_info set password='$newpass' where st_id='$sid' ");
			return print("<p style='color:green;text-align:center'>Password changed successfully.</p>");
		}
	}
	//Session Unset for Student info //Log out option
	public function st_logout(){
		$_SESSION['st_login'] = false;
		unset($_SESSION['sid']); 
		unset($_SESSION['sname']);
		unset($_SESSION['st_login']);
		
		//session_destroy();
	}
	public function getsession(){
		return @$_SESSION['st_login'];
	}

	//Ends student releted function 
	
	public function update_attn($date,$atten){
		global $conn;
		foreach($atten as $key =>$attn_value ){
			if($attn_value == "present"){
				$sql = "update attn set atten='present' where st_id='$key' and at_date='$date' ";
				$att_res = $conn->query($sql);
			}elseif($attn_value == "absent"){
				$sql = "update attn set atten='absent' where st_id='$key' and at_date='$date' ";
				$att_res = $conn->query($sql);
			}
		}
		if($att_res){
			return true;
		}else{
			return false;
		}
	}
	
	//grading system
	public function add_marks($id,$subject,$semester,$marks){
		global $conn;
		$qry = "select * from result where st_id='$id' and sub='$subject' and semester='$semester' ";
		$query = $conn->query($qry);
		$count = $query->num_rows;
		if($count>0){
			return false;
		}else{
		$sql = "insert into result(st_id,marks,sub,semester) values('$id','$marks','$subject','$semester')";
		$result = $conn->query($sql);
		return $result;
		}
	}
	//show marks
	public function show_marks($id,$semester){
		global $conn;
		$result = $conn->query("select * from result where st_id='$id' and semester='$semester' ");
		$count = $result->num_rows;
		if($count>0){
			return $result;
		}else{
			return false;
		}
		
	}
	//update student result
	public function update_result($id,$subject = array(),$semester){
		global $conn;
		foreach($subject as $key =>$mark ){
			$sql = "update result set marks='$mark' where st_id='$id' and semester='$semester' and sub='$key' ";
				$result = $conn->query($sql);	
		}
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function view_cgpa($id){
		global $conn;
		$sql = "select * from result where st_id='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	
	//for getting All student infomation 
	public function get_all_student(){
		global $conn;
		$sql = "select * from std_reg order by id ASC";
		$query = $conn->query($sql);
		return $query;
	}
	
	
	
	/* Total average marks
	public function sgpa(){
		global $conn;
		$sql = "SELECT avg(marks) as sgpa from result where st_id=12103072 and semester='1st'";
		$result = $conn->query($sql);
		return $result;
	}
	*/
	
	
	
	
	
//end class 		



}



?>

	
	
	
	
	
	