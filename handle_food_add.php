<?php
  require_once('./conn.php');
 
  $demoName = $_POST['demoName'];
  $demoID = $_POST['demoID'];
  $fCom = $_POST['fCom'];
  $dCom = $_POST['dCom'];
  $serials = $_POST['serials'];
  $lotNumber = $_POST['lotNumber'];
  $mfDate = $_POST['mfDate'];
  $expDate = $_POST['expDate'];
  $madeIn = $_POST['madeIn'];
  $shelf = $_POST['shelf'];
  $package = $_POST['package'];
  $QTY = $_POST['QTY'];
  $PS = $_POST['PS'];
  $reportid = $_POST['reportid'];
  $trust = $_POST['trust'];
  $trustCom = $_POST['trustCom'];
  if(empty($demoName) || empty($demoID) || empty($serials)){
      die("請檢查資料");
   }
  
  $sql = "INSERT INTO food_demo(demoID, reportid, demoName, fCom , dCom, serials, lotNumber, mfDate, expDate, madeIn, shelf, package, QTY, PS, trust, trustCom)
    VALUES('$demoID', '$reportid', '$demoName', '$fCom', '$dCom', '$serials', '$lotNumber', '$mfDate', '$expDate', '$madeIn', '$shelf', '$package', '$QTY', '$PS', '$trust', '$trustCom')";
  $result = $conn->query($sql);

  $select = "SELECT * from food_demo WHERE reportid = '$reportid' ";
  $resultId = $conn->query($select);
  
  
  for($i = 1; $i <= mysqli_num_rows($resultId); $i++){
    $row = $resultId->fetch_assoc();
    echo  "<div class='item'>" . $row['demoID'] . "&emsp&emsp 
    <span class='textTitle'>" . $row['demoName'] . "</span>
    <a href='#' class='delete' data-id='" . $row['ID'] . "'>刪除</a>
    </div>";
  

  }

?>