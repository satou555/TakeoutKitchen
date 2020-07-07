<?php
    require_once("common.php");

    session_start(); 
?>

<!doctype html>
<html>
<head>
    <title>店舗一覧</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>店舗一覧</h1>

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
        
        /*データベースから店舗情報を取得*/
        $stmt=$pdo->query("SELECT id,storename FROM kitchens");
        $stmt->execute();

        $result=$stmt->fetchAll();

        var_dump($result);
        
        foreach($result as $loop){

            echo '<a href="store_detail.php?id='.$loop["id"].'&storename='.$loop["storename"].'">';
            echo $loop["id"].PHP_EOL;
            echo $loop["storename"].PHP_EOL;
            echo '</a>';
        }
    
    ?>


</body>
</html>
