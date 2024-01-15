<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İşlem Sayfası</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        if (isset($_POST['islem'])) {
            // ekle - güncelle Bölümü
            switch ($_POST['islem']) {
                // Kayıt İşlemi
                case 'kayit':
                    $ad_soyad = $_POST['ad_soyad'];
                    $kullanici_adi = $_POST['kullanici_adi'];
                    $email = $_POST['email'];
                    $parola = password_hash($_POST['parola'], PASSWORD_DEFAULT);
                    $ekle = $db->prepare("INSERT INTO kullanicilar (ad_soyad, kullanici_adi, email, parola) VALUES (?, ?, ?, ? )");        

                    try {
                        $ekle->execute(array($ad_soyad, $kullanici_adi, $email, $parola));  ?>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: "success", title: "Kayıt İşlemi Başarılı",
                                showConfirmButton: false, timer: 900
                            });
                        </script> <?php
                    } catch (Exception $a) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: "error", title: "Kayıt İşlemi Başarısız",
                                showConfirmButton: false, timer: 900
                            });
                        </script> <?php
                    }
                    header('Refresh:1; url=index.php');
                    break;

                // Giriş İşlemi
                case 'giris':
                    $kullanici_adi = $_POST['kullanici_adi'];
                    $parola = $_POST['parola'];

                    $sorgu = $db->prepare("SELECT kullanicilar.kullanici_adi, yetkiler.ad
                        FROM kullanicilar 
                        INNER JOIN yetkiler 
                        ON kullanicilar.yetki_id = yetkiler.id
                        WHERE kullanici_adi = ? || parola = ?");
                    $sorgu->execute([$kullanici_adi, $parola]);

                    $say = $sorgu->rowCount();
                        if ($say==1) { 
                            $_SESSION['kullanici_adi'] = $kullanici_adi; ?>
                                <script type="text/javascript">
                                    Swal.fire({
                                        position: "top-center", icon: "success",
                                        title: "Giriş İşlemi Başarılı",
                                        showConfirmButton: false, timer: 900
                                    });
                                </script> <?php
                        }
                        else {?>
                            <script type="text/javascript">
                                Swal.fire({
                                    position: "top-center", icon: "error",
                                    title: "Giriş İşlemi Başarısız",
                                    showConfirmButton: false, timer: 900
                                });
                            </script>
                    <?php  }
                    header('Refresh:1; url=index.php');            
                    break;

                // Kitap Ekleme
                case 'kitap_ekle':
                    $kitap_ad = $_POST['kitap_ad'];
                    $yazar_adi = $_POST['yazar_adi'];
                    $yayinevi = $_POST['yayinevi'];
                    $tur_id = $_POST['tur'];
                    $stok = $_POST['stok'];
                    $durum = (isset($_POST['durum'])) ? 1 : 0;
                    $sorgu = $db->prepare("INSERT INTO kitaplar (kitap_ad, yazar_adi, yayinevi, tur_id, stok, durum) VALUES (?, ?, ?, ?, ?, ? )");
                    try {
                        $sorgu->execute(array($kitap_ad, $yazar_adi, $yayinevi, $tur_id, $stok, $durum));
                    ?> 
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "success", title: "Kitap Ekleme Başarılı",
                            showConfirmButton: false, timer: 900
                        });
                    </script>
                    <?php
                    } catch (Exception $a) {
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "error", title: "Kitap Ekleme Başarısız",
                            showConfirmButton: false, timer: 900
                        });
                    </script>
                    <?php
                    }
                    header('Refresh:1; url=books.php');
                    break;

                // Kitap Türü Ekleme
                case 'tur_ekle':
                    $tur_adi = $_POST['tur_adi'];
                    $tur_aciklama = $_POST['tur_aciklama'];
                    $sorgu = $db->prepare("INSERT INTO turler (tur_adi, tur_aciklama) VALUES (?, ? )");
                    try {
                        $sorgu->execute(array($tur_adi, $tur_aciklama));
                    ?> 
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "success", title: "Kitap Türü Ekleme Başarılı",
                            showConfirmButton: false, timer: 900
                        });
                    </script>
                    <?php
                    } catch (Exception $a) {
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                            icon: "error", title: "Kitap Türü Ekleme Başarısız",
                            showConfirmButton: false, timer: 900
                        });
                    </script>
                    <?php
                    } 
                    header('Refresh:1; url=books_category.php');
                    break;
                    
                // Kitap Güncelleme
                case 'kitap_guncelle':
                    $id = $_POST['id'];
                    $kitap_ad = $_POST['kitap_ad'];
                    $yazar_adi = $_POST['yazar_adi'];
                    $yayinevi = $_POST['yayinevi'];
                    $durum = isset($_POST['durum']) ? 1 : 0;
                    $tur_id = $_POST['tur_id'];
                
                    $sorgu = $db->prepare("UPDATE kitaplar SET kitap_ad=?, yazar_adi=?, yayinevi=?, durum=?, tur_id=? WHERE id=?");
                    $guncelle = $sorgu->execute(array($kitap_ad, $yazar_adi, $yayinevi, $durum, $tur_id, $id));
                    header('Refresh:1; url=books.php');
                    ?>
                    <?php if ($guncelle) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "success",
                                title: "Güncelleme İşlemi Başarılı",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php } else { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "error",
                                title: "Güncelleme İşlemi Başarısız",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php }
                    break;
                // Kitap Türü Güncelleme
                case 'tur_guncelle':
                    $id = $_POST['id'];
                    $tur_adi = $_POST['tur_adi'];
                    $tur_aciklama = $_POST['tur_aciklama'];
                    $durum = isset($_POST['durum']) ? 1 : 0;
    
                    $sorgu = $db->prepare("UPDATE turler SET tur_adi=?, tur_aciklama=?, durum=? WHERE id=?");
                    $guncelle = $sorgu->execute(array($tur_adi, $tur_aciklama, $durum, $id));
                    header('Refresh:1; url=books_category.php');
                    ?>
                    <?php if ($guncelle) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "success",
                                title: "Güncelleme İşlemi Başarılı",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php } 
                        else { ?>
                            <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "error",
                                title: "Güncelleme İşlemi Başarısız",
                                showConfirmButton: false, timer: 900
                            });
                    </script>
                    <?php  }
                    break;

                default:
                    break;
            }
        }
        // Silme İşlemleri
        if (isset($_GET['islem']) && isset($_GET['id'])) {
            $_GET['islem'];
            $id = $_GET['id'];
            switch ($_GET['islem']) {
                // kitap sil
                case 'kitap_sil':
                    $sorgu = $db->prepare("DELETE FROM kitaplar WHERE id = ?");
                    $sil = $sorgu->execute(array($id));
                    header('Refresh:1; url=books.php');
                    if ($sil) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "success",
                                title: "Kitap Silme İşlemi Başarılı",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php } 
                        else { ?>
                            <script type="text/javascript">
                                Swal.fire({
                                    position: "top-center", icon: "error",
                                    title: "Kitap Silme İşlemi Başarısız",
                                    showConfirmButton: false, timer: 900
                                });
                            </script>
                    <?php  }
                    break;

                // kitap türü sil
                case 'kitap_tur_sil':
                    $sorgu = $db->prepare("DELETE FROM turler WHERE id = ?");
                    $sil = $sorgu->execute(array($id));
                    header('Refresh:1; url=books_category.php');
                    if ($sil) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "success",
                                title: "Kitap Türü Silme İşlemi Başarılı",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php } 
                        else { ?>
                            <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "error",
                                title: "Kitap Türü Silme İşlemi Başarısız",
                                showConfirmButton: false, timer: 900
                            });
                    </script>
                    <?php  }
                    break;

                // Kullanıcı sil
                case 'users_sil':
                    $sorgu = $vt->prepare("DELETE FROM kullanicilar WHERE id = ?");
                    $sil = $sorgu->execute(array($id));
                    header('Refresh:1; url=users.php');
                    if ($sil) { ?>
                        <script type="text/javascript">
                            Swal.fire({
                                position: "top-center", icon: "success",
                                title: "Kullanıcı Silindi",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                    <?php } 
                    else { ?>
                        <script type="text/javascript">
                        Swal.fire({
                            position: "top-center", icon: "error",
                            title: "Kullanıcı Silinemedi",
                            showConfirmButton: false, timer: 900
                        });
                        </script>
                    <?php  }
                    break;

                // Çıkış Yapma
                case 'cikis_yap':
                    session_destroy(); ?>
                    <script type="text/javascript">
                        Swal.fire({
                            position: "top-center", icon: "success",
                            title: "Çıkış İşlemi Başarılı",
                            showConfirmButton: false, timer: 900
                        });
                    </script> <?php
                    header('Refresh:1; url=index.php');
                    break;

                default:
                    break;
            }
        }
        // Kitap Alma-Verme İşlemleri
        if (isset($_GET['islem']) && isset($_GET['kitap_id']) && isset($_GET['kullanici_id'])) {
            $kitap_id = $_GET['kitap_id'];
            $kullanicilar_id = $_GET['kullanici_id'];
            switch ($_GET['islem']) { 
                // Kitap Verme işlemi
                case 'kitap_ver':
                    $sorgu = $db->prepare("INSERT INTO islemler (kullanici_id, kitap_id) VALUES (?, ?)");
                    try {
                        $sonuc = $sorgu->execute(array($kullanicilar_id, $kitap_id));
                        // execute başarılı oldu mu kontrol et
                        if ($sonuc) {
                            // Stok azaltma ve kitap izin güncelleme sorguları
                            $db->exec("UPDATE kitaplar SET stok=stok-1 WHERE id=$kitap_id");
                            $db->exec("UPDATE kullanicilar SET kitap_izin = 0 WHERE id=$kullanicilar_id"); ?>
                            <script type="text/javascript">
                                Swal.fire({
                                    icon: "success", title: "Kitap Kullanıcıya Verildi",
                                    showConfirmButton: false, timer: 900
                                });
                            </script> <?php
                        } else {
                            throw new Exception('execute başarısız');
                        }
                    } catch (Exception $a) {
                        ?>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: "error", title: "Bir Hata Oluştu!",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                        <?php } 
                    // Hata oluşsa bile Refresh header'ını çalıştır
                    header('Refresh:1; url=books.php');
                    break;

                // Kitap Geri Alma işlemi
                case 'kitap_al':
                    $islem_id = $_GET['islem_id'];
                    $sorgu = $db->prepare("UPDATE islemler SET durum = 1 WHERE id = ?");
                    try {
                        $sonuc = $sorgu->execute(array($islem_id));
                        // execute başarılı oldu mu kontrol et
                        if ($sonuc) {
                            // Stok arttırma ve kitap izin güncelleme sorguları
                            $db->exec("UPDATE kitaplar SET stok=stok+1 WHERE id=$kitap_id");
                            $db->exec("UPDATE kullanicilar SET kitap_izin = 1 WHERE id=$kullanicilar_id"); ?>
                            <script type="text/javascript">
                                Swal.fire({
                                    icon: "success", title: "Kitap Kullanıcıdan Geri Alındı",
                                    showConfirmButton: false, timer: 900
                                });
                            </script> <?php
                        } else {
                            throw new Exception('execute başarısız');
                        }
                    } catch (Exception $a) {
                        ?>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: "error", title: "Bir Hata Oluştu!",
                                showConfirmButton: false, timer: 900
                            });
                        </script>
                        <?php } 
                    // Hata oluşsa bile Refresh header'ını çalıştır
                    header('Refresh:1; url=book_back.php');
                    break;
                default:
                    break;
            }
        }
    ?>
</body>
</html>