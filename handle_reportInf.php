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
  $demoDate = $_POST['demoDate'];
  $projectDate = $_POST['projectDate'];
 
  if(empty($reportid) || empty($client) || empty($UN) || empty($adress) || empty($CP)){
      die('錯誤，請檢查資料');
   }
  
  $sql = "INSERT INTO report_inf(reportid , staff , client, UN, adress, TEL, FAX, CP, email, demoDate, projectDate)
   VALUES('$reportid', '$staff', '$client', '$UN', '$adress', '$TEL', '$FAX', '$CP', '$email','$demoDate', '$projectDate')";
  $result = $conn->query($sql);

  if($result){
      header("Location: ./food_add.php");
  }else{
      echo "failed" . $conn->error;
  }

?>
