<?php
session_start();
require('includes/connect_db.php');
$user_id = intval($_SESSION['admin']);
        if (isset($_GET['user_id'])){
        $user_id=intval($_GET['user_id']);       
        }
if(isset($_POST['add3'])){
  if(isset($_POST['daterequest']) && isset($_POST['datedraftspec'])){
  $kbk1   = $_POST['main_code'];
  $fmdate_request = date('Y-m-d', strtotime($_POST['daterequest']));
  $fmdate_draftspec = date('Y-m-d', strtotime($_POST['datedraftspec']));
  $ipxc = $_SERVER['REMOTE_ADDR'];
  $sql = "UPDATE procurement_detail SET ndate=SYSDATE() ,require_date = '$fmdate_request',spec_draft = '$fmdate_draftspec',ip = '$ipxc' WHERE project_id = '$kbk1'";

    if ($conn->multi_query($sql) === TRUE) {
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
  elseif(isset($_POST['daterequest'])){
    $kbk1   = $_POST['main_code'];
    $fmdate_request = date('Y-m-d', strtotime($_POST['daterequest']));
    $ipxc = $_SERVER['REMOTE_ADDR'];
    $sql = "UPDATE procurement_detail SET ndate=SYSDATE() ,require_date = '$fmdate_request',ip = '$ipxc' WHERE project_id = '$kbk1'";

    if ($conn->query($sql) === TRUE) {
      //echo "New records created successfully";
      $_SESSION['status'] = "The Only Date request Inserted ";
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
  elseif(isset($_POST['datedraftspec'])){
    $kbk1   = $_POST['main_code'];
    $fmdate_draftspec = date('Y-m-d', strtotime($_POST['datedraftspec']));
    $ipxc = $_SERVER['REMOTE_ADDR'];
    $sql = "UPDATE procurement_detail SET ndate=SYSDATE() ,spec_draft = '$fmdate_draftspec',ip = '$ipxc' WHERE project_id = '$kbk1'";

    if ($conn->query($sql) === TRUE) {
      //echo "New records created successfully";
      $_SESSION['status'] = "The Only Date draftspec Inserted ";
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
}

?>