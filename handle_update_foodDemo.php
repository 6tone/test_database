<?php
    require_once('./conn.php');
    $ID = $_POST['ID'];
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
  
    $sql = "UPDATE food_demo SET demoName='$demoName', demoID='$demoID', fCom='$fCom', dCom='$dCom', serials='$serials',
        lotNumber='$lotNumber', mfDate='$mfDate', expDate='$expDate', madeIn='$madeIn', expDate='$expDate', shelf='$shelf',
        package='$package', QTY='$QTY', PS='$PS', trust='$trust', trustCom='$trustCom' WHERE ID = " . $ID;
    $result = $conn->query($sql);
    if($result){
        header('Location:./food_add.php');
    }else{
        echo "failed" . $conn->error;
    }
?>