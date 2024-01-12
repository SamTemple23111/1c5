<script>
setTimeout(function(){
    location.href = 'stats.php';
}, 100);
</script>
<?php
session_start();
include_once '../db/dbmysqli.php';
if(!$_SESSION['username']){
 header("Location: login.php");
 exit;
}

    $sql = "DELETE FROM egifts_stats";



if (mysqli_query($conn, $sql)) {
    $sql = "UPDATE sales_stats SET revenue=0, Vistors=0 WHERE id='1'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";


    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
    ?>
