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
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Kitaplar</title>
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

   <section id="articles">
       <div class="container">
           <div class="page-container">
               <article id="article" class="card">
                   <img src="./img/hp-felsefetasi.jpg" alt="">
                   <h1>Lorem ipsum dolor sit amet.</h1>
                   <div class="meta">
                       <small>
                           <i class="fas fa-user"></i> Yazarı J.K Rowling
                       </small>
                       <div class="category bg-primary">Fantastik</div>
                   </div>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea error pariatur ipsam sed eum, fugit quaerat ullam voluptates reprehenderit minima veritatis nisi qui laboriosam fuga alias quas placeat. Voluptatem, necessitatibus!</p>
                   <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel laudantium similique amet sit. Necessitatibus in, exercitationem facilis saepe nihil, tempore tempora dicta natus unde, illo minus quasi similique velit laboriosam a sed. Aperiam temporibus ipsa molestiae necessitatibus iste tempora! Similique voluptatibus quibusdam, eos quia atque error ea commodi tempore molestias, quas sint totam dolore fuga a inventore est soluta aliquid, amet possimus sunt? Necessitatibus voluptatibus doloremque corrupti dolore incidunt voluptatem et harum impedit minus aliquid voluptas molestias aspernatur ex repellat itaque iure, illum unde veniam! Ab maiores veritatis praesentium, corrupti nihil nulla magnam optio architecto sed odio omnis autem a, culpa iure? Commodi facilis ipsum repellat quisquam tempora, eaque non totam laboriosam sed sequi minus enim asperiores mollitia adipisci exercitationem rerum doloribus at repudiandae itaque atque. Neque exercitationem similique perspiciatis, laborum dolore animi quia dolores odit nobis ratione laudantium distinctio id laboriosam in pariatur? Deleniti tempora hic quia, similique dolorem earum at rerum necessitatibus eos numquam doloremque maiores modi quis praesentium voluptatum non vel optio? Fugiat, hic! Culpa, dicta fugit! Quisquam repellat enim consectetur quidem quasi dolor deserunt quae assumenda veritatis voluptate libero minus laborum aut dolorem excepturi eaque suscipit numquam neque, deleniti commodi? Omnis aliquid iusto officia repudiandae sequi!</p>
                   <p>
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quis provident veritatis recusandae hic ea, perferendis quas blanditiis consequuntur at corrupti amet, sapiente beatae sint aliquid vero. Obcaecati dolore dignissimos et praesentium, aliquam aut, dolorum molestiae ad, dolorem esse quasi vel tempora vero ipsum odio saepe deleniti. Amet quidem soluta alias voluptatem consequatur dicta totam. Eum fugiat aspernatur autem excepturi similique consequuntur eaque, quibusdam rem dicta voluptate? Delectus enim natus iusto incidunt perspiciatis sunt aspernatur voluptatibus veritatis consequuntur! Natus et, animi id ipsa beatae incidunt laudantium quisquam commodi, explicabo porro voluptatum fugiat. Nihil tenetur consequuntur et, omnis iusto dignissimos nemo.
                   </p>
               </article>
               <aside class="card bg-secondary">
                   <h2>Bize Katıl</h2>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis iusto at modi perspiciatis excepturi eaque!</p>
                   <a href="#" class="btn btn-dark btn-block">Join Now</a>
               </aside>
               <aside id="categories" class="card">
                   <h2>Katagoriler</h2>
                   <ul>
                       <li><a href="#"><i class="fas fa-chevron-right"></i>Fantastik</a></li>
                       <li><a href="#"><i class="fas fa-chevron-right"></i>Gerilim</a></li>
                       <li><a href="#"><i class="fas fa-chevron-right"></i>Polisiye</a></li>
                   </ul>
               </aside>
           </div>
       </div>
   </section>

    <!-- footer -->
    <footer id="main-footer" class="py-2">
        <div class="container footer-container">
            <div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum reiciendis provident maiores excepturi nisi perferendis tenetur quos tempore corporis repudiandae!
                </p>
            </div>
            <div>
                <h3>Bize Katılın!</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, distinctio!</p>
                <form action="">
                    <input type="email" name="" id="" placeholder="Enter email">
                    <input type="submit" value="Subscribe" class="btn btn-primary">
                </form>
            </div>
            <div>
                <h3>Links</h3>
                <ul>
                    <li><a href="">Yardım ve Şikayet</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Hakkımızda</a></li>
                    <li><a href="">Kitaplar</a></li>
                </ul>
            </div>
            <div>
                <h3>Follow Us</h3>
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