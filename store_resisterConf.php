<?php
require_once("common.php");

session_start();

$storename=$_POST["storename"];
$storeaddress=$_POST["storeaddress"];
$storetel=$_POST["storetel"];
$storeemail=$_POST["storeemail"];
$opentime=$_POST["opentime"];
$closed=$_POST["closed"];

$temsave='/images';
$tmpimage=uniqid().'csv';
move_uploaded_file($_FILES["image"]["tmp_name"],$temsave);

$img = file_get_contents($_FILES["image"]["tmp_name"]);
$base64 = base64_encode($img);

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
    $stmt=$pdo->prepare("INSERT INTO kitchens (storename,addres,tel,mail,opentime,closed) VALUE(?,?,?,?,?,?)");
    $stmt->bindValue(1,$_POST["storename"]);
    $stmt->bindValue(2,$_POST["storeaddress"]);
    $stmt->bindValue(3,$_POST["storetel"]);
    $stmt->bindValue(4,$_POST["storeemail"]);
    $stmt->bindValue(5,$_POST["opentime"]);
    $stmt->bindValue(6,$_POST["closed"]);
    $res = $stmt->execute();

    /*データベースから店舗情報を取得*/
    $stmt2=$pdo->prepare("SELECT id FROM kitchens WHERE storename='$storename'");
    $stmt2->execute();
    $result=$stmt2->fetchAll();
    $row=$result[0];
    $id=$row[id];

    $stmt=$pdo->prepare("INSERT INTO menu (product,price, kitchensId) VALUE(?,?,?)");
    $stmt->bindValue(1,$_POST["menuname1"]);
    $stmt->bindValue(2,$_POST["menuprice1"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname2"]);
    $stmt->bindValue(2,$_POST["menuprice2"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname3"]);
    $stmt->bindValue(2,$_POST["menuprice3"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname4"]);
    $stmt->bindValue(2,$_POST["menuprice4"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname5"]);
    $stmt->bindValue(2,$_POST["menuprice5"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname6"]);
    $stmt->bindValue(2,$_POST["menuprice6"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname7"]);
    $stmt->bindValue(2,$_POST["menuprice7"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname8"]);
    $stmt->bindValue(2,$_POST["menuprice8"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname9"]);
    $stmt->bindValue(2,$_POST["menuprice9"]);
    $stmt->bindValue(3,$id);
    $stmt->execute();
    $stmt->bindValue(1,$_POST["menuname10"]);
    $stmt->bindValue(2,$_POST["menuprice10"]);
    $stmt->bindValue(3,$id);
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
    <link rel="stylesheet" href="store_resisterConf.css">
</head>
<body>
    <div class="title_">
        <h1>店舗情報　登録内容確認</h1>
    </div>
    <div>
        <p>よろしければ「登録する」ボタンを押してください。</p>
    </div>
    <div class="menu_content">
        <form action="" method="POST">
            <div class="form_content">
                <p>店舗名：<?php echo $storename ?></p>
                <input type="hidden" name="storename" value="<?php echo $storename ?>"> 
            </div>
            <div class="form_content">
                <p>住所：<?php echo $storeaddress ?></p>
                <input type="hidden" name="storeaddress" value="<?php echo $storeaddress ?>"> 
            </div>
            <div class="form_content">
                <p>電話番号：<?php echo $storetel ?></p>
                <input type="hidden" name="storetel" value="<?php echo $storetel ?>"> 
            </div>
            <div class="form_content">
                <p>メールアドレス：<?php echo $storeemail ?></p>
                <input type="hidden" name="storeemail" value="<?php echo $storeemail ?>"> 
            </div>
            <div class="form_content">
                <p>営業時間：<?php echo $opentime ?></p>
                <input type="hidden" name="opentime" value="<?php echo $opentime ?>"> 
            </div>
            <div class="form_content">
                <p>定休日：<?php echo $closed ?></p>
                <input type="hidden" name="closed" value="<?php echo $closed ?>"> 
            </div>
            <div class="form_content_image">
                <p>画像：<?php print "<img src=\"data:image/jpeg;base64,${base64}\">"; ?></p>
                <input type="hidden" name="image" value="<?php echo $_FILES["image"]["tmp_name"] ?>"> 
            </div>
            <div class="form_content_menu">
                <div class="title_menus">
                        <p>メニュー</p>
                </div>
                <div class="form_content_menus">
                    <div class="form_content_menu1">
                            <div class="form_content_menu_title">
                                <p>メニュー名</p>
                            </div>
                            <div class="form_content_menu_menuname">
                                <p class="form_content_menu_menuname_p"><?php 
                                foreach($menunames as $menuname){
                                    echo $menuname."<br>";
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
                            </div>
                    </div>
                    <div class="form_content_menu2">
                            <div class="form_content_menu_title">
                                <p>価格(円)</p>
                            </div>
                            <div class="form_content_menu_price">
                                <p><?php 
                                foreach($menuprices as $menuprice){
                                    echo $menuprice."<br>";
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
                    </div>
                </div>
            </div>
            <div class="submit_">
                <input type="submit" name="submit_" value="登録する">
            </div>
        </form>
</body>
</html>