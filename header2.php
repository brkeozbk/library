<?php require_once "includes/pdo.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header2.css?key=<?=time()?>">
    <title>kutuphane</title>
</head>
<body>
<nav>
        <div id="img" class="img"><a href="/kutuphane/index.php"><img src="logomuz2.png" ></a></div>
        <li><a href="index.php">Anasayfa</a></li>
        
        <li><a href="kitaplar.php">Kütüphane</a></li>
        <li><a href="#">Hakkımızda</a></li>
       <!-- <div class="button">
        <button type="submit" onclick="window.location.href='/kutuphane/login.php'">Giriş</button>
        <button type="submit" onclick="window.location.href='/kutuphane/signup.php'">Kayıt Ol</button>
       </div> -->
       <?php

if( (!isset($_SESSION['isim'])) && (!isset($_SESSION['admin'])) ) // menüde kullanıcı adını ekrana yazdık
{
	
                       
                          echo '<a id="main" href ="login.php">Giriş Yap</a></li>';        
                                			
                         }else{
							 echo '<a id="main" href ="logout.php">Çıkış Yap</a></li>';
                                echo  '<p class = "girenKullanici">Hoşgeldiniz '.$_SESSION["isim"]. '</p>' ;	
                            // echo  '<p class = "girenKullanici">' .$_SESSION["kayitID"]. '</p>' ;	
                             }
                             
 ?>
    </nav>
    

</body>
</html>