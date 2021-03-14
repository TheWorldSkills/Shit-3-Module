<?php
    include_once("./lib/lib.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        /* 문자 새로고침 */
        function refresh_captcha(){
            //capt_img id를 불러와 문구들을 랜덤으로 돌린다
            document.getElementById("capt_img").src="/lib/captcha.php?waste="+Math.random(); 
        }
    </script>
</head>
<body>
    <form method="post" action="/action/captcha">
        <h2>자동가입방지문구 입력</h2>
        <img src="/lib/captcha.php" alt="captcha" title="captcha" id="capt_img"/>
        <input type="text" name="captcha"/>
        <input type="submit" vlaue="확인" />
    </form>
    <button onclick="refresh_captcha();">새로고침</button>
</body>
</html>