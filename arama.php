
<?php
require_once "includes/pdo.php";
?>

<?php



$kelime = htmlspecialchars($_POST['kelime']);
$secenek = htmlspecialchars($_POST['secenek']);

if (!empty($kelime) && $secenek==1){
	$sorgu = "SELECT * FROM kitaplar WHERE kitap LIKE :kitap";
	$sonuc = $pdo->prepare($sorgu);
	$sonuc -> bindValue(":kitap",'%'.$kelime.'%');
	$sonuc -> execute();
}else if (!empty($kelime) && $secenek==2){
	$sorgu = "SELECT * FROM kitaplar WHERE yazar LIKE :kitap";
	$sonuc = $pdo->prepare($sorgu);
	$sonuc -> bindValue(":kitap",'%'.$kelime.'%');
	$sonuc -> execute();

}else if (!empty($kelime) && $secenek==3){
	$sorgu = "SELECT * FROM bilgiler WHERE basimyili LIKE :kitap";
	$sonuc = $db->prepare($sorgu);
	$sonuc -> bindValue(":kitap",'%'.$kelime.'%');
	$sonuc -> execute();
}

if ($sonuc->rowCount()!=0){
	echo ' <div class="alert alert-primary" role="alert">'.$sonuc->rowCount().' Sonuç bulundu : </div>';
	foreach ($sonuc as $key) {		
		echo '<div class="card mb-3">
          <div class="card-header font-weight-bold">';
        //echo $key['kitap'];
		echo '<a href="de.html">' . $key['kitap'] . '</a>';
        echo  '</div>
          <div class="card-body">
          <h6 class="card-title">';
        echo $key['yazar']; 
        echo '</h6>
            <p class="card-text">Basım Yılı : ';
        echo $key['basimyili'];
        echo '</h6>
            <p class="card-text">Türü : ';
        echo $key['kategori'];
        echo '</p>
		<p class="card-text">Stok Adeti : ';
        echo $key['stok'];
		
        echo '</p>
		
          </div>
        </div>';
	}
}else{
	echo ' <div class="alert alert-warning" role="alert">Sonuç yok...</div>';
}

?>