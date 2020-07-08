<!doctype html>
<html>
<head>
    <title>店舗情報登録</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="store_resister.css">
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
    <div class="container_bigbox">
        <div class="panel_head">
            <h1>店舗情報入力</h1>
        </div>
        <div class="panel_body">
            <form action="store_resisterConf.php" method="POST">
                <div class="form_content">
                    <p>店名</p>
                    <input class="form_input" type="text" name="storename">
                </div>
                <div class="form_content">
                    <p>住所</p>
                    <input class="form_input" type="text" name="storeaddress">
                </div>
                <div class="form_content">
                    <p>電話番号</p>
                    <input class="form_input" type="tel" name="storetel">
                </div>
                <div>
                    <p>メールアドレス　※店舗詳細には公開されません。</p>
                    <input class="form_input" type="email" name="storeemail">
                </div>
                <div class="form_content">
                    <div class="form_content_menu">
                        <div class="menu">
                            <p>品名</p>
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
                        <div class="menu">
                            <p>価格</p>
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