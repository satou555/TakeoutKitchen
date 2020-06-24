<?php
/*データベース情報取り込み*/ 
require_once("common.php");
/*セッション開始*/
session_start();

/*POSTで送信されている */
if($_SERVER["REQUEST_METHOD"]==="POST"){
    /*入力欄が空白ではない*/
    if(isset($_POST["username"],$_POST["password"],$_POST["useremail"]) && $_POST["username"]!=="" && $_POST["password"]!=="" && $_POST["useremail"]!==""){
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

        /*重複チェック*/
        $stmt=$pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bindValue(1,$_POST["username"]);
        $stmt->execute();
        if(count($stmt->fetchAll())){
            $_SESSION["register_message"]="このユーザーネームはすでに使われています";
            header("Location:".$_SERVER["PHP_SELF"]);
            exit;
        }

        /*データ挿入*/
        $stmt=$pdo->prepare("INSERT INTO users (username,email,password) VALUE(?,?,?)");
        $stmt->bindValue(1,$_POST["username"]);
        $stmt->bindValue(2,$_POST["useremail"]);
        $stmt->bindValue(3,$_POST["password"]);
        $stmt->execute();
        $_SESSION["resister_message"]="会員登録が完了しました";
        $_SESSION["username"]=$_POST["username"];
        header("Location: ./resister_success.php");
        exit;

    }else{
        $_SESSION["resister_message"]="送信データが正しくありません";
        header("Location:".$_SERVER["PHP_SELF"]);
        exit;
    }
}
?>


<!doctype html>
<html>
<head>
    <title>会員登録</title>
    <link rel="stylesheet" href="index_resisterTakeoutKitchen_stylesheet.css">
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
                    <a class="header_menberBtnLink" href="<?php header("Location:".$_SERVER["PHP_SELF"]); ?>" rel="nofollow">新規登録</a>
                </div>
                <div class="header_menberBtnItem">
                    <a class="header_menberLoginLink" href="index_loginTakeoutKitchen.php" rel="nofollow">ログイン</a>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="container_bigbox">
        <div class="container_smallbox">
            <div class="panel_head">
                <h1>会員登録<h1>
            </div>
            <div class="panel_body">
                <form action="" method="post">
                    <?php
                        echo($_SESSION["resister_message"]);
                    ?>
                    <div class="form_content">
                        <p>お名前<br></p>
                        <input class="form_input" type="text" name="username">
                    </div>
                    <div class="form_content">
                        <p>メールアドレス<br></p>
                        <input class="form_input" type="email" name="useremail">
                    </div>
                    <div class="form_content">
                        <p>パスワード<br></p>
                        <input class="form_input" type="password" name="password">
                    </div>
                    <div class="submit_">
                        <input class="form_submit" type="submit" value="登録する">
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
