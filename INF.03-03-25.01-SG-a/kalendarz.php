<?php
   // $conn = new mysqli(hostname: "localhost",username: "root",password: "",database: "kalendarz");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalendarz</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Dni, miesiące, lata...</h1>
        </header>

        <div id="napis">
            <?php
            $conn=mysqli_connect('localhost','root','','kalendarz')or die("Błąd");
                // Skrypt #1
                $miesiac = date("m-d");

                // Zamiana dni tygodnia po angielsku na polski
                $dni_tygodnia = array(
                    'Monday'    => 'poniedziałek',
                    'Tuesday'   => 'wtorek',
                    'Wednesday' => 'środa',
                    'Thursday'  => 'czwartek',
                    'Friday'    => 'piątek',
                    'Saturday'  => 'sobota',
                    'Sunday'    => 'niedziela'
                );
                $dzien_ang = date('l');

                $sql = "SELECT imiona FROM imieniny WHERE data = '$miesiac';";
	            $result = mysqli_query($conn, $sql);
	            while($row = mysqli_fetch_array($result)) {
                    echo "<p>Dzisiaj jest ".$dni_tygodnia[$dzien_ang].", ".date("d.m.y").", imieniny: $row[0]</p>";
	            }
            ?>
        </div>

        <div id="lewy">
            <table>
                <tr>
                    <th>liczba dni</th>
                    <th>miesiąc</th>
                </tr>
                <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>
                </tr>
                <tr>
                    <td>marzec</td>
                </tr>
                <tr>
                    <td>maj</td>
                </tr>
                <tr>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>sierpień</td>
                </tr>
                <tr>
                    <td>październik</td>
                </tr>
                <tr>
                    <td>grudzień</td>
                </tr>
                <tr>
                    <td rowspan="4">30</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>czerwiec</td>
                </tr>
                <tr>
                    <td>wrzesień</td>
                </tr>
                <tr>
                    <td>listopad</td>
                </tr>
                <tr>
                    <td>28 lub 29</td>
                    <td>luty</td>
                </tr>
            </table>
        </div>

        <main>
            <h2>Sprawdź kto ma urodziny</h2>
            <form action="kalendarz.php" method="post">
                <input type="date" name="data" id="data" min="2024-01-01" max="2024-12-31" required>
                <input type="submit" value="Wyślij">
            </form>
            <?php
                // Skrypt #2
                if(isset($_POST["data"])) {
                    $data = $_POST["data"];
                    $format = date("m-d", strtotime($_POST["data"]));
                    
                    $sql = "SELECT imiona FROM imieniny WHERE data = '$format';";
                    $result = mysqli_query($conn,$sql)
                    while($row = mysqli_fetch_array($result)) {
                        $imieniny = $row[0];
                    }

                    echo "$data są imieniny: $imieniny";
                }
            ?>
        </main>

        <div id="prawy">
            <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
            <h2>Rodzaje kalendarzy</h2>
            <ol>
                <li>słoneczny<ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li></ul>
                </li>
                <li>księżycowy<ul>
                    <li>starogrecki</li>
                    <li>babiloński</li></ul>
                </li>
            </ol>
        </div>

        <footer>
            <p>Stronę opracował(a): XXXXXXXXX</p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>