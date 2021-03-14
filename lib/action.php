<?php
    $mode = isset($midx) ? $midx: NULL;
    extract($_POST);
    switch ($mode) {
        // Join
        case 'join':
            re([
                $userName,
                $userId,
                $userPw,
            ]);
            $userIsset = fetch("select * from member where userId = ?",
            array($userId));
            if(!$userIsset){
                $user = execute("insert into member set userName = ?, userId = ?, userPw = ?",
                array($userName, $userId, $userPw));
                alert("회원가입이 완료 되었습니다.", "/");
            }
            else{
                alert("아이디 중복", "/");
            }
        break;

        case 'login':
            re([
                $userId,
                $userPw
            ]);
            $user = fetch("select * from member where userId = ? and userPw = ?",
            array($userId, $userPw));
            
            if($user){
                $_SESSION['member'] = $user;
                alert("성공", "/");
            }
            else{
                alert("실패", "/");
            }

            print_r($cancel);
        break;

        case 'logout':
            session_destroy();
            alert("세션 로그아웃", "/");
        break;

        case 'captcha':
            if($_SESSION['capt'] != $_POST['captcha']){
                alert("자동가입방지문구가 올바르지 않습니다.", "/");
            }
            else{
                alert("성공", "/");
            }
        break;
    }
?>