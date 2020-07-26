<?php 
require_once("common.php");

session_start();

/*データベース接続*/ 
$dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
$pdo= new PDO($dsn,DB_USER,DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);

if(isset($_SESSION["id"]) && $_SESSION["time"]+3600 > time()){
    //ログインしている
    $_SESSION["time"] = time();

    $users = $pdo -> prepare("SELECT * FROM users WHERE id=?");
    $users->execute(array($_SESSION["id"]));
    $user = $users->fetch();
}else{
    //ログインしていない
    header("Location:index_loginTakeoutKitchen.php");
    exit();
}

?>

<!doctype html>
<html>
<head>
    <title>店舗情報登録</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="store_resister.css">
    <link rel="stylesheet" href="header.css">
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
    <div class="container_bigbox">
        <div class="panel_head">
            <h1>店舗情報入力</h1>
        </div>
        <div class="panel_body">
            <form class="panel_body_form" action="store_resisterConf.php" method="POST" enctype="multipart/form-data">
                <div class="form_content">
                    <p>店名</p>
                    <input class="form_input" type="text" name="storename">
                </div>
                <div class="form_content">
                    <p>住所</p>
                    <input class="form_input" type="text" name="storeaddress">
                </div>
                <div class="form_content half">
                    <p>電話番号</p>
                    <input class="form_input" type="tel" name="storetel">
                </div>
                <div class="form_content half">
                    <p>メールアドレス</p>
                    <input class="form_input" type="email" name="storeemail">
                </div>
                <div class="form_content half">
                    <p>営業時間</p>
                    <input class="form_input" type="text" name="opentime">
                </div>
                <div class="form_content half">
                    <p>定休日</p>
                    <input class="form_input" type="text" name="closed">
                </div>
                <div class="form_content half">
                    <p>画像(1つだけ使用可能です)</p>
                    <input class="form_input_image" type="file" name="image">
                </div>
                <div class="form_content">
                    <div class="form_content_menu">
                        <div class="menu_name">
                            <p>メニュー名</p>
                            <input class="form_input_menu" type="text" name="menuname1">
                            <input class="form_input_menu" type="text" name="menuname2">
                            <input class="form_input_menu" type="text" name="menuname3">
                            <input class="form_input_menu" type="text" name="menuname4">
                            <input class="form_input_menu" type="text" name="menuname5">
                            <input class="form_input_menu" type="text" name="menuname6">
                            <input class="form_input_menu" type="text" name="menuname7">
                            <input class="form_input_menu" type="text" name="menuname8">
                            <input class="form_input_menu" type="text" name="menuname9">
                            <input class="form_input_menu" type="text" name="menuname10">
                        </div>
                        <div class="menu_price">
                            <p>価格(円)</p>
                            <input class="form_input_price" type="text" name="menuprice1">
                            <input class="form_input_price" type="text" name="menuprice2">
                            <input class="form_input_price" type="text" name="menuprice3">
                            <input class="form_input_price" type="text" name="menuprice4">
                            <input class="form_input_price" type="text" name="menuprice5">
                            <input class="form_input_price" type="text" name="menuprice6">
                            <input class="form_input_price" type="text" name="menuprice7">
                            <input class="form_input_price" type="text" name="menuprice8">
                            <input class="form_input_price" type="text" name="menuprice9">
                            <input class="form_input_price" type="text" name="menuprice10">
                        </div>
                    </div>
                </div>
                <div class="submit_">
                    <input class="form_submit" type="submit" value="確認する">
                </div>
            </form>
        </div>
    </div>
</body>

</html>