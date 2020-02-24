<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        require_once('./conn.php');
        $conn->query('SET NAMES UTF8');
        $sql = "SELECT * FROM trust_com";
        $result = $conn->query($sql);
    ?>
    
    <div class="container">
        <table border="1" cellpadding="5px" cellspacing="2px" width="450px" bgcolor="#DDDDDD">
            <form name="form" id="form" method="post" action="">
                <?php
                    if($result){
                        for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
                            $row = $result->fetch_row(); 
                            
                            echo "<tr>";
                            echo "<td align='left'><input type='checkbox' value='" . $row[ 1 ] . "' name='inspection_trust' style='zoom:1.5;'>" . $row[ 1 ] . "</td>";
                            echo "</tr>";

                        }
                    }else{
                        echo "failed" . $conn->error;
                    }
                ?>
                <tr>
                    <th colspan="2"><input type='submit' value='確定' class="searchType" onclick="init()"/></th>
                </tr> 
            </form>
        </table>
    </div>
    
    
    <script>
        function init(){
            var obj=document.getElementsByName("inspection_trust");
            var selected=[];
            for (var i=0; i<obj.length; i++) {
                if (obj[i].checked) {
                    selected.push(obj[i].value + '\n');
                }
            }
            window.opener.document.getElementById('trustCom').value = selected.join();
            alert('新增完成！');
            window.close();
        }
    </script>
</body>

</html>
