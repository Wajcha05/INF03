<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <section class="banner">
        <h1>Forum wielbicieli psów</h1>
    </section>
    <section class="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </section>
    <section class="prawy1">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post" class="form">
            <label>login: <input type="text" name="login"><br></label>
            <label>haslo: <input type="password" name="haslo"><br></label>
            <label>powtórz hasło: <input type="password" name="haslor"><br></label>
            <button type="submit">Zapisz</button>
        </form>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'psy');

        if(isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['haslor'])){
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslor = $_POST['haslor'];
            $error = FALSE;
            
            if($login == '' || $haslo == '' || $haslor == ''){
                echo "<p>wypełnij wszystkie pola</p>";
                $error = TRUE;
            }

            $query = "SELECT login FROM `uzytkownicy`;";
            $res = mysqli_query($db, $query);
            while($tab = mysqli_fetch_row($res)){
                if($login == $tab[0]){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                    $error = TRUE;
                    break;
                }
            }

            if($haslo != $haslor){
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                $error = TRUE;
            }

            if($error == FALSE){
                $cipher = sha1($haslo);
                $query2 = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$cipher');";
                mysqli_query($db, $query2);
                echo "<p>Konto zostało dodane</p>";
            }
        }

        mysqli_close($db);
    ?>
    </section>
    <section class="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właściciel psów</li>
            <li>weterynarzy</li>
            <li>tych co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <section class="stopka">
        Stronę wykonał: 0000000000
    </section>
</body>
</html>