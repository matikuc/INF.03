<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>
    <section>
        <h3>Nasze dalsze propozycje</h3>
        <table>
            <tr>
                <th>Autor</th>
                <th>Tytuł</th>
                <th>Katalog</th>

            </tr>
                <?php
                $connection = mysqli_connect('localhost','root','','biblioteka1') or die("Brak połączenia");
                $query = "SELECT `autor`,`tytul`,`kod` FROM `ksiazki` ORDER BY rand() limit 5; ";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "</tr>";
                }
                mysqli_close($connection);
                ?>
           
        </table>

    </section>
    <main>
        <article id="pierwszy">
                <img src="ksiazka1.jpg" alt="okładka ksiązki">
                <p>Według różnych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.</p>
        </article>
        <article id="drugi">
                <img src="ksiazka2.jpg" alt="okładka ksiązki">
                <p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...</p>
        </article>
        <article id="trzeci">
                <img src="ksiazka3.jpg" alt="okładka ksiązki">
                <p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...</p>
        </article>
        
    </main>
    <footer>
        Stronę wykonał: XXXXXXXXXXXX

    </footer>
    
</body>
</html>