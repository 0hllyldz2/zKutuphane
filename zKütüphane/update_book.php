<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Kitap Güncelle</title>
    
</head>
<body>
    <!-- navbar -->
    <nav id="main-nav" class="nav">
        <div class="container">
            <h2>zKütüphane</h2>
            <ul>
                <li><a class="active" href="index.php">Anasayfa</a></li>
                <li class="menu"><a href="book.php">Kitaplar Bölümü</a>
                    <div class="acilir-menu">
                        <a href="books.php">Kitaplar</a>
                        <a href="book_add.php">Kitap Ekle</a>
                        <a href="book_back.php">Kitap Geri Alma</a>
                    </div>
                </li>
                <li class="menu"><a href="category.php">Türler Bölümü</a>
                    <div class="acilir-menu">
                        <a href="books_category.php">Türler</a>
                        <a href="category_add.php">Tür Ekle</a>
                    </div>
                </li>
                <li><a href="users.php">Üyeler</a></li>
            </ul>
            <?php if($_SESSION) { 
                //Kullanıcı Girişi Yapıldı. ?>
                <ul class="main-nav__items">
                    <li><a href="#">Merhaba, <?=$_SESSION['kullanici_adi'] ?></a></li>
                    <li class="main-nav__item main-nav__item--login">
                        <a class="btn btn-secondary" href="operation.php?islem=cikis_yap&id=0000">Çıkış Yap</a>
                    </li>
                </ul> <?php
            }
            else { 
                //Kullanıcı Girişi Yapılmadı. ?>
                <ul class="main-nav__items">
                    <li class="main-nav__item main-nav__item--login">
                        <a class="btn btn-secondary" href="register.php">Kayıt Ol</a>
                    </li>
                    <li class="main-nav__item main-nav__item--login">
                        <a class="btn btn-secondary" href="login.php">Giriş Yap</a>
                    </li>
                </ul> <?php
            }
            ?>
        </div>
    </nav>

    <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kitap = $db->query("SELECT * FROM kitaplar WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    } ?>

    <div class="container mt-5">
            <div class="card"> <br>
                <h1 class="signup-title">Kitap Güncelle</h1>
                <form action="operation.php" method="post" class="signup-form">
                    <input type="hidden" name="islem" value="kitap_guncelle"> 
                    <input type="hidden" name="id" value="<?=$kitap['id'];?>"><br>

                    <Label>Kitap ID</Label>
                    <input type="text" class="form-control" name="id" value="<?=$kitap['id'];?>" disabled>

                    <Label>Kitap Adı</Label>
                    <input type="text" class="form-control" name="kitap_ad" value="<?=$kitap['kitap_ad'];?>" required>

                    <Label>Yazar Adı</Label>
                    <input type="text" class="form-control" name="yazar_adi" value="<?=$kitap['yazar_adi'];?>" required>

                    <Label>Yayınevi</Label>
                    <input type="text" class="form-control" name="yayinevi" value="<?=$kitap['yayinevi'];?>" required>

                    <Label>Kitabın Türü</Label>
                    <?php $kitapturleri = $db->query("SELECT * FROM turler")->fetchAll(PDO::FETCH_ASSOC); ?>
                    <select class="form-control" name="tur_id">
                        <option value="0">Kitap Türü</option>
                        <?php foreach ($kitapturleri as $kitap_turu) { ?>
                                <option value="<?=$kitap_turu['id'];?>"
                                    <?=($kitap['tur_id']==$kitap_turu['id']) ? 'selected' : ''; ?>
                                >
                                    <?= $kitap_turu['tur_adi'];?>
                                </option>
                            <?php } ?>
                    </select>

                    <Label>Kitap Durumu</Label>
                    <input type="checkbox" name="durum" <?php echo ($kitap['durum'] == 1) ? 'checked' : ''; ?>><br><br>

                    <button class="btn btn-success">Kitabı Güncelle</button> <br><br>
                </form>
            </div>  
        </div>
        <div><br><br></div>
    </main>

    <!-- footerr -->
    <footer id="main-footer" class="py-2">
        <div class="container footer-container">
            <div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum reiciendis provident maiores excepturi nisi perferendis tenetur quos tempore corporis repudiandae!
                </p>
            </div>
            <div>
                <h3>Join Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, distinctio!</p>
                <form action="">
                    <input type="email" name="" id="" placeholder="Enter email">
                    <input type="submit" value="Subscribe" class="btn btn-primary">
                </form>
            </div>
            <div>
                <h3>Linkler</h3>
                <ul>
                    <li><a href="">Yardım ve Şikayet</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Hakkımızda</a></li>
                    <li><a href="">Kitaplar</a></li>
                </ul>
            </div>
            <div>
                <h3>Bizi Takip Edin</h3>
                <div>
                    <a href=""><i class="fab fa-facebook fa-2x"></i></a>
                    <a href=""><i class="fab fa-twitter fa-2x"></i></a>
                    <a href=""><i class="fab fa-instagram fa-2x"></i></a>
                    <a href=""><i class="fab fa-youtube fa-2x"></i></a>
                </div>
            </div>
            <div>
                <p>Copyright &copy; 2024, All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>