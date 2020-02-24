<?php
  require_once('./conn.php');

  $ID = $_GET['ID'];
  $sql = "SELECT * FROM report_inf where ID = " . $ID;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<div class="container">
        <h1>檢驗委託單</h1>
        <a href="./index.php">返回主頁</a>
        <div>
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="450px" bgcolor="#DDDDDD">
                <form method="POST" action="./handle_update.php">
                    <tr>
                        <td width="150px">案件編號: </td>
                        <td align="left"><input name='reportid' size="30" value="<?php echo $row['reportid']?>"/></td>
                    </tr>
                    <tr>
                        <td width="150px">委託日期: </td>
                        <td align="left"><input id='projectDate' name='projectDate' size="30" value="<?php echo $row['projectDate']?>"/></td>
                    </tr>
                    <tr>
                        <td width="150px">收樣日期: </td>
                        <td align="left"><input id='demoDate' name='demoDate' size="30" value="<?php echo $row['demoDate']?>"/></td>
                    </tr>
                    <tr>
                        <td>收樣人員: </td>
                        <td align="left"><input name='staff' size="30" value="<?php echo $row['staff']?>"/></td>
                    </tr>
                    <tr>
                        <td>委託單位: </td>
                        <td align="left"><input name='client' size="30" value="<?php echo $row['client']?>"/></td>
                    </tr>
                    <tr>
                        <td>統一編號: </td>
                        <td align="left"><input name='UN' size="30" value="<?php echo $row['UN']?>"/></td>
                    </tr>
                    <tr>
                        <td>地址: </td>
                        <td align="left"><input name='adress' size="30" value="<?php echo $row['adress']?>"/></td>
                    </tr>
                    <tr>
                        <td>連絡電話: </td>
                        <td align="left"><input name='TEL' size="30" value="<?php echo $row['TEL']?>"/></td>
                    </tr>
                    <tr>
                        <td>傳真: </td>
                        <td align="left"><input name='FAX' size="30" value="<?php echo $row['FAX']?>"/></td>
                    </tr>
                    <tr>
                        <td>聯絡人: </td>
                        <td align="left"><input name='CP' size="30" value="<?php echo $row['CP']?>"/></td>
                    </tr>
                    <tr>
                        <td>電子信箱: </td>
                        <td align="left"><input name='email' size="30" value="<?php echo $row['email']?>"/></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="ID" value="<?php echo $row['ID']?>" >
                        <th colspan="2"><input type='submit' value='修改'/></th>
                    </tr>
                </form>
            </table></center>
        </div>
    </div>
</body>
</html>