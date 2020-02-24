<?php
  require_once('./conn.php');

  $searchInf = $_POST['searchFood'];
  $con = $_POST['conFood'];
  $conn->query('SET NAMES UTF8');
  
  if(empty($searchInf) || empty($con)){
      die('錯誤，請檢查資料');
   }
  
  $sql = "SELECT * FROM food_demo where $searchInf like '%$con%' ";
  $result = $conn->query($sql);
  echo "<center><table border='1px'  style='word-break:keep-all;' id='table_food'>
          <colgroup>
            <col style='width: 150px'>
            <col style='width: 150px'>
            <col style='width: 150px'>
            <col style='width: 200px'>
            <col style='width: 80px'>
            <col style='width: 100px'>
          </colgroup>
          <tr>
            <td>樣品編號</td>
            <td>案件編號</td>
            <td>產品名稱</td>
            <td>檢驗項目</td>
            <td>特殊取樣說明</td>
            <td>委外廠商</td>
            <td>委外測項</td>
            <td>建立日期</td>
            <td></td>
          </tr>" ;
  if($result){
      for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
          $row = $result->fetch_row(); 
          echo "<tr height='60'>";
          echo "<td>" . $row[ 1 ] . "</td>";
          echo "<td>" . $row[ 2 ] . "</td>";
          echo "<td>" . $row[ 3 ] . "</td>";
          echo "<td>" . $row[ 6 ] . "</td>";
          echo "<td>" . $row[ 14 ] . "</td>";
          echo "<td>" . $row[ 15 ] . "</td>";
          echo "<td>" . $row[ 16 ] . "</td>";
          echo "<td>" . $row[ 18 ] . "</td>";
          echo "<td><button onclick='updata_foodDemo_search(" . $row[ 0 ] . ")'>編輯</button>";
          echo "</tr>";
        }
    }else{
      echo "failed" . $conn->error;
      }
echo "<br></table></center>";
echo "<span id='table_page_food'></span>";
echo "<script src='jquery-tablepage-1.0.js'></script>";
echo "<script>$('#table_food').tablepage($('#table_page_food'), 10);</script>";

?>