<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <div id="lewy">
    <img src="logo.png" alt="logo zdobywcy" >
    <h3>razem z nami:</h3>
    <ul>
        <li>wyjazdy</li>
        <li>szkolenia</li>
        <li>rekreacja</li>
        <li>wypoczynek</li>
        <li>wyzwania</li>
    </ul>
    </div>
    <div id="prawy">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        <form method="POST" action="zdobywcy.php">
            <label for="nazwisko">Nazwisko:</label>
            <input type="text" id="nazwisko" name="nazwisko">
            <label for="imie">Imie:</label>
            <input type="text" id="imie" name="imie">
             <label for="funkcja">Funkcja:</label>
            <select id="funkcja" name="funkcja">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
                
            </select>
             <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <button id="wyślij" name="wyślij" value="Dodaj">Dodaj</button>
            <?php
                 $connection = mysqli_connect("localhost","root","","zdobywcy")or die("Błąd");
                 if (isset($_POST["nazwisko"])) {
                    $nazwisko = $_POST["nazwisko"];
                    $imie = $_POST["imie"];
                    $funkcja = $_POST["funkcja"];
                    $email = $_POST["email"];
                 }
                $query = "INSERT INTO `osoby` (`nazwisko`, `imie`, `funkcja`, `email`) 
              VALUES ('$nazwisko', '$imie', '$funkcja', '$email')";
              $result = mysqli_query($connection, $query);
            ?>
            <table>
                <tr><th>Nazwisko</th><th>Imię</th><th>Funkcja</th><th>Email</th></tr>
                <?php
                $connection = mysqli_connect("localhost","root","","zdobywcy");
                $query = "SELECT `nazwisko`,`imie`,`funkcja`,`email` from `osoby`;";
                $result = mysqli_query($connection, $query);
                while ($row=mysqli_fetch_row($result)){
                    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                }
                $close = mysqli_close($connection);
                ?>
            </table>
            
    </div>
    <footer>
        <p>Stronę wykonał: XXXXXXXXXXXXX</p>
    </footer>
    
</body>
</html>