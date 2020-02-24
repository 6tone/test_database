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
            <col style="width: 150px">
            <col style="width: 370px">
            <col style="width: 65px">
            <col style="width: 120px">
        </colgroup>
        <tr>
            <td colspan="4" height="30">
            <b>檢驗流程檢查表</b>
            <span style="position: relative; left: 350px;font-weight:bold;">類別:食品</span>
            </td>
        </tr>
        <tr>
            <td rowspan="7" class="lr">轉碼編號範圍<br>(說明事項)</td>
            <td rowspan="3" style="vertical-align:top;" class="textPS">轉碼編號範圍:</td>
            <td class="textPS">案件編號 </td>
            <td height="15"></td>
        </tr>
        <tr>
            <td class="textPS">轉包編號</td>
            <td height="15"></td>
        </tr>
        <tr>
            <td class="textPS">委驗單位</td>
            <td height="15"></td>
        </tr>
        <tr>
            <td rowspan="3" style="vertical-align:top;" class="textPS">轉包樣品:</td>
            <td class="textPS">收件日</td>
            <td height="15"></td>
        </tr>
        <tr>
            <td class="textPS">預定報告日</td>
            <td height="15"></td>
        </tr>
        
        <tr>
            <td class="textPS">實際報告日</td>
            <td height="15"></td>
        </tr>
    </table></center>

    <center><table class="table1" rules="all">
        <colgroup>
            <col style="width: 150px">
            <col style="width: 370px">
            <col style="width: 65px">
            <col style="width: 70px">
            <col style="width: 50px">
        </colgroup>
        <tr>
            <th height="20">流程</th>
            <th>注意要項</th>
            <td class="textPS">審查結果</td>
            <td class="textPS">查核人/日期</td>
            <td class="textPS">備註</td>
        </tr>
        <tr>
            <td rowspan="9" class="lr">收樣資料查核</td>
            <td height="15" class="textPS">1.表單查核</td>
            <td rowspan="9">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="9"></td>
            <td rowspan="18"></td>
        </tr>
        <tr>
            <td height="15" class="textPS"> (1)委託單上: 產品名稱、批號、製造或有效日期、來源、包裝及數量…等資訊是否齊備</td>
        </tr>
        <tr>
            <td height="15" class="textPS"> (2)委託單和內部監管表單內容是否相符</td>
        </tr>
        <tr>
            <td height="15" class="textPS">2.樣品查核</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)包裝完整無破損? </td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)來源 / 批號 / 製造日期 / 有效期限 標示完整?</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(3)樣品所有標示和數量與委託資料相符?</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(4)是否有照相? 照片資訊是否完整?</td>
        </tr>
        <tr>
            <td height="15" class="textPS">3.估價作業是否完成?(個案適用)</td>
        </tr>
        <tr>
            <td rowspan="9" class="lr">轉包事項查核</td>
            <td height="15" class="textPS">1.轉包原因: □ 無檢測方法 □ 無分析能量 □ 客戶指定 □ 其他</td>
            <td rowspan="5">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="5"></td>
        </tr>
        <tr>
            <td height="15" class="textPS">2.轉包事項查核</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)轉包單位之檢測能力是否符合客戶要求</td>
        </tr>
        <tr>
            <td height="15" class="textPS">  (2)委外估價作業是否已經完成</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(3)是否編列轉包編號</td>
        </tr>
        
        <tr>
            <td height="15" class="textPS">3.其他單位會辦事項說明:</td>
            <td rowspan="3"></td>
            <td rowspan="3"></td>
        </tr>
        <tr>
            <td height="15" class="textPS"></td>
        </tr>
        <tr>
            <td height="15" class="textPS"></td>
        </tr>
    </table></center>

    <center><table class="table1" rules="all">
        <colgroup>
            <col style="width: 150px">
            <col style="width: 370px">
            <col style="width: 65px">
            <col style="width: 70px">
            <col style="width: 50px">
        </colgroup>
        <tr>
            <td rowspan="18" class="lr">檢驗數據查核<br>(批次編號) </td>
            <td height="15" class="textPS">一、層析法</td>
            <td rowspan="15">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
            <td rowspan="18"></td>
            <td rowspan="18"></td>
        </tr>
        <tr>
            <td height="15" class="textPS">1.線性資料確認</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)線性範圍是否正確 ?? ；R2 > 0.99 ??</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)檢量線確認或查核品管濃度是否符合規範</td>
        </tr>
        <tr>
            <td height="15" class="textPS">2.品管樣品分析結果確認:</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)空白分析分析值須小於1/2定量極限</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)重複分析之相對差異百分比RPD(％)是否符合當年度之管制範圍</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(3)查核或基質添加之分析回收率 R (％)是否符合當年度之管制範圍</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(4)是否每20支樣品進行空白、重複和添加分析之檢測</td>
        </tr>
        <tr>
            <td height="15" class="textPS">3.濃度大於最低可定量濃度之樣品是否符合下述規範:</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)樣品之滯留時間是否符合規範(LCMSMS則觀察相對滯留時間RRT)</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)樣品之層析圖是否符合規範</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(3)樣品與標準品之特性波峰比對是否相符(LC專用)</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(4)樣品之檢測值是否在線性範圍內</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(5)樣品之離子強度比(Ion Ratio)是否符合規範(LCMSMS適用)</td>
        </tr>
        <tr>
            <td height="15" class="textPS">二、非層析法</td>
            <td rowspan="3">□是 □否 □不適用</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)查核品管之回收率是否符合規範</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)重複分析之相對差異百分比RPD(％)是否符合規範。</td class="textPS">
        </tr>
        </table></center>
        
        <center><table class="table1" rules="all">
            <colgroup>
                <col style="width: 150px">
                <col style="width: 370px">
                <col style="width: 65px">
                <col style="width: 70px">
                <col style="width: 50px">
            </colgroup>
        <tr>
            <td rowspan="6" class="lr">手工報告查核</td>
            <td height="15" class="textPS">1.轉包報告之分析能力是否符合客戶要求</td>
            <td class="textPS">□是  □否<br>□不適用</td>
            <td rowspan="6"></td>
            <td rowspan="6"></td>
        </tr>
        <tr>
            <td height="15" class="textPS">2.確認報告上的相關資料是否正確</td>
            <td rowspan="5">
                <span style="font-size:20px;">□</span>是<br>
                <span style="font-size:20px;">□</span>否<br>
                <span style="font-size:20px;">□</span>不適用
            </td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)送驗資料</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)數據結果</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(3)委外檢驗項目是否標註委外單位和檢驗範圍</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(4)檢體異常狀況是否於報告中標示</td>
        </tr>
        <tr>
            <td rowspan="3" class="lr">帳款確認</td>
            <td height="15" class="textPS">非標案型報告才需繳清</td>
            <td rowspan="3">
            □是<br>□否<br>□不適用</td>
            </td>
            <td rowspan="3"></td>
            <td rowspan="3"></td>
        </tr>
        <tr>
            <td height="15" class="textPS">(1)確認顧客帳款已繳清</td>
        </tr>
        <tr>
            <td height="15" class="textPS">(2)確認收據是否開立 </td>
        </tr>
    </table></center>
    <div class="textPS" style="position: relative; left: 10px;">
        ◎本表附於收樣資料首頁，隨流程傳遞，最由報告製作人負責歸檔。<br>
        ◎審查結果如有不符合之處，將不符合事項註明於備註欄，以利更正。
    </div >

    

</body>
</html>