<!DOCTYPE html>
<?php $polaczenie=mysqli_connect('localhost','root','','dawwad'); ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl6.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="baner1"><h2>MÓJ ORGANIZER</h2></div>
    <div id="baner2">
        <form method="post" action="organizer.php">
            <label for="wydarzenie">Wpis wydarzenia:</label>
            <input type="text" id="wydarzenie" name="wydarzenie">
            <button type="submit" id='zapis' name='zapis'>ZAPISZ</button>
        </form>
<?php
if(isset($_POST['zapis'])){
    $wydarzenie=$_POST['wydarzenie'];
    $zapytanie="UPDATE zadania SET wpis='$wydarzenie' where dataZadania='2020-08-27'";
    $wynik=mysqli_query($polaczenie,$zapytanie);
}
?>
    </div>
    <div id="baner3"><img src="logo2.png" alt="Mój organizer" width='100px' height='100px'></div>

    <div id="glowny">
<?php
$zapytanie="SELECT dataZadania, miesiac, wpis from `zadania` where miesiac='sierpien'";
$wynik=mysqli_query($polaczenie,$zapytanie);
while($wiersz=mysqli_fetch_array($wynik)){
    echo "<div class='blok'><h6>".$wiersz['dataZadania'].", ".$wiersz['miesiac']."</h6><br><p>".$wiersz['wpis']."</p></div>";
}

?>
    </div>
    <div id="stopka">
<?php
$zapytanie="SELECT miesiac, rok from zadania WHERE dataZadania='2020-08-01'";
$wynik=mysqli_query($polaczenie,$zapytanie);
while($wiersz=mysqli_fetch_array($wynik)){
    echo "<h1> miesiąc: ".$wiersz['miesiac'].", rok: ".$wiersz['rok']."</h1>";
}
mysqli_close($polaczenie);
?>
        <p>Stronę wykonał:00111222333</p>
    </div>
</body>
</html>