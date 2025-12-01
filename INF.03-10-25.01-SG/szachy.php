<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><em>Koło szachowe gambit piona</em></h2>
    </header>
    <div id="lewy">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1">kwerenda1</a></li>
            <li><a href="kw2">kwerenda2</a></li>
            <li><a href="kw3">kwerenda3</a></li>
            <li><a href="kw4">kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="Logo koła" >
    </div>
    <div id="prawy">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr><th>Pozycja</th><th>Pseudonim</th><th>Tytuł</th><th>Ranking</th><th>Klasa</th></tr>
        <?php
        $connection = mysqli_connect('localhost','root','','szachy')or die("Błąd");
        $query = "SELECT `pseudonim`,`tytul`,`ranking`,`klasa` FROM `zawodnicy` where `ranking` >2787 ORDER by `ranking` desc;";
        $result=mysqli_query($connection, $query);
        $i=1;
        while($row = mysqli_fetch_row($result)){
           echo "<tr><td>$i</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
           $i++;
        }
        ?>
        </table>
        <form method="POST" action="szachy.php">
            <input type="submit" value="Losuj nową parę graczy" id="button" name="losuj">
        </form>
        <?php
        
        
        if(isset($_POST['losuj'])){
            $query = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
            $result =mysqli_query($connection, $query);
            echo "<h4>";
             while($row = mysqli_fetch_row($result)){
                echo "$row[0]"."$row[1]"." ";
             }
            echo "</h4>";
            mysqli_close($connection);
        }
        
        ?>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </div>
    <footer>
        <p>Stronę wykonał: XXXXXXXXXXXXX</p>
    </footer>
    
</body>
</html>