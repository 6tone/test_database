<?php
        require_once('./conn.php');
        $ID = $_GET['ID'];
        $sql = "SELECT * from report_inf WHERE ID = '$ID' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $re = $row['reportid'];
        
        $select = "SELECT * from food_demo WHERE reportid = '$re'";
        $resultFood = $conn->query($select);  
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet"  type="text/css" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
 
   
    <div class="container">
        <div class="repotrInf">
            <h2>案件資訊</h2>
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="450px" bgcolor="#DDDDDD">
                <tr>
                    <td width="150px">案件編號: </td>
                    <td align="left"><?php echo $row['reportid']?></td>
                </tr>
                <tr>
                    <td>收樣人員: </td>
                    <td align="left"><?php echo $row['staff']?></td>
                </tr>
                <tr>
                    <td>委託單位: </td>
                    <td align="left"><?php echo $row['client']?></td>
                </tr>
                <tr>
                    <td>統一編號: </td>
                    <td align="left"><?php echo $row['UN']?></td>
                </tr>
                <tr>
                    <td>地址: </td>
                    <td align="left"><?php echo $row['adress']?></td>
                </tr>
                <tr>
                    <td>連絡電話: </td>
                    <td align="left"><?php echo $row['TEL']?></td>
                </tr>
                <tr>
                    <td>傳真: </td>
                    <td align="left"><?php echo $row['FAX']?></td>
                </tr>
                <tr>
                    <td>聯絡人: </td>
                    <td align="left"><?php echo $row['CP']?></td>
                </tr>
                <tr>
                    <td>電子信箱: </td>
                    <td align="left"><?php echo $row['email']?></td>
                </tr>
                <tr>
                    <input type="hidden" id='ID' name="ID" value="<?php echo $row['ID']?>" >
                </tr>
            </table></center>
        </div>

        <div class="foodDemo">
            <h2>樣品資訊</h2>
            <center><div class='item'>
                <table border='1' cellpadding='5px' cellspacing='2px' width='450px' bgcolor='#DDDDDD'>
                    <colgroup>
                    <col style='width: 120px'>
                    <col style='width: 200px'>
                    <col style='width: 50px'>
                    </colgroup>
                    <tr>
                        <td>樣品編號</td>
                        <td>樣品名稱</td>
                    </tr>
                    <?php
                        for($i = 1; $i <= mysqli_num_rows($resultFood); $i++){
                            $rowFood = $resultFood->fetch_assoc();
                            echo "<tr>";
                            echo "<td height='30'>";
                            echo $rowFood['demoID'];
                            echo "</td>";
                            echo "<td>";
                            echo $rowFood['demoName'];
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div></center>
        </div>

        <br>

        <div class="buttonZon">   
            <button id='print' onclick="print()" data-id="<?php echo$row['reportid'];?>">取用紀錄表</button>
            <button id="printCheckReport" onclick="printCheckReport()" data-id="<?php echo$row['reportid'];?>" >流程檢查表</button>
        </div>
    </div>

    <script>
        var reportid = document.querySelector('#print');
        function print(){
            window.open('./print.php?reportid=' + reportid.dataset.id + '', '取用紀錄表',config='height=900,width=1100');
        }

        function printCheckReport(){
            window.open('./checkReport_food_2.0.php?reportid=' + reportid.dataset.id + '', '流程檢查表',config='height=900,width=1100');
        }
    </script>

</body>

</html>