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

            $query = "SELECT * FROM forma_u_tablici";
            $result = mysqli_query($dbc, $query);

            while($row = mysqli_fetch_array($result)) {
 
                echo '<form enctype="multipart/form-data" action="" method="POST" class="artikl">
                        <div class="form-item">
                            <label for="title">Naslov vjesti:</label>
                            <div class="form-field">
                                <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="datum">Datum</label>
                            <div class="form-field">
                                <input type="date" name="datum" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="vrijeme">Vrijeme</label>
                            <div class="form-field">
                                <input type="time" name="vrijeme" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                            <div class="form-field">
                                 <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="content">Sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="pphoto">Slika:</label>
                            <div class="form-field">
                                <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="kategorija">Kategorija vijesti:</label>
                            <div class="form-field">
                                <select name="kategorija" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                    <option value="MONDE">MONDE</option>
                                    <option value="ÉCONOMIE">ÉCONOMIE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Spremiti u arhivu: 
                                <div class="form-field">';
                                    if($row['arhiva'] == 0) {
                                        echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                                    } 
                                    else {
                                        echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                                    }
                                echo '</div>
                            </label>
                        </div>
                        <div class="form-item">
                            <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                            <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                        </div>
                    </form>';
                }   
                
                if(isset($_POST['delete'])){
                    $id=$_POST['id'];
                    $query = "DELETE FROM forma_u_tablici WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                   }

                if(isset($_POST['update'])){
                    $picture = $_FILES['pphoto']['name'];
                    $title=$_POST['title'];
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

                    $target_dir = 'slike/'.$picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                    $id=$_POST['id'];
                    
                    $query = "UPDATE forma_u_tablici SET naslov='$title', datum='$datum', vrijeme='$vrijeme', sazetak='$sazetak', tekst='$sadrzaj', 
                    slika='$picture', kategorija='$opcija', arhiva='$archive' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }
            ?>
    </div>

    <footer>
        <p>Les sites du réseau Groupe L'Express : Food avec Mycuisine.fr</p>
        <p>@ L'Express -</p>
        <p>Author: Oton Ljuma, email: oljuma@tvz.hr, godine: 2021.</p>
    </footer>

</body>
</html>