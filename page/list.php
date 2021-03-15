<?php 
    include_once("./lib/lib.php");

    print_r($SESSIONEDMEMBERS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>견적 리스트</title>
</head>
<body>
    <form action="action/list" method="post">
    <div class="list_wrap">
        <div class="list_container">
            <span>시공일을 입력하세요</span>
            <input type="text" placeholder="시공일을 입력하세요" name="date">

            <span>내용을 입력하세요</span>
            <input type="text" placeholder="내용을 입력하세요" name="content">

            <br>

            <span>비용을 입력하세요</span>
            <input type="text" placeholder="비용을 입력하세요" name="amount">

            <select name="state"> 선택여부를 입력하세요
                <option value="checked">선택</option>
                <option value="unChecked">미선택</option>
                <option value="loading">진행중</option>
            </select>

            <button type="submit" id="submit" name="submit">완료</button>
        </div>
    </div>
    </form>
</body>
</html>