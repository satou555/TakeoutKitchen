<?php
/*データベース情報取り込み*/ 
require_once("common.php");
/*セッション開始*/
session_start();

/*POSTで送信されている */
if($_SERVER["REQUEST_METHOD"]==="POST"){
    /*入力欄が空白ではない*/
    if(isset($_POST["password"],$_POST["useremail"]) && $_POST["password"]!=="" && $_POST["useremail"]!==""){
        /*データベース接続*/
        try{
            $dsn="mysql:dbname=DB_NAME;host=DB_HOST;charset=utf8";
            $pdo= new PDO($dsn,DB_MAIL,DB_PASS);
            $pdo->setAttribude(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); /*エラー出力*/
        }catch(PDOException $e){
            $_SESSION['login_message']='データベース接続に失敗しました';
            header("Location:".$_SERVSR["PHP_SELF"]);
            exit;
        }

        /*ユーザー認証*/
        $stmt=$pdo->prepare("SELECT * FROM users WHERE email=? and password=?");
        $stmt->bindValue(1,$_POST["useremail"]);
        $stmt->bindValue(2,$_POST["password"]);
        $stmt->execute();

        $result=$stmt->fetchall();
        if(count($result)===1){
            $_SESSION["login_message"]=$_POST["username"]."でログインしています";
            header("Location:".$_SERVER["PHP_SELF"]);
            exit;
        }

    }else{
        $_SESSION["login_message"]="送信データが正しくありません";
        header("Location:".$_SERVER["PHP_SELF"]);
        exit;
    }
}
?>


<!doctype html>
<html>
<head>
    <title>会員登録</title>
    <link rel="stylesheet" href="index_loginTakeoutKitchen_stylesheet.css">
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
                    <a class="header_menberBtnLink" href="" rel="nofollow">新規登録</a>
                </div>
                <div class="header_menberBtnItem">
                    <a class="header_menberLoginLink" href="" rel="nofollow">ログイン</a>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="container_bigbox">
        <div class="container_smallbox">
            <div class="panel_head">
                <h1>ログイン<h1>
            </div>
            <div class="panel_body">
                <form action="" method="post">
                    <?php
                        if(isset($_SESSION["login_message"])){
                            echo($_SESSION["login_message"]);
                        }
                    ?>
                    <div class="form_content">
                        <p>メールアドレス<br></p>
                        <input class="form_input" type="email" name="useremail">
                    </div>
                    <div class="form_content">
                        <p>パスワード<br></p>
                        <input class="form_input" type="password" name="password">
                    </div>
                    <div class="submit_">
                        <input class="form_submit" type="submit" value="ログイン">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<?php
/*セッションの初期化*/
$_SESSION["resister_message"]="";
?>
