<?php
  require_once('./conn.php');

  $reportid = $_POST['reportid'];
  $staff = $_POST['staff'];
  $client = $_POST['client'];
  $UN = $_POST['UN'];
  $adress = $_POST['adress'];
  $TEL = $_POST['TEL'];
  $FAX = $_POST['FAX'];
  $CP = $_POST['CP'];
  $email = $_POST['email'];
  $ID = $_POST['ID'];
  $demoDate = $_POST['demoDate'];
  $projectDate = $_POST['projectDate'];
  if(empty($reportid) || empty($client) || empty($UN) || empty($adress) || empty($CP)){
      die('錯誤，請檢查資料');
   }
  
   $sql = "UPDATE report_inf SET reportid='$reportid', staff='$staff', client='$client', UN='$UN', 
   adress='$adress', TEL='$TEL', FAX='$FAX', CP='$CP', email='$email', demoDate='$demoDate', projectDate='$projectDate' where ID = " . $ID;
  $result = $conn->query($sql);

?>