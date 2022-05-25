<?php
session_start();
require('includes/connect_db.php');
$user_id = intval($_SESSION['admin']);
        if (isset($_GET['user_id'])){
        $user_id=intval($_GET['user_id']);       
        }
if(isset($_POST['add1'])){
  $kbk1   = $_POST['main_code'];
  $fmdate = date('Y-m-d', strtotime($_POST['datespec']));
  $ipxc = $_SERVER['REMOTE_ADDR'];
  $sql = "INSERT INTO procurement_detail(ndate,project_id,spec_TOR,ip) VALUES(SYSDATE(),'$kbk1','$fmdate','$ipxc')";

  if ($conn->query($sql) === TRUE) {
    //echo "New records created successfully";
    $_SESSION['status'] = "The Data Inserted ";
    header('location:save_work.php?project_id='.$kbk1.'&user_id='.$user_id);
    /*$query = "UPDATE project_detail
            SET userpts_id = user_pts.userunit_id
            FROM project_detail
            WHERE project_detail.userpts_id = user_pts.user_id";
			$statement = $conn->prepare($query);
			$statement->execute(); */ 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>