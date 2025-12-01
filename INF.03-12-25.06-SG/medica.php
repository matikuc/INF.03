<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Medica</title>
    <link rel="shortcut icon" href="obraz2.png" type="image/x-icon">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
        $connect = mysqli_connect('localhost','root','','medica')or die("Błąd");
        $query = "SELECT `nazwa`,`cena`,`opis` FROM `abonamenty`; ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_row($result)){
        echo "<h3> Pakiet ".$row[0]." - cena ".$row[1]."zł</h3>";
        echo "<p>$row[2]";
        }

        ?>
        <a href="opis.html">Dowiedz się więcej</a>

    </article>
    <main>
        <section>
            <h2>Standardowy</h2>
            <ul>
                <?php
                 $query1 = "SELECT `nazwa`,`cecha` FROM `abonamenty` JOIN `szczegolyabonamentu` ON `abonamenty`.`id` = `Abonamenty_id` JOIN cechy ON `cechy`.`id`= `cechy_id` WHERE abonamenty.id = 1";
        $result1 = mysqli_query($connect, $query1);
        while($row = mysqli_fetch_row($result1)){
        echo "<li>".$row[1]."</li>";
        }
                
                ?>
            </ul>
        </section>
        <section>
            <h2>Premium</h2>
            <ul>
                <?php
                 $query1 = "SELECT `nazwa`,`cecha` FROM `abonamenty` JOIN `szczegolyabonamentu` ON `abonamenty`.`id` = `Abonamenty_id` JOIN cechy ON `cechy`.`id`= `cechy_id` WHERE abonamenty.id = 2";
        $result1 = mysqli_query($connect, $query1);
        while($row = mysqli_fetch_row($result1)){
        echo "<li>".$row[1]."</li>";
        }
                
                ?>
            </ul>
        </section>
       <section>
            <h2>Dziecko</h2>
            <ul>
                <?php
                 $query1 = "SELECT `nazwa`,`cecha` FROM `abonamenty` JOIN `szczegolyabonamentu` ON `abonamenty`.`id` = `Abonamenty_id` JOIN cechy ON `cechy`.`id`= `cechy_id` WHERE abonamenty.id = 3";
        $result1 = mysqli_query($connect, $query1);
        while($row = mysqli_fetch_row($result1)){
        echo "<li>".$row[1]."</li>";
        }
                
                ?>
            </ul>
        </section>

    </main>   
    <footer>
    <p><img src="obraz2.png" alt="Przychodnia">Stronę przygtował:XXXXXXXX</p>
    </footer> 
    <?php mysqli_close($connect); ?>
</body>
</html>