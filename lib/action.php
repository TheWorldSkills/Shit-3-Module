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
            $user = execute("insert into member set userName = ?, userId = ?, userPw = ?",
            array($userName, $userId, $userPw));
            alert("회원가입이 완료 되었습니다.", "/");
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
    }
?>