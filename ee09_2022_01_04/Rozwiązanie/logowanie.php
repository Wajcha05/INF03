<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <section class="baner">
        <h1>Forum wielbicieli psów</h1>
    </section>
    <section class="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </section>
    <section class="prawy1">
        <h2>Zapisz się</h2>
        <form action="" method="post">
            <label>login: </label><input type="text" name="login"><br>
            <label>hasło: </label><input type="password" name="pass"><br>
            <label>powtórz hasło: </label><input type="password" name="passr"><br>
            <button type="submit" name="button">Zapisz</button>
        </form>
        <?php 
        $db = mysqli_connect('localhost', 'root', '', 'psy');

        if(isset($_POST['button'])){
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $passr = $_POST['passr'];
            $error = FALSE;

            if($login == '' || $pass == '' || $passr == ''){
                echo "<p>wypełnij wszystkie pola</p>";
                $error = TRUE;
            }

            $query = "SELECT login FROM uzytkownicy;";
            $output = mysqli_query($db, $query);
            while($row = mysqli_fetch_row($output)){
                if($login == $row[0]){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                    $error = TRUE;
                    break;
                }
            }

            if($pass != $passr){
                echo "<p>hasło nie są takie same, konto nie zostało dodane</p>";
                $error = TRUE;
            }
            
            if($error == FALSE){
                $cipher = sha1($pass);
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
            <li>właścicieli psów</li>
            <li>weterynarz</li>
            <li>tych co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <section class="stopka">
        <label>Stronę wykonał: 00000000</label>
    </section>
</body>
</html>
