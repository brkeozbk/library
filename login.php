<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/kutuphane/login.css?key=<?=time()?>">
    <title>Giriş</title>
</head>
<body>
 <form method="POST">
 <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Giriş<span>Yapınız</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" autocomplete="off" placeholder="Kullanıcı Adı" name="user"><br>
				<input type="password" placeholder="Şifre" name="password"><br>
				<input type="submit" value="Giriş Yap">
                <a href="signup.php">Hala üye değil misiniz?Üye Olun!</a>
		</div>
		<?php 
require_once "includes/pdo.php";

if($_POST){
$kullanici_adi=$_POST['user'];
$kullanici_sifre=$_POST['password'];
$hashing_sifre;
function encrypt_decrypt($action, $kullanici_sifre) {
    $output = true;
    $sifreleme_kodlari = 'AES-256-CTR'; //sifreleme yontemi
    $sifreleme_key = '25760'; //sifreleme anahtari
    $sifre_baslangici = '**109'; //gerekli sifreleme baslama vektoru
    $key = hash('sha256', $sifreleme_key); //anahtar hast fonksiyonu ile sha256 algoritmasi ile sifreleniyor
    $key_substr = substr(hash('sha256', $sifre_baslangici), 0, 16); //0. ve 16. sifrelenmiş harfi göstermeyecek
    if( $action == 'encrypt' ) {
      $output = urlencode(serialize(base64_encode(gzcompress(openssl_encrypt($kullanici_sifre,$sifreleme_kodlari, $key, 0, $key_substr)))));
    }	             
    return $output;
  }           
  $hashing_sifre = encrypt_decrypt('encrypt',$kullanici_sifre);//ŞİFREmizi hashing sifre değişkenine aktarır

$rol1=1;
$rol2=0;

    $kullanici_kontrol= $pdo->query("SELECT * FROM kullanici WHERE k_adi='$kullanici_adi' AND k_sifre='$hashing_sifre' AND rol='$rol2' ")->fetch();
    $admin_kontrol=$pdo->query("SELECT * FROM kullanici WHERE k_adi='$kullanici_adi' AND k_sifre='$hashing_sifre' AND rol='$rol1' ")->fetch();
    if ($kullanici_kontrol){/// roll 0 ise index sayfasına atacak 0 demek kullanıcı demektir
	
    $_SESSION["isim"] = $kullanici_kontrol['k_adi'];
    $_SESSION["kayitID"] = $kullanici_kontrol['kayitID'];
        // echo "<script type='text/javascript'>alert('Anasayfaya Yönendiriliyorsunuz')</script>";
         header("Refresh: 0; url= index.php");
	
    }
    else if($admin_kontrol){ ///// roll 1 ise admin sayfasına atacak//////
        $_SESSION["admin"] = $admin_kontrol['k_adi'];
        echo "<script type='text/javascript'>alert('Hoşgeldiniz, Sayın, $kullanici_adi Admin Sayfasına Yönendiriliyorsunuz')</script>";
        header("Refresh: 0; url= adminpage.php");

    }
    else{
        echo "<script type='text/javascript'>alert('Girmiş Olduğunuz Bilgiler Hatalıdır!')</script>";
        header("Refresh: 0; url= login.php");
    }
  
	

}

?>
 </form>
</body>
</html>