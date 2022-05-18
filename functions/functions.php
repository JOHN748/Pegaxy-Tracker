<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'pegaxytracker');


// ********** REGISTER USER ********** //

// Register User

$username = $email = $password_1 = $password_2 = $user_image = "";
$username_error = $email_error = $password_1_error = $password_2_error = $user_image_error = "";

if (isset($_POST['register'])) {
	register();
}

function register(){

	global $db, $username, $email, $user_image, $username_error, $email_error, $password_1_error, $password_2_error, 
		   $user_image_error;

	$username    =  $_POST['username'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];
	$user_image  =  $_FILES['user_image']['name'];
	$temp_name1 =  $_FILES['user_image']['tmp_name'];

	if (empty($username)) { 
		$username_error = "Username is required"; 
	}else{
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$username_error = "Username is already taken";
		}
	}

	if (empty($email)) { 
		$email_error = "Email is required"; 
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }else{
		$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$email_error = "Email is already taken";
		}
	}

    if(empty(trim($password_1))){
        $password_1_error = "Please enter a password.";
    } elseif(strlen(trim($password_1)) < 6){
        $password_1_error = "Password must have atleast 6 characters.";
    } 

    if(empty(trim($password_2))){
        $password_2_error = "Please confirm password.";
    } else{
        if(empty($password_1_error) && ($password_1 != $password_2)){
            $password_2_error = "Password did not match.";
        }
    }

    if(empty(trim($user_image))){
    	$user_image_error = "User Image is must needed";
    }

	if (empty($username_error) && empty($email_error) && empty($password_1_error) && empty($password_2_error) && empty($user_image_error)) {
		
		$password = md5($password_1);

		$query = "INSERT INTO users (username, email, password, user_image, role, plan, status, joined_at) 
				  VALUES('$username', '$email', '$password', '$user_image', 'user', 'free', 'active', NOW())";

		move_uploaded_file($temp_name1, "assets/images/users/$user_image");  
		mysqli_query($db, $query);
		$_SESSION['message']  = "Registered Successfully!";
		header('location: index.php');

	}

}


// ********** LOGIN USER ********** //

// Login User

$username_err = $password_err = $user_err = "";

if (isset($_POST['login'])) {
	login();
}

function login(){
	global $db, $username, $username_err, $password_err, $user_err;

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username)) {
		$username_err = "Username is required";
	}else{
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 0) { 
			$username_err = "Invalid Username";
		}
	}
	
	if (empty($password)) {
		$password_err = "Password is required";
	}
		
	if (empty($username_err) && empty($password_err) && empty($user_err)) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
			
		$logged_in_user = mysqli_fetch_assoc($results);

			if ($logged_in_user['role'] == 'user' && $logged_in_user['status'] == 'active') {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['message']  = "Logged in Successfully";
				header('location: index.php');		  
			}else if ($logged_in_user['role'] == 'admin' && $logged_in_user['status'] == 'active') {
				
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['message']  = "Logged in Successfully";
				header('location: index.php');
			}else{
				$user_err = "Your Account is Inactive, Please contact admin!";				
			}
			
		}else{
			$password_err = "Incorrect Password";
		}

	}

}

function isAdmin(){

	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'){
		return true;
	}else{
		return false;
	}
}

function isUser(){
	
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user' ) {
		return true;
	}else{
		return false;
	}
}

// ********** LOGGED-IN USER DETAILS ********** //

// Logged-In User Details 

$log_userid = $log_username = $log_useremail = $log_userrole = $log_userimage = "";

if(isset($_SESSION['user'])){ 
	loggedin_user();
} 

function loggedin_user(){

	global $log_userid, $log_username, $log_useremail, $log_userrole, $log_userimage;

	$log_userid    = $_SESSION['user']['id'];
	$log_username  = $_SESSION['user']['username'];
	$log_useremail = $_SESSION['user']['email'];
	$log_userrole  = $_SESSION['user']['role'];
	$log_userimage = $_SESSION['user']['user_image'];

}



// Toggle Wallet Address

if (isset($_POST['address1'])) {
	
	$usrid = $_POST['usrid'];
	toggleadd1($usrid);

}
if (isset($_POST['address2'])) {
	
	$usrid = $_POST['usrid'];
	toggleadd2($usrid);

}
if (isset($_POST['address3'])) {
	
	$usrid = $_POST['usrid'];
	toggleadd3($usrid);

}
if (isset($_POST['address4'])) {
	
	$usrid = $_POST['usrid'];
	toggleadd4($usrid);

}

function toggleadd1($usrid){
	global $db;
	$sql = "UPDATE users SET address= 1 WHERE id=$usrid";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Added to Featured Product';
		header("location: index.php");
		exit(0);
	}
}

function toggleadd2($usrid){
	global $db;
	$sql = "UPDATE users SET address= 2 WHERE id=$usrid";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Added to Featured Product';
		header("location: index.php");
		exit(0);
	}
}

function toggleadd3($usrid){
	global $db;
	$sql = "UPDATE users SET address= 3 WHERE id=$usrid";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Added to Featured Product';
		header("location: index.php");
		exit(0);
	}
}

function toggleadd4($usrid){
	global $db;
	$sql = "UPDATE users SET address= 4 WHERE id=$usrid";
	
	if (mysqli_query($db, $sql)) {
		$_SESSION['success'] = 'Successfully Added to Featured Product';
		header("location: index.php");
		exit(0);
	}
}

?>