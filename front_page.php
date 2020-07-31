<?php
    require_once("common.php");

    session_start();        

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Takeout Kitchen</title>
    <link rel="stylesheet" href="front_page_stylesheet1.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
</head>
<body>
    <div class="wrapper">
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
        <div class="main_head">
            <div class="main_head_wrap">
                <div class="main_side_headContent">
                </div>
                <div class="main_headContent">
                    <div class="main_headContent_items">
                        <h1 class="main_headItem">お店のメニューを登録して</h1>
                        <h1 class="main_headItem">簡単にテイクアウトできちゃいます:-)</h1>
                    </div>
                    <div class="main_headContent_links">
                        <a class="main_headLink" href="whatTakeoutKitchen.php">TakeoutKitchenとは？</a>
                    </div>
                </div>
                <div class="main_side_headContent">
                </div>
            </div>
        </div>
        <div class="main1">
            <div class="main1_btnItem">
                <a class="main1_seachKitchen" href="menu.php">お店を探す</a>
            </div>
            <div class="main1_btnItem">
                <a class="main1_resisterKitchen" href="store_resister.php" rel="nofollow">お店を掲載する</a>
            </div>
        </div>
        <div class="footer">
            <!--ログアウト-->
            <div class="logout">
                <a class="logout_btn" href="logout.php" rel="nofollow">ログアウト</a>
            </div>
        </div>
    </div>
</body>
</html>