<?php
    require_once('./conn.php');
    $reportid = $_GET['reportid'];
    
    $sqlFood = "SELECT * from food_demo WHERE reportid = '$reportid' ";
    $resultFood = $conn->query($sqlFood);
        
    $sqlInf = "SELECT * from report_inf WHERE reportid = '$reportid' ";
    $resultInf = $conn->query($sqlInf);
    $rowInf = $resultInf->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $rowInf['reportid']; ?></title>
    <link rel="stylesheet" href="style.css"/>
    <style media=print type="text/css"> 
        .noprint{
            visibility:hidden;
        } 
    </style>
</head> 
    
<body style='font-family: arial,"標楷體",sans-serif !important;'>
    <center><table class="table1" rules="all">
        <colgroup>
        <col class="table1" style="width: 150px">
        <col class="table1" style="width: 700px">
        <col class="table1" style="width: 50px">
        <col class="table1" style="width: 100px">
        </colgroup>
        <tr height="25" class="table1" >
            <td class="table1 tableCon">表單編號</td>
            <th rowspan="2" class="table1" >Test Database</th>
            <td class="table1 tableCon">版次</td>
            <td class="table1 tableCon">核發日期</td>
        </tr>
        <tr height="25" class="table1 tableCon" >
            <td>DP-41009-01</td>
            <td>1.0</td>
            <td>108.09.02</td>
        </tr>
        <tr class="table1 textTitle" >
            <th colspan="4">樣品收件查核及取用紀錄表</th>
        </tr>
        <tr height="30" class="table1" >
            <td colspan="4" class="table1" >
            <span style="position: relative; left: 5px;">委託單位：<?php echo $rowInf['client']; ?></span>
            <span style="position: relative; left: 90px; ">委託人：<?php echo $rowInf['CP']; ?></span>
            <span style="position: relative; left: 200px; ">委託日期：<?php echo $rowInf['projectDate']; ?></span>
            <span style="position: relative; left: 250px; ">案件編號：<?php echo $rowInf['reportid']; ?></span>
            </td>
        </tr>
        <tr height="30" class="table1" >
            <td colspan="4" class="table1" >
            <span style="position: relative; left: 5px;">運送方式：
            <input type="radio" class="sendType" name="send" value="a">親送
            <input type="radio" class="sendType" name="send" value="b">宅配
            <input type="radio" class="sendType" name="send" value="c">業務人員收樣
            </span>
            <span style="position: relative; left: 50px;">收樣人員：<?php echo $rowInf['staff']; ?></span>
            <span style="position: relative; left: 140px;">收樣日期：<?php echo $rowInf['demoDate']; ?></span>
            </td>
        </tr>
    </table></center>

    <center><table class="table1" rules="all";>
        <colgroup>
        <col style="width: 50px">
        <col style="width: 150px">
        <col style="width: 150px">
        <col style="width: 200px">
        <col style="width: 250px">
        <col style="width: 200px">
        </colgroup>
        <tr height="30" class="table1">
            <th>No</th>
            <th>樣品名稱</th>
            <th>樣品編號</th>
            <th>檢驗項目</th>
            <th>樣品查核結果</th>
            <th>委外樣品資訊</th>
        </tr>
        
        <?php
            $page = 1;
            /*if(mysqli_num_rows($resultFood)/6 == 0){
                $pageTotal = ceil(mysqli_num_rows($resultFood)/6)+1;
            } else {
                $pageTotal = ceil(mysqli_num_rows($resultFood)/6);
            }*/
            $pageTotal = floor(mysqli_num_rows($resultFood)/6)+1;
            for ($i = 1; $i <= mysqli_num_rows($resultFood); $i++) {
                $rowFood = $resultFood->fetch_assoc();
                if($i % 6 == 0){
                    echo "</table></center>";
                    echo "<center><span>" . $page . "/" . $pageTotal . "頁</span></center>";
                    echo "<p style='page-break-before:always'> </p>";
                    echo "<center><table class='table1' rules='all';>
                    <colgroup>
                    <col style='width: 50px'>
                    <col style='width: 150px'>
                    <col style='width: 150px'>
                    <col style='width: 200px'>
                    <col style='width: 250px'>
                    <col style='width: 200px'>
                    </colgroup>
                    <tr height='35' class='table1'>
                        <th>No</th>
                        <th>樣品名稱</th>
                        <th>樣品編號</th>
                        <th>檢驗項目</th>
                        <th>樣品查核結果</th>
                        <th>委外樣品資訊</th>
                    </tr>";
                    $page++;
                }
                echo "<tr height='80' class='table1'>";
                echo "<td class='center'>" . $i . "</td>";
                echo "<td class='center'>" .  $rowFood['demoName'] . "</td>";
                echo "<td class='center'>" .  $rowFood['demoID'] . "</td>";
                echo "<td class='textPS center'>" .  $rowFood['serials'] . "</td>";
                echo "<td class='textPS'>數量:" .  $rowFood['QTY'] . "
                    /狀態:" .  $rowFood['package'] . "<br>
                    製造日期:" .  $rowFood['mfDate'] . "
                    /有效日期:" .  $rowFood['expDate'] . "<br>
                    其他說明:<br>" .  $rowFood['PS'] . "
                    </td>";
                echo "<td class='textPS'>委外廠商 : " . $rowFood['trustCom'] . "<br>" .  $rowFood['trust'] . "</td>";
                echo "</tr>";   
            }
            echo "</table></center>";
            echo "<br><center><span>" . $page . "/" . $pageTotal . "頁</span></center>";
        ?>
        
    <center><span class= "textPS">(以下空白)</span></center>
    <div id='ps'>
        審核人員/日期:
    </div>
    <center><div>
        <br><a href="javascript:window.print()" _fcksavedurl="javascript:window.print()" class="noprint" onclick="return sendCheck()">列印本頁</a>
    </div></center>
    <input type="hidden" id="rows" value="<?php echo mysqli_num_rows($resultFood) + 1; ?>"/>
   
   <script>
   
        var ps = document.getElementById("ps");
        var item = document.getElementById("rows").value;
        var high = 350 ;
        for(i = 1 ; i <=5 ; i++){
            if (item % 6 == i){
                ps.style.marginTop = high+'px';
                break;
            }
            high -= 80 ;
        }
        function sendCheck(){
            var radioCheck = document.querySelectorAll('.sendType');
            if( radioCheck[0].checked || radioCheck[1].checked || radioCheck[2].checked){
                return true;
            }else{
                alert('請選擇運送方式');
                return false;
            }
        }
   </script>
</body>
    
</html> 