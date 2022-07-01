<?php
require_once "config.php";



$title = isset($_GET["title"]); 
$date = date("l d.m.y");
$message = isset($_GET["message"]); 
$image = isset($_GET["image"]); 
     

$sql = "SELECT * FROM news ORDER BY id DESC";


$result = $connection->query($sql);
$connection->close(); 


?>
<!-- ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣀⣀⣀⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠋⠉⠉⠉⠙⠛⠻⢶⣤⡀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡾⠁⠀⠀⠀⠀⠀⠀⠀⠀⠈⢻⡆⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣀⣀⣠⣴⠟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡟⠁⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣠⣴⠶⠟⠛⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢰⡟⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣠⣴⠾⠛⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠁⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡶⠛⠛⠋⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣴⠟⠁⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣰⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣴⠞⠋⠀⠀⠀⠀⣠⣴⠶⠶⣦⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡿⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢿⣄⣀⣀⣤⡴⠟⠋⠀⠀⠀⠘⣷⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣰⠟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢰⣟⠉⠙⢷⣄⠀⠀⠀⠀⠀⠀⠘⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⠏⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⣷⡀⠀⠹⣧⡀⠀⠀⠀⠀⠀⣼⠃⠀⠀⠀⠀⠀⠀⠀⢀⣾⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⣷⡀⠀⠈⠛⣷⣤⣴⠶⠟⠃⠀⠀⠀⠀⠀⠀⠀⢀⣾⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⣷⡀⠀⠀⠈⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⢷⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⠻⠟⠛⣻⡿⠀⠀⠀⠀⠀⢀⣤⡾⠛⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡾⠋⠀⠀⠀⠀⢀⣴⠟⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣴⠟⠀⠀⠀⠀⣠⣾⡿⠁⢀⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⠏⠀⠀⠀⢀⡾⢫⣿⠁⠀⣼⠇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡾⠃⠀⠀⢀⣴⠟⢡⡟⣿⠀⠀⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣰⠟⠁⠀⠀⣰⠟⠁⢠⡿⠀⢿⡄⢰⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⠏⠀⠀⢠⣾⠋⠀⢀⡿⠁⠀⠈⠛⠿⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⡏⠀⠀⣴⢿⡟⠀⠀⣾⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⢷⣄⣾⠋⠘⣧⡀⢰⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠁⠀⠀⠈⠛⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ -->
<!DOCTYPE html>
<html lang="pl">

<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KV5ZKCB');</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pogserv - Aktualności</title>
<meta name="description"
    content="PogServ - serwer minecraft survival z dodatkiem drobnych urozmaiceń. U nas gracze wpływają na to co się będzie znajdowało na serwerze - Aktualności">
<link rel="icon" href="./favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/ae296f2128.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="dist/css/news.min.css">
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KV5ZKCB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="preloader">
        <img src="dist/img/PogServeBlank.webp" alt="logo pogserv">
    </div>


    <nav class="nav">
        <div class="wrapper">

            <a href="/" class="logo-link">
                <div class="nav-logo"></div>
            </a>
            <div class="mobile-menu">
                <div class="hamburger">
                    <div class="line"></div>
                </div>
            </div>
            <div class="nav-links">
                <div class="nav-dragon"></div>
                <div class="nav-links-box">
                    <a href="/">Home</a>
                    <a href="news.php">Aktualności</a>
                    <a href="http://s988407.csrv.pl:8100/#world:-691:0:6:1125:0:0:0:1:flat" target="_blank">Mapa</a>
                    <!-- <a href="#">Blog</a> -->
                    <a href="/#contact">Kontakt</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="wrapper">
            <div class="header__text">
                <div>
                    <h1>Pog<span>News</span><span class="span-two">Najważniejsze info!</span></h1>
                </div>
                <div class="header-image"></div>
            </div>
        </div>
        <div class="header-wave">
            <a href="#postcards" class="scroll-down-btn">
                <div class="mouse_scroll">
                    <div class="mouse">
                        <div class="wheel"></div>
                    </div>
                    <div class="m_scroll">
                        <span class="m_scroll_arrows one"></span>
                        <span class="m_scroll_arrows two"></span>
                        <span class="m_scroll_arrows three"></span>
                    </div>
                </div>
            </a>
        </div>
    </header>

    <div class="wrapper" id="postcards">

    <?php   
    while($rows=$result->fetch_assoc()) 
    {              
    ?>


            <article class="postcard dark blue" >

                <img class="postcard__img" src="<?php echo $rows['image'];?>" alt="Zdjęcie do newsa" />

                <div class="postcard__text">
                    <h3 class="postcard__title blue"><?php echo $rows['title'];?></h3>
                    <div class="postcard__subtitle small">
                        <div>
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <?php echo $rows['date'];?>
                        </div>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><?php echo $rows['message'];?></div>
                </div>
            </article>


    <?php
    }
    ?>

    </div>

    <button class="copy-ip">
        <i class="fa-solid fa-copy"></i>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
        <div class="tooltip-left">
            <p class="tooltip-text">Skopiuj IP serwera</p>
            <i class="tooltip-arrow"></i>
        </div>
    </button>

    <footer class="footer" id="footer">
    <div class="wrapper">

        <div class="footer__info">
            <span><a href="#" class="link">Do góry</a></span>
            <span class="copy-ip-footer"><span class="link" title="Skopiuj IP">Kopiuj IP</span></span>
            <span><a href="/" class="link">Home</a></span>
            <span><a href="http://s988407.csrv.pl:8100/#world:-691:0:6:1125:0:0:0:1:flat" class="link" target="_blank">Mapa</a></span>
            <span><a href="news.php" class="link">Newsy</a></span>
            <span><a href="index.html#contact" class="link">Kontakt</a></span>

        </div>

        <div class="footer__socials">
            <a href=""><i class="fa-solid fa-envelope-circle-check"></i></a>
            <a href="https://discord.gg/8sEPx4yq3f" target="_blank"><i class="fa-brands fa-discord"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
        </div>

        <div class="footer__bottom">
            <!-- <p class="footer__bottom__privacy"><a href="policy-privacy.html" class="link">Polityka prywatności</a></p> -->
            <p class="footer__bottom__copyrights">Copyright &copy; <span id="current-year">2022</span> PogServ</p>
        </div>

    </div>
</footer>


    <div class="js-err-clear">
        <div class="contact-discord" style="display: none;"></div>
        <div class="live-map" style="display: none; opacity: 0;"></div>
        <div class="header__hero" style="display: none;">
            <div class="logo" style="display: none;"></div>
        </div>
    </div>

    <script src="dist/js/discord-widget.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script></script>
    <script src="dist/js/main.min.js"></script>
</body>

</html>