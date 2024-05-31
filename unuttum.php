<?php
require_once "config/baglanti.php";
require_once "template/header.php";
require_once "template/footer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<?php
if ($_POST) {
   $email = strip_tags($_POST['email']);
   if ($email != "") {
        $control = $baglanti->db->prepare("SELECT * FROM kullanici WHERE email = :email");
        $control->bindParam("email", $email, PDO::PARAM_STR);
        $control->execute();
        $sonuc = $control->rowCount();
        if ($sonuc != 0) {
            $kod = rand(1,9000)."-".rand(1,9000);
            $sorgu = $baglanti->db->prepare("UPDATE kullanici set unuttum = ? WHERE email = ?");
            $calis = $sorgu->execute(array($kod, $email));
            if ($calis){
                $mesaj = "Merhaba Şifrenizi Alttaki Kodu Kullanarak Yenileyebilirsiniz
                                     Tek Kullanımlık Kodunuz:.$kod
                                 LÜTFEN KODUNUZU KİMSEYLE Paylaşmayın";
               
            
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure="tls";// ssl
                    $mail->Port = 587;
                    $mail->Host = "smtp.gmail.com";
                    $mail->Username = "ahmetkaradrj4433@gmail.com";
                    $mail->Password = "xmev ivnl kfnj uvln";
                    $mail->addAddress($email);
                    $mail->Subject = "Şifrenizi Yenileyin";
                    $mail->Body = $mesaj;
                    $mail->CharSet = 'UTF-8';
                    if ($mail->Send()) {
                      // echo  "Mailinize Kod Gönderildi";
                      echo '<script>
                        Swal.fire({
                          title: "Mailinize Kod Gönderildi!",
                          text: "Lütfen Mailinizi Kontrol Edin",
                          icon: "success",
                          confirmButtonText: "Tamam"
                        });
                      </script>';
                      
                      helper::yonlendir("http://localhost/STOK-TAKIP/unuttum2.php",3);
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

        }
        else {
            // echo "Sistemde Böyle Bir Kullanıcı Bulunamadı";
            echo '<script>
            Swal.fire({
              title: "Kullanıcı Sisteme Kayıtlı Değil!",
              text: "Sistemde Böyle Bir Kullanıcı Bulunamadı Lütfen Tekrar Deneyiniz",
              icon: "error",
              confirmButtonText: "Tamam"
            });
          </script>';
        }

   }
   else {
    // echo "Lütfen Bir Email Giriniz";
    echo '<script>
    Swal.fire({
      title: "Bu Alan Boş Bırakılmaz!",
      text: "Lütfen Bir Email Giriniz Bu alan Boş Bırakılmaz",
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
      <h1>Şifremi Unuttum</h1>
      <div class="input-box">
        <input type="text" placeholder="Email" name="email">
        <i class='bx bxs-user'></i>
      </div>
      <button type="submit" class="btn">Kodu Gönder</button>
      <div class="register-link">
      </div>
    </form>
  </div>