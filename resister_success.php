<?php
require_once("common.php");

session_start();

/*未ログイン状態ならトップへリダイレクト*/
if(isset($_session["username"])){
    header("Location: ./");
    exit;
}
?>

<!doctype html>
<html>
<head>
    <title>会員登録完了</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>会員登録が完了しました</h1>

    <a href="/">トップに戻る</a>
    
</body>
</html>