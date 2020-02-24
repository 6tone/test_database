<?php
  require_once('./conn.php');

  $searchInf = $_POST['searchInf'];
  $con = $_POST['conInf'];
  $conn->query('SET NAMES UTF8');
  
  if(empty($searchInf) || empty($con)){
      die('錯誤，請檢查資料');
   }
  
  $sql = "SELECT * FROM report_inf where $searchInf like '%$con%' ";
  $result = $conn->query($sql);
  echo "<center><table border='1px' style='word-break:keep-all;' id='table_inf'>
          <colgroup>
            <col style='width: 150px'>
            <col style='width: 150px'>
            <col style='width: 150px'>
            <col style='width: 200px'>
            <col style='width: 80px'>
            <col style='width: 100px'>
            <col style='width: 100px'>
            <col style='width: 100px'>
          </colgroup>
          <tr>
            <td>案件編號</td>
            <td>收樣人員</td>
            <td>委託單位</td>
            <!--<td>統一編號</td>-->
            <td>地址</td>
            <td>連絡電話</td>
            <!--<td>傳真</td>-->
            <td>聯絡人</td>
            <td>電子信箱</td>
            <td>案件日期</td>
          </tr>" ;
  if($result){
      for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
          $row = $result->fetch_row(); 
          echo "<tr  height='60'>";
          echo "<td>" . $row[ 1 ] . "</td>";
          echo "<td>" . $row[ 2 ] . "</td>";
          echo "<td>" . $row[ 3 ] . "</td>";
          //echo "<td>" . $row[ 4 ] . "</td>";
          echo "<td>" . $row[ 5 ] . "</td>";
          echo "<td>" . $row[ 6 ] . "</td>";
          //echo "<td>" . $row[ 7 ] . "</td>";
          echo "<td>" . $row[ 8 ] . "</td>";
          echo "<td>" . $row[ 9 ] . "</td>";
          echo "<td>" . $row[ 10 ] . "</td>";
          echo "<td><button onclick='updata_search(" . $row[ 0 ] . ")'>編輯</button></td>";
          echo "<td><button onclick='print_search(" . $row[ 0 ] . ")'>列印</button></td>";
          echo "</tr>";
        }
    }else{
      echo "failed" . $conn->error;
      }
  echo "<br></table></center>";
  echo "<span id='table_page_inf'></span>";
  echo "<script src='jquery-tablepage-1.0.js'></script>";
  echo "<script>$('#table_inf').tablepage($('#table_page_inf'), 10);</script>";

?>