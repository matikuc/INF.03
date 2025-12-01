<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $connect = mysqli_connect('localhost','root','','szkolenia')or die("Błąd");
    ?>
    <header>
        <h1>Szkolenia</h1>  
    </header>
    <main>
        <section id="lewa">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <tr>
                    <?php
                    $query = "SELECT * FROM kursy;";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_row($result)){
                        echo "<tr>";
                        echo "<td><img src='{$row[0]}.jpg' alt='kurs'></td>";
                        echo "<td>{$row[1]}</td>";
                        echo "<td>{$row[2]}</td>";
                        echo "</tr>";
                    }
                    
                    ?>
                </tr>

            </table>
        </section>
        <section id="prawa">
            <h2>Zapisy na kursy</h2>
            <form action="index.php" method="post">
                <label for="imie">Imie</label><br>
                <input type="text" name="imie" id="imie"><br>  
                <label for="nazwisko">Nazwisko</label><br>
                <input type="text" name="nazwisko" id="nazwisko"><br>  
                <label for="wiek">Wiek</label><br>
                <input type="number" name="wiek" id="wiek"><br>  
                <label for="kurs">Rodzaj kursu</label><br>
                <select name="kurs" id="kurs">
                    <?php
                     $query1 = "SELECT nazwa FROM kursy;";
                    $result1 = mysqli_query($connect, $query1);
                    while($row1 = mysqli_fetch_row($result1)){
                        echo "<option value ='".$row1[0]."'>".$row1[0]."</option>";
                    }
                    ?>
                </select><br>  
                <button name="submit" value="Dodaj dane">Dodaj dane</button>
            </form>
            <?php
             if (isset($_POST["submit"])) {
                if (!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["wiek"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $wiek = $_POST["wiek"];
                    $query = "INSERT INTO uczestnicy VALUES (NULL, '$imie', '$nazwisko', $wiek);";
                    mysqli_query($connect, $query);
                    echo "<p>Dane uczestnika $imie $nazwisko zostały dodane<p>";
                } else {
                    echo "<p>Wprowadź wszystkie dane<p>";
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: XXXXXXXXXXXX</p>

    </footer>
    <?php
    mysqli_close($connect);
    ?>
    
</body>
</html>