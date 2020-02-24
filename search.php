<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Database</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-tablepage-1.0.js"></script>
</head>

<body>  
    <div class="container">
        <h1>委託資訊搜尋</h1>
        <div class="nav">
            <a href="./index.php">返回主頁</a>
        </div>
        <div class="option">
            <h2>案件資訊資料庫搜尋</h2>
            <div id='inputInf'>
                <select id="searchInf" style="font-size:20px;" class="searchType">
                    <option selected="true">請選擇</option>
                    <option value="CP">聯絡人</option>
                    <option value="client">委託單位</option>
                    <option value="createdDate">建檔日期</option>
                    <option value="reportid">案件編號</option>
                </select>
                <input type='text'id='conInf'/>
                <button id='subInf'>搜尋</button>
            </div>
        </div>

        <div class="option">
            <h2>食品樣品資料庫搜尋</h2>
            <div id='inputFood'>
                <select id="searchFood" style="font-size:20px;" class="searchType">
                    <option selected="true">請選擇</option>
                    <option value="demoName">產品名稱</option>
                    <option value="demoID">樣品編號</option>
                    <option value="createdDate">建檔日期</option>
                    <option value="reportid">案件編號</option>
                    <option value="serials">檢驗項目</option>
                    <option value="trust">委外測項</option>
                </select>
                <input type='text' id='conFood'/>
                <button id='subFood'>搜尋</button>
            </div>
        </div><br>
        
        <div id='response' style='display:none;'>
        </div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '#subInf', function subInf(){
            $.ajax({
                url:'./handle_search.php',
                method:'POST',
                data:{
                    searchInf: $('#searchInf').val(),
                    conInf: $('#conInf').val()
                },
                success:function a (handle_search){
                    $('#response').show().html(handle_search);
                }
            })
        })

        $(document).on('click', '#subFood', function subFood(){
            $.ajax({
                url:'./handle_search_foodDemo.php',
                method:'POST',
                data:{
                    searchFood: $('#searchFood').val(),
                    conFood: $('#conFood').val()
                },
                success:function a (handle_search_foodDemo){
                    $('#response').show().html(handle_search_foodDemo);
                }
            })
        })

        function updata_search(ID){
            var passwordEnter = prompt("請輸入密碼: ","");
            var password = '8888' ;
            if(passwordEnter == password){
                window.open('./update_search.php?ID=' + ID , '編輯',config='height=800,width=800');
            }else{
                alert("輸入錯誤，請詢問管理員!");
            }
        }

        function updata_foodDemo_search(ID){
            var passwordEnter = prompt("請輸入密碼: ","");
            var password = '8888' ;
            if(passwordEnter == password){
                window.open('./update_foodDemo_search.php?ID=' + ID , '編輯',config='height=800,width=800');
            }else{
                alert("輸入錯誤，請詢問管理員!");
            }
        }

        

        function print_search(ID){
            window.open('./print_food_add.php?ID=' + ID , '編輯',config='height=800,width=1200');
        }
    </script>
</body>

</html>