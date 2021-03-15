<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>온라인 집들이</title>
</head>
<body>
    <form action="/action/home" method="post">
        <div class="main_wrap">
            <div class="main_container">
                <input type="text" name="before_photo" placeholder="이전사진 url">
                <input type="text" name="after_photo" placeholder="나중사진 url">
                <input type="date" name="date">
                <input type="text" name="knowHow" placeholder="노하우 작성하기">
                <select> 평점주기
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" id="submit" name="submit">완료</button>
            </div>
        </div>
    </form>
</body>
</html>