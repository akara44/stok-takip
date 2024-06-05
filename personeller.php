<!-- header and css -->
<?php 
require_once "template/header.php";
require_once "config/baglanti.php";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php  
$yetki = $kBilgi['yetki'];
// Yetki kontrolü
if ($yetki != 1 && $yetki != 2) {
    // Yetkisi yetmeyen kullanıcılar için SweetAlert ile mesaj gösterme
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erişim Engellendi!',
                text: 'Bu sayfayı görüntüleme yetkiniz yok.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Anladım',
                onClose: () => {
                    window.location.href = 'index.php';
                }
            });
          </script>";
    exit;
}
?>
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
                        <span class="details">İsim</span>
                        <input type="text" placeholder="İsmi Giriniz" name="isim" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Soyisim</span>
                        <input type="text" placeholder="Soyismi Giriniz" name="soyisim" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Emaili Giriniz" name="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Şifre</span>
                        <input type="password" placeholder="Şifreyi Giriniz" name="sifre" required>
                    </div>
                </div>
                <div class="yetki-details">
                    <input type="radio" name="yetki" id="sinif-1" value="1">
                    <input type="radio" name="yetki" id="sinif-2" value="2">
                    <input type="radio" name="yetki" id="sinif-3" value="3">
                    <span class="yetki-title">Yetki</span>
                    <div class="category">
                        <label for="sinif-1">
                            <span class="sinif one"></span>
                            <span class="yetki">Süper Admin</span>
                        </label>
                        <label for="sinif-2">
                            <span class="sinif two"></span>
                            <span class="yetki">Admin</span>
                        </label>
                        <label for="sinif-3">
                            <span class="sinif three"></span>
                            <span class="yetki">Personel</span>
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
<!--DATATABLE-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-QOua7eWB6n9tVz6tvKfZ/mJzBW4hS2JYHz2K+GDQPZcHEw3oYIqC/JPbTDMRnCEl" crossorigin="anonymous">
<style>
        .a {
    padding: 20px;
    margin-top: 90px;
}

#kullanici_table {
    width: 100%;
    border-collapse: collapse;
}

#kullanici_table th, #kullanici_table td {
    border: 1px solid #e0e0e0;
    padding: 15px;
    text-align: left;
}

#kullanici_table th {
    background-color: #f5f5f5;
    color: #333;
    font-weight: bold;
}

#kullanici_table tbody tr:nth-child(even) {
    background-color: #fafafa;
}

#kullanici_table tbody tr:hover {
    background-color: #f0f0f0;
}



/* Silme ve güncelleme butonları için stil */
.btn-delete,
.btn-update {
    background-color: #4CAF50; /* Yeşil */
    border: none;
    color: white;
    width:70px;
    height:25px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}

/* Silme butonu için farklı bir arka plan rengi */
.btn-delete {
    background-color: #f45336; /* Kırmızı */
}

/* Butonların üzerine gelindiğinde stil */
.btn-delete:hover{
    background-color: #f44336
}
.btn-update:hover {
    background-color: #45a049; /* Koyu yeşil */
}
    </style>
    <div class="a" >

    <table id="kullanici_table" class="display" style="width:100%">
    <thead>


        <tr>
            <th>ID</th>
            <th>İsim</th>
            <th>Soyisim</th>
            <th>E-posta</th>
            <th>Yetki</th>
            <th>İşlemler</th> <!-- Yeni eklenen sütun -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    </div>
    <!-- Düzenleme Modal'ı -->
<!-- Güncelleme formu -->
<!-- Modal -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    var table = $('#kullanici_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "server.php",
        "columns": [
            { "data": "id" },
            { "data": "isim" },
            { "data": "soyisim" },
            { "data": "email" },
            { "data": "yetki" },
            { "data": null }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
        },
        "paging": true,
        "pageLength": 10
    });

    // Her satıra butonları ekleme
    table.on('draw', function() {
        $('#kullanici_table tbody tr').each(function() {
            var data = table.row(this).data();
            $(this).find('td:last-child').html('<button class="btn-delete" data-id="' + data.id + '">Sil</button>' +
                                               '<button class="btn-update" data-id="' + data.id + '">Güncelle</button>');
        });
    });
    // Her satır için silme butonunu ekleme
    $('#kullanici_table tbody').on('click', '.btn-delete', function() {
        var data = table.row($(this).parents('tr')).data();
        var kullanici_id = data.id;

        // Yetki kontrolü

        var yetkiBilgisi = <?php echo json_encode($kBilgi['yetki']); ?>;
        if (yetkiBilgisi != 1) {
            Swal.fire({
                icon: 'error',
                title: 'Yetkiniz Yok!',
                text: 'Bu işlemi gerçekleştirmek için yeterli yetkiniz yok.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Tamam'
            });
            return; // Yetki yoksa işlemi durdur
        }

        // Silme işlemi için onay al
        Swal.fire({
            icon: 'warning',
            title: 'Emin misiniz?',
            text: 'Kullanıcıyı silmek istediğinizden emin misiniz?',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Silme işlemi için AJAX isteği gönder
                $.ajax({
                    type: "POST",
                    url: "sil.php",
                    data: { id: kullanici_id },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: 'Kullanıcı başarıyla silindi.',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Tamam'
                            });
                            // Silme işlemi başarılı ise tabloyu yenile
                            table.ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: result.error,
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Tamam'
                            });
                        }
                    }
                });
            }
            
        });
    });

    // Her satıra butonları ekleme
    table.on('draw', function() {
        $('#kullanici_table tbody tr').each(function() {
            var data = table.row(this).data();
            $(this).find('td:last-child').html('<button class="btn-delete" data-id="' + data.id + '">Sil</button>' +
                                               '<button class="btn-update" data-id="' + data.id + '">Güncelle</button>');
        });
    });
});

    
</script>


<!-- DATATABLE -->
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

