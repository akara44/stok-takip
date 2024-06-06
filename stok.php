<!-- header and css -->
<?php 
require_once "template/header.php";
require_once "config/baglanti.php";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="public/css/personeller.css">
<!-- header and css -->

<!-- üst butonlar -->
<div class="cardBox">
    <a href="">
        <div class="card">
            <div>
                <div class="cardName">Personeller</div>
                <div class="numbers">1453</div>
            </div>
            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="">
        <div class="card">
            <div>
                <div class="cardName">Personel Ekle</div>
                <div class="numbers">63</div>
            </div>
            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="">
        <div class="card">
            <div>
                <div class="cardName">Personel Düzenle</div>
                <div class="numbers">12</div>
            </div>
            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="">
        <div class="card">
            <div>
                <div class="cardName">Personel Yetkileri</div>
                <div class="numbers">2</div>
            </div>
            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </a>
</div>

<!-- üst butonlar -->
 <style>
.option{
   height: 45px;
width: 100%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
}
 </style>
<!-- personel ekleme formu -->
<div class="button-container">
    <button id="showFormBtn" class="btm">Personel Ekle</button>
</div>

<div class="overlay" id="overlay"></div>

<div class="konum" id="formContainer">
    <div class="containe">
        <div class="title">Personel</div>
        <div class="content">
            <form method="post" action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Ürün İsmi</span>
                        <input type="text" placeholder="Ürün İsmi Giriniz" name="isim" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Adedi</span>
                        <input type="text" placeholder="Ürün Adedini Giriniz" name="soyisim" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Açıklaması</span>
                        <input type="text" placeholder="Ürünün Açıklamasını Giriniz" name="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Fiyatı</span>
                        <input type="text" placeholder="Ürün Fiyatını Giriniz" name="sifre" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Ürünün Bakodu</span>
                        <input type="text" placeholder="Ürün Barkodunu Giriniz" name="sifre" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Kategoriler</span>
                        <select name="stok" class="option">
                            <option value="stokta">Gıda</option>
                            <option value="stokta">Giyim</option>
                            <option value="stokta">Spor</option>
                            <option value="stokta">Elektronik</option>
                            <option value="stokta">Oyuncak</option>
                            <option value="stokta">Ev&Temizlik</option>
                            <option value="stokta">Kişisel Bakım</option>
                            <option value="stokta">Kırtasiye</option>
                            <option value="stokta">Spor</option>
                        </select>
                    </div>
                </div>
                <div class="yetki-details">
                    <input type="radio" name="yetki" id="sinif-1" value="1">
                    <input type="radio" name="yetki" id="sinif-2" value="2">
                    <input type="radio" name="yetki" id="sinif-3" value="3">
                    <input type="radio" name="yetki" id="sinif-4" value="4">
                    <span class="yetki-title">Mağaza</span>
                    <div class="category">
                        <label for="sinif-1">
                            <span class="sinif one"></span>
                            <span class="yetki">Türkiye</span>
                        </label>
                        <label for="sinif-2">
                            <span class="sinif two"></span>
                            <span class="yetki">Malatya</span>
                        </label>
                        <label for="sinif-3">
                            <span class="sinif three"></span>
                            <span class="yetki">Battalgazi</span>
                        </label>
                        <label for="sinif-4">
                            <span class="sinif four"></span>
                            <span class="yetki">Fuzuli</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Kaydet">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- personel ekleme formu -->
<!-- sweetalert 2 ve page.js entgrasyonu -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/page.js"></script>
<!-- sweetalert 2 entgrasyonu -->
<!-- PHP Kayıt İşlemi ve Validasyon -->
<?php
if ($_POST) {
    $yetki = $kBilgi['yetki'];
    if ($yetki == "1" ) {
        $isim = strip_tags($_POST["isim"]);
        $soyisim = strip_tags($_POST["soyisim"]);
        $email = strip_tags($_POST["email"]);
        $sifre = strip_tags($_POST["sifre"]);
        $yetki = strip_tags($_POST["yetki"]);

        if (!empty($isim) && !empty($soyisim) && !empty($email) && !empty($sifre) && !empty($yetki)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $tarih = date("Y-m-d");
                $control = $baglanti->db->prepare("SELECT * FROM kullanici WHERE email = :email");
                $control->bindParam(":email", $email, PDO::PARAM_STR);
                $control->execute();
                $sayi = $control->rowCount();
                if ($sayi == 0) {
                    $sorgu = $baglanti->db->prepare("INSERT INTO kullanici(isim,soyisim,email,sifre,yetki) VALUES(?,?,?,?,?)");      
                    $ekle = $sorgu->execute([$isim, $soyisim, $email, md5($sifre), $yetki]);
                    if ($ekle) {
                        echo '<script>
                            Swal.fire({
                                title: "Kayıt Başarılı!",
                                text: "Kayıt Başarılı İyi Çalışmalar",
                                icon: "success",
                                confirmButtonText: "Tamam"
                            });
                        </script>';
                    } else {
                        echo '<script>
                            Swal.fire({
                                title: "Kayıt Başarısız!",
                                text: "Kayıt Başarısız Lütfen Tekrar Deneyin",
                                icon: "error",
                                confirmButtonText: "Tamam"
                            });
                        </script>';
                    }
                } else {
                    echo '<script>
                        Swal.fire({
                            title: "Kullanıcı Mevcut!",
                            text: "Bu Kullanıcı Sistemimizde Mevcut",
                            icon: "error",
                            confirmButtonText: "Tamam"
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        title: "Email Formatı Yanlış!",
                        text: "Lütfen Email Formatına Uygun Bir Değer Giriniz",
                        icon: "error",
                        confirmButtonText: "Tamam"
                    });
                </script>';
            }
        } else {
            echo '<script>
                Swal.fire({
                    title: "Boş Alan!",
                    text: "Lütfen Tüm Değerleri Eksizsiz Girin",
                    icon: "error",
                    confirmButtonText: "Tamam"
                });
            </script>';
        }
    } else {
        echo '<script>
            Swal.fire({
                title: "Yetkiniz Yok!",
                text: "Lütfen Yetkiniz Olmayan Sayfalara Girmeyin",
                icon: "error",
                confirmButtonText: "Tamam"
            });
        </script>';
    }
}
?>

<!-- PHP Kayıt İşlemi ve Validasyon -->
<!-- footer -->
<?php 
require_once "template/footer.php";
?>
<!-- footer -->

