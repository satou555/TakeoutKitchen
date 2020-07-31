<?php
    require_once("common.php");

    session_start();

    //セッション情報を解除
    $_SESSION = array();

    if(ini_get("session.use_cookies")){
        $params=session_set_cookie_params();
            setcookie(session_name(),'',time()-42000,
                $params["path"],$params["domain"],
                $params["secure"],$params["httponly"]
            );
    }

    session_destroy();

    //cookie情報削除
    setcookie("useremail","",time()-3600);

    setcookie("password","",time()-3600);
    
    header("Location:index_loginTakeoutKitchen.php");

    exit();

?>

