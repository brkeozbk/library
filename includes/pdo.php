
    <?php
       //ana veri tabanı bağlantımız heryerde kullandığımız pdo yöntemiyle bağlandık 
       $pdo = new PDO ('mysql:host=localhost; port=3306;  dbname=kutuphane;charset=utf8','root','');
       $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $baglanti = new mysqli("localhost", "root","", "kutuphane");
      
        
        ?>