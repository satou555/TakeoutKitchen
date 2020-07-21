<?php
    require_once("common.php");

    session_start(); 
?>

<!doctype html>
<html>
<head>
    <title>店舗一覧</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
</head>
<body>
    <div class="header">
        <div class="header_wrap">
            <div class="header_logo">
                <a class="header_logoBtn" href="front_page.php">Takeout Kitchen</a>
            </div>
            <div class="header_menberBtn">
                <div class="header_menberBtnItem">
                    <a class="header_menberBtnLink" href="index_resisterTakeoutKitchen.php" rel="nofollow">新規登録</a>
                </div>
                <div class="header_menberBtnItem">
                    <a class="header_menberLoginLink" href="index_loginTakeoutKitchen.php" rel="nofollow">ログイン</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main_item">
        <div class="title_">
            <h1>店舗一覧</h1>
        </div>
        <div class="store_loop">
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
                $stmt=$pdo->query("SELECT id,storename,opentime,closed,addres,tel,mail,image FROM kitchens");
                $stmt->execute();
                $result=$stmt->fetchAll();
                
                /*店舗情報をループで表示、情報を詳細ページへ送信*/
                foreach($result as $loop){
                    echo '<form class="form_content" action="store_detail.php" method="POST">';
                    echo '<input class="form_input" type="hidden" name="id" value="'.$loop["id"].'">';
                    echo '<input class="form_input" type="hidden" name="storename" value="'.$loop["storename"].'">';
                    echo '<input class="form_input" type="hidden" name="opentime" value="'.$loop["opentime"].'">';
                    echo '<input class="form_input" type="hidden" name="closed" value="'.$loop["closed"].'">';
                    echo '<input class="form_input" type="hidden" name="address" value="'.$loop["addres"].'">';
                    echo '<input class="form_input" type="hidden" name="tel" value="'.$loop["tel"].'">';
                    echo '<input class="form_input" type="hidden" name="mail" value="'.$loop["mail"].'">';
                    echo '<input class="form_input" type="hidden" name="image" value="'.$loop["image"].'">';
                    echo '<img class="form_content_image" src="'.$loop["image"].'">';
                    echo '<input class="form_submit" type="submit" value="'.$loop["storename"].'">';
                    echo '</form>';
                }
            ?>
        </div>
    </div>
</body>
</html>

