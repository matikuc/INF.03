<?php
    $connect = mysqli_connect("localhost", "root", "", "wyprawy") or die("Błąd");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <a href="wczasy.html">Wczasy</a>
        <a href="wycieczki.html">Wycieczki</a>
        <a href="allinclusive.html">All Inclusive</a>

    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form action="index.php" method="POST">
                <label for="MiejsceWycieczki">Miejsce wycieczki:<br>
                <select name="MiejsceWycieczki" id="MiejsceWycieczki"><br>
                    <?php
                    $query = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='$row[nazwa]'>$row[nazwa]</option>";
                    }
                    
                    ?>
                </select>
                </label><br>
                <label for="IleDoroslych">Ile dorosłych?<br>
                    <input type="number" name="IleDoroslych" id="IleDoroslych">

                </label><br>
                <label for="IleDzieci">Ile dzieci?<br>
                    <input type="number" name="IleDzieci" id="IleDzieci">

                </label><br>
                <label for="Termin">Termin<br>
                    <input type="date" name="Termin" id="Termin">

                </label>
                <br>
                <button name="submit">Symulacja ceny</button><br>
                <h4>Koszt wycieczki</h4>
                <?php
                if(isset($_POST['submit'])){
                    $miejsceWycieczki = $_POST['MiejsceWycieczki'];
                    $iledoroslych = $_POST['IleDoroslych'];
                    $iledzieci = $_POST['IleDzieci'];
                    $termin = $_POST['Termin'];
                    $query1 = "SELECT `cena` FROM `miejsca` where `nazwa` like '$miejsceWycieczki'; ";
                    $result1 = mysqli_query($connect,$query1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $cena = $row1['cena'];
                    $koszt = $cena *$iledoroslych + ($cena*0.5)*$iledzieci;
                    echo "<p> W dniu $termin </p>";
                    echo "$koszt złotych";
                }
                ?>

            </form>

        </aside>
        <section>
            <h3>Wycieczki</h3>
            <?php
            $query2 = "SELECT `nazwa`, `cena`, `link_obraz` FROM `miejsca` WHERE `link_obraz` like '0%'; "; 
            $result2 = mysqli_query($connect,$query2);
            while($row2 = mysqli_fetch_assoc($result2)){
                echo "<div class='wycieczka'>";
                echo "<img src='$row2[link_obraz]' alt='zdjęcie z wycieczki'>";
                echo "<h2>$row2[nazwa]</h2>";
                echo "<p>$row2[cena] </p>";
                echo "</div>"; }


            
            ?>

        </section>
    </main>
    <footer>
        <p>Autor: XXXXXXXXXXX</p>

    </footer>
    <?php
    mysqli_close($connect);
            
            ?>
    
</body>
</html>