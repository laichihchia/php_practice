<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>商店</h1>
    </div>
    <form method="post" action="checkout.php">
        <div class="store">
            <div class="item">
                <span class="goods_name">愛情</span>
                <img src="love.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買一段純真的愛情<br>(你對待每一位都非常純真<br>所以沒人會跟你分手)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="item">
                <span class="goods_name">友情</span>
                <img src="friends.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買一段純真的友情<br>(你對待每一位都非常純真<br>所以沒人會排擠你)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="item">
                <span class="goods_name">教授</span>
                <img src="professer.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買一份師生情<br>(教授為你寫了滿張謊言的推薦信及<br>成績單順利上了美國的麻省理工學院)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="item">
                <span class="goods_name">系學會會長</span>
                <img src="會長.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買一個系學會會長位置<br>(你無私把所有財產繳納系費<br>全系天天辦活動開趴)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="item">
                <span class="goods_name">畢業證書</span>
                <img src="畢業證書.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買一張畢業證書<br>(你完全沒念大學就拿到畢業證書<br>因此隨便就找到工作了)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="item">
                <span class="goods_name">學校</span>
                <img src="school.png">
                <h4 style="margin: 0;">$100</h4><br>
                <span class="content">購買了整個學校<br>(你可以隨意修改校規<br>也可以隨意人事調動)</span><br>
                <span class="input_box">
                    <span class="num">數量</span>
                    <input type="text" name="數量[]" value="0">
                </span><br>
            </div>
            <div class="footer">
                <button type="submit">送出</button>
            </div>

        </div>


    </form>


</body>
<style>
    html,
    body {
        height: 135%;
    }

    .footer {
        width: 100%;
        margin: 50px;
        text-align: center;
    }

    button {
        color: #84C1FF;
        font-size: 25px;
        background-color: white;
        border-radius: 5px;
        border: 2px #84C1FF solid;
    }

    button:hover {
        cursor: pointer;
        color: white;
        background-color: #84C1FF;
    }

    img {
        width: 230px;
        height: 200px;
    }

    .content {
        font-size: medium;
        text-align: center;
    }

    .num {
        width: 25%;
        text-align: center
    }

    .header {
        height: 100px;
        text-align: center;
        line-height: 100px;
    }

    .store {
        display: flex;
        height: 300px;
        padding: 15px;
        background-color: white;
        flex-wrap: wrap;

    }

    .item {
        flex: 0 0 30%;
        background-color: white;
        margin: 17px;
        border: 1px #E0E0E0 solid;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        color: black;
        font-size: 20px;
        box-shadow: 5px 5px 5px #F0F0F0;
        border-radius: 5px;
    }

    .goods_name {
        text-align: center;
        width: 100%;
        background-color: #F0F0F0;
    }

    .input_box {
        align-items: center;
        background-color: #F0F0F0;
        display: flex;
        flex-direction: row;
        font-size: 1rem;
        justify-content: flex-end;
        border-radius: 6px;
    }

    input {
        text-align: center;
        margin: 1px;
        width: 70%;
        height: 25px;
        border: 0px;
        border-radius: 5px;
    }

    input:focus {
        outline: none;
        border-color: black;
        transition: 5s;
    }
</style>

</html>