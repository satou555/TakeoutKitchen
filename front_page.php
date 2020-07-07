<?php
    require_once("common.php");

    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Takeout Kitchen</title>
    <link rel="stylesheet" href="front_page_stylesheet.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
</head>
<body>
    <div class="header">
        <div class="header_wrap">
            <div class="header_logo">
                <a class="header_logoBtn" href="/">Takeout Kitchen</a>
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
    <div class="main1">
        <div class="main1_btnItem">
            <a class="main1_seachKitchen" href="">店を探す</a>
        </div>
        <div class="main1_btnItem">
            <a class="main1_resisterKitchen" href="">店を登録する</a>
        </div>
    </div>
    <div class="delete_user">
        <a href="index_deleteTakeoutKitchen.php">退会する</a>
    </div>
    <!--ログインしているならログアウトボタンを表示する-->
    <div class="logout_user">
        <?php
            if(isset($_SESSION["username"])){
                echo "<a href="."index_logoutTakeoutKitchen.php".">ログアウト</a>";
            }
        ?>
    </div>



</body>
</html>