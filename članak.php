<!DOCTYPE html>
<html lang="en, fr">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title> Moj projekt </title>
</head>

<body>
    <header>
        <div class="logo_naslov">
            <img src="slike/logo_resized.png" alt="logo">
        </div>
        <div class="nav_top">
            <nav>
            <a href="index.php" class="">HOME</a>
                <a href="kategorija.php?kategorija= 'MONDE'" class="">MONDE</a>
                <a href="kategorija.php?kategorija= 'ÉCONOMIE'" class="">ÉCONOMIE</a>
                <a href="login.php" class="">ADMINISTRACIJA</a>
                <a href="registracija.php">REGISTRACIJA</a>
                <a href="unos.php">FORMA</a>
            </nav>
        </div>
    </header>

    <div class="wrapper">
        <?php
            include 'connect.php';
            define('UPLPATH', 'slike/');
        ?>
        <article class="artikl">
            <?php
                $getID = $_GET["id"];
                $query = "SELECT * FROM forma_u_tablici WHERE id = '$getID'";
                
                $result = mysqli_query($dbc, $query) or die("Error querying database");
        
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<h2 class='crveni_naslov'>" . $row['kategorija'] . "</h2>";
                        echo "<h1 class='veliki_naslov'>" . $row['sazetak'] . "</h4>";
                        echo "<p class='pod_naslov'>publié le " . $row['datum'] . " à "  . $row['vrijeme'] . "</p>";
                        echo "<div class='slika_text_wrapper'>";
                        echo '<img class="slika2" src="' . UPLPATH . $row['slika'] . '">';
                        echo '<div class="text_wrapper">';
                        echo "<p class='tekst'>" . $row['tekst'] . "</p>";
                        echo "<p class='tekst1'>" . $row['tekst'] . "</p>";
                        echo "<p class='tekst2'>" . $row['tekst'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } 
                ?>
        </article>
    </div>

    <footer>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>

</body>
</html>