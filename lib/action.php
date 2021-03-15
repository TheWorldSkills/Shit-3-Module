<?php
    $mode = isset($midx) ? $midx: NULL;
    extract($_POST);
    switch ($mode) {
        // 회원가입
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
        // 로그인
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
        // 로그아웃
        case 'logout':
            session_destroy();
            alert("세션 로그아웃", "/");
        break;
        // 캡챠
        case 'captcha':
            if($_SESSION['capt'] != $_POST['captcha']){
                alert("자동가입방지문구가 올바르지 않습니다.", "/");
            }
            else{
                alert("성공", "/");
            }
        break;
        // 견적 요청
        case 'list':
            $current_user =  $SESSIONEDMEMBERS -> userName;
            re([
                $date,
                $content,
                $state,
                $amount,
            ]);
            if($current_user){
                $list = execute("insert into list set userName = ?, date = ?, content = ?, state = ?, amount = ?",
                array($current_user, $date, $content, $state, $amount));
                alert("견적이 추가 됐습니다", "/");
            }
            else{
                alert("로그인 하고 이용 가능합니다", "/");
            }
        break;
    }
?>