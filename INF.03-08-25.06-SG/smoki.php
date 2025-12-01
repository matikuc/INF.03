<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
 </header>
           <nav>
            <section class="Blok1" id="blok11">Baza</section>
            <section class="Blok2" id="blok22">Opis</section>
            <section class="Blok3" id="blok33">Galeria</section>
</nav>
    <main>
        <section class="sekcja1">
            <h1>Baza Smoków</h1>
            <form action="smoki.php" method="post">
                <select name="pochodzenie">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "smoki")or die("Błąd");
                    $query = "SELECT DISTINCT(`pochodzenie`) FROM `smok` ORDER BY `pochodzenie` ASC;";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['pochodzenie'] . "'>" . $row['pochodzenie'] . "</option>";

                    }
                    ?>
                    </select>
                    <button name="submit">Szukaj</button>
                    </form>
                    <table>
                        <tr><th>Nazwa</th><th>Długość</th><th>Szerokość</th></tr>
                       <?php
                    if (isset($_POST["submit"])) {
                        $pochodzenie = $_POST["pochodzenie"];
                        $query2 = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie ='$pochodzenie';";
                        $result = mysqli_query($connection, $query2);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                <td>{$row['nazwa']}</td>
                                <td>{$row['dlugosc']}</td>
                                <td>{$row['szerokosc']}</td>
                            </tr>";
                        }
                    }
                    mysqli_close($connection);
                    ?>
                    </table>
                
            
        </section>
        <section class="sekcja2">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>

                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.
                </dd>
                <dt>Smok niebieski</dt> 
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.
                </dd>
            </dl>
        </section>
        <section class="sekcja3">
            <h3>Galeria smoków</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok zielony">
            <img src="smok3.jpg" alt="Skrzydlaty łaciatyu">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: XXXXXXXXXXX</p>
    </footer>
          
   <script>
        document.getElementById('blok11').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = 'MistyRose';
            document.getElementById('blok22').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok33').style.backgroundColor = '#FFAEA5';

            document.querySelector('.sekcja1').style.display = 'block';
            document.querySelector('.sekcja2').style.display = 'none';
            document.querySelector('.sekcja3').style.display = 'none';

        });
        document.getElementById('blok22').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok22').style.backgroundColor = 'MistyRose';
            document.getElementById('blok33').style.backgroundColor = '#FFAEA5';

            document.querySelector('.sekcja1').style.display = 'none';
            document.querySelector('.sekcja2').style.display = 'block';
            document.querySelector('.sekcja3').style.display = 'none';
        });
        document.getElementById('blok33').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok22').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok33').style.backgroundColor = 'MistyRose';

            document.querySelector('.sekcja1').style.display = 'none';
            document.querySelector('.sekcja2').style.display = 'none';
            document.querySelector('.sekcja3').style.display = 'block';
        });
    </script>
    
    
</body>
</html>