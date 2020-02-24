<?php require_once('./conn.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css"/>
    <style media="print" type="text/css">
    .noprint{
            visibility:hidden;
        }
    </style>
    <style type="text/css">
        .tableHead{
            height: 35px;
        }

        .tableContain{
            height: 25px;
        }

        .title{
            font-size:large;
            font-weight: bold;
        }
    </style>
    <style media=print type="text/css"> 
        .noprint{
            visibility:hidden;
        } 
    </style>
</head>

<body style='font-family: arial,"標楷體",sans-serif !important;'>
    <?php
        $reportid = $_GET['reportid'];
        $sqlInf = "SELECT * from report_inf WHERE reportid = '$reportid' ";
        $sqlFood = "SELECT * from food_demo WHERE reportid = '$reportid' ";
        $resultInf = $conn->query($sqlInf);
        $resultFood = $conn->query($sqlFood);
        $rowInf = $resultInf->fetch_assoc();
    ?>
    
    <table class="table1" rules="all">
        <colgroup>
            <col style="width: 90px">
            <col style="width: 240px">
            <col style="width: 90px">
            <col style="width: 240px">
        </colgroup>
        <tr style="height: 40px">
            <td colspan="4" class="title">
                檢驗流程檢查表
                <span style="position: relative; left: 370px;">類別:食品</span>
            </td>
        </tr>
        <tr class="tableHead lr">
            <td>案件編號</td>
            <td colspan="3"><?php echo $rowInf['reportid']?></td>
        </tr>
        <tr class="tableHead lr">
            <td>委託單位</td>
            <td colspan="3"><?php echo $rowInf['client']?></td>
        </tr>
        
        <?php
            $page = 1;
            if(mysqli_num_rows($resultFood) <= 5){
                $pageTotal = 1 ;
            }else{
                $pageTotal = ceil(mysqli_num_rows($resultFood)/22) + 1;
            }
            for( $i = 1; $i <= mysqli_num_rows($resultFood); $i++){
                $rowFood = $resultFood->fetch_assoc();
                if( $i % 23 == 0){
                    echo "</table>";
                    echo"<div class='center'>承下頁</div>";
                    echo "<center><span>" . $page . "/" . $pageTotal . "頁</span></center>";
                    echo "<p style='page-break-before:always'> </p>";
                    echo"<table class='table1' rules='all'>
                            <colgroup>
                                <col style='width: 90px'>
                                <col style='width: 240px'>
                                <col style='width: 90px'>
                                <col style='width: 240px'>
                            </colgroup>;
                            <tr style='height: 40px'>
                                <td colspan='4' class='title'>
                                    檢驗流程檢查表
                                    <span style='position: relative; left: 370px;'>類別:食品</span>
                                </td>
                            </tr>
                            <tr class='tableHead lr'>
                                <td>案件編號</td>
                                <td colspan='3'>" . $rowInf['reportid'] . "</td>
                            </tr>
                            <tr class='tableHead lr'>
                                <td>委託單位</td>
                                <td colspan='3'>" . $rowInf['client'] . "</td>
                            </tr>";
                    $page++;
                }
                echo "<tr class='tableHead lr'>";
                echo "<td>樣品編號</td>";
                echo "<td>" . $rowFood['demoID'] . "</td>";
                echo "<td>檢驗項目</td>";
                echo "<td class='textPS'>" . $rowFood['serials'] . "</td>";
                echo "</tr>";
                
            }
            
            if(mysqli_num_rows($resultFood) >= 6){
                echo "</table>";
                echo"<div class='center'>承下頁</div>";
                echo "<center><span>" . $page . "/" . $pageTotal . "頁</span></center>";
                echo "<p style='page-break-before:always'> </p>";
                $page++;
                
            }else{
                echo "</table>";
            }

        ?>
    

    <table class="table1" rules="all">
        <colgroup>
            <col style="width: 90px">
            <col style="width: 360px">
            <col style="width: 110px">
            <col style="width: 100px">
        </colgroup>
        <tr class="tableHead">
            <th>流程</th>
            <th>注意事項</th>
            <th>審查結果</th>
            <th>查核人員/<br>日期</th>
        </tr>
        <tr class="tableContain">
            <td rowspan="3" class="lr">收樣</td>
            <td class="textPS">1.表單紀錄是否完整(食品檢驗委託單、樣品登錄表)</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="3"></td>
        </tr>
        <tr class="tableContain">
            <td class="textPS">2.樣品查核、相片是否符合相關規定</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain">
            <td class="textPS">3.估價作業是否完成</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr>
            <td rowspan="4" class="lr">轉委託</td>
            <td class="tableContain textPS">
                1.轉委託原因:
                <span style="font-size:20px;">□</span>無檢測方法 
                <span style="font-size:20px;">□</span>無分析能量
                <span style="font-size:20px;">□</span>客戶指定 
                <span style="font-size:20px;">□</span>其他
            </td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="4"></td>
        </tr>
        <tr>
            <td class="tableContain textPS">2.轉委託事項查核</td>
            <td rowspan="3" class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain textPS">
            <td> (1)轉委託機構之檢查能力是否符合需求</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(2)轉委託報價作業是否完成</td>
        </tr>
        <tr>
            <td rowspan="11" class="lr">檢驗數據<br>查核</td>
            <td class="textPS">一、層析法</td>
            <td class="tableContain"></td>
            <td rowspan="11"></td>
        </tr>
        <tr class="tableContain textPS">
            <td>1.檢量線製備是否符合相關要求</td>
            <td>
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr>
            <td class="tableContain textPS">2.品管樣品分析結果確認</td>
            <td rowspan="5" class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain textPS">
            <td>(1)空白樣品檢驗結果須符合相關要求</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(2)重複分析之相對差異百分比RPD(%)是否符合當年度之管理範圍</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(3)查核或基質添加之分析回收率R(%)是否符合當年度之管制範圍</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(4)是否每批次檢驗均包含品管樣品</td>
        </tr>
        <tr class="tableContain textPS">
            <td>3.樣品分析結果是否符合定性定量準則</td>
            <td>
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain textPS">
            <td>二、非層析法</td>
            <td></td>
        </tr>
        <tr class="tableContain textPS">
            <td>1.品管樣品之回收率是否符合規範</td>
            <td>
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain textPS">
            <td>2.重複分析之相對差異百分比RPD(%)是否符合規範</td>
            <td>
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr>
            <td rowspan="6" class="lr">手工報告<br>查核</td>
            <td class="tableContain textPS">1.轉委託之檢驗報告審查是否合格</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="6"></td>
        </tr>
        <tr class="textPS">
            <td class="tableContain">2.確認報告上的相關資料是否正確</td>
            <td rowspan="5">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr class="tableContain textPS">
            <td>(1)送驗資料</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(2)數據結果</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(3)委外檢驗項目是否標註委外單位和檢驗範圍</td>
        </tr>
        <tr class="tableContain textPS">
            <td>(4)檢體異常狀況是否於報告中標示</td>
        </tr>
        <tr>
            <td rowspan="2" class="lr">帳款確認</td>
            <td class="tableContain textPS">(1)確認顧客帳款已繳清</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="2"></td>
        </tr>
        <tr class="tableContain textPS">
            <td>(2)確認收據是否開立</td>
            <td>
                <span style="font-size:20px;">□</span>是
                <span style="font-size:20px;">□</span>否
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
    </table>
    
    <div class="textPS" style="position: relative; left: 30px;">
        *本表附屬於收樣資料首頁，隨流程傳遞，最後由報告製作人負責歸檔。<br>
        *審查結果如有不符合之處，將不符合事項註明於備註欄，以利更正。
    </div>
    <div class="center">
        <?php 
            echo "<br><span>" . $page . "/" . $pageTotal . "頁</span>";
        ?>
        <br><span class="textPS">(以下空白)</span>
    </div>
    <center><div>
        <br><a href="javascript:window.print()" _fcksavedurl="javascript:window.print()" class="noprint" onclick="return sendCheck()">列印本頁</a>
    </div></center>


</body>
</html>