<?php
require_once("common.php");

session_start();

?>

<!doctype html>
<html>
<head>
    <title>店舗詳細</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="store_detail.css">
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
    <?php
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

        /*データベースから店舗情報を取得*/
        $stmt=$pdo->query("SELECT product,price FROM menu WHERE kitchensId = '".$_POST["id"]."'");
        $stmt->execute();
        $result=$stmt->fetchAll();
        
    ?>

    <div class="main">
        <div class="main_content">
            <div class="store_image">
                <?php
                    echo '<img class="form_content_image" src="'.$_POST["image"].'">';
                ?>   
            </div>
            <div class="store_content">
                <div class="store_detail">
                    <h1 class="store_detail_name"><?php echo $_POST["storename"]; ?></h1>
                    </br>
                    <p class="store_detail_content"><?php echo "住所:".$_POST["address"]."</br>"; ?></p>
                    <p class="store_detail_content"><?php echo "営業時間：".$_POST["opentime"]."</br>"; ?></p>
                    <p class="store_detail_content"><?php echo "定休日：".$_POST["closed"]."</br>"; ?></p>
                    <p class="store_detail_content"><?php echo "TEL：".$_POST["tel"]."</br>"; ?></p>
                    <p class="store_detail_content"><?php echo "MAIL：".$_POST["mail"]."</br>"; ?></p>
                </div>
                <div class="store_detail_menu">
                    <div class="store_detail_menu_table">
                        <table border="1" >
                            <caption>メニュー</caption>
                            <tr>
                                <th>品名</th>
                                <th>価格(円)</th>
                            </tr>
                            <?php foreach($result as $loop){ ?>
                                <tr>
                                    <td class="table_menuname">
                                        <?php echo $loop[product]; ?>
                                    </td>
                                    <td>
                                        <?php echo $loop[price]; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>                  
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>