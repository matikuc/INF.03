<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszek piekarni">
     <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
     </nav>
     <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
     </header>
     <main>
        <h4>Wybierz rodzaj wypieków</h4>
        <form method="post" action="piekarnia.php">
   <select name = 'select'>
      <?php
         $connection = mysqli_connect("localhost","root","","piekarnia")or die("Błąd");
         $query= "SELECT DISTINCT `rodzaj` from `wyroby` ORDER by `rodzaj` desc";
        $result=mysqli_query($connection, $query);
       while( $row= mysqli_fetch_row($result)){
         echo "<option value='".$row[0]."'>".$row[0]."</option>";
       }
        
        ?>
   </select>
       <input type="submit"  value="Wybierz">
       <table>
         <tr><th>rodzaj</th><th>nazwa</th><th>gramatura</th><th>cena</th></tr>

       <?php
       if(isset($_POST['select'])){
      $Rodzaj = $_POST['select'];
      $query = "SELECT `rodzaj`,`nazwa`,`gramatura`,`cena` FROM `wyroby` WHERE `rodzaj` = '$Rodzaj'";
      $result =  mysqli_query($connection, $query);
      while( $row= mysqli_fetch_row($result)){
       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
      }}
       mysqli_close($connection);
       ?>
       </table>

        </form>
     </main>
     <footer>
      <p>AUTOR xxxxxxxxxxxxxxxx</p>
      <p>Data:31.07.2025</p>
     </footer>
    
</body>
</html>