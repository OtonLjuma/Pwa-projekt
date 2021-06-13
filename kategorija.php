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


            <?php
                include 'connect.php';
                define('UPLPATH', 'slike/');
                $kategorija = $_GET['kategorija'];
                $query = "SELECT * FROM forma_u_tablici WHERE  kategorija=$kategorija";
                $counter = 0;
                $result = mysqli_query($dbc, $query) or die("Error querying database");
                echo'<div class="wrapper">';
                while ($row = mysqli_fetch_array($result)) {
                    $counter++;
                    if($counter == 4){
                        echo '<article class="ar2">';               
                    }else{
                        echo '<article class="ar1">';
                    }
                        echo '<img class="slika" src="' . UPLPATH . $row['slika'] . '"';    
                        echo '<h3 class="">';

                        if($counter > 2){
                            echo '<a class="link_clanak2" href="članak.php?id='.$row['id'].'">';
                            echo $row['naslov'];
                            echo '</a></h3>';
                        }
                        else{
                            echo '<a class="link_clanak" href="članak.php?id='.$row['id'].'">';
                            echo $row['naslov'];
                            echo '</a></h3>';
                        }
                        echo '<p class="tekst_index">';
                        echo $row['sazetak'];
                        echo '</p>';
                    echo '</article>';                   
                }
            echo '</div>';
            ?>


    
    <footer>
        <p>Les sites du réseau Groupe L'Express : Food avec Mycuisine.fr</p>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>

</body>
</html>