<?php
    header("refresh:10;");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
        <aside>
            <?php
            $connect = mysqli_connect('localhost','root','','opony')or die("Błąd");
            $query = "SELECT * from `opony` ORDER BY `opony`.`cena` ASC LIMIT 10;";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_row($result)){
                $obraz = '';
                if($row[3] == 'letnia'){
                    $obraz = "Lato.png";

                }elseif($row[3] == 'zimowa'){
                    $obraz = "Zima.png";

                }elseif($row[3] == 'uniwersalna'){
                    $obraz = "uniwer.png";

                }
                echo "<div class='opona'>";
                 echo "<img src='$obraz' alt = 'opona'>";
                 echo "<h4>Opona: $row[1] $row[2]</h4>";
                 echo "<h3>Cena: $row[4] zł</h3>";
                    echo "</div>";

            }            
            ?>
            <p><a href="http://opona.pl/">więcej ofert</a></p>
        </aside>
        <section class="oponaDnia">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <?php
            $query1 = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9;";
            $result1 = mysqli_query($connect, $query1);
              while($row = mysqli_fetch_row($result1)){
                echo "<h2>$row[0] model $row[1]</h2>";
                echo "<h2>Sezon: $row[2]</h2>";
                echo "<h2>Tylko $row[3] zł!</h2>";
              }
            
            ?>
        </section>
        <section class="najnowszeZamowienia">
            <h2>Najnowsze zamówienia</h2>
            <?php
             $query2 = "SELECT id_zam, ilosc, model, cena FROM zamowienie JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
            $result2 = mysqli_query($connect, $query2);
              while($row = mysqli_fetch_row($result2)){
                $wartosc = $row[1] * $row[3];
                echo "<h2>$row[0] $row[1] sztuk modelu $row[2]</h2>";
                echo "<h2> Wartość zamówienia: $wartosc zł</h2>";

              }

            
            ?>
        </section>
    </main>
    <footer><p>Stronę wykonał: XXXXXXXXXXXX</p></footer>
    <?php
    mysqli_close($connect);
    ?>
    
</body>
</html>