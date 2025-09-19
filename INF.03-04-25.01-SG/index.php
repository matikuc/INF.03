<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <form action="zamow.php" method="post">
            <label for="model">Model: </label>
            <select name="model" id="model" class="kontrolki">
                <?php
                $connection = mysqli_connect('localhost','root','','obuwie');
                $query = "SELECT `model` FROM `produkt`; ";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_row($result)){
                    echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
                ?>
                
            </select>
                <label for="rozmiar">Rozmiar: </label>
            <select name="rozmiar" id="rozmiar" class="kontrolki">
                <option value ="40">40</option>
                <option value ="41">41</option>
                <option value ="42">42</option>
                <option value ="43">43</option>
            </select>
            <label for="par">Liczba par: </label>
           <input type="number" name="par" id="par" class="kontrolki">
           <input type="submit" name="zamów" id="zamów" class="kontrolki">
        </form>
        <?php
            $query = "SELECT `model`,`nazwa`,`cena`,`nazwa_pliku` FROM `buty` JOIN `produkt` USING(`model`);";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_row($result)){
                    echo "<div class='buty'>";
                    echo "<img src='".$row[3]."'alt='but męski'>";
                    echo "<h2>".$row[2]."</h2>";
                    echo "<h5>".$row[0]."</h5>";
                    echo "<h4>".$row[2]."zł </h4>";
                    echo "</div>";
                }
                  mysqli_close($connection);
                
        ?>

    </main>
    <footer>
        <p>Autor strony: XXXXXXXXXX</p>
    </footer>
    
</body>
</html>