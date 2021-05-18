<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/kutuphane/signup.css?key=<?=time()?>">
    <title>Kayıt Ol</title>
</head>
<body>
 <form method="POST">
 <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Kayıt<span>Olun</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" autocomplete="off" placeholder="Kullanıcı Adınız" name="k_adi"><br>
				<input type="text" autocomplete="off" placeholder="Adınız" name="name"><br>
				<input type="text" autocomplete="off" placeholder="Soyadınız" name="surname"><br>
				<input type="text" autocomplete="off" placeholder="E-posta" name="e_mail"><br>
				<input type="password" placeholder="Şifre" name="password"><br>
				<input type="password" placeholder="Şifre Tekrarı" name="password_again"><br>
				<input type="submit" value="Giriş Yap">
                <a href="login.php">Zaten Üye misiniz? Giriş Yap!</a>
		</div>
		<?php 
require_once "includes/pdo.php";

$mail_kontrol;
$kullanici_adi;
$kullanici_info;
$hashing_sifre;
if($_POST){
    
$kullanici_adi = htmlentities(trim($_POST['k_adi']));
$kullanicinin_adi=htmlentities(trim($_POST['name']));
$kullanici_soyadi=htmlentities(trim($_POST['surname']));
$kullanici_email=htmlentities(trim($_POST['e_mail']));
$kullanici_sifre=htmlentities(trim($_POST['password']));
$kullanici_sifre_tekrar=htmlentities(trim($_POST['password_again']));


   if(!empty($kullanici_adi)  && !empty($kullanicinin_adi)  && !empty($kullanici_soyadi)    && !empty($kullanici_sifre) && !empty($kullanici_sifre_tekrar) && !empty($kullanici_email)){// şifre ve şifre tekrarı birbirine eşitmi
    //$kullanici_info=$pdo->query("SELECT * FROM kayit WHERE kullanici_adi='$kullanici_adi' AND kullanici_sifre='$kullanici_sifre' AND  ")->fetch();
      if($kullanici_adi==$kullanici_sifre){
        echo "<script type='text/javascript'>alert('Kullanıcı Şifreniz Kullanıcı Girişi ile Aynı Olmamalıdır.');</script>";

      }
      else if($kullanici_adi==$kullanici_email){
        echo "<script type='text/javascript'>alert('Kullanıcı Adınız E-mailiniz  ile Aynı Olmamalıdır.');</script>";
      }
      else if($kullanici_adi!=$kullanici_sifre && $kullanici_adi!=$kullanici_email && $kullanici_sifre==$kullanici_sifre_tekrar){//// ŞİFRE VE ŞİFRE TEKRARI BİRBİRİ İLE UYUŞUYORSA DEVAMKEEE

        $sifre_array=str_split($kullanici_sifre);/////////////////////////// $sifreyi dizi olarak sifre_array değişkenine attım////////////////
        if(count($sifre_array)<6 ){//////////////////// ŞİFRE 6 HANEDEN AZ OLMAMALI GÜVENLİK AÇISINDAN/////////////////////////////////////////
            echo "<script type='text/javascript'>alert('Şifreniz en az 6 haneden oluşmalıdır.')</script>";            
        }
        else if($sifre_array>=6){
            // <<<<--------- MAİL KONTROL BAŞLANGIÇI OLACAK BUDA -------->>>>>
            if (filter_var($kullanici_email, FILTER_VALIDATE_EMAIL)) {
             // $kullanici_info=$pdo->query("SELECT * FROM kayit WHERE kullanici_adi='$kullanici_adi' AND kullanici_sifre='$kullanici_sifre'  ")->fetch();
               // <------------BU ALAN PASSWORD HASHİNG VE VERİ TABANINA KAYDETME ALANIDIR---------------->         
                               
                function encrypt_decrypt($action, $kullanici_sifre) {
	              $output = true;
	              $sifreleme_kodlari = 'AES-256-CTR'; 
	              $sifreleme_key = '25760'; 
	              $sifre_baslangici = '**109'; 
	              $key = hash('sha256', $sifreleme_key); 
	              $key_substr = substr(hash('sha256', $sifre_baslangici), 0, 16); 
	              if( $action == 'encrypt' ) {
		            $output = urlencode(serialize(base64_encode(gzcompress(openssl_encrypt($kullanici_sifre,$sifreleme_kodlari, $key, 0, $key_substr)))));
	              }	             
	              return $output;
                }           
                $hashing_sifre = encrypt_decrypt('encrypt',$kullanici_sifre); 
                // <-----------------BU ALAN PASSWORD HASHİNG BİTME ALANIDIR------------------------> 
                $kullanici_info=$pdo->query("SELECT * FROM kullanici WHERE k_adi='$kullanici_adi' ")->fetch();
                $mail_kontrol=$pdo->query("SELECT * FROM kullanici WHERE email='$kullanici_email' ")->fetch();
                if($kullanici_info){  
                  echo"<script type='text/javascript'>alert('Girmiş Olduğunuz Kullanıcı Adı Zaten Kayıtlıdır!')</script>";    
                }
                else if($mail_kontrol==0){
                  try{
                  $sql=("INSERT INTO `kullanici` (`kayitID`, `k_adi`, `k_sifre`,`email` , `rol`,  `ad` , `soyad`) VALUES (NULL, '$kullanici_adi', '$hashing_sifre','$kullanici_email', '0',  '$kullanicinin_adi', '$kullanici_soyadi')");
                  $pdo->exec($sql);
                  echo "<script type='text/javascript'>alert('Başarıyla Kayıt Oldunuz,Giriş Sayfasına Yönlendiriliyorsunuz...')</script>";
                  header("Refresh: 0; url= login.php");
                  }
                  catch(PDOException $e) {
                    echo"<script type='text/javascript'>alert('Kayit İşleminiZ Gerçekleşememiştir Lütfen Bilgilerinizi Tekrar Giriniz!')</script>";
                    }
                }
                else {
                  echo"<script type='text/javascript'>alert('Böyle Bir $kullanici_email  E-mail Adresi Zaten Kayıtlıdır!')</script>";
                }
                
              //<<<<<<<<<<<<<<<------------------------VERİ TABANINA KAYDETME BİTİŞ---------------------------------->>>>>>>>>>>>>>><             

               
              } 
                else {
                echo "<script type='text/javascript'>alert('Kullanmış Olduğunuz $kullanici_email E-mail Adresi Geçerli Değildir');</script>"; 
              } 
        }
      }      
      else if($kullanici_sifre != $kullanici_sifre_tekrar) {
        echo "<script type='text/javascript'>alert('Şifreleriniz Birbiri İle Uyuşmamaktadır! Lütfen Aynı Olduğundan Emin Olunuz!');</script>";
      }   
   }
 
   
}

?>
 </form>
</body>
</html>