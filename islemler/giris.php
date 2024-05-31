<?php
require_once "../config/baglanti.php";
require_once "../template/header.php";
require_once "../template/footer.php";

?>
<link rel="stylesheet" href="../public/css/giris.css">

<?php
if (isset($_COOKIE['giris'])) {
    $json = json_decode($_COOKIE['giris'], true);
    sessionManager::sessionOlustur($json);
    //  helper::yonlendir(SITE_URL);
}
if ($_POST) {
    $hatirla = @intval($_POST['hatirla']);
    $email = strip_tags($_POST['email']);
    $sifre = strip_tags($_POST['sifre']);
    if ($email != "" and $sifre != "") {
        $sifre = md5($sifre); 
        $sorgu = $baglanti->db->prepare("SELECT * FROM kullanici where email = :email and sifre = :sifre");
        $sorgu->bindParam(":email",$email, PDO::PARAM_STR);
        $sorgu->bindParam(":sifre",$sifre, PDO::PARAM_STR);
        $sorgu->execute();
        $sayi = $sorgu ->rowCount();
        if ($sayi == 0 ) {
            // echo "Bu Bilgilere Göre Kullanıcı Bulunamadı";
            echo '<script>
            Swal.fire({
              title: "Kullanıcı Yok!",
              text: "Bu Bilgilere Göre Kullanıcı Bulunamadı",
              icon: "error",
              confirmButtonText: "Tamam"
            });
          </script>';
        }
        else {
            if ($hatirla == 1) {
                $cookieArray = array("email"=>$email, "sifre"=>$sifre);
                $cookieArray = json_encode($cookieArray);
                setcookie("giris" ,$cookieArray  ,time()+36000, '/');
            }
            sessionManager::sessionOlustur(array("email"=>$email, "sifre"=>$sifre));
            helper::yonlendir(SITE_URL);
        }
    }
    else{
        // echo "Lütfen Tüm Alanları Doldurunuz";
        echo '<script>
        Swal.fire({
          title: "Onaylanmadı!",
          text: "Lütfen Tüm Alanları Doldurunuz",
          icon: "error",
          confirmButtonText: "Tamam"
        });
      </script>';
    }
}
?>

  <div class="wrapper">
    <form action="" method="POST">
      <h1>Giriş Yap</h1>
      <div class="input-box">
        <input type="text" placeholder="Email" name="email">
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Şifre" name="sifre">
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
       <!-- <label><input type="checkbox" name="hatirla" value="1">Beni Hatırla</label> -->
        <a href="../unuttum.php">Şifremi Unuttum</a>
      </div>
      <button type="submit" class="btn">Giriş</button>
      <!-- <div class="register-link">
        <p>Hesabınız Yokmu?<a href="../islemler/kayit.php">Kayıt Ol</a></p>
      </div> -->
    </form>
  </div>

