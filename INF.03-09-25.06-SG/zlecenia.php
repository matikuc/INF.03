<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main>
        <section class="main_left">
            <nav>
                <a href="kontakt.html">Kontakt</a>
                <a href="https://remonty.pl" target="_blank" >Partnerzy</a>
            </nav>
            <section class="section_left">
                <h2>Dla klientów</h2>
                <form action="zlecenia.php" method="POST">
                    <label for="text">Ilu co najmniej pracowników potrzebujesz?</label> <br>
                    <input type="number" name="text" id="text">
                    <input type="submit" value="Szukaj firm">
                </form>
                <?php
                    //skrypt1
                    $con = mysqli_connect('localhost', 'root', '', 'remonty') or die("error");
                    if(isset($_POST['text'])){
                        $number = $_POST['text'];
                        $sql1 = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= '$number';";
                        $result1 = mysqli_query($con, $sql1);
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<p>".$row['nazwa_firmy'].", ".$row['liczba_pracownikow']." pracowników</p>";
                        }
                    }

                ?>
            </section>
            <section class="section_center">
                <h2>Dla wykonawców</h2>
                <form action="zlecenia.php" method="POST">
                    <select name="lista" id="lista">
                        <?php
                            //skrypt 2 wypelniajacy
                            $sql2 = "SELECT DISTINCT(miasto) FROM klienci ORDER BY miasto ASC;";
                            $result2 = mysqli_query($con, $sql2);
                            while($row = mysqli_fetch_assoc($result2)){
                                echo "<option>".$row['miasto']."</option>";
                            } 
                        ?>
                    </select>
                    <br>
                    <input type="radio" name="opcja" id="malowanie" value="malowanie" checked>
                    <label for="malowanie">malowanie</label>
                    <br>
                    <input type="radio" name="opcja" id="gipsowanie" value="gipsowanie">
                    <label for="gipsowanie">gipsowanie</label> 
                    <br>
                    <input type="submit" value="Szukaj klientów">
                </form>
                <ul>
                    <?php
                        //sktypt 3
                        if(isset($_POST['lista'])){
                            $miasto = $_POST['lista'];
                            $rodzaj = $_POST['opcja'];
                            
                            $sql3 = "SELECT klienci.imie, zlecenia.cena FROM klienci JOIN zlecenia ON klienci.id_klienta = zlecenia.id_klienta WHERE klienci.miasto = '$miasto' AND zlecenia.rodzaj = '$rodzaj';";
                            $result3 = mysqli_query($con, $sql3);
                            
                            while($row = mysqli_fetch_assoc($result3)){ 
                                echo "<li>".$row['imie']." - ".$row['cena']."</li>";
                            }
                        }   

                        mysqli_close($con);
                    ?>
                    
                </ul>
            </section>
        </section>
        <section class="main_right">
            <img src="tapeta_lewa.png" alt="usługi">    
            <img src="tapeta_prawa.png" alt="usługi">
            <img src="tapeta_lewa.png" alt="usługi">
            
        </section>
    </main>
    <footer>
        <p><strong>Stronę wykonał: XXXXXXXXXX</strong></p>
    </footer>
</body>
</html>