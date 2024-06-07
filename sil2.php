<?php
$host = "localhost";
$dbname = "stok_takip";
$username = "root"; // kullanıcı adınızı buraya yazın
$password = ""; // şifrenizi buraya yazın

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $kullanici_id = $_POST['id'];
    // Silme işlemini gerçekleştir
    $stmt = $conn->prepare("DELETE FROM urunler WHERE id = :id");
    $stmt->bindParam(':id', $kullanici_id);
    $stmt->execute();
    // İşlem başarılı olduğunda JSON yanıtı gönder
    echo json_encode(array('success' => true));
} else {
    // Geçersiz istek durumunda hata yanıtı gönder
    // echo json_encode(array('error' => 'Geçersiz istek'));
}
?>