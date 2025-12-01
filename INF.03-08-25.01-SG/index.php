<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <img src="baner.png" alt="Mieszalnia farb" >
    </header>
    <form method="POST" action="index.php">
    <label for="dataod">Data odbioru od:</lable>
    <input type="date" id="daty" name="dataod">
    <label for="datado">do:</lable>
    <input type="date" id="daty" name="datado">
    <button type="submit" name="Wyszukaj" id="Wyszukaj">Wyszukaj</button>
    </form>
    <main>
        <table>
            <tr><th>Nr zamówienia</th><th>Nazwisko</th><th>Imię</th><th>Kolor</th><th>Pojemność [ml]</th><th>Data odbioru</th></tr>
        <?php
        $connection = mysqli_connect("localhost","root","","mieszalnia")or die("Błąd");
        if(isset($_POST['Wyszukaj'])){
            $dataod = $_POST['dataod'];
            $datado = $_POST['datado'];
            $query = "SELECT `Nazwisko`,`Imie`, `zamowienia`.`id`, `kod_koloru`, `pojemnosc`, `data_odbioru` from `klienci` JOIN `zamowienia` on `klienci`.`Id` =`id_klienta` WHERE `data_odbioru` >= '$dataod' AND `data_odbioru` <='$datado' order by `data_odbioru` asc;";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_row($result)){
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td style='background-color: #".$row[3].";'>" . $row[3] . "</td><td>$row[4]</td><td>$row[5]</td></tr>";
            }
        }else{
            $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta ORDER BY data_odbioru;";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_row($result)){
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td style='background-color: #".$row[3].";'>" . $row[3] . "</td><td>$row[4]</td><td>$row[5]</td></tr>";
            }
        }
        mysqli_close($connection);
        ?>
        </table>

    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: XXXXXXXXXXX</p>
    </footer>
    
</body>
</html>