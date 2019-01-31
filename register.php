<?php
include 'connection.php';
if(isset($_POST['register']))
{
echo userRegister($_POST,$con);
}else{
return 'false';
}
function userRegister($data,$con)
{
	
	$userName = !empty($data['username'])?$data['username']:false;
	$password = !empty($data['password'])?$data['password']:false;
	$first_name = !empty($data['first_name'])?$data['first_name']:false;
	$last_name = !empty($data['last_name'])?$data['last_name']:false;
	$mobile = !empty($data['mobile'])?$data['mobile']:false;
	$type = !empty($data['type'])?$data['type']:false;
	$confirmpassword = !empty($data['confirmpassword'])?$data['confirmpassword']:false;
	if($password  == $confirmpassword ){
if($userName&&$password&&$first_name&&$last_name&&$mobile&&$type)
	{
		$sql = 'select * from user where mobile = '.$mobile;
		mysqli_query($con,$sql);
		if(mysqli_affected_rows($con)>0){
		return "<h3> Mobile Number already exist</h3>
		<script>
		 setTimeout(function(){ 
		 location.href = 'login.php';
		 }, 4000);
		
		</script>
		";
		}
		$sql = 'select * from user where username = '.$userName;
		mysqli_query($con,$sql);
		if(mysqli_affected_rows($con)>0){
		return "<h3>User Name already exist try another user name</h3>
		<script>
		 setTimeout(function(){ 
		 location.href = 'login.php';
		 }, 4000);
		
		</script>";
		}
		$insert = "insert user(first_name,last_name,mobile,username,password,type)
		values('$first_name','$last_name',$mobile,'$userName','$password',$type)";
		if(mysqli_query($con,$insert)){
		return "User created successfully please login Please<a href='http://localhost/complaint/login.php'> click here </a> to login ";
		}else{
		return " <h3>server congested try later </h3>
		<script>
		 setTimeout(function(){ 
		 location.href = 'login.php';
		 }, 4000);
		
		</script>
		";
		}


	}else{
		return "<h3> all feild is mandotary</h3>
		<script>
		 setTimeout(function(){ 
		 location.href = 'login.php';
		 }, 4000);
		
		</script>
		";
	}

}else{
return "<h3>confirm password and password not match</h3>
<script>
		 setTimeout(function(){ 
		 location.href = 'login.php';
		 }, 4000);
		
		</script>

";
}

}