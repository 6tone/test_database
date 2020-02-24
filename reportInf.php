<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>檢驗委託單</h1>
        <a href="./index.php">返回主頁</a>
        <div>
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="450px" bgcolor="#DDDDDD">
                <form method="POST" action="./handle_reportInf.php" name="form1" id="form1"  onsubmit="return verify()">
                    <tr>
                        <td width="150px">案件編號: </td>
                        <td align="left"><input id='reportid' name='reportid' size="30"/></td>
                    </tr>
                    <tr>
                        <td width="150px">委託日期: </td>
                        <td align="left"><input id='projectDate' name='projectDate' size="30"/></td>
                    </tr>
                    <tr>
                        <td width="150px">收樣日期: </td>
                        <td align="left"><input id='demoDate' name='demoDate' size="30"/></td>
                    </tr>
                    <tr>
                        <td>收樣人員: </td>
                        <td align="left"><input id='staff' name='staff' size="30"/></td>
                    </tr>
                    <tr>
                        <td>委託單位: </td>
                        <td align="left"><input id='client' name='client' size="30"/></td>
                    </tr>
                    <tr>
                        <td>統一編號: </td>
                        <td align="left"><input id='UN' name='UN' size="30"/></td>
                    </tr>
                    <tr>
                        <td>地址: </td>
                        <td align="left"><input id='adress' name='adress' size="30"/></td>
                    </tr>
                    <tr>
                        <td>連絡電話: </td>
                        <td align="left"><input id='TEL' name='TEL' size="30"/></td>
                    </tr>
                    <tr>
                        <td>傳真: </td>
                        <td align="left"><input id='FAX' name='FAX' size="30"/></td>
                    </tr>
                    <tr>
                        <td>聯絡人: </td>
                        <td align="left"><input id='CP' name='CP' size="30"/></td>
                    </tr>
                    <tr>
                        <td>電子信箱: </td>
                        <td align="left"><input id='email' name='email' size="30"/></td>
                    </tr>
                    <tr>
                    <th colspan="2"><input type='submit' id='subInf' value='新增'></th>
                    </tr>
                </form>
            </table></center>
        </div>
    </div>

    <script>
    function verify() {
        var reportid = $("#reportid").val();
        var staff = $("#staff").val();
        var client = $("#client").val();
        var CP =$("#CP").val();
        if (reportid == '') {
            alert("請填寫'案件編號'");
            return false;
        }
        if(staff == ''){
            alert("請填寫'收樣人員'");
            return false;
        }
        if(client == ''){
            alert("請填寫'委託單位'");
            return false;
        }
        if(CP == ''){
            alert("請填寫'聯絡人'");
            return false;
        }
    }
    </script>

</body>
</html>