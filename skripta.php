 <!DOCTYPE html>
 <html lang="en, fr">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title> Moj projekt </title>
</head>

<body>

    <?php 
            if (isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $datum = $_POST['datum'];
                $vrijeme = $_POST['vrijeme'];
                $sazetak = $_POST['about'];
                $sadrzaj = $_POST['content'];
                $slika = $_POST['pphoto'];
                $opcija = $_POST['category'];
            }
    ?>
    <header>
        <div class="logo_naslov">
            <img src="slike/logo_resized.png" alt="logo">
        </div>
        <div class="nav_top">
            <nav>
                <a href="index.php" class="">HOME</a>
                <a href="kategorija.php?category=MONDE" class="">MONDE</a>
                <a href="kategorija.php?category=ÉCONOMIE" class="">ÉCONOMIE</a>
                <a href="administracija.php" class="">ADMINISTRACIJA</a>
                <a href="#">OFFRES LOCALES</a>
                <a href="unos.html">FORMA</a>
            </nav>
        </div>
    </header>

    <div class="wrapper">
        <article class="artikl">

            <h2 class="crveni_naslov">
                <?php 
                    echo $opcija; 
                ?>
            </h2>
            <h1 class="veliki_naslov">
                <?php 
                    echo $title; 
                ?>
            </h1>
            <p class="pod_naslov">publié le 
                <?php 
                    echo $datum; 
                ?>
                à
                <?php 
                    echo $vrijeme; 
                ?>
            </p>
            <div class="slika_text_wrapper">
            <?php echo "<img src='slike/$slika' class='slika2'>";?>
                <div class="text_wrapper">
                    <p class="text1">
                        <?php 
                            echo $sazetak; 
                        ?>
                    </p>
                    <p class="text1">
                    <?php 
                        echo $sadrzaj;
                    ?>
                    </p>
                </div>
            </div>
        </article>
    </div>

    <footer>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>
</body>
</html>
