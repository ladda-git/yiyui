<?php
session_start();

include 'includes/connect_db.php';

if(isset($_POST['login'])){
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['passwd']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT * FROM user_pts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
if($stmt->num_rows < 1){
		unset($_SESSION['admin']);
		echo "<script>alert('ยังไม่มีข้อมูลของท่านในระบบ...!!'); ';</script>";	
		
	}
else if ($stmt->num_rows > 0) {
	$stmt->bind_result($id,$rdate,$activate_code,$userunit_code,$prefix_c,$username, $hashpasswd,$gd_id,$fname,$lname,$email,$img,$ipu);
	$stmt->fetch();
	$passwd = $_POST['passwd'];
	$_SESSION['userunit_code'] = $userunit_code;
	//$hashword =  password_hash($_POST['passwd']);
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($passwd, $hashpasswd)) {
        /*If you want to use any password encryption method, you can simply replace the following code:
            if (password_verify($_POST['passwd'], $password)) { $_POST['passwd'] === $password is basic*/

		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		
		session_regenerate_id();
		
		$_SESSION['admin'] 		 = $id;
		$_SESSION['prefix_c']	 = $prefix_c;
		$_SESSION['email']   = $email;
		$_SESSION['fname']  = $fname;
		$_SESSION['lname']	 = $lname;

		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['userunit_code'] = $userunit_code;
		$_SESSION["login_time_stamp"] = time();

				//echo $sqlu;
		//$pp->bind_param ("i", $_SESSION['userunit_code']);
		//echo 'Welcome ' . $_SESSION['name'] . '!';
        header('Location: home.php?user_id='.$id.'&userunit_c='.$userunit_code);
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

$stmt->close();
}
}else{
	unset($_SESSION['admin']);
	echo "<script>alert('ข้อมูล LogIn ไม่ถูกต้อง...กรุณาลองใหม่ หรือ ติดต่อผู้ดูแลระบบ...!!'); </script>";
}
?>