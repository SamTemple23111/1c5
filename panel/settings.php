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
// Telegram @fletchen
include_once '../db/dbmysqli.php';
$id= $_GET['id'];
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
<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<a class="navbar-brand" href="index.php">Start Bootstrap</a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
<a class="nav-link" href="stats.php">
<i class="fa fa-fw fa-dashboard"></i>
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
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.html">Dashboard</a>
</li>
<li class="breadcrumb-item active">Изменить</li>
</ol>
<div class="row">
<div class="col-12">
<?php
$sql = "SELECT * from users WHERE id='1'";
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
<h1>Изменить</h1>
</div>
<div class="col-md-8">
  <p>Пароль в MD5: <?php echo $row['password']; ?></p>
<form method="get" action="changesettings.php">
<div class="form-group">
<label>Пароль</label>
<input type="text" class="form-control" name="pass" value="" required>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div><?php

}} ?>
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
<a class="btn btn-primary" href="login.php">Logout</a>
</div>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
</div>
</body>
</html>
