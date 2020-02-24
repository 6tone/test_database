<?php
  require_once('./conn.php');
  $sql = 'SELECT * from report_inf ORDER BY createdDate DESC';
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $reportid = $row['reportid'];
  $select = "SELECT * from food_demo WHERE reportid = '$reportid' ";
  $resultId = $conn->query($select);
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
    <div class="sidebar" id="response">
        <div class="textTitle">項目:</div>
        <?php
            for($i = 1; $i <= mysqli_num_rows($resultId); $i++){
                $rowFood = $resultId->fetch_assoc();
                echo "<div class='item'>";
                echo "<table class='table1' rules='all' bgcolor='#DDDDDD'>";
                echo "<colgroup>";
                echo "<col style='width: 120px'>";
                echo "<col style='width: 200px'>";
                echo "<col style='width: 50px'>";
                echo "</colgroup>";
                echo "<tr>";
                echo "<td height='30'>";
                echo $rowFood['demoID'];
                echo "</td>";
                echo "<td>";
                echo $rowFood['demoName'];
                echo "</td>";
                echo "<td><a href='#' class='delete' data-id=' " ;
                echo $rowFood['ID'] ;
                echo " '>刪除</a>";
                echo "<a href='update_foodDemo.php?ID=" . $rowFood['ID'] . "' class='update' data-id=' ";
                echo $rowFood['ID'] ;
                echo " '>編輯</a>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
            }
        ?>
    </div>
    
    <div class="container">
        <h1>新增樣品</h1>
        <a href="./index.php">返回主頁</a><br><br>
        <a href="./update.php?ID=<?php echo $row['ID'] ?>">返回案件資訊</a>
        <h2>案件編號：<?php echo $row['reportid'] ?></h2>
        <div id="test">
            <center><table border="1" cellpadding="5px" cellspacing="2px" width="500px" bgcolor="#DDDDDD">
                <div id="formFood">
                    <tr>
                        <td>產品名稱: </td>
                        <td align="left"><input type="text" id="demoName" size="30"/></td>
                    </tr>
                    <tr>
                        <td>樣品編號: </td>
                        <td align="left"><input type="text" id="demoID" size="30"/></td>
                    </tr>
                    <tr>
                        <td>製造廠商: </td>
                        <td align="left"><input type="text" id="fCom" size="30"/></td>
                    </tr>
                    <tr>
                        <td>國內負責廠商: </td>
                        <td align="left"><input type="text" id="dCom" size="30"/></td>
                    </tr>
                    <tr>
                        <td>檢驗項目: <a href="#" onclick="window.open('./add_inspection.php?tag=serial', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea name="serials" id="serials" style="width:237px;height:50px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>批號: </td>
                        <td align="left"><input type="text" id="lotNumber" size="30"/></td>
                    </tr>
                    <tr>
                        <td>製造日期:YYYY-MM-DD </td>
                        <td align="left"><input type="text" id="mfDate" size="30"/></td>
                    </tr>
                    <tr>
                        <td>有效日期:YYYY-MM-DD </td>
                        <td align="left"><input type="text" id="expDate" size="30" /></td>
                    </tr>
                    <tr>
                        <td>產地: </td>
                        <td align="left"><input type="text" id="madeIn" size="30"/></td>
                    </tr>
                    <tr>
                        <td>保存方式: </td>
                        <td align="left">
                            <input type="radio" name="shelf" value="室溫" />室溫
                            <input type="radio" name="shelf" value="冷藏"/>冷藏
                            <input type="radio" name="shelf" value="冷凍"/>冷凍
                        </td>
                    </tr>
                    <tr>
                        <td>包裝: </td>
                        <td align="left">
                            <input type="radio" name="package" value="完整包裝"/>完整包裝
                            <span style="padding-left:25px">
                            <input type="radio" name="package" value="散裝"/>散裝
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>數量: </td>
                        <td align="left"><input type="text" id='QTY' size="30"/></td>
                    </tr>
                    <tr>
                        <td>特殊取樣說明: </td>
                        <td align="left"><textarea id='PS' style="width:237px;height:50px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>委外檢驗廠商: <a href="#" onclick="window.open('./add_trust_com.php?tag=trust', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea name="trustCom" id="trustCom" style="width:237px;height:50px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>委外檢驗項目: <a href="#" onclick="window.open('./add_inspection_trust.php?tag=trust', '新增項目',config='height=800,width=500');">新增項目</a></td>
                        <td align="left"><textarea name="trust" id="trust" style="width:237px;height:50px;"></textarea></td>
                    </tr>
                    <tr>
                    <input type="hidden" id='reportid' value="<?php echo $row['reportid'] ?>"/>
                    <th colspan="2"><button id="subInf">新增</button>
                    </tr>  
                </div>
            </table></center>
            <br><button id="print">取用紀錄表</button>
            <button id="printCheckReport">流程檢查表</button>
        </div>
    </div>

    <script>
        
        $(document).on('click', '#subInf', function(){
            if($('#demoName').val() == ''){
                alert("請填寫'樣品名稱'");
                $('#demoName').val().focus();
            }else if($('#demoID').val() == ''){
                alert("請填寫'樣品編號'");
                $('#demoID').val().focus();
            }else if($('#serials').val() == ''){
                alert("請填寫'檢驗項目'");
                $('#serials').val().focus();
            }else if($('input[name=shelf]:checked').val() == null ){
                alert("請填寫'保存方式'");
                $('input[name=shelf]:checked').val().focus();
            }else if($('input[name=package]:checked').val() == null ){
                alert("請填寫'包裝'");
                $('input[name=package]:checked').val().focus();
            };
            
            $.ajax({
                url:'./handle_food_add.php',
                method:'POST',
                data:{
                    demoName: $('#demoName').val(),
                    demoID: $('#demoID').val(),
                    fCom: $('#fCom').val(),
                    dCom: $('#dCom').val(),
                    serials: $('#serials').val(),
                    lotNumber: $('#lotNumber').val(),
                    mfDate: $('#mfDate').val(),
                    expDate: $('#expDate').val(),
                    madeIn: $('#madeIn').val(),
                    shelf: $('input[name=shelf]:checked').val(),
                    package: $('input[name=package]:checked').val(),
                    QTY: $('#QTY').val(),
                    PS: $('#PS').val(),
                    reportid: $('#reportid').val(),
                    trust: $('#trust').val(),
                    trustCom: $('#trustCom').val()
                },
                success:function a (handle_food_add){
                    location.reload();
                    //$('.item').remove();
                    //$('#response').append(handle_food_add);
                    /*$('#test :text , #PS , #serials').each(function(){
                        $(this).val('');
                    });
                    $('#test :radio').prop('checked',false); */  
                }
            })
        })

        $(document).on('click', '.delete', function (){
            item = $(this);
            if(confirm("確定刪除嗎")){
                $.ajax({
                    url:'./delete_food.php',
                    method:'POST',
                    data:{
                        ID:$(this).data('id')
                    },
                    success:function (){
                        $(item).parent().parent().parent().parent().parent().remove();
                    }
                })
            }
            
        })

        $(document).on('click', '#print', function (){
            $.ajax({
                url:'./print.php',
                method:'GET',
                data:{
                    reportid: $('#reportid').val()
                },
                success:function (){
                    window.open('./print.php?reportid=' + $('#reportid').val() + '', '新增項目',config='height=900,width=1100');
                }
            })
        })
        
        $(document).on('click', '#printCheckReport', function (){
            $.ajax({
                url:'./checkReport_food_2.0.php',
                method:'GET',
                data:{
                    reportid: $('#reportid').val()
                },
                success:function (){
                    window.open('./checkReport_food_2.0.php?reportid=' + $('#reportid').val() + '', '新增項目',config='height=900,width=1100');
                }
            })
        })

    </script>

</body>

</html>