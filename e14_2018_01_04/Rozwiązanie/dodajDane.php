<?php
$db = mysqli_connect('localhost', 'root', '', 'ogloszenia');

if(isset($_POST['button'])){
    $name = $_POST['imie'];
    $surname = $_POST['nazwisko'];
    $phone = $_POST['telefon'];
    $email = $_POST['email'];

    $query = "INSERT INTO uzytkownik VALUES (NULL, '$name', '$surname', '$phone', '$email');";

    mysqli_query($db, $query);
}

mysqli_close($db);