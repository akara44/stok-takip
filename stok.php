<?php 
require_once "template/header.php";
require_once "config/baglanti.php";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="public/css/style.css">

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

<style>
.option {
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
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

<div class="button-container">
    <button id="showFormBtn" class="btm">Ürün Ekle</button>
</div>

<div class="overlay" id="overlay"></div>

<div class="konum" id="formContainer">
    <div class="containe">
        <div class="title">Ürün Ekle</div>
        <div class="content">
            <form method="post" action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Ürün İsmi</span>
                        <input type="text" placeholder="Ürün İsmi Giriniz" name="isim">
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Adedi</span>
                        <input type="text" placeholder="Ürün Adedini Giriniz" name="adet">
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Açıklaması</span>
                        <input type="text" placeholder="Ürünün Açıklamasını Giriniz" name="aciklama" >
                    </div>
                    <div class="input-box">
                        <span class="details">Ürün Fiyatı</span>
                        <input type="number" placeholder="Ürün Fiyatını Giriniz" name="fiyat">
                    </div>
                    <div class="input-box">
                        <span class="details">Ürünün Bakodu</span>
                        <input type="text" placeholder="Ürün Barkodunu Giriniz" name="barkod">
                    </div>
                    <div class="input-box">
                        <span class="details">Kategoriler</span>
                        <select name="kategori" class="option">
                            <option value="Gıda">Gıda</option>
                            <option value="Giyim">Giyim</option>
                            <option value="Spor">Spor</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Oyuncak">Oyuncak</option>
                            <option value="Ev&Temizlik">Ev&Temizlik</option>
                            <option value="Kişisel Bakım">Kişisel Bakım</option>
                            <option value="Kırtasiye">Kırtasiye</option>
                            <option value="Spor">Spor</option>
                        </select>
                    </div>
                </div>
                <div class="yetki-details">
                    <input type="radio" name="magaza" id="sinif-1" value="Battalgazi">
                    <input type="radio" name="magaza" id="sinif-2" value="Yeşilturt">
                    <input type="radio" name="magaza" id="sinif-3" value="Yazıhan">
                    <input type="radio" name="magaza" id="sinif-4" value="Darende">
                    <span class="yetki-title">Mağaza</span>
                    <div class="category">
                        <label for="sinif-1">
                            <span class="sinif one"></span>
                            <span class="yetki">Battalgazi</span>
                        </label>
                        <label for="sinif-2">
                            <span class="sinif two"></span>
                            <span class="yetki">Yeşilyurt</span>
                        </label>
                        <label for="sinif-3">
                            <span class="sinif three"></span>
                            <span class="yetki">Yazıhan</span>
                        </label>
                        <label for="sinif-4">
                            <span class="sinif four"></span>
                            <span class="yetki">Darende</span>
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
            <th>Ürün Adı</th>
            <th>Adet</th>
            <th>Mağaza</th>
            <th>Birim Fiyatı</th>
            <th>Kategori</th>
            <th>Açıklama</th>
            <th>Barkod</th>
            <th>İşlemler</th> <!-- Yeni eklenen sütun -->
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    var table = $('#kullanici_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "server2.php",
        "columns": [
            { "data": "id" },
            { "data": "isim" },
            { "data": "adet" },
            { "data": "magaza" },
            { "data": "fiyat" },
            { "data": "kategori" },
            { "data": "aciklama" },
            { "data": "barkod" },
            { "data": null }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
        },
        "paging": true,
        "pageLength": 8
    });

    // Her satır için silme butonunu ekleme
    $('#kullanici_table tbody').on('click', '.btn-delete', function() {
        var data = table.row($(this).parents('tr')).data();
        var kullanici_id = data.id;

        // Yetki kontrolü

        var yetkiBilgisi = <?php echo json_encode($kBilgi['yetki']); ?>;
        if (yetkiBilgisi != 1 && yetkiBilgisi != 2) {
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
                    url: "sil2.php",
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="  mhttps://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-QOua7eWB6n9tVz6tvKfZ/mJzBW4hS2JYHz2K+GDQPZcHEw3oYIqC/JPbTDMRnCEl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/page.js"></script>

<?php
if ($_POST) {
    $yetki = $kBilgi['yetki'];
    if ($yetki == "1" or $yetki =="2" ) {
        $isim = strip_tags($_POST["isim"]);
        $adet = strip_tags($_POST["adet"]);
        $aciklama = strip_tags($_POST["aciklama"]);
        $fiyat = strip_tags($_POST["fiyat"]);
        $barkod = strip_tags($_POST["barkod"]);
        $kategori = strip_tags($_POST["kategori"]);
        $magaza = strip_tags($_POST["magaza"]);

        if (!empty($isim) && !empty($adet) && !empty($aciklama) && !empty($fiyat) && !empty($barkod) && !empty($kategori) && !empty($magaza) ) {
            $tarih = date("Y-m-d");
            $control = $baglanti->db->prepare("SELECT * FROM urunler WHERE urun_adi = :urun_adi AND urun_magaza = :urun_magaza");
            $control->bindParam(":urun_adi", $isim, PDO::PARAM_STR);
            $control->bindParam(":urun_magaza", $magaza, PDO::PARAM_STR);
            $control->execute();
            $sayi = $control->rowCount();
            if ($sayi == 0) {
                $sorgu = $baglanti->db->prepare("INSERT INTO urunler(urun_adi,urun_stok,urun_aciklama,urun_fiyat,barkod,urun_kategori,urun_magaza) VALUES(?,?,?,?,?,?,?)");
                $ekle = $sorgu->execute([$isim, $adet, $aciklama, $fiyat, $barkod, $kategori, $magaza]);
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
                        title: "Ürün Sistemde Mevcut!",
                        text: "Bu Ürün Bu Mağazada Zaten Mevcut",
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

<?php 
require_once "template/footer.php";
?>