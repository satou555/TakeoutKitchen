<?php
require_once("common.php");

session_start();

?>

<!doctype html>
<html>
<head>
    <title>店舗詳細</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        /*データベース接続*/
        try{
            $dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
            $pdo= new PDO($dsn,DB_USER,DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); /*エラー出力*/
        }catch(PDOException $e){
            $_SESSION['register_message']='データベース接続に失敗しました';
            header("Location:".$_SERVER["PHP_SELF"]);
            exit;
        }
        
        /*リンクで取得した店舗情報を出力*/        
        echo $_GET["id"];
        echo $_GET["storename"];
        
        

    ?>
</body>
</html>