<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <div id="logo">
        <img src="komputer.png" alt="hurtownia komputerowa">
    </div>
    <div id="lista">
        <ul>
            <li>Sprzęt
                <ol>
                    <li>Procesory</li>
                    <li>Pamięci RAM</li>
                    <li>Monitory</li>
                    <li>Obudowy</li>
                    <li>Karty graficzne</li>
                    <li>Dyski twarde</li>
                </ol>
            </li>
            <li>Oprogramowanie</li>
        </ul>
    </div>
    <div id="formularz">
        <h2>Hurtownia komputerowa</h2>
        <form action="" method="POST">
            Wybierz kategorię sprzętu<br>
            <input type="number" name="numer"><input type="submit" value="SPRAWDŹ">
        </form>
    </div>
    <div id="glowny">
        <h1>Podzespoły we wskazanej kategorii</h1>
        <?php 
            $polaczenie = mysqli_connect('localhost','root','','sklep');
            if(isset($_POST['numer'])){
                $numer = $_POST['numer'];
                $zapytanie = "SELECT `nazwa`,`opis`,`cena` FROM `podzespoly` WHERE `typy_id`=$numer;";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while($wiersz = mysqli_fetch_row($wynik)){
                    echo "$wiersz[0] $wiersz[1] CENA: $wiersz[2]";
                }
            }else{
                echo "Wybierz poprawną kategorię sprzętu";
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="stopka">
        <h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
        <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
        Partnerzy:
        <a href="http://intel.pl" target="_blank">Intel</a>
        <a href="http://amd.pl" target="_blank">AMD</a>
        <p>Stronę wykonał: 0000000000</p>
    </div>
</body>
</html>