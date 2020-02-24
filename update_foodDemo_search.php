<?php
  require_once('./conn.php');

  $ID = $_GET['ID'];
  $sql = "SELECT * FROM food_demo where ID = " . $ID;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
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
    
    <div id="test"></div>

    <div class="container">
        <h1>編輯樣品</h1>
        <h2>案件編號：<?php echo $row['reportid'] ?></h2>
        <div id="test">    
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="500px" bgcolor="#DDDDDD">
                <div id="formFood">
                    <tr>
                        <td>產品名稱: </td>
                        <td align="left"><input type="text" id="demoName" size="30" value="<?php echo $row['demoName']?>"/></td>
                    </tr>
                    <tr>
                        <td>樣品編號: </td>
                        <td align="left"><input type="text" id="demoID" size="30" value="<?php echo $row['demoID']?>"/></td>
                    </tr>
                    <tr>
                        <td>製造廠商: </td>
                        <td align="left"><input type="text" id="fCom" size="30" value="<?php echo $row['fCom']?>"/></td>
                    </tr>
                    <tr>
                        <td>國內負責廠商: </td>
                        <td align="left"><input type="text" id="dCom" size="30" value="<?php echo $row['dCom']?>"/></td>
                    </tr>
                    <tr>
                        <td>檢驗項目: <a href="#" onclick="window.open('./add_inspection.php?tag=serial', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea id="serials" name="serials" style="width:237px;height:50px;"><?php echo $row['serials']?></textarea></td>
                    </tr>
                    <tr>
                        <td>批號: </td>
                        <td align="left"><input type="text" id="lotNumber" size="30" value="<?php echo $row['lotNumber']?>"/></td>
                    </tr>
                    <tr>
                        <td>製造日期:YYYY-MM-DD </td>
                        <td align="left"><input type="text" id="mfDate" size="30" value="<?php echo $row['mfDate']?>"/></td>
                    </tr>
                    <tr>
                        <td>有效日期:YYYY-MM-DD </td>
                        <td align="left"><input type="text" id="expDate" size="30" value="<?php echo $row['expDate']?>"/></td>
                    </tr>
                    <tr>
                        <td>產地: </td>
                        <td align="left"><input type="text" id="madeIn" size="30" value="<?php echo $row['madeIn']?>"/></td>
                    </tr>
                    <tr>
                        <td>保存方式: </td>
                        <td align="left">
                            <input type="radio" name="shelf" value="室溫" id="tempA"/>室溫
                            <input type="radio" name="shelf" value="冷藏" id="tempB"/>冷藏
                            <input type="radio" name="shelf" value="冷凍" id="tempC"/>冷凍
                        </td>
                    </tr>
                    <tr>
                        <td>包裝: </td>
                        <td align="left">
                            <input type="radio" name="package" value="完整包裝" id="pA">完整包裝
                            <span style="padding-left:25px">
                            <input type="radio" name="package" value="散裝" id="pB"/>散裝
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>數量: </td>
                        <td align="left"><input type="text" id='QTY' size="30" value="<?php echo $row['QTY']?>"></td>
                    </tr>
                    <tr>
                        <td>特殊取樣說明: </td>
                        <td align="left"><textarea id='PS' style="width:237px;height:50px;"><?php echo $row['PS']?></textarea></td>
                    <tr>
                        <td>委外檢驗廠商: <a href="#" onclick="window.open('./add_trust_com.php?tag=trust', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea name="trustCom" id="trustCom" style="width:237px;height:50px;"><?php echo $row['trustCom'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>委外檢驗項目: <a href="#" onclick="window.open('./add_inspection_trust.php?tag=trust', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea name="trust" id="trust" style="width:237px;height:50px;"><?php echo $row['trust'] ?></textarea></td>
                    </tr>
                    <tr>
                    <input type="hidden" id='reportid' value="<?php echo $row['reportid'] ?>"/>
                    <input type="hidden" id='ID' value="<?php echo $row['ID'] ?>"/>
                    <th colspan="2"><button id="update">修改</button></th>
                    </tr> 
                </div>
            </table></center>
            <input type="hidden" id="shelfData" value="<?php echo $row['shelf'];?>" />
            <input type="hidden" id="packageData" value="<?php echo $row['package'];?>" />
            <input type="hidden" id="trustComData" value="<?php echo $row['trustCom'];?>" />
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        
        if($('#shelfData').val() == $('#tempA').val()){
            $("#tempA").prop("checked", true );
        }else if($('#shelfData').val() == $('#tempB').val()){
            $("#tempB").prop("checked", true );
        }else if($('#shelfData').val() == $('#tempC').val()){
            $("#tempC").prop("checked", true );
        }

        if($('#packageData').val() == $('#pA').val()){
            $("#pA").prop("checked", true );
        }else if($('#packageData').val() == $('#pB').val()){
            $("#pB").prop("checked", true );
        }
       
        $(document).on('click','#update',function(){
            $.ajax({
                url:'./handle_update_foodDemo_search.php',
                method:'POST',
                data:{
                    reportid: $('#reportid').val(),
                    demoName: $('#demoName').val(),
                    demoID: $('#demoID').val(),
                    fCom: $('#fCom').val(),
                    dCom: $('#dCom').val(),
                    serials: $('#serials').val(),
                    lotNumber: $('#lotNumber').val(),
                    mfDate: $('#mfDate').val(),
                    expDate: $('#expDate').val(),
                    ID: $('#ID').val(),
                    madeIn: $('#madeIn').val(),
                    shelf: $('input[name=shelf]:checked').val(),
                    package: $('input[name=package]:checked').val(),
                    QTY: $('#QTY').val(),
                    PS: $('#PS').val(),
                    trustCom: $('#trustCom').val(),
                    trust: $('#trust').val()
                },
                success:function(){
                    opener.document.getElementById("subFood").click();
                    window.close();
                }
            })
        })
    </script>
</body>
</html>