<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
        $connection = mysqli_connect('localhost','root','','obuwie')or die("błąd");
        if(isset($_POST['model'])){
            $model = $_POST['model'];
            $rozmiar = $_POST['rozmiar'];
            $liczba = $_POST['par'];
        }
        $query = "SELECT `buty`.`nazwa`,`buty`.`cena`,`produkt`.`kolor`,`produkt`.`kod_produktu`,`produkt`.`material`,`produkt`.`nazwa_pliku` from `buty` JOIN `produkt` ON `buty`.`model`= `produkt`.`model` WHERE `produkt`.`model` = '$model';";
        $result = mysqli_query($connection,$query);
       $row = mysqli_fetch_row($result);
       echo "<div class='buty'>";
       echo "<img src='".$row[5]."'alt='but męski'>";
       echo "<h2>".$row[0]."</h2>";
       $cena = $row[1] * $liczba;
       echo "<p>cena za $liczba par: $cena zł</p>";
       echo "<p>Szczegóły produktu: $row[2],$row[4]</p>";
       echo "<p>Rozmiar:" .$rozmiar."</p>";
         mysqli_close($connection);
        ?>
        <a href="index.php">Strona główna</a>

    </main>
    <footer>
        <p>Autor strony: XXXXXXXXXX</p>
    </footer>
  
</body>
</html>