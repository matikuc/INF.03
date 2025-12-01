<?php
    $conn = new mysqli(hostname: "localhost",username: "root",password: "",database: "wazenietirow") or die("Błąd");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ważenie samochodów ciężarowych</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="header1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </div>

        <div id="header2">
            <img src="obraz1.png" alt="waga">
        </div>

        <div id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    // Skrypt #1
                    $sql = "SELECT ulica FROM lokalizacje;";
                    $result = $conn->query(query: $sql);
                    while($row = $result -> fetch_array()) {
                        echo "<li>ulica $row[0]</li>";
                    }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </div>

        <div id="srodkowy">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                    // Skrypt #2
                    $sql = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE waga > 5;";
                    $result = $conn->query(query: $sql);
                    while($row = $result -> fetch_array()) {
                        echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                        echo "</tr>";
                    }
                ?>
            </table>

            <?php
                // #Skrypt #3
                $sql = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES ('5', FLOOR(1+RAND()*10), 'DW12345', CURRENT_DATE, CURRENT_TIME)";
                $result = $conn->query(query: $sql);
                header(header: "refresh: 10");
            ?>

        </div>

        <div id="prawy">
            <img src="obraz2.jpg" alt="tir">
        </div>

        <footer>
            <p>Stronę wykonał: XXXXXXXXXXX</p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>