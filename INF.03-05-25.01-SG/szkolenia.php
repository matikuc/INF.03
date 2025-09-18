<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div id="conteiner">
        <header>
                <img src="baner.jpg" alt="Szkolenia">
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Strona Główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>

        </nav>
        <main>
    <?php
        $connection = mysqli_connect('localhost','root','','firma');
        $query = "SELECT `data`,`temat` from `szkolenia` order by `data` asc;";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_row($result)){
            echo "$row[0]"." "."$row[1]"."</br>";
            file_put_contents("harmonogram.txt", $row[0]." ".$row[1]. PHP_EOL , FILE_APPEND);
        
        }
    mysqli_close($connection);  
    ?>
        </main>
        <footer>
            <h2>Firma szkoleniowa ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: XXXXXXXXXX</p>
        </footer>
    </div>
    
</body>
</html>