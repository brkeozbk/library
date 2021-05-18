<?php
require_once "includes/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="table">
    <table class="table table-dark table-striped"><!--   tablo -->
                                        <thead>
                                          <tr>
                                            <th>kitap = </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
// if(isset($_POST['arama'])){
// $gelen = $_POST["arama"];
// $kitaplar=$_POST['kitaplar']
// $arayan_stmt = $pdo->query("SELECT * FROM kitaplar where kitaplar ='$kitaplar' like '%$gelen%'")
// while($arayan_row = $arayan_stmt->fetch(PDO :: FETCH_ASSOC))
// {
//     $kitaplar = $arayan_row['kitaplar'];

//     $kitap_stmt = $pdo->query("SELECT * FROM kitaplar where kitaplar='$kitaplar' like '%$gelen%' "); //ilçeyi döndürüp listeliyor
//                  while($kitap_row = $kitap_stmt->fetch(PDO :: FETCH_ASSOC))
//                        {  

//                         $kitap = $kitap_row['kitaplar'];
                                                       

//       }
//       echo ' <tr>'; //tabloya yazdırıyor
//                                 echo ' <td>'.$kitap.'</td>';    
// }
// }
$gelen = $_POST["arama"];
if($gelen == null){
header("location:kitaplar.php");
}
$cek = $pdo->query("SELECT * from kitaplar where kitaplar like '%$gelen%' ");
if($cek->rowCount()){
while($kayit=  $cek->fetch(PDO :: FETCH_ASSOC))
{ 
    echo ' <tr>'; //tabloya yazdırıyor
                               echo ' <td>'.$kayit.'</td>';
}
}
?>





                                    </div>
<?php

// $gelen = $_POST["arama"];
// if($gelen == null){
// header("location:kitaplar.php");
// }
// $cek = $pdo->query("SELECT * from kitaplar where kitaplar like '%$gelen%' ");
// if($cek->rowCount()){
// while($kayit=  $cek->fetch(PDO :: FETCH_ASSOC))
// {
// // echo .$kayit ['kitaplar'].;
// // echo '<a href="index.html">'.$kayit['kitaplar'].'</a>';
// echo '
// <div class="post excerpt ">

// <div class="bubble"><a href="#">'.$kayit['kitaplar'].'</a></div>
// '
// }
// }
// else{
//     echo 'içerik bulunamadı';
// }

?>


</body>
</html>