<?php
session_start();
class Baglanti{
    public $db;
    function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=stok_takip;charset=utf8","root","");
        
    }
}
define("SITE_URL", "http://localhost/STOK-TAKIP/");
require_once "sessionManager.php";
require_once "helper.php";
$baglanti = new Baglanti();
$sessionManager = new SessionManager();

?>