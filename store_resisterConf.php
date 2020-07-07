<?php
require_once("common.php");

session_start();

$storename=$_POST["storename"];
$storeaddress=$_POST["storeaddress"];
$storetel=$_POST["storetel"];
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登録内容確認</title>
</head>
<body>
    <div>
        <h1>店舗情報　登録内容確認</h1>
    </div>
    <div>
        <p>よろしければ「登録する」ボタンを押してください。</p>
    </div>
    <div class="">
        <form action="" method="POST">
            <div>
                <p>店舗名</p>
                <p><?php echo $storename ?></p>
            </div>
            <div>
                <p>住所</p>
                <p><?php echo $storeaddress ?></p>
            </div>
            <div>
                <p>電話番号</p>
                <p><?php echo $storetel ?></p>
            </div>
            <div>
                <input type="submit" name="submit_" value="登録する">
            </div>
        </form>
</body>
</html>

<?php
/*POSTで送信されている */
if(isset($_POST["submit"])){
    /*データベース接続*/ 
    $dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
    $pdo= new PDO($dsn,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
       
    /*データ挿入*/
    $stmt=$pdo->prepare("INSERT INTO kitchens (storename,addres,tel) VALUE(?,?,?)");
    $stmt->bindValue(1,$storename);
    $stmt->bindValue(2,$storeaddress);
    $stmt->bindValue(3,$storetel);
    $stmt->execute();
    $_SESSION["resister_message"]="登録が完了しました";
    header("Location:storeresister_success.php");
    exit;
}
?>