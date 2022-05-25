<?php 

session_start();
include 'includes/sidebar_menu.php';
//include 'includes/session.php';
include 'includes/timezone.php';
//$userunit_code= $_SESSION['userunit_code'] ;
//$userpts_id= $_SESSION['user_id'];
include 'includes/connect_db.php';
include 'includes/header.php';
include 'includes/footer.php';

?>
<style>
.gradient-custom {
  /* fallback for old browsers */
  background: #1114cb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to left, rgba(17, 20, 203, 0.7), rgba(37, 117, 252, 0.6));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to left, rgba(17, 20, 203, 0.7), rgba(37, 117, 252, 0.6))

}
</style>
<body>
    <main style="margin-top: 70px">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="background:#e8e6e6; padding-bottom: 5px; padding-top: 20px;">
            <h1 style="margin-bottom: 5px">
                <font color="blue">บันทึกติดตามข้อมูล </font>
            </h1>

        </section>
        <a href="javascript:history.back();" style="margin-left: 0px" title="ย้อนกลับ" class="btn gradient-custom text-white mb-4">
			  <i class="fa fa-arrow-left"></i>&nbsp;Back</a>
        <div class="container pt-4">
            <!--Section: Minimal statistics cards-->
            <section>
            <div id="show_notification"></div>
             
                <div class="row">
                    <div class="col-12 col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt text-primary fa-3x"></i>
                                    </div>
                                    <div class="text-end">
                                        <a <?php if($_SESSION['userunit_code']==1 || $_SESSION['admin'] == 6) echo "href='#addnewmodal_kbk'"; else echo "href='#'";?>
                                            data-mdb-toggle="modal" title="เพิ่มข้อมูล">
                                            <!--<h3>278</h3>-->
                                            <p class="mb-0 font-weight-bold">เพิ่มข้อมูลที่เกี่ยวข้องกับ กบก.</p>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                $sql_get = mysqli_query($conn,"SELECT * FROM project_detail WHERE status = 0");
                $count = mysqli_num_rows($sql_get);
            ?>
                    <div class="col-12 col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt fa-3x text-info"></i>
                                    </div>
                                    <div class="text-end">
                                        <a href="#addnewmodal_uother" data-mdb-toggle="modal" title="เพิ่มข้อมูล">
                                            <!--<h3>278</h3>-->
                                            <p class="mb-0 font-weight-bold">เพิ่มข้อมูลที่เกี่ยวข้องกับหน่วยอื่น</p>
                                            <span class="badge badge-notification bg-danger"><?php echo $count;?></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt text-info fa-3x text-warning"></i>
                                    </div>
                                    <div class="text-end">
                                        <a <?php if($_SESSION['userunit_code']==2 || $_SESSION['admin'] == 6) echo "href='#addnewmodal_kwk'"; else echo "href='#'";?>
                                            data-mdb-toggle="modal" title="เพิ่มข้อมูล">
                                            <!--<h3>278</h3>-->
                                            <p class="mb-0 font-weight-bold">เพิ่มข้อมูลที่เกี่ยวข้องกับ กวก.</p>
                                            <i class="icon-bell">
                                            </i>
                                            <span class="badge badge-success">
                                                <div id="datacount">
                                                </div>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
    $(document).ready(function(){
        $("#datacount").load("insert_pj.php");
        setInterval(function(){
            $("#datacount").load('insert_pj.php')
        }, 20000);
    });
