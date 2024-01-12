
<?php
session_start();
// Telegram @fletchen
if(!$_SESSION['username']){
 header("Location: login.php");
 exit;
}

if($_GET['do'] == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();
  header("Location: login.php");
}
include_once '../db/dbmysqli.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
	    svg {
    width: 150px;
}
	    </style>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Gifts</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
    <a class="nav-link" href="index.php">
    <i class="fa fa-fw fa-dashboard"></i>
    <span class="nav-link-text">Товары</span>
    </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
    <a class="nav-link" href="../upload">
    <i class="fa fas fa-user"></i>
    <span class="nav-link-text">Загрузить файп</span>
    </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
    <a class="nav-link" href="stats.php">
    <i class="fa fas fa-user"></i>
    <span class="nav-link-text">Статистика</span>
    </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
    <a class="nav-link" href="settings.php">
    <i class="fa fas fa-user"></i>
    <span class="nav-link-text">Настройки</span>
    </a>
    </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
    <a class="nav-link text-center" id="sidenavToggler">
    <i class="fa fa-fw fa-angle-left"></i>
    </a>
    </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-fw fa-envelope"></i>
    <span class="d-lg-none">Messages
    <span class="badge badge-pill badge-primary">12 New</span>
    </span>
    <span class="indicator text-primary d-none d-lg-block">
    <i class="fa fa-fw fa-circle"></i>
    </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">New Messages:</h6>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <strong>David Miller</strong>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <strong>Jane Smith</strong>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <strong>John Doe</strong>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item small" href="#">View all messages</a>
    </div>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-fw fa-bell"></i>
    <span class="d-lg-none">Alerts
    <span class="badge badge-pill badge-warning">6 New</span>
    </span>
    <span class="indicator text-warning d-none d-lg-block">
    <i class="fa fa-fw fa-circle"></i>
    </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">New Alerts:</h6>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <span class="text-success">
    <strong>
    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
    </span>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <span class="text-danger">
    <strong>
    <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
    </span>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
    <span class="text-success">
    <strong>
    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
    </span>
    <span class="small float-right text-muted">11:21 AM</span>
    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item small" href="#">View all alerts</a>
    </div>
    </li>
    <li class="nav-item">
    <form class="form-inline my-2 my-lg-0 mr-lg-2">
    <div class="input-group">
    <input class="form-control" type="text" placeholder="Search for...">
    <span class="input-group-append">
    <button class="btn btn-primary" type="button">
    <i class="fa fa-search"></i>
    </button>
    </span>
    </div>
    </form>
    </li>
    <li class="nav-item">
    <a href="?do=logout" class="nav-link" data-toggle="modal">
    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
    </li>
    </ul>
    </div>
    </nav>
    <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->

    <!-- Icon Cards-->
    <?php
    // Telegram @fletchen
    $sqll = "SELECT  * from sales_stats WHERE month='Mar' ";
    if (mysqli_query($conn, $sqll))
    {
    echo "";
    }
    else
    {
    echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
    }
    $result = mysqli_query($conn, $sqll);
    if (mysqli_num_rows($result) > 0)
    {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fa fa-fw fa-comments"></i>
    </div>
    <div class="mr-5"><?php echo $row['Vistors']; ?> Vistors</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="#">

    </a>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fa fa-fw fa-list"></i>
    </div>
    <div class="mr-5"><?php echo $row['revenue'];?>  Downloads</div>
    </div>
    <?php
    }
    }
    else
    {
    echo '0 results';
    }
    ?>
    <a class="card-footer text-white clearfix small z-1" href="#">


    </a>
    </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <a class="card-footer text-white clearfix small z-1" href="deletestat.php">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fa fa-fw fa-support"></i>
    </div>
    <div class="mr-5">ПОЧИСТИТЬ ИСТОРИЮ</div>
    </div>


    <span class="float-right">
    <i class="fa fa-angle-right"></i>
    </span>
    </a>
    </div>
    </div>
    </div>


    <table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th style='width:50px;'>ID</th>
    <th style='width:100px;'>Number</th>
    <th style='width:350px;'>User</th>
    <th style='width:50px;'>Download</th>
    <th style='width:150px;'>ip</th>
    <th style='width:150px;'>Дата</th>
    <th style='width:150px;'>Страна</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
    	if (mysqli_connect_errno()){
    		echo "Failed to connect to MySQL: " . mysqli_connect_error();
    		die();
    		}

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    	$page_no = $_GET['page_no'];
    	} else {
    		$page_no = 1;
            }

    	$total_records_per_page = 100;
        $offset = ($page_no-1) * $total_records_per_page;
    	$previous_page = $page_no - 1;
    	$next_page = $page_no + 1;
    	$adjacents = "2";
        // Telegram @fletchen
    	$result_count = mysqli_query($newcon,"SELECT COUNT(*) As total_records FROM `egifts_stats`");
    	$total_records = mysqli_fetch_array($result_count);
    	$total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
    	$second_last = $total_no_of_pages - 1; // total page minus 1

        $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
        while($row = mysqli_fetch_array($result)){
    		echo "<tr>
    			  <td>".$row['id']."</td>
    			  <td>".$row['number']."</td>
    	 		  <td>".$row['cucki']."</td>
    		   	  <td>".$row['download']."</td>
              <td>".$row['ip']."</td>
              <td>".$row['date']."</td>
              <td>".$row['country']."</td>
    		   	  </tr>";
            }
    	mysqli_close($newcon);
        ?>
    </tbody>
    </table>

    <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
    </div>

    <ul class="pagination">
    	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

    	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    	</li>

        <?php
    	if ($total_no_of_pages <= 10){
    		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
    			if ($counter == $page_no) {
    		   echo "<li class='active'><a>$counter</a></li>";
    				}else{
               echo "<li><a href='?page_no=$counter'>$counter</a></li>";
    				}
            }
    	}
    	elseif($total_no_of_pages > 10){

    	if($page_no <= 4) {
    	 for ($counter = 1; $counter < 8; $counter++){
    			if ($counter == $page_no) {
    		   echo "<li class='active'><a>$counter</a></li>";
    				}else{
               echo "<li><a href='?page_no=$counter'>$counter</a></li>";
    				}
            }
    		echo "<li><a>...</a></li>";
    		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    		}

    	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
    		echo "<li><a href='?page_no=1'>1</a></li>";
    		echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";// Telegram @fletchen
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
               if ($counter == $page_no) {
    		   echo "<li class='active'><a>$counter</a></li>";
    				}else{
               echo "<li><a href='?page_no=$counter'>$counter</a></li>";
    				}
           }
           echo "<li><a>...</a></li>";
    	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                }

    		else {
            echo "<li><a href='?page_no=1'>1</a></li>";
    		echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
              if ($counter == $page_no) {
    		   echo "<li class='active'><a>$counter</a></li>";
    				}else{
               echo "<li><a href='?page_no=$counter'>$counter</a></li>";
    				}
                    }
                }
    	}
    ?>

    	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    	</li>
        <?php if($page_no < $total_no_of_pages){
    		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    		} ?>
    </ul>




    <!-- Area Chart Example-->

    <!-- Example DataTables Card-->
      <!-- Example DataTables Card-->

    </div>
    <!-- /.container-fluid-->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
    <div class="container">
    <div class="text-center">
    <small>Copyright © Your Website 2018</small>
    </div>
    </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
    </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    </div>
    </body>
    </html>
