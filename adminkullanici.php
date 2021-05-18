<?php
session_start();
ob_start();
require_once "includes/pdo.php";
if(!isset($_SESSION["admin"])){  echo "<script type='text/javascript'>alert('Öncelikle Giriş Yapmanız Gerekmektedir!')</script>";
  header("LOCATION: adminkullanici.php");}
       
        else{
           header("Refresh: 99999999; url= adminpage.php");
        }
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/kutuphane/adminkullanici.css?key=<?=time()?>">

  <title>Document</title>
</head>
<body>
    <div class="panel">
        <div class="menu">
            <nav>
            <a href="/kutuphane/index.php"><img src="logomuz2.png" ></a>
            <div class="menu_header"><a href="#"><h1>Anasayfa</h1></a></div>
             <li class="kullanici"><a href="adminkullanici.php">Kullanıcılar</a></li>
             <li><a href="/kutuphane/adminkitaplar.php">Kitaplar</a></li>
             <li><a href="#">Çıkış</a></li><!-- ÇIKIŞ YAPPPPMIYOR BERKEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE-->
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
            <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kullanıcı Adı</th>
        <th scope="col">Adı</th>
        <th scope="col">Soyadı</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Kullanıcı Rolü</th>
        <th scope="col">Parola</th>
        <th scope="col">Sil</th>
        <th scope="col">Düzenle</th>


      </tr>
    </thead>
            </div>

        </div>
    </div>

 
    


    
    <?php                                                
       
    
   $sonuc=mysqli_query($baglanti,"SELECT * from kullanici");
   mysqli_set_charset($baglanti, "utf8");

                                                  
   while($kullanici_row=mysqli_fetch_assoc($sonuc))
     {
       $kullanici_id=$kullanici_row['kayitID'];  
       $kullanici_sifre=$kullanici_row['k_sifre'];
      
       
      echo '<form action="" method="POST">';
      echo '<input type="hidden" name="kayit_id" value="'.$kullanici_id.'">';
      echo ' <tbody>';
      echo ' <tr>';
      echo ' <td>'.$kullanici_row['kayitID'].'</td>';
      echo ' <td>'.$kullanici_row['ad'].'</td>';
      echo ' <td>'.$kullanici_row['soyad'].'</td>';
      echo ' <td>'.$kullanici_row['k_adi'].'</td>';
      echo ' <td>'.$kullanici_row['email'].'</td>';
      echo '<td>'.$kullanici_row['rol'].'</td>';
      echo '<td>'.$kullanici_row['k_sifre'].'</td>';
      
      echo '<input type="hidden" name="rol" value="'.$kullanici_row['rol'].'">';
                                                                       
      echo ' <td><input type="submit"  name="sil" value="Sil"></td>';
      echo '<td><input type="submit"  name="guncelle" value="Rol Değiştir"></td>';
      echo ' </tr>';
      echo '</tbody>';
      echo '</form>';
     }
  
     ?>
</table>

<?php
if(isset($_POST['sil'])){
$kayit_id = $_POST['kayit_id'];
$sql = "DELETE FROM kullanici WHERE kayitID='$kayit_id'";
$sonuc=mysqli_query($baglanti,"SELECT * from kullanici where kayitID='$kayit_id'");
$satir=mysqli_fetch_assoc($sonuc);
if (mysqli_query($baglanti, $sql)) {  // 
echo "Record deleted successfully";
header('LOCATION: adminkullanici.php');
} else {
echo "Error deleting record: " . mysqli_error($baglanti);
}

}

if(isset($_POST['guncelle'])){
$kayit_id = $_POST['kayit_id']; 
$rol_kontrol=$_POST['rol'];
$rol='0';
$rol1='1';
if($rol_kontrol == 1){
$sql = "UPDATE kullanici set rol = '$rol' where kayitID ='$kayit_id'";
if($baglanti->query($sql) ==   true){
header('LOCATION: adminkullanici.php');
}else {
echo "Hata : ". $baglanti->error;
header('LOCATION: adminkullanici.php');
}
}

else if($rol_kontrol == 0){
$sql = "UPDATE kullanici set rol = '$rol1' where kayitID ='$kayit_id'";
if($baglanti->query($sql) ==   true){
header('LOCATION: adminkullanici.php');
}else {
echo "Hata : ". $baglanti->error;
header('LOCATION: adminkullanici.php');
}

}

}
?>


</body>
</html>
<?php
ob_end_flush();
?>