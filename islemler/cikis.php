<?php
require_once('../config/baglanti.php');
if ($sessionManager->kontrol()) {
    print_r($_COOKIE);
    SessionManager::sessionSil();
    setcookie("giris" ,""  ,time()-96000);
    Helper::yonlendir("/STOK-TAKIP/islemler/giris.php");

}
else {
    Helper::yonlendir("/STOK-TAKIP/islemler/giris.php");
}
?>