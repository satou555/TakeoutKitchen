<?php
    require_once("common.php");

    session_start();

    /*未ログイン状態ならトップへ戻る */
    if(!isset($_SESSION["username"])){
        header("Location: front_page.html");
        exit;
    }

    /*退会処理*/
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if(isset($_SESSION["username"]) && isset($_POST["is_delete"]) && $_POST["is_delete"]==="1"){
        }
            /* データベース接続*/
            try{
                $dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
                $pdo= new PDO($dsn,DB_USER,DB_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); /*エラー出力*/
            }catch(PDOEException $e){
             exit;
            }

            /*退会処理*/
            $stmt = $pdo->prepare("DELETE FROM users WHERE username=?");
            $stmt->bindValue(1, $_SESSION["username"]);
            $stmt->execute();

            session_destroy();

            header("Location:front_page.php");
    }
?>

<!doctype html>
<html>
<head>
    <title>退会画面</title>
    <meta charset="utf-8">
</head>
<body>
    <div class="main">
        <h1>退会ページ</h1>
        <p>退会しますか？</p>
        <form action="./index_deleteTakeout.php" method="POST">
            <input type="hidden" name="is_delete" value="1">
            <input type="submit" value="退会する">
        </form>
        <a href="front_page.php">トップに戻る</a>
        

    </div>
</body>
</html>