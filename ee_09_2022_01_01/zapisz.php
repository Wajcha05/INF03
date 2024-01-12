<?php 
$connect = mysqli_connect('localhost','root','','wedkowanie');
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$adres = $_POST['adres'];
$pytanie = "INSERT INTO `karty_wedkarskie`(`id`, `imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ('','$imie','$nazwisko','$adres',NULL,NULL)";
$querry = mysqli_query($connect, $pytanie);
mysqli_close($connect);
?>