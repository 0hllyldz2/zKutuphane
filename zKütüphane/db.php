<?php
session_start();

$host = 'localhost';
$dbname = 'zkutuph2_zkutuphane';
$username= 'zkutuph2_zkutuph2';
$password= 'Sahmeran.12';
$charset = "utf8";

$dbn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);

try {
    // Veritabanı bağlantısı
    $db = new PDO($dbn, $username, $password, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Veritabanına başarıyla bağlandı.';
} catch (PDOException $e) {
    // Hata durumunda hata mesajını göster
    echo 'Veritabanına bağlantı hatası: ' . $e->getMessage();
}
?>