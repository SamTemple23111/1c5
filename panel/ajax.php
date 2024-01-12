<?php
$country = $_POST['country'];

include_once '../db/dbmysqli.php';
//$res = mysqli_query($newcon,"SELECT COUNT(*) FROM 'egifts_stats'");
//$result = mysqli_query($newcon,"SELECT * FROM `egifts_stats` WHERE count <> '0' ORDER BY id DESC LIMIT $offset, $total_records_per_page");
//$row = mysql_fetch_row($res);
//$total = $row[0]; // всего записей
//echo $total;
//Telegram @fletchen
//$result = $db->mysqli_query("SELECT COUNT(*) FROM `table`");
//$row = $res->fetch_row();
//echo '#: ', $row[0];

if($country == 'none'){
  $result = $newcon->query("SELECT COUNT(*) FROM egifts_stats WHERE download = 'yes'");
} else {
  $result = $newcon->query("SELECT COUNT(*) FROM egifts_stats WHERE download = 'yes' AND country = '$country'");
}

$row = $result->fetch_array();
$count=$row[0];
echo $count;
 ?>
