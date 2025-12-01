<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <div id="lewy">
        <h3>Konkursowe nagrody</h3>
        <button onclick="location.reload()">Losuj nowe nagrody</button>
        <table>
            <tr><th>Nr</th><th>Nazwa</th><th>Opis</th><th>Wartość</th></tr>
            <?php 
            $connection = mysqli_connect("localhost","root","","konkurs")or die("Błąd");
            $query= "Select nazwa,opis,cena from nagrody order by rand() limit 5";
            $result = mysqli_query($connection, $query);
            $i = 1;
            while($row = mysqli_fetch_row($result)){
                echo "<tr><td>$i</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
                $i++;
            }
            $close = mysqli_close($connection)
            ?>
        </table>
    </div>
      <div id="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1.png">Kwerenda1</a></li>
            <li><a href="kw2.png">Kwerenda2</a></li>
            <li><a href="kw3.png">Kwerenda3</a></li>
            <li><a href="kw4.png">Kwerenda4</a></li>
      </div>
    <footer>
        <p>Numer zdającego: XXXXXXXXXXXXXXXXX</p>
    </footer>
    
</body>
</html>