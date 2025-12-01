<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">

</head>
<body>
    <header>
        <?php
        for($i=0; $i<20; $i++){
            echo "<img src='obraz.png' />";
        }
        ?>

    </header>
    <div class="container">
    <section>
        <h2>Liryka</h2>
        <form action="biblioteka.php" method="post">
            <select name="liryka">
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'biblioteka') or die("Błąd");
            $query1 = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'liryka'"; 
            $result = mysqli_query($connection, $query1);
            while($row = mysqli_fetch_row($result)){
                echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }
            ?>
             </form>
             <input type="submit" name = "rezerwujLiryka" value="Rezerwuj">
             <?php
             if(isset($_POST['rezerwujLiryka'])){
                $id = $_POST['liryka'];
                $query2 = "SELECT `tytul` FROM `ksiazka` WHERE `id` = $id;";
                $result2 = mysqli_query($connection, $query2);
                $row2 = mysqli_fetch_row($result2);
                echo "<p>Książka ".$row2[0]." została zarezerwowana</p>";
                $query3 = "UPDATE `ksiazka` SET `rezerwacja`='1' WHERE `id` = $id;";
                mysqli_query($connection, $query3);
             }
             
             ?>
            </select>  
           </section>
       <section>
        <h2>Epika</h2>
        <form action="biblioteka.php" method="post">
            <select name="epika">
            <?php
            $query4 = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'epika'"; 
            $result = mysqli_query($connection, $query4);
            while($row = mysqli_fetch_row($result)){
                echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }
            ?>
             </form>
             <input type="submit" name = "rezerwujEpika" value="Rezerwuj">
             <?php
             if(isset($_POST['rezerwujEpika'])){
                $id = $_POST['epika'];
                $query5 = "SELECT `tytul` FROM `ksiazka` WHERE `id` = $id;";
                $result5 = mysqli_query($connection, $query5);
                $row5 = mysqli_fetch_row($result5);
                echo "<p>Książka ".$row5[0]." została zarezerwowana</p>";
                $query6 = "UPDATE `ksiazka` SET `rezerwacja`='1' WHERE `id` = $id;";
                mysqli_query($connection, $query6);
             }
             
             ?>
            </select>  
           </section>
               <section>
        <h2>Dramat</h2>
        <form action="biblioteka.php" method="post">
            <select name="dramat">
            <?php
            $query7 = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'dramat'"; 
            $result7 = mysqli_query($connection, $query7);
            while($row = mysqli_fetch_row($result7)){
                echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }
            ?>
             </form>
             <input type="submit" name = "rezerwujDramat" value="Rezerwuj">
             <?php
             if(isset($_POST['rezerwujDramat'])){
                $id = $_POST['dramat'];
                $query8 = "SELECT `tytul` FROM `ksiazka` WHERE `id` = $id;";
                $result8 = mysqli_query($connection, $query8);
                $row8 = mysqli_fetch_row($result8);
                echo "<p>Książka ".$row8[0]." została zarezerwowana</p>";
                $query9 = "UPDATE `ksiazka` SET `rezerwacja`='1' WHERE `id` = $id;";
                mysqli_query($connection, $query9);
             }
             
             ?>
            </select>  
           </section>
           <section>
            <h2>Zaległe książki</h2>
            <ul>
            <?php
            $query9 = "SELECT `ksiazka`.`tytul`,`ksiazka`.`id`,`wypozyczenia`.`data_odd` FROM `ksiazka` JOIN `wypozyczenia` ON `ksiazka`.`id` = `wypozyczenia`.`id_cz` ORDER BY `wypozyczenia`.`data_odd` ASC limit 15;"; 
            $result9 = mysqli_query($connection, $query9);
            while($row = mysqli_fetch_row($result9)){
                echo "<li>$row[0] $row[1] $row[2]</li>";
            }
            ?>
            </ul>
           </section>
    </div>
    <footer>
            <p><strong>Autor: XXXXXXXXXXXX</strong></p>
    </footer>
    <?php
    mysqli_close($connection);
    ?>
</body>
</html>