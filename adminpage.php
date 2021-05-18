<?php
session_start();        
require_once "includes/pdo.php";
if(!isset($_SESSION["admin"])){  echo "<script type='text/javascript'>alert('Öncelikle Giriş Yapmanız Gerekmektedir!')</script>";
        header("LOCATION: login.php");
    
        }
       
        else{
           header("Refresh: 9999999999; url= adminpage.php");
        }
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/kutuphane/adminpage.css?key=<?=time()?>">
    <title>Admin</title>
</head>
<body>
    <div class="panel">
        <div class="menu">
            <nav>
            <a href="/kutuphane/index.php"><img src="logomuz2.png" ></a>
            <div class="menu_header"><a href="#"><h1>Anasayfa</h1></a></div>
             <li><a href="adminkullanici.php">Kullanıcılar</a></li>
             <li><a href="/kutuphane/adminkitaplar.php">Kitaplar</a></li>
             <li><a href="#">Çıkış</a></li>
            </nav>

        </div>
        <div class="container">
            <div class="container_head">
                <div class="head_left">
                    <h1>HOŞGELDİNİZ,</h1>
                </div>
                <div class="head_right">
                <a href="/kutuphane/index.php"><img src="diagram2.png" ></a>
                <a href="/kutuphane/index.php"><img src="question.png" ></a>
                <a href="/kutuphane/index.php"><img src="comments.png" ></a>
                <a href="/kutuphane/index.php"><img src="share.png" ></a>
                <a href="/kutuphane/index.php"><img src="log-out.png" ></a>
                </div>
            </div>
            <div class="container_in">
            </div>

        </div>
    </div>
</body>
</html>