<?php
//データベース情報取り込み
require_once("common.php");
//セッション開始
session_start();

//POSTで送信されている
if($_SERVER["REQUEST_METHOD"]==="POST"){
    //入力欄が空白ではない
    if(isset($_POST["password"],$_POST["useremail"]) && $_POST["password"]!=="" && $_POST["useremail"]!==""){
        //データベース接続
        try{
            $dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
            $pdo= new PDO($dsn,DB_MAIL,DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); /*エラー出力*/
        }catch(PDOException $e){
            $_SESSION['login_message']='データベース接続に失敗しました';
            header("Location:".$_SERVER["PHP_SELF"]);
            exit;
        }

        //ユーザー認証
        $stmt=$pdo->prepare("SELECT * FROM users WHERE email=? and password=?");
        $stmt->bindValue(1,$_POST["useremail"]);
        $stmt->bindValue(2,$_POST["password"]);
        $stmt->execute();
        $result=$stmt->fetchall();

        if($result){
            //データベースから情報を取得
            $useremail=$_POST["useremail"];
            $stmt2=$pdo->prepare("SELECT id FROM users WHERE email='$useremail'");
            $stmt2->execute();
            $result=$stmt2->fetchAll();
            $row=$result[0];
            $id=$row[id];
            
            $_SESSION["id"]=$id;
            $_SESSION["time"]=time();
            $_SESSION["login_message"]="ログインしています";
            header("Location:".$_SERVER["PHP_SELF"]);
            exit;
        }else{
            $_SESSION["login_message"]="failed";
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
    <title>ログイン</title>
    <link rel="stylesheet" href="index_loginTakeoutKitchen_stylesheet.css">
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
//セッションの初期化
$_SESSION["resister_message"]="";
?>
