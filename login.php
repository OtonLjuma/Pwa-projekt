<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <title>Administracija</title>
</head>
<body>
    
    <header>
        <div class="logo_naslov">
            <img src="slike/logo_resized.png" alt="logo">
        </div>
        <div class="nav_top">
            <nav>
                <a href="index.php" class="">HOME</a>
                <a href="kategorija.php?kategorija='MONDE'" class="">MONDE</a>
                <a href="kategorija.php?kategorija='ÉCONOMIE'" class="">ÉCONOMIE</a>
                <a href="#" class="">ADMINISTRACIJA</a>
                <a href="registracija.php">REGISTRACIJA</a>
                <a href="unos.php">FORMA</a>
            </nav>
        </div>
    </header>

    <div class="wrapper">
        <form  method="POST" name="prijava" class="artikl2">
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" required>
            <span id="error"></span>
            <br>
            <label for="lozinka">Lozinka:</label>
            <input type="password" name="lozinka" required>
            <span id="error"></span>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <script>
        $(function() {
            $("form[name='prijava']").validate({
                rules: {
                    username: {
                        required: true,
                    },
                    lozinka: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: "Potrebno je upisati korisničko ime",
                    },
                    lozinka: {
                        required: "Potrebno je upisati lozinku",
                    }
                },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        });
    </script>

    <?php
    session_start();
    $dbc = mysqli_connect("localhost:3306", "root", "", "pwa_projekt") or die("Error" . mysqli_connect_error());

    if ($dbc) {
        if (isset($_POST["submit"])) {

            $user = $_POST["username"];
            $password = $_POST["lozinka"];
            $query = "SELECT korisničko_ime, lozinka, razina FROM korisnik WHERE korisničko_ime = ?;";
            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 's', $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $hash, $razina);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $hash)) {
                    if($razina) {
                        echo "<br>Dobro došli $user. <a href='administracija.php'> >Klikni za nastavak<</a><br>";
                        $_SESSION["username"] = $user;
                        $_SESSION["level"] = $password;
                    } else {
                        echo "Nemate administratorska prava. Odjavljeni ste!";
                    }
                } else {
                    echo "<br>Unijeli ste pogrešno korisničko ime ili lozinku. 
                    Ako nemate svoj račun ><a href='registracija.php'> Registracija</a>";
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
    mysqli_close($dbc);
    ?>

    <footer class="footer2">
        <p>Les sites du réseau Groupe L'Express : Food avec Mycuisine.fr</p>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>
</body>
</html>