<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Anasayfa</title>
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

    <!-- header -->
    <header id="header">
        <div class="container">
            <div class="header-container">
                <div class="header-content">
                    <div class="category bg-secondary">Fantastik</div>
                    <h1>Fantastik Kitaplar</h1>
                    <p class="mb-4">Gerçek dünyanın sınırlarını aşarak okuyucuları büyülü dünyalara taşıyan eserlerdir. Bu tür, mitolojik unsurlar, büyü, efsanevi varlıklar ve benzersiz coğrafyalarla dolu zengin dünyaları içerir.</p>
                    <a href="#" class="btn btn-primary">Daha Fazlası</a>
                </div>
            </div>
        </div>
    </header>

    <!-- articles -->
    <section id="main-articles" class="py-2">
        <div class="container">
            <h2>Kitaplar</h2>
            <div class="articles-container">
                <article class="card">
                    <img src="./img/hp-felsefetasi.jpg" alt="">
                    <div>
                        <div class="category bg-secondary">Fantastik</div>
                        <h3><a href="#">Harry Potter ve Felsefe Taşı</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
                <article class="card">
                    <img src="./img/indir.jpeg" alt="">
                    <div>
                        <div class="category bg-primary">Korku</div>
                        <h3><a href="#">Korku Ağı</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
                <article class="card">
                    <img src="./img/platon.jpg" alt="">
                    <div>
                        <div class="category bg-secondary">Felsefe</div>
                        <h3><a href="#">Sokrates'in Savunması</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
                <article class="card">
                    <img src="./img/anna.jpg" alt="">
                    <div>
                        <div class="category bg-secondary">Romantik</div>
                        <h3><a href="#">Anna Karenina</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
                <article class="card">
                    <img src="./img/sonakalan.jpg" alt="">
                    <div>
                        <div class="category bg-primary">Polisiye</div>
                        <h3><a href="#">Sona Kalan - Bir Rizzoli ve Isles Macerası</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
                <article class="card">
                    <img src="./img/türkler.jpg" alt="">
                    <div>
                        <div class="category bg-secondary">Tarihi Roman</div>
                        <h3><a href="#">Şu Çılgın Türkler</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsa ad quidem officiis odit incidunt.</p>
                    </div>                   
                </article>
            </div>
        </div>
    </section>

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