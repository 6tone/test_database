<?php
    require_once('./conn.php');
    $ID = $_POST['ID'];
    $sql = "DELETE FROM food_demo WHERE ID = ". $ID;
    if($conn->query($sql)){
       die("failde: " . $conn->error);
    }

?>