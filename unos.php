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
        include 'connect.php';

        if (isset($_POST['submit']))
        {
            $picture = $_FILES['pphoto']['name'];
            $title = $_POST['title'];
            $datum = $_POST['datum'];
            $vrijeme = $_POST['vrijeme'];
            $sazetak = $_POST['about'];
            $sadrzaj = $_POST['content'];
            $opcija = $_POST['kategorija'];

            if(isset($_POST['archive'])){
                $archive=1;
            }
            else{
                $archive=0;
            }

            $target_dir = 'img/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

            $query = "INSERT INTO forma_u_tablici (naslov, datum, vrijeme, tekst, sazetak, slika, kategorija, 
            arhiva ) VALUES ('$title', '$datum', '$vrijeme', '$sadrzaj', '$sazetak', '$picture', '$opcija', '$archive')";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');

        }
        mysqli_close($dbc);
    ?> 

    <header>
        <div class="logo_naslov">
            <img src="slike/logo_resized.png" alt="logo">
        </div>
        <div class="nav_top">
            <nav>
            <a href="index.php" class="">HOME</a>
                <a href="kategorija.php?kategorija= 'MONDE'" class="">MONDE</a>
                <a href="kategorija.php?kategorija='ÉCONOMIE'" class="">ÉCONOMIE</a>
                <a href="login.php" class="">ADMINISTRACIJA</a>
                <a href="registracija.php">REGISTRACIJA</a>
                <a href="unos.php">FORMA</a>
            </nav>
        </div>
    </header>

    <div class="wrapper">
        <form enctype="multipart/form-data" action="unos.php" method="POST" class="artikl">    
            <div class="form-item">
                <span id="porukaTitle" class="bojaPoruke"></span>
                <label for="title">Naslov vijesti</label>
                <div class="form-field">
                    <input type="text" name="title" id="title" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="datum" class="bojaPoruke"></span>
                <label for="datum">Datum</label>
                <div class="form-field">
                    <input type="date" name="datum" id="datum" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="vrijeme" class="bojaPoruke"></span>
                <label for="vrijeme">Vrijeme</label>
                <div class="form-field">
                    <input type="time" name="vrijeme" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaAbout" class="bojaPoruke"></span>
                <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
                <div class="form-field">
                    <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
            </div>
            <div class="form-item">
                <span id="porukaContent" class="bojaPoruke"></span>
                <label for="content">Sadržaj vijesti</label>
                <div class="form-field">
                    <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
            </div>
            <div class="form-item">
                <span id="porukaSlika" class="bojaPoruke"></span>
                <label for="pphoto">Slika: </label>
                <div class="form-field">
                    <input type="file" accept="image/jpg,image/gif" id="pphoto" class="input-text" name="pphoto"/>
                </div>
            </div>
            <div class="form-item">
                <span id="porukaKategorija" class="bojaPoruke"></span>
                <label for="kategorija">Kategorija vijesti</label>
                <div class="form-field">
                    <select name="kategorija" id="kategorija" class="form-field-textual">
                        <option value="MONDE">MONDE</option>
                        <option value="ÉCONOMIE">ÉCONOMIE</option>
                    </select>
                </div>
            </div>
            <div class="form-item">
                <label>Spremiti u arhivu: 
                    <div class="form-field">
                        <input type="checkbox" name="archive" id="archive">
                    </div>
                </label>
            </div>
            <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <input type="submit" value="Pošalji" id="slanje" name="submit">
            </div>
        </form>
    </div>

    <script type="text/javascript">

        // Provjera forme prije slanja
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;
            // Naslov vjesti (5-30 znakova)
            var poljeTitle = document.getElementById("title");
            var title = document.getElementById("title").value;
            
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border="1px dashed red";
                document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
            } 
            else {
                poljeTitle.style.border="1px solid green";
                document.getElementById("porukaTitle").innerHTML="";
            }
            // Kratki sadržaj (10-100 znakova)
            var poljeAbout = document.getElementById("about");
            var about = document.getElementById("about").value;

            if (about.length < 10 || about.length > 100) {
                slanjeForme = false;
                poljeAbout.style.border="1px dashed red";
                document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
            } 
            else {
                poljeAbout.style.border="1px solid green";
                document.getElementById("porukaAbout").innerHTML="";
            }

            // Sadržaj mora biti unesen
            var poljeContent = document.getElementById("content");
            var content = document.getElementById("content").value;

            if (content.length == 0) {
                slanjeForme = false;
                poljeContent.style.border="1px dashed red";
                document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
            } 
            else {
                poljeContent.style.border="1px solid green";
                document.getElementById("porukaContent").innerHTML="";
            }

            // Slika mora biti unesena
            var poljeSlika = document.getElementById("pphoto");
            var pphoto = document.getElementById("pphoto").value;

            if (pphoto.length == 0) {
                slanjeForme = false;
                poljeSlika.style.border="1px dashed red";
                document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
            } 
            else {
                poljeSlika.style.border="1px solid green";
                document.getElementById("porukaSlika").innerHTML="";
            }

            // Kategorija mora biti odabrana
            var poljeCategory = document.getElementById("kategorija");
 
            if(document.getElementById("kategorija").selectedIndex == 0) {
                slanjeForme = false;
                poljeCategory.style.border="1px dashed red";
                document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
            } 
            else {
                poljeCategory.style.border="1px solid green";
                document.getElementById("porukaKategorija").innerHTML="";
            }

            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>
    <footer>
        <p>Les sites du réseau Groupe L'Express : Food avec Mycuisine.fr</p>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>
</body>
</html>