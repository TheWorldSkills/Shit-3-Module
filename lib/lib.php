<?php
    // pdo 연결하기.
    $pdo = new PDO("mysql:host=localhost;dbname=C-Module;charset=utf8", "root", "", array(
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ));

    session_start(); //$_SESSION 실행
    header("content-type: text/html; charset=utf-8"); //html docs 한글 인코딩   
    date_default_timezone_set('Asia/Seoul'); //서울로 시간 설정

    // url 별로 주소 가져오기
    $varray = isset($_GET['uri']) ? explode("/", $_GET['uri']) : NULL;
    $pagemode = isset($varray[0]) ? $varray[0] : NULL;
    $midx = isset($varray[1]) ? $varray[1] : 'main';
    $page = isset($varray[2]) ? $varray[2] : 1;

    // DataBase
    function execute($sql, $parame = NULL){
        global $pdo;
        $data = $pdo->prepare($sql);
        $data -> execute($parame);
        return $data;
    }
    function fetch($sql, $parame = NULL){
        return execute($sql, $parame)->fetch();
    }
    function fetchAll($sql, $parame = NULL){
        return execute($sql, $parame)->fetchAll();
    }
    function rowCount($sql, $parame = NULL){
        return execute($sql, $parame)->rowCount();
    }
    function re($data){
        foreach($data as $key => $val){
            if($val == NULL){
                alert("입력을 다시 확인해주세요.");
            }
        }
    }

    // js 경고창을 php로 호출할 수 있게 하는 함수.
    function alert($msg=NULL, $url=NULL){
        echo "<script>";
        echo $msg ? "alert('{$msg}');" : "";
        echo $url ? "document.location.href='{$url}'" : "history.back()";
        echo "</script>";
        exit;
    }

    //login_SESSION 확인
    $SESSIONEDMEMBERS = isset($_SESSION['member']) ? $_SESSION['member'] : NULL;

    // pagemode checking
    if($pagemode == "action"){
        include "./lib/action.php";
        exit;
    }

    //현재 memberidx 확인
    $current_user =  $SESSIONEDMEMBERS -> idx;
?>