</script>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt fa-3x text-success"></i>
                                    </div>
                                    <div class="text-end">
                                        <a <?php if($_SESSION['userunit_code']==9 || $_SESSION['admin'] == 6) echo "href='#addnewmodal_kps'"; else echo "href='#'";?>
                                            data-mdb-toggle="modal" title="เพิ่มข้อมูล">
                                            <!--<h3>278</h3>-->
                                            <p class="mb-0 font-weight-bold">เพิ่มข้อมูลที่เกี่ยวข้องกับ กพส.</p>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt fa-3x text-danger"></i>
                                    </div>
                                    <div class="text-end">
                                        <a <?php if($_SESSION['userunit_code']==10 || $_SESSION['admin'] == 6) echo "href='#addnewmodal_finance'"; else echo "href='#'";?>
                                            data-mdb-toggle="modal" title="เพิ่มข้อมูล">
                                            <!--<h3>278</h3>-->
                                            <p class="mb-0 font-weight-bold">เพิ่มข้อมูลที่เกี่ยวข้องกับ กง.</p>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-danger">423</h3>
                                        <p class="mb-0">Total Visits</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-map-signs text-danger fa-3x"></i>
                                    </div>
                                </div>
                                <div class="px-md-1">
                                    <div class="progress mt-3 mb-1 rounded" style="height: 7px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
-->
            </section>

            <section>
                <?php
                /*if(isset($_SESSION['status'])){
                    echo "<h4> ".$_SESSION['status']."</h4>";
                }*/
                ?>
                <div class="container-xl bg-dark " id = "show_d">
                    <div class="table-responsive ">
                        <div class="table-wrapper ">
                            <div class="table-title " >
                                <div class="row">
                                    <div class="col-sm-8 mt-1" id = "show_d">
                                        <h2>รายละเอียด <b>การบันทึก</b></h2>
                                    </div>
                                    <!--
                                    <div class="col-sm-4">
                                        <div class="search-box"><i class="fas fa-search"></i>

                                            <input type="text" class="form-control" placeholder="Search&hellip;">
                                        </div>
                                    </div>
            -->
                                </div>
                            </div>
                            <table class="table table-striped table-bordered " id="mydatatable" style="width: 100%;" >
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสรายการ <i class="fa fa-sort"></i></th>
                                        <th>ชื่อรายการ</th>
                                        <th>รหัสแผน</th>
                                        <th>ประเภทงบประมาณ<i class="fa fa-sort"></i></th>
                                        <th>งบประมาณ </th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
            $user_id;
            $user_id = intval($_SESSION['admin']);
            if (isset($_GET['user_id'])){
            $user_id=intval($_GET['user_id']);       
            }
            $cnum=0;
            $sql="Select *,pj_id as id From project_detail  "; //where userpts_id = ".$user_id
            $query = $conn->query($sql);
		
			$cnum=0;
					
                    while($row = $query->fetch_assoc()){
						
							$id=$row['pj_id'];
                            $cnum++;
                            $bku=intval($row['project_id']);
							$bkact=intval($row['project_name']);
							$bkrs=intval($row['num_plan']);
                    
            ?>
                                    <tr>
                                        <td><?php echo $cnum ?></td>
                                        <td><?php echo nl2br($row['project_id']) ?></td>
                                        <td><?php echo nl2br($row['project_name']) ?></td>
                                        <td><?php echo $bkrs ?></td>
                                        <td><?php echo nl2br($row['project_id'])?></td>
                                        <td><?php echo nl2br($row['project_name'])?></td>
                                        <td>
                                        
                                                <a href="#" class="view" title="ดูรายละเอียด" data-toggle="tooltip"><i
                                                        class="material-icons text-green">&#xE417;</i></a>
                                                <a href="#" class="edit" title="แก้ไข" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE254;</i></a>
                                                <a href="#" class="delete" title="ลบข้อมูล" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>

                                    <?php
					}
					?>
                                </tbody>
                            </table>

<!--
                            <div class="clearfix">
                                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#"><i
                                                class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" class="page-link"><i
                                                class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                -->
            </section>


        </div>

    </main>
    <?php include 'includes/modal_savew.php'; ?>
    <?php include 'includes/scripts.php'; ?>
    <?php //include 'includes/noti_script.php'; ?>
    <?php //include 'includes/fetchnotification.php'; ?>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/admin.js"></script>

</body>

</html>