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
        <div>
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="450px" bgcolor="#DDDDDD">
                    <tr>
                        <td width="150px">案件編號: </td>
                        <td align="left"><input id='reportid' name='reportid' size="30" value="<?php echo $row['reportid']?>"/></td>
                    </tr>
                    <tr>
                    <tr>
                        <td width="150px">委託日期: </td>
                        <td align="left"><input id='projectDate' name='projectDate' size="30" value="<?php echo $row['projectDate']?>"/></td>
                    </tr>
                    <tr>
                        <td width="150px">收樣日期: </td>
                        <td align="left"><input id='demoDate' name='demoDate' size="30" value="<?php echo $row['demoDate']?>"/></td>
                    </tr>
                        <td>收樣人員: </td>
                        <td align="left"><input id='staff' name='staff' size="30" value="<?php echo $row['staff']?>"/></td>
                    </tr>
                    <tr>
                        <td>委託單位: </td>
                        <td align="left"><input id='client' name='client' size="30" value="<?php echo $row['client']?>"/></td>
                    </tr>
                    <tr>
                        <td>統一編號: </td>
                        <td align="left"><input id='UN' name='UN' size="30" value="<?php echo $row['UN']?>"/></td>
                    </tr>
                    <tr>
                        <td>地址: </td>
                        <td align="left"><input id='adress' name='adress' size="30" value="<?php echo $row['adress']?>"/></td>
                    </tr>
                    <tr>
                        <td>連絡電話: </td>
                        <td align="left"><input id='TEL' name='TEL' size="30" value="<?php echo $row['TEL']?>"/></td>
                    </tr>
                    <tr>
                        <td>傳真: </td>
                        <td align="left"><input id='FAX' name='FAX' size="30" value="<?php echo $row['FAX']?>"/></td>
                    </tr>
                    <tr>
                        <td>聯絡人: </td>
                        <td align="left"><input id='CP' name='CP' size="30" value="<?php echo $row['CP']?>"/></td>
                    </tr>
                    <tr>
                        <td>電子信箱: </td>
                        <td align="left"><input id='email' name='email' size="30" value="<?php echo $row['email']?>"/></td>
                    </tr>
                    <tr>
                        <input type="hidden" id='ID' name="ID" value="<?php echo $row['ID']?>" >
                        <th colspan="2"><button id='update'>修改</button></th>
                    </tr>
            </table></center>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on('click','#update',function(){
            $.ajax({
                url:'./handle_update_search.php',
                method:'POST',
                data:{
                    reportid: $('#reportid').val(),
                    staff: $('#staff').val(),
                    client: $('#client').val(),
                    UN: $('#UN').val(),
                    adress: $('#adress').val(),
                    TEL: $('#TEL').val(),
                    FAX: $('#FAX').val(),
                    CP: $('#CP').val(),
                    email: $('#email').val(),
                    ID: $('#ID').val(),
                    projectDate: $('#projectDate').val(),
                    demoDate: $('#demoDate').val()
                },
                success:function(elem){
                    $('.container').show().html(elem);
                    opener.document.getElementById("subInf").click();
                    window.close();
                }
            })
        })
    </script>
</body>
</html>