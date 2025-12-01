<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1></header>
    <nav>
    <a href="peruwianka.php">Rasa peruwianka</a>
   <a href="american.php">Rasa american</a>
   <a href="crested.php">Rasa crested</a>
    </nav>
   <article><h3>Poznaj wszystkie rasy świnek morskich</h3>
    <ol>
        <?php
            $connection = mysqli_connect('localhost','root','','hodowla')or die("Błąd");
             $query = "SELECT `rasa` FROM `rasy`;";
            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_row($result)){
                echo "<li>$row[0]</li>";
            }
        
        
        ?>
    </ol>
</article>
   <main>
    <img src="crested.jpg" alt="Świnka morska rasy crested" >
    <?php
     $connection = mysqli_connect('localhost','root','','hodowla'); 
      $query = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON rasy_id = rasy.id WHERE rasy_id=7;";
     $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_row($result)){
                echo "<h2>Rasa: $row[2]</h2>";
                echo "<p>Data urodzenia: $row[0]</p>";
                echo "<p>Oznaczenie miotu: $row[1]</p>";
            }
    ?>
    <hr> 
    <h2>Świnki w tym miocie</h2>
    <?php
     $connection = mysqli_connect('localhost','root','','hodowla'); 
      $query = "SELECT `imie`,`cena`,`opis` from `swinki` WHERE `rasy_id` = 7;";
     $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_row($result)){
                echo "<h3> $row[0] - $row[1]</h3>";
                 echo "<p>$row[2]</p>";
            }

    ?>
   </main>
   <footer>
    <p>Stronę wykonał: XXXXXXXX</p>
   </footer>
        </php
        mysqli_close($connection);
        ?>
    
</body>
</html>