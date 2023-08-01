<?php  
		include 'dbc.php';
		$err = array();
		foreach($_GET as $key => $value) {
		$get[$key] = filter($value); //get variables are filtered.
		}
		if ($_POST['submit']=='login')
		{
			var_dump($_POST);
		foreach($_POST as $key => $value) {
		$data[$key] = filter($value); // post variables are filtered
		}
		echo $user_email = $data['user_email'];
		$pass = $data['pwd'];
		if (strpos($user_email,'@') === false) {
		$user_cond = "user_name='$user_email'";
		} else {
		$user_cond = "user_email='$user_email'";
		}
		echo"SELECT `id`,`pwd`,`first_name`,`approved`,`user_level`,`autoid` FROM users_tbl WHERE  $user_cond AND `banned` = '0' ";

		$result = mysqli_query($link,"SELECT `id`,`pwd`,`first_name`,`approved`,`user_level`,`autoid` FROM users_tbl WHERE  $user_cond AND `banned` = '0' "); 
		echo $num = mysqli_num_rows($result);
		if ( $num > 0 ) { 
		list($id,$pwd,$first_name,$approved,$user_level,$userid) = mysqli_fetch_row($result);
		if(!$approved) {
		$err[] = "Account not activated. Please check your email for activation code";
		}
		if ($pwd === PwdHash($pass,substr($pwd,0,9))) { 
		if(empty($err)){			
		session_start();
		session_regenerate_id (true); //prevent against session fixation attacks.
		$_SESSION['id']= $id;  
		$_SESSION['user_name'] = $first_name;
		$_SESSION['user_level'] = $user_level;
		$_SESSION['userid'] = $userid;
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
		//update the timestamp and key for cookie
		$stamp = time();
		$ckey = GenKey();
		$lastacces = date("M-d-Y H:i:s");
		mysqli_query($link,"update users_tbl set `ctime`='$stamp', `ckey` = '$ckey' where id='$id'");
		mysqli_query($link,"update users_tbl set `last_access`='$lastacces' where id='$id'");
		//set a cookie 
		if(isset($_POST['remember'])){
		setcookie("id", $_SESSION['id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		setcookie("userid", $_SESSION['userid'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		setcookie("user_level", $_SESSION['user_level'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		setcookie("user_key", sha1($ckey), time()+60*60*24*COOKIE_TIME_OUT, "/");
		setcookie("user_name",$_SESSION['user_name'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		}
		header("Location: index.php");
		echo "<script>window.location.href='index.php';</script>";
		}
		}else
		{
		//$msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
		$err[] = "Invalid Login. Please try again with correct user email and password.";
		//header("Location: login.php?msg=$msg");
		}
		} else {
		$err[] = "Error - Invalid login. No such user exists";
		}
		}
		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Butterfly Paint - Login</title>
	<?php include 'assets/common/css_file.php';?>
	
	<style type="text/css">
		body{
			overflow-y:hidden;
		}
		.login_form{
			margin: 0 auto;
		    margin-top: 40%;
/*		  border: 2px solid #564d8e;*/
		    padding: 20px 15px;
		    background: white;
		}
		#login_heading{
			padding: 0px 13px 13px 13px;
    		font-size: 36px;
		}
		input[type="email"],input[type="password"]{
			width: 100%;
		    height: 36px;
		    border: 1px solid #808080b3;
		    padding: 5px;
		    
		}
		input[type="submit"]{
			width: 100%;
		    font-size: 16px;
		    padding: 5px 8px;
		    background-color: #4158D0;
			background-image: linear-gradient(43deg, #3982e7 0%, #28a14c 46%, #FFCC70 100%);
		    color: white;
		    text-transform: uppercase;
		    margin-bottom: 14px;
		}
		input[type="checkbox"]{
			height: 20px;
    		width: 20px;
			vertical-align: middle;
		}
		input[type="submit"]:hover{
			
			/*background: #137b72;
			border: 1px solid #137b72;*/
		}
		.form-group{
			margin-top: 10px;
		}
	</style>
</head>
<body>

<section style="background:url('assets/img/log-in-bg.jpg') no-repeat; background-size:cover;height: 800px;"> 


	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="login_form">
					<img src="assets/img/logo.png" alt="logo" width="100%">
					<?php// include 'display_msg.php'; ?>
					<form method="post">
						
						<div class="form-group">
							<input value="admin@ragadesigners.com" type="email" name="user_email" placeholder="Email" required>
						</div>
						<div class="form-group">		
							<input value="1234" type="password" name="pwd" id="pwd" placeholder="Password">
						</div>	
						<div class="row mt-3">
					        <div class="col-8">
					            <label>
					              	<input type="checkbox" name="remember" id="remember"> Remember Me
					            </label>
					        </div>
					       
					        <div class="col-4">
					          	<input type="submit" name="submit" id="submit" value="login">
					        </div>
					        <div class="col-md-12">
					        	<a href="forgot.php" class="pull-left">I forgot my password</a>
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<?php include 'assets/common/js_file.php';?>
</body>
</html>