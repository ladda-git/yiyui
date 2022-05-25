<?php
session_start();
require('includes/connect_db.php');
$user_id = intval($_SESSION['admin']);
        if (isset($_GET['user_id'])){
        $user_id=intval($_GET['user_id']);       
        }
if(isset($_POST['add'])){
$kbk1   = $_POST['main_code'];
$kbk2	= intval($_POST['owner_code']);
$kbk3	= intval($_POST['type_bg']);
$kbk4	= $_POST['main_name'];
$kbk5	= intval($_POST['numplan']);
$kbk6	= str_replace("฿", "",$_POST['currency-field']);
//$kbk61	= str_replace(",", "",$kbk6);
$kbk62	= explode(".",$kbk6);
$nkbk6 = $kbk62[0];
$kbk7	= $_POST['code_bud'];
$ipxc = $_SERVER['REMOTE_ADDR'];
$status = 0;
//$user_id = intval($_GET['user_id']);
$sql = "INSERT INTO project_detail(project_id,userpts_id,ndate,userunit_id, num_plan,budget_typeid, project_name,budget_priceid,budget_limit, ip) 
VALUES('$kbk1',$user_id,SYSDATE(),'$kbk2','$kbk5','$kbk3','$kbk4','$kbk7','$nkbk6','$ipxc');";
/*$sql .= "INSERT INTO budget_price(project_id)
VALUES('SELECT * FROM project_detail ORDER BY pj_id DESC LIMIT 1')";
*/
$response = $conn->multi_query($sql);
$count = $response->num_rows;
/*
while(($row = $response->mysql_fetch_assoc()) !== null){
  $count = $response->num_rows;
  echo $count;
}*/
//$row = $response->fetch_assoc();
//$count = $response->num_rows;
if ($response === TRUE) {
  //echo $count;
    //echo "New records created successfully";
 /*   
$sqlu ="UPDATE budget_price SET project_id = $sql,budget_priceid = $kbk7,budget_limit = $kbk6, ip = $ipxc;";
$sqlu .="UPDATE procurement_detail SET project_id = $sql;";
$sqlu .="UPDATE po_detail SET project_id = $sql;";
$sqlu .="UPDATE disburse_detail SET project_id = $sql;";
$sqlu .="UPDATE budget_price SET project_id = $sql";*/
    $count = "select count(pj_id) from project_detail";
    $result = $conn->query($count);
    $row = $result->fetch_assoc();
    $countt = $result->num_rows;
    echo $countt;

    $_SESSION['status'] = "The Data Inserted ";
    header('location:save_work.php?project_id='.$kbk1.'&user_id='.$user_id.'&c='.$countt);
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