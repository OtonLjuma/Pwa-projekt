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
        if ($dbc) {
            if (isset($_POST["registracija"])) {
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $username = $_POST["username"];
                $lozinka = $_POST["pass"];
                $hashed_password  = password_hash($lozinka, CRYPT_BLOWFISH);
                $razina = 0;
                $registriranKorisnik = '';              

                //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
                $sql = "SELECT 	korisničko_ime FROM korisnik WHERE 	korisničko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);
                
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                if(mysqli_stmt_num_rows($stmt) > 0){
                    echo 'Korisničko ime već postoji!';
                }
                else{
                    // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
                    $sql = "INSERT INTO korisnik (ime, prezime, korisničko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                        mysqli_stmt_execute($stmt);
                        $registriranKorisnik = true;
                    }
                }
                
                if($registriranKorisnik == true) {
                    echo '<p>Korisnik je uspješno registriran!</p>';
                } 
            }
            mysqli_close($dbc);
        }
    ?>

    <div class="wrapper">
        <form enctype="multipart/form-data" method="POST" class="artikl" action="registracija.php">    
            <div class="form-item">
                <span id="porukaIme" class="bojaPoruke"></span>
                <label for="ime">Ime:</label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPrezime" class="bojaPoruke"></span>
                <label for="prezime">Prezime:</label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaUsername" class="bojaPoruke"></span>
                <label for="username">Korisničko ime:</label>

                <div class="form-field">
                    <input type="text" name="username" id="username" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPass" class="bojaPoruke"></span>
                <label for="pass">Lozinka:</label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPassRep" class="bojaPoruke"></span>
                <label for="passRep">Lozinka:</label>
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <button type="submit" value="Registracija" name="registracija" id="slanje">Registracija</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            // Ime korisnika mora biti uneseno
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            
            if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border="1px dashed red";
                document.getElementById("porukaIme").innerHTML="Unesite ime!<br>";
            } 
            else {
                poljeIme.style.border="1px solid green";
                document.getElementById("porukaIme").innerHTML="";
            }

            // Prezime korisnika mora biti uneseno
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;

            if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border="1px dashed red";
                document.getElementById("porukaPrezime").innerHTML="Unesite Prezime!<br>";
            } 
            else {
                poljePrezime.style.border="1px solid green";
                document.getElementById("porukaPrezime").innerHTML="";
            }

            //Korisničko ime mora biti uneseno
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;

            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border="1px dashed red";
                document.getElementById("porukaUsername").innerHTML="Unesite korisničko ime!<br>";
            } 
            else {
                poljeUsername.style.border="1px solid green";
                document.getElementById("porukaUsername").innerHTML="";
            }

            // Provjera podudaranja lozinki

            var poljePass = document.getElementById("pass");
    	    var pass = document.getElementById("pass").value;
            var poljePassRep = document.getElementById("passRep");
            var passRep = document.getElementById("passRep").value;

            if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                slanjeForme = false;
                poljePass.style.border="1px dashed red";
                poljePassRep.style.border="1px dashed red";
                document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
                document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
            } 
            else {
                poljePass.style.border="1px solid green";
                poljePassRep.style.border="1px solid green";
                document.getElementById("porukaPass").innerHTML="";
                document.getElementById("porukaPassRep").innerHTML="";
            }
            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>

    <footer>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>

</body>
</html>