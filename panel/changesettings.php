<script>
setTimeout(function(){
    location.href = 'index.php';
}, 1000);
</script>
<?php
// Telegram @fletchen
session_start();
include_once '../db/dbmysqli.php';
if(!$_SESSION['username']){
 header("Location: login.php");
 exit;
}

    $pass= $_GET['pass'];
$pass = md5($pass);



    $sql = "UPDATE users SET password='$pass'  WHERE id='1'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
    ?>
