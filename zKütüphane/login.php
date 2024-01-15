<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body id="body">

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
        </div>
    </nav>  

    <main class="signup-page">
        <div class="container"> <br>
            <div class="card"> <br>
                <h1 class="signup-title">Hesabana Giriş Yap</h1>
                <form action="operation.php" method="post" class="signup-form">
                    <input type="hidden" name="islem" value="giris">

                    <label for="username">Kullanıcı Adı</label>
                    <input type="text" id="username" name="kullanici_adi" required>

                    <label for="password">Parola</label>
                    <input type="password" id="password" name="parola" required> <br>

                    <button type="submit" name="giris" class="btn btn-primary">Giriş Yap</button>
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