<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
include 'includes/connect_db.php';
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT first_name,last_name, E_mail FROM user_pts WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param ('i', $_SESSION['admin']);
$stmt->execute();
$stmt->bind_result($fname,$lname, $email);
$stmt->fetch();
//$stmt->close();
include 'includes/header.php';
include 'includes/footer.php';
include 'includes/sidebar_menu.php';
include 'includes/session.php';
?>
<body>
    

    <!--Main layout-->
    <main style="margin-top: 77px">
	
		
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Full Name:</td>
						<td><?=$fname?>&nbsp;&nbsp;<?=$lname?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>หน่วยงาน:</td>
						<td><?=$_SESSION['userunit_code']?></td>
					</tr>
				</table>
			</div>
		</div>
		</main>
		<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/admin.js"></script>
	</body>
</html>