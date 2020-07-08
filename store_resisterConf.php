<?php
require_once("common.php");

session_start();

$storename=$_POST["storename"];
$storeaddress=$_POST["storeaddress"];
$storetel=$_POST["storetel"];
$storeemail=$_POST["storeemail"];

$menuname1=$_POST["menuname1"];
$menuname2=$_POST["menuname2"];
$menuname3=$_POST["menuname3"];
$menuname4=$_POST["menuname4"];
$menuname5=$_POST["menuname5"];
$menuname6=$_POST["menuname6"];
$menuname7=$_POST["menuname7"];
$menuname8=$_POST["menuname8"];
$menuname9=$_POST["menuname9"];
$menuname10=$_POST["menuname10"];

$menuprice1=$_POST["menuprice1"];
$menuprice2=$_POST["menuprice2"];
$menuprice3=$_POST["menuprice3"];
$menuprice4=$_POST["menuprice4"];
$menuprice5=$_POST["menuprice5"];
$menuprice6=$_POST["menuprice6"];
$menuprice7=$_POST["menuprice7"];
$menuprice8=$_POST["menuprice8"];
$menuprice9=$_POST["menuprice9"];
$menuprice10=$_POST["menuprice10"];

$menunames=array($menuname1,$menuname2,$menuname3,$menuname4,$menuname5,
                $menuname6,$menuname7,$menuname8,$menuname9,$menuname10);

$menuprices=array($menuprice1,$menuprice2,$menuprice3,$menuprice4,$menuprice5,
                $menuprice6,$menuprice7,$menuprice8,$menuprice9,$menuprice10);                

/*登録するボタンを押したら情報をデータベースに登録する*/
if(isset($_POST["submit_"])){
    /*データベース接続*/ 
    $dsn="mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=utf8";
    $pdo= new PDO($dsn,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
       
    /*データ挿入*/
    $stmt=$pdo->prepare("INSERT INTO kitchens (storename,addres,tel,mail) VALUE(?,?,?,?)");
    $stmt->bindValue(1,$_POST["storename"]);
    $stmt->bindValue(2,$_POST["storeaddress"]);
    $stmt->bindValue(3,$_POST["storetel"]);
    $stmt->bindValue(4,$_POST["storeemail"]);
    $stmt->execute();

    $stmt=$pdo->prepare("INSERT INTO menu (product,price) VALUE(?,?)");
    foreach($menunames as $menuname){
        $stmt->bindValue(1,$menuname);
    }
    foreach($menuprices as $menuprice){
        $stmt->bindValue(2,$menuprice);
    }
    $stmt->execute();
    

    header("Location:storeresister_success.php");
    exit;
}
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
                <input type="hidden" name="storename" value="<?php echo $storename ?>"> 
            </div>
            <div>
                <p>住所</p>
                <p><?php echo $storeaddress ?></p>
                <input type="hidden" name="storeaddress" value="<?php echo $storeaddress ?>"> 
            </div>
            <div>
                <p>電話番号</p>
                <p><?php echo $storetel ?></p>
                <input type="hidden" name="storetel" value="<?php echo $storetel ?>"> 
            </div>
            <div>
                <p>メールアドレス</p>
                <p><?php echo $storeemail ?></p>
                <input type="hidden" name="storeemail" value="<?php echo $storeemail ?>"> 
            </div>
            <div>
                <p>メニュー</p>

                <p>品名</p>
                <p><?php 
                foreach($menunames as $menuname){
                    echo $menuname;
                } ?></p>
                <input type="hidden" name="menuname1" value="<?php echo $menuname1 ?>">
                <input type="hidden" name="menuname2" value="<?php echo $menuname2 ?>">
                <input type="hidden" name="menuname3" value="<?php echo $menuname3 ?>">
                <input type="hidden" name="menuname4" value="<?php echo $menuname4 ?>">
                <input type="hidden" name="menuname5" value="<?php echo $menuname5 ?>">
                <input type="hidden" name="menuname6" value="<?php echo $menuname6 ?>">
                <input type="hidden" name="menuname7" value="<?php echo $menuname7 ?>">
                <input type="hidden" name="menuname8" value="<?php echo $menuname8 ?>">
                <input type="hidden" name="menuname9" value="<?php echo $menuname9 ?>">
                <input type="hidden" name="menuname10" value="<?php echo $menuname10 ?>">

                <p>価格</p>
                <p><?php 
                foreach($menuprices as $menuprice){
                    echo $menuprice;
                }
                ?></p>
                <input type="hidden" name="menuprice1" value="<?php echo $menuprice1 ?>"> 
                <input type="hidden" name="menuprice2" value="<?php echo $menuprice2 ?>"> 
                <input type="hidden" name="menuprice3" value="<?php echo $menuprice3 ?>"> 
                <input type="hidden" name="menuprice4" value="<?php echo $menuprice4 ?>"> 
                <input type="hidden" name="menuprice5" value="<?php echo $menuprice5 ?>"> 
                <input type="hidden" name="menuprice6" value="<?php echo $menuprice6 ?>"> 
                <input type="hidden" name="menuprice7" value="<?php echo $menuprice7 ?>"> 
                <input type="hidden" name="menuprice8" value="<?php echo $menuprice8 ?>"> 
                <input type="hidden" name="menuprice9" value="<?php echo $menuprice9 ?>"> 
                <input type="hidden" name="menuprice10" value="<?php echo $menuprice10 ?>"> 

            </div>
            <div>
                <input type="submit" name="submit_" value="登録する">
            </div>
        </form>
</body>
</html>