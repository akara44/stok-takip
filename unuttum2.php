<?php
require_once "config/baglanti.php";
require_once "template/header.php";
require_once "template/footer.php";
?>
<?php

if ($_POST) {
   $email = strip_tags($_POST['email']);
   $sifre = strip_tags($_POST['sifre']);
   $sifretekrar = strip_tags($_POST['sifretekrar']);
   $kod = strip_tags($_POST['kod']);
   if ($email != "" and $sifre != "" and $sifretekrar != "" and $kod != "") {
    if ($sifre == $sifretekrar) {
        $control = $baglanti->db->prepare("SELECT * FROM kullanici WHERE unuttum = ? and email = ?");
        $control->execute(array($kod, $email));
        $sonuc = $control->rowCount();
        if ($sonuc != 0) {
            $sorgu = $baglanti->db->prepare("UPDATE kullanici set sifre = ? , unuttum = ? where email = ?");
            $calistir = $sorgu->execute(array(md5($sifre),"",$email));
            if ($calistir) {
                // echo "İşleminiz Başarılı Bir Şekilde Gerçekleşti";
                echo '<script>
                Swal.fire({
                  title: "İşleminiz Gerçekleşti!",
                  text: "İşleminiz Başarılı Bir Şekilde Gerçekleşti",
                  icon: "success",
                  confirmButtonText: "Tamam"
                });
              </script>';
                helper::yonlendir(SITE_URL,3);
            } 
            else {
                // echo "İşleminiz Gerçekleştirilemedi";
                echo '<script>
                Swal.fire({
                  title: "İşleminiz Gerçekleştirilemedi!",
                  text: "İşleminiz Gerçekleştirilemedi Lütfen Tekrar Deneyiniz",
                  icon: "error",
                  confirmButtonText: "Tamam"
                });
              </script>';
            }
        }
        else {
            // echo "İşleminiz Gerçekleştirilemedi.Girdiğiniz Kod Yanlış";
            echo '<script>
            Swal.fire({
              title: "Kod Yanlış!",
              text: "İşleminiz Gerçekleştirilemedi.Girdiğiniz Kod Yanlış",
              icon: "error",
              confirmButtonText: "Tamam"
            });
          </script>';
        }

    }
    else {
        // echo "Şifreleriniz Uyuşmamaktadır";
        echo '<script>
    Swal.fire({
      title: "Şifreleriniz Uyuşmamaktadır!",
      text: "Girdiğiniz Şifreler Uyuşmamaktadır Lütfen Tekrar Deneyin",
      icon: "error",
      confirmButtonText: "Tamam"
    });
  </script>';
    }
   }
   else {
    // echo "Lütfem Tüm Alanlarıu Doldurunuz";
    echo '<script>
    Swal.fire({
      title: "Tüm Alanları Doldurun!",
      text: "Lütfen Tüm Alanları Doldurun",
      icon: "error",
      confirmButtonText: "Tamam"
    });
  </script>';
   }
    
}
 ?>


<link rel="stylesheet" href="public/css/unuttum.css">

  <div class="wrapper">
    <form action="" method="POST">
      <h1>Şifreyi Yenile</h1>
      <div class="input-box">
        <input type="text" placeholder="Email" name="email">
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Kodu Giriniz" name="kod">
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Yeni Şifre" name="sifre">
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Yeni Şifrenizi Tekrar Giriniz" name="sifretekrar">
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="submit" class="btn">Onayla</button>
      <div class="register-link">
      </div>
    </form>
  </div>
