<?php
session_start();
ob_start();
require_once "includes/pdo.php";
if(!isset($_SESSION["admin"])){  echo "<script type='text/javascript'>alert('Öncelikle Giriş Yapmanız Gerekmektedir!')</script>";
  header("LOCATION: login.php");}
       
        else{
           header("Refresh: 9999999999; url= adminkitaplar.php");
        }
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Kitap</title>        
        <link rel="stylesheet" href="admintable.css?key=<?=time()?>">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css?key=<?=time()?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?key=<?=time()?>">
      <link rel="stylesheet" href="/kutuphane/adminkitaplar.css?key=<?=time()?>">

</head>
<body>
<div class="panel">
        <div class="menu">
            <nav>
            <a href="/kutuphane/index.php"><img src="logomuz2.png" ></a>
            <div class="menu_header"><a href="#"><h1>Anasayfa</h1></a></div>
             <li><a href="adminkullanici.php">Kullanıcılar</a></li>
             <li class="kitaplar"><a href="/kutuphane/adminkitaplar.php">Kitaplar</a></li>
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
            <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
       
        <th scope="col">Kitap Adı</th>
        <th scope="col">Yazarı</th>
        <th scope="col">Basım Yılı</th>
        <th scope="col">Kategori</th>
        <th scope="col">Stok</th>
        <th scope="col">Sil</th>
        <th scope="col">Düzenle</th>


      </tr>
    </thead>
    
            </div>

        </div>
    </div>

    
    <?php                                                
       
    
       $sonuc=mysqli_query($baglanti,"SELECT * from kitaplar");
       mysqli_set_charset($baglanti, "utf8");                                                
       while($kitap_row=mysqli_fetch_assoc($sonuc))
         {
           $kitap_id=$kitap_row['kitapID'];  
           
          
      
          echo '<form action="" method="POST">';
          echo '<input type="hidden" name="kitap_id" value="'.$kitap_id.'">';
          echo ' <tbody>';
          echo ' <tr>';
          echo ' <td>'.$kitap_row['kitapID'].'</td>';
          echo ' <td>'.$kitap_row['kitap'].'</td>';
          echo ' <td>'.$kitap_row['yazar'].'</td>';
          echo ' <td>'.$kitap_row['basimyili'].'</td>';
          echo ' <td>'.$kitap_row['kategori'].'</td>';
          echo '<td>'.$kitap_row['stok'].'</td>';
        
          
                                                                           
          echo ' <td><input type="submit"  name="sil" value="Sil"></td>';
   
          echo ' </tr>';
          echo '</tbody>';
          echo '</form>';
         }
      
         ?>
                                            </table>
                                            <?php  
                                              if(isset($_POST['sil'])){
                                                $kitap_id = $_POST['kitap_id'];
                                                $sql = "DELETE FROM kitaplar WHERE kitapID='$kitap_id'";
                                                $sonuc=mysqli_query($baglanti,"SELECT * from kitaplar where kitapID='$kitap_id'");
                                                $satir=mysqli_fetch_assoc($sonuc);
                                                    if (mysqli_query($baglanti, $sql)) {   
                                                  echo "Record deleted successfully";
                                                  header('LOCATION: adminkitaplar.php');
                                                } else {
                                                echo "Error deleting record: " . mysqli_error($baglanti);
                                                }
                                        
                                                }  
                                                    
                                                   
                                                   ?>
                               
                                  
                                             
                               <form action="" method="POST">
  <div class="form-group">
    <label >Kitap Adı</label>
    <input type="text" class="form-control" name="kitap" id="exampleInputEmail1"  placeholder="Kitap Adı Giriniz">
    
  </div>
  <div class="form-group">
    <label >Yazarı</label>
    <input type="text" class="form-control" name="yazar" id="exampleInputPassword1" placeholder="Yazar Adını Giriniz">
  </div>
  <div class="form-group">
    <label >Basım Yılı</label>
    <input type="text" class="form-control" name="basimyili" id="exampleInputPassword1" placeholder="Basım Yılını Giriniz">
  </div>
  <div class="form-group">
    <label >Kategori</label>
    <input type="text" class="form-control" name="kategori" id="exampleInputPassword1" placeholder="Kategori Giriniz">
  </div>
  <div class="form-group">
    <label >Stok</label>
    <input type="text" class="form-control" name="stok" id="exampleInputPassword1" placeholder="Stok Adeti Giriniz">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Ekle</button>
  
</form>
        

<?php
                        if($_POST){                     // veritabanına kayıt php kodları
                            $kitap =   htmlentities(trim($_POST['kitap']));
                            $yazar = htmlentities(trim($_POST['yazar']));
                            $basimyili = htmlentities(trim($_POST['basimyili']));
                            $kategori = htmlentities(trim($_POST['kategori']));
                            $stok = htmlentities(trim($_POST['stok']));

                            if(empty($kitap) || empty($yazar)  || empty($basimyili) || empty($kategori) || empty($stok)   ) {
                              echo "<script type='text/javascript'>alert('Lütfen Gerekli Yerlerin Dolu Olduğundan Emin Olunuz');</script>";
                            }
                      
                            else{
                             $addForms_stmt = $pdo->prepare("INSERT INTO kitaplar (kitap, yazar, basimyili, kategori, stok,kitapturID) VALUES (:kitap, :yazar, :basimyili, :kategori, :stok, '1') ");
                                  $addForms_stmt->execute(array(
                                  ':kitap' => $kitap,
                                  ':yazar' => $yazar,
                                  ':basimyili' => $basimyili,
                                  ':kategori' => $kategori,
                                  ':stok' => $stok
                                  
                                  
                                  ));
                              
                                 
                              }
                          }
?>
</body>
</html>
<?php
ob_end_flush();
?>