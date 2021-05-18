<?php
require_once "includes/pdo.php";
include_once('header.php');
if( (!isset($_SESSION['isim'])) && (!isset($_SESSION['admin']))){
  echo "<script type='text/javascript'>alert('Öncelikle Giriş Yapmanız Gerekmektedir!')</script>";
header("Refresh: 0; url= login.php");;}

else{
header("Refresh: 9999999999; url= main.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kitaplar.css?key=<?=time()?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="firstly">
<?php
    include_once('header2.php');
    ?>
    </div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <?php
  
    $cek_stmt = $pdo->query("SELECT * FROM kitap_turleri ");
    
    while ($tur_row=$cek_stmt->fetch(PDO :: FETCH_ASSOC))
    {
    ;
        // echo '<a href="'.$tur_row['turler'].'">'.$tur_row['turler'].'</a>';
        echo '<a class="s" href="de.html">' . $tur_row['turler'] . '</a>';

    }
    

    ?>
    
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kitap Türleri</span>
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    

<!-- <form method="POST" action="sayfa.php">
<div class="form-wrapper cf">
    
        <input type="text" placeholder="Aranacak Kitap..." required>
        <button type="submit">ARA</button>
    
</div>
</form> -->
<div class="container">
      <input class="form-control form-control-lg my-3" type="text" id="search-input" placeholder="Aramak İstediğiniz Kitap Adını Giriniz">
      <div class="options d-flex mb-3">
        <div class="custom-control custom-radio mr-2">
          <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
          <label class="custom-control-label" for="customRadio1">Kitap Adı</label>
        </div>
        <div class="custom-control custom-radio mr-2">
          <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
          <label class="custom-control-label" for="customRadio2">Yazar Adı</label>
        </div>
        
      </div>
      <div id="sonuclar" name="sonuclar"></div>
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    $(function(){
	$("#search-input").keyup(function(){
		if ($(this).val().length>=3){
			var sec;
			if($("#customRadio1").prop("checked")){sec=1;}
			if($("#customRadio2").prop("checked")){sec=2;}
			if($("#customRadio3").prop("checked")){sec=3;}
			data = "kelime="+$("#search-input").val()+"&secenek="+sec;			
			$.ajax({
				type:"POST",
				data: data,
				url: "arama.php",
				success:function(sonuc){
					$("#sonuclar").html(sonuc);
				},
				error:function(){

				}
			});
		}
	});
});
</script>

<div class="duzeltme">
    <h3>Önerilenler</h3>
<div id="slider">
 
 
    <div class="slayt" style="background-color:#060;">
    <a href="de.html"><img src="drakula.jpg" width="400" height="600"></a>
     
     
    <div class="aciklama">DRAKULA</div>
     
     
    </div>
     
     
     
     
    <div class="slayt" style="background-color:#CF0">
    <a href="cennet.html"><img src="ilahi.jpg" width="400" height="600"></a>
     
     
    <div class="aciklama">ILAHI KOMEDYA</div>
     
     
    </div>
     
     
     
     
    <div class="slayt" style="background-color:#03F">
    <a href="yüzükler.html"><img src="yzk.jpg" width="400" height="600"></a>
     
     
    <div class="aciklama">YÜZÜKLERİN EFENDİSİ</div>
     
     
    </div>
     
     
     
     
    <div class="slayt" style="background-color:red">
    <a href="cennet.html"><img src="yzk.jpg" width="400" height="600"></a>
     
     
    <div class="aciklama"></div>
     
     
    </div>
     
     
     
     
    <div class="slayt" style="background-color:green">
    <a href="de.html"><img src="yzk.jpg" width="400" height="600"></a>
     
     
    <div class="aciklama"></div>
     
     
    </div>
     
     
     
     
    <div class="slayt" style="background-color:yellow">
            <img src="yzk.jpg" width="400" height="600">
     
     
    <div class="aciklama"></div>
     
     
    </div>
     
     
        <!--Slayt numaraland覺rma-->
     
     
    <div class="slaytsirasi">
     
     
    <ul>
     
     
         <li onmouseover="aktif=0; slider();"></li>
     
     
     
     
         <li onmouseover="aktif=1; slider();"></li>
     
     
     
     
         <li onmouseover="aktif=2; slider();"></li>
     
     
     
     
         <li onmouseover="aktif=3; slider();"></li>
     
     
     
     
         <li onmouseover="aktif=4; slider();"></li>
     
     
     
     
         <li onmouseover="aktif=5; slider();"></li>
     
     
    </ul>
     
     
    </div>
     

    </div>
</div>

    <script type="text/javascript" language="javascript">
        var aktif=0;
        var pasif=null;
        slider();
        
        var ileri=document.createElement('div');
        ileri.style.right="0";
        ileri.innerHTML=">";
        ileri.className="ileri";
        ileri.onclick=function(){slider();}
        var geri=document.createElement("div");
        geri.style.left="0";
        geri.innerHTML="<";
        geri.className="geri";
        geri.onclick=function(){ aktif-=2; slider();}
        var anadiv=document.getElementById("slider");
        anadiv.appendChild(ileri);
        anadiv.appendChild(geri);
        
        
        anadiv.onmouseover=function(){clearTimeout(slayt_zaman);}
        anadiv.onmouseout=function(){slayt_zaman=setInterval(slider,5000);}
        
        function slider(){
            
            if(aktif>=document.getElementsByClassName("slayt").length){ 
            aktif=0;
            }else if(aktif<0){ 
            aktif=document.getElementsByClassName("slayt").length-1; }
        if(pasif!=null){
            
            var pasifdiv=document.getElementsByClassName("slayt")[pasif];
            pasifdiv.style.animation="hareketsagsol2 linear 1s";
            pasifdiv.style.right="-700px";
            
            }
            
            for(var s=0;s<document.getElementsByTagName("li").length;s++){
                document.getElementsByTagName("li")[s].setAttribute("class","");
            }
            
            var aktifdiv=document.getElementsByClassName("slayt")[aktif];
            aktifdiv.style.animation="hareketsagsol linear 1s";
            aktifdiv.style.opacity="1";
            aktifdiv.style.right="0px";
                document.getElementsByTagName("li")[aktif].setAttribute("class","aktifLi");
            
        pasif=aktif;
        aktif++;
        }
            var slayt_zaman=setInterval(slider,5000);
    </script>


</body>
</html>