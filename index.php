<?php
require_once 'config/baglanti.php';
require_once 'template/header.php';



if (!$sessionManager->kontrol()){
    helper::yonlendir("/STOK-TAKIP/islemler/giris.php");
    die();
}
$kBilgi = $sessionManager->kullaniciBilgi();
?>
<link rel="stylesheet" href="public/css/index.css">
    <!-- =============== Navigation ================ -->
   
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon">
                        <ion-icon name="fish-sharp"></ion-icon>
                        </span>
                        <span class="title">STOK-TAKİP</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Anasayfa</span>
                    </a>
                </li>

                <li>
                <a href="index.php?git=stoklar">
                        <span class="icon">
                        <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Stoklar</span>
                    </a>
                </li>

                <li>
                <a href="index.php?git=magazalar">
                        <span class="icon">
                        <ion-icon name="storefront-outline"></ion-icon>
                        </span>
                        <span class="title">Mağazalar</span>
                    </a>
                </li>

                <li>
                <a href="index.php?git=kategoriler">
                        <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                        </span>
                        <span class="title">Kategoriler</span>
                    </a>
                </li>

                

                <li>
                <a href="index.php?git=personeller">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Personeller</span>
                    </a>
                </li>
                
                <li>
                <a href="index.php?git=ayarlar">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Ayarlar</span>
                    </a>
                </li>

                <li>
                    <a href="islemler/cikis.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Çıkış Yap</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Ara">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <?php 
            if (@$_GET["git"]){
              $a = @$_GET["git"];// @ isareti hatayı gosterme anlaminda
 switch ($a){
	 
	 case "personeller":            // gete eitse
	 include ("personeller.php");   //çağrılan sayfa
	 break;                   //olayı sonlandırmak

   case "stoklar":            // gete eitse
    include ("stok.php");   //çağrılan sayfa
    break;                   //olayı sonlandırmak
 
    case "kategoriler":            // gete eitse
      include ("kategoriler.php");   //çağrılan sayfa
      break;                   //olayı sonlandırmak

      case "ayarlar":            // gete eitse
        include ("ayarlar.php");   //çağrılan sayfa
        break;                   //olayı sonlandırmak
     
        case "magazalar":            // gete eitse
          include ("magazalar.php");   //çağrılan sayfa
          break; 

        //   case "sil":            // gete eitse
        //     include ("sil.php");   //çağrılan sayfa
        //     break;    

 
	 }
            }
            else {
              echo '<div class="cardBox">
              <div class="card">
                  <div>
                      <div class="numbers">3504</div>
                      <div class="cardName">Ürünler</div>
                  </div>
                  <div class="iconBx">
                  <ion-icon name="cart-outline"></ion-icon> 
                  </div>
              </div>

                <div class="card">
                <div>
                    <div class="numbers">1453</div>
                    <div class="cardName">Mağazalar</div>
                </div>
                <div class="iconBx">
                <ion-icon name="storefront-outline"></ion-icon>
                </div>
            </div>

                <div class="card">
                  <div>
                      <div class="numbers">80</div>
                      <div class="cardName">Kategoriler</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="grid-outline"></ion-icon>
                  </div>
              </div>

              <div class="card">
                  <div>
                      <div class="numbers">7</div>
                      <div class="cardName">Personeller</div>
                  </div>

                  <div class="iconBx">
                  <ion-icon name="people-outline"></ion-icon>
                  </div>
              </div>
          </div>';
            }
            ?>
        
    <!-- =========== Scripts =========  -->
    <script src="assets/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php
require_once 'template/footer.php';
?>