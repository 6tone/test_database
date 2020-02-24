<?php require_once('./conn.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
    <?php
        $sql = 'SELECT * from report_inf ORDER BY createdDate DESC';
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>


    <center><table class="table1" rules="all">
        <colgroup>
            <col class="table1" style="width: 33px">
            <col class="table1" style="width: 400px">
            <col class="table1" style="width: 75px">
            <col class="table1" style="width: 150px">
        </colgroup>
        <tr height="30">
            <td colspan="4">
                <b>檢驗流程檢查表</b>
                <span style="position: relative; left: 350px;font-weight:bold;">類別:運動禁藥保健食品</span>
            </td>
        </tr>
        <tr height="90">
            <td rowspan="5" class="lr">轉碼編號範圍</td>
            <td rowspan="5"></td>
            <td class="textPS">案件編號</td>
            <td class="textPS"></td>
        </tr>
        <tr height="30">
            <td class="textPS">委託單位</td>
            <td class="textPS"></td>
        </tr>
        <tr height="30">
            <td class="textPS">收件日</td>
            <td class="textPS"></td>
        </tr>
        <tr height="30">
            <td class="textPS">預定報告日</td>
            <td class="textPS"></td>
        </tr>
        <tr height="30">
            <td class="textPS">實際報告日</td>
            <td class="textPS"></td>
        </tr>
       
    </table></center>

    <center><table class="table1" rules="all"  border='1'>
        <colgroup>
            <col style="width: 33px">
            <col style="width: 400px">
            <col style="width: 75px">
            <col style="width: 75px">
            <col style="width: 75px">
        </colgroup>
        <tr height="20" class="textPS">
            <td>流程</td>
            <td>注意事項</td>
            <td>審查結果</td>
            <td>查核人/日期</td>
            <td>備註</td>
        </tr>
        <tr height="60">
            <td rowspan="3" class="lr">收樣資料查核</td>
            <td>包裝完整無破損(
                <span style="font-size:30px;">□</span>包
                <span style="font-size:30px;">□</span>盒
                <span style="font-size:30px;">□</span>瓶
                <span style="font-size:30px;">□</span>散裝
            </td>
            <td class="textPS"><span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用</td>
            <td rowspan="3"></td>
            <td rowspan="3"></td>
        </tr>
        <tr height="60">
            <td>來源 / 批號 / 製造日期 / 有效期限 標示完整</td>
            <td class="textPS">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr height="60">
            <td>其他<br>檢體量≧3次服用量</td>
            <td class="textPS"><span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用</td>
        </tr>
    </table></center>

    <center><table class="table1" rules="all"  border='1'>
        <colgroup>
            <col style="width: 33px">
            <col style="width: 400px">
            <col style="width: 75px">
            <col style="width: 75px">
            <col style="width: 75px">
        </colgroup>
        <tr height="30">
            <td rowspan="6" class="lr">初篩檢驗數據查核</td>
            <td>D-AAS(定量)-</td>
            <td rowspan="10" class="textPS">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="10"></td>
            <td rowspan="10"></td>
        </tr>
        <tr height="30">
            <td>D-AAS(定性)-</td>
        </tr>
        <tr height="30">
            <td>D-AAS&COR-</td>
        </tr>
        <tr height="30">
            <td>D-ABNS-</td>
        </tr>
        <tr height="30">
            <td>D-ANAT-</td>
        </tr>
        <tr height="30">
            <td>D-DIS+SIM-</td>
        </tr>
        <tr height="30">
            <td rowspan="4" class="lr" style="font-size:90%;">確認檢驗數據查核</td>
            <td></td>
        </tr>
        <tr height="30">
            <td></td>
        </tr>
        <tr height="30">
            <td></td>
        </tr>
        <tr height="30">
            <td></td>
        </tr>
    </table></center>

    <center><table class="table1" rules="all"  border='1'>
        <colgroup>
            <col style="width: 33px">
            <col style="width: 400px">
            <col style="width: 75px">
            <col style="width: 75px">
            <col style="width: 75px">
        </colgroup>
        <tr height="30">
            <td rowspan="4" class="lr">手工報告查核</td>
            <td>確認報告上的相關資料是否正確</td>
            <td rowspan="4" class="textPS">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="4"></td>
            <td rowspan="4"></td>
        </tr>
        <tr height="30">
            <td>(1)送驗資料</td>
        </tr>
        <tr height="30">
            <td>(2)數據結果與判定</td>
        </tr>
        <tr height="30">
            <td>(3)檢體異常狀況是否於報告中標示</td>
        </tr>
        </table></center>

    <center><table class="table1" rules="all"  border='1'>
        <colgroup>
            <col style="width: 33px">
            <col style="width: 400px">
            <col style="width: 75px">
            <col style="width: 75px">
            <col style="width: 75px">
        </colgroup>
        <tr height="30">
            <td rowspan="3" class="lr">帳款確認</td>
            <td>非標案型報告才需繳清</td>
            <td rowspan="3" class="textPS">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="3"></td>
            <td rowspan="3"></td>
        </tr>
        <tr height="30">
            <td>(1)確認顧客帳款已繳清</td>
        </tr>
        <tr height="30">
            <td>(2)確認收據是否開立</td>
        </tr>
    </table></center>
    <div class="textPS" style="position: relative; left: 40px;">
    ◎審查結果如有不符合之處，將不符合事項註明於備註欄，以利更正。
    </div>

</body>
</html>