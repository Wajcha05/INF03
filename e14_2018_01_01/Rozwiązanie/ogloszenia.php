<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal ogłoszeniowy</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <section class="banner">
        <h1>Portal Ogłoszeniowy</h1>
    </section>
    <section class=lewy>
        <h2>Kategorie ogłoszeń</h2>
        <ol type="I">
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>
        <img src="ksiazki.jpg">
        <table>
            <tr>
                <td>Liczba ogłoszeń</td>
                <td>Cena ogłoszenia</td>
                <td>Bonus</td>
            </tr>
            <tr>
                <td>1 - 10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>11 - 50</td>
                <td>0,80 PLN</td>
            </tr>
            <tr>
                <td>51 i więcej</td>
                <td>0,60 PLN</td>
            </tr>
        </table>
    </section>
    <section class="prawy">
        <h2>Ogłoszenia kategorii książki</h2>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'ogloszenia');
        $query = "SELECT id, tytul, tresc FROM ogloszenie WHERE kategoria = 1;";
        $query2 = "SELECT telefon FROM uzytkownik, ogloszenie WHERE uzytkownik.id = ogloszenie.uzytkownik_id;";

        $res1 = mysqli_query($db, $query);
        $res2 = mysqli_query($db, $query2);

        while($tabela1 = mysqli_fetch_row($res1)){
            $tabela2 = mysqli_fetch_row($res2);
            echo "<h3>$tabela1[0] $tabela1[1]</h3>";
            echo "<p>$tabela1[2]</p>";
            echo "<p>telefon kontaktowy: $tabela2[0]</p>";
        }
        mysqli_close($db);
        ?>
    </section>
    <section  class="stopka">
        <p>Portal ogłoszeniowy opracował: 00000000000</p>
    </section>
</body>
</html>
