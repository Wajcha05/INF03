<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </div>
    <div id="lewy">
        <h3>Ceny wybranych artykułów w hurtowni:</h3>
        <table>
            <?php
            $polaczenie = mysqli_connect('localhost','root','','sklep');
            $zapytanie = "SELECT `nazwa`,`cena` FROM `towary` WHERE `id`<5;";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            while($wiersz = mysqli_fetch_row($wynik)){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1] zł</td></tr>";
            }
            mysqli_close($polaczenie);
            ?>
        </table>
    </div>
    <div id="srodkowy">
        <h3>Ile bedą kosztować Twoje zakupy?</h3>
        <form action="" method="POST">
            wybierz artykuł
           <select name="lista">
               <option>Zeszyt 60 kartek</option>
               <option>Zeszyt 32 kartki</option>
               <option>Cyrkiel</option>
               <option>Linijka 30 cm</option>
               <option>Ekierka</option>
               <option>Linijka 50 cm</option>
           </select> 
           <br>liczba sztuk: <input type="number" value="1" name="sztuki"><br>
           <input type="submit" value="OBLICZ">
        </form>
        <?php 
        $polaczenie = mysqli_connect('localhost','root','','sklep');
        $lista = $_POST['lista'];
        $sztuki = $_POST['sztuki'];
        $zapytanie = "SELECT `cena` FROM `towary` WHERE `nazwa`='$lista';";
        $wynik = mysqli_query($polaczenie, $zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        $koniec = $wiersz[0]*$sztuki;
        echo round($koniec, 1);
        mysqli_close($polaczenie);
        ?>
    </div>
    <div id="prawy">
        <img src="zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>telefon:<br>111222333<br>e-mail:<br><a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </div>
    <div id="stopka">
        <h4>Witrynę wykonał 00000000000</h4>
    </div>
</body>
</html>