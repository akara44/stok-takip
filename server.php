<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";
$dbname = "stok_takip";
$username = "root"; // kullanıcı adınızı buraya yazın
$password = ""; // şifrenizi buraya yazın

// Veritabanı bağlantısını oluştur
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    die();
}

// DataTable'dan gelen istekleri işle
$columns = array('id', 'isim', 'soyisim', 'email', 'yetki');

// SQL sorgusunu başlat
$sql = "SELECT * FROM kullanici WHERE 1=1";

// DataTable'dan gelen arama parametrelerini işle
if (!empty($_GET['search']['value'])) {
    $searchValue = $_GET['search']['value'];
    $sql .= " AND (id LIKE '%$searchValue%' OR isim LIKE '%$searchValue%' OR soyisim LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR yetki LIKE '%$searchValue%')";
}

// Toplam veri sayısını al
$totalData = $conn->query($sql)->rowCount();

// Sayfalama için gerekli parametreleri al
$start = $_GET['start'] ?? 0; // Kaçıncı kayıttan başlayacağı
$length = $_GET['length'] ?? 10; // Her sayfada kaç kayıt olacağı

// Veritabanından sadece belirli aralıktaki verileri çek
$sql .= " LIMIT $start, $length";

$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach ($results as $row) {
    $data[] = array(
        "id" => $row['id'],
        "isim" => $row['isim'],
        "soyisim" => $row['soyisim'],
        "email" => $row['email'],
        "yetki" => $row['yetki']
    );
}
$data = array();
foreach ($results as $row) {
    $yetki = $row['yetki'];
    switch ($yetki) {
        case '1':
            $yetki_metni = 'Süperadmin';
            break;
        case '2':
            $yetki_metni = 'Admin';
            break;
        case '3':
            $yetki_metni = 'Personel';
            break;
        default:
            $yetki_metni = 'Bilinmeyen';
            break;
    }
    $data[] = array(
        "id" => $row['id'],
        "isim" => $row['isim'],
        "soyisim" => $row['soyisim'],
        "email" => $row['email'],
        "yetki" => $yetki_metni
    );
}

// DataTable'a gönderilecek verileri oluştur
$response = array(
    "draw" => intval($_GET['draw'] ?? 1),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalData),
    "data" => $data
);
  
// DataTable'a verileri JSON formatında gönder
echo json_encode($response);
?>