<?php
	session_start();
	include 'includes/connect_db.php';
	include 'includes/timezone.php';

	// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['prefix'],$_POST['gender'],$_POST['unit'],$_POST['fname'],$_POST['lname'],$_POST['username'], $_POST['passwd'],$_POST['passwdcon'], $_POST['email'] )) {//$_POST['passwdcon'], $_POST['prefix'], $_POST['gender'], $_POST['fname'], $_POST['lname'], $_POST['unit']
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['passwd']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
//Email Validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
//Invalid Characters Validation	
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}	
//Character Length Check
if (strlen($_POST['passwd']) > 20 || strlen($_POST['passwd']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
if ($stmt = $conn->prepare('SELECT user_id, passwd FROM user_pts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Insert new account
		// Username doesnt exists, insert new account
		if ($stmt = $conn->prepare('INSERT INTO user_pts (rdate,activation_code,userunit_id ,prefix_id, username, passwd,gender_id ,first_name,last_name, E_mail,ip) VALUES (?,?, ?, ?, ?,?,?,?,?,?,?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$passwd = $_POST['passwd'];
			$hashpasswd = password_hash($passwd, PASSWORD_DEFAULT);
			$uniqid = uniqid();
			$ipxc = $_SERVER['REMOTE_ADDR'];
			$rdate = date('Y-m-d H:i:s');
			
			//$d = date("d.m.Y", $rdate);
			$stmt->bind_param('ssiississss',$rdate,$uniqid,$_POST['unit'],$_POST['prefix'], $_POST['username'], $hashpasswd,$_POST['gender'],$_POST['fname'],$_POST['lname'], $_POST['email'],$ipxc );

			$stmt->execute();
			echo "<script>alert('You have successfully registered, Please wait for admin activate your account!');window.location('index.php?');</script>";
			
			//echo "<script>window.location='index.php?userunit_c=".$userunit_code."';</script>";
			/*$from    = 'noreply@yourdomain.com';
		$subject = 'Account Activation Required';
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
		// Update the activation variable below
		$activate_link = 'http://yourdomain.com/phplogin/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
		$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
		mail($_POST['email'], $subject, $message, $headers);
		echo 'Please check your email to activate your account!';*/
		} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
		echo 'Could not prepare statement!';
		}
	}
	//$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}

$conn->close();
?>