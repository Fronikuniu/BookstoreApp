<?php
session_start();

if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
    header('Location: ../');
    exit();
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" media="(min-width: 768px)" href="/styles/tablet.css">
    <link rel="stylesheet" media="(min-width: 1024px)" href="/styles/laptop.css">
    <link rel="stylesheet" media="(min-width: 1440px)" href="/styles/desktop.css">
    <link rel="shortcut icon" href="/images/icon-AdminPanel.svg">
    <title>Księgarnia internetowa | Logowanie</title>
</head>

<body>
    <div class="login-register-body">
        <div class="login-register-container">
            <div class="login-container">
                <h1>Zaloguj się</h1>

                <div>
                    <form action="login.php" method="POST" class="login-form">
                        <input type="text" name="login" placeholder="Login">
                        <input type="password" name="password" placeholder="Hasło">

                        <div class="form-checkbox">
                            <input type="checkbox" name="remember">
                            <label for="remember">Zapamiętaj mnie</label>
                        </div>

                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        }
                        ?>

                        <input type="submit" name="login-submit" value="Zaloguj się">

                        <a href="">Nie pamiętasz hasła?</a>
                    </form>
                </div>
            </div>

            <div class="register-container">
                <h1>Zarejestruj się</h1>

                <div>
                    <form action="" class="register-form">
                        <div class="register-names">
                            <input type="text" name="firstname" placeholder="Imie">
                            <input type="text" name="lastname" placeholder="Nazwisko">
                        </div>

                        <input type="text" name="fullname" placeholder="Login">
                        <input type="email" name="email" placeholder="E-mail">

                        <div class="register-passwords">
                            <input type="password" name="password" placeholder="Hasło">
                            <input type="password" name="repeatpassword" placeholder="Powtórz hasło">
                        </div>

                        <div class="form-checkbox">
                            <input type="checkbox" name="termsofuser">
                            <label for="termsofuser">
                                Zgadzam się z
                                <a href="">Warunkami uzytkownika</a>
                            </label>
                        </div>

                        <input type="submit" name="login-submit" value="Zarejestruj się">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="Flaticon">
        <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
        <div>Icons made by <a href="https://www.flaticon.com/authors/dave-gandy" title="Dave Gandy">Dave Gandy</a> from
            <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
        </div>
        <div>Icons made by <a href="https://www.flaticon.com/authors/eucalyp" title="Eucalyp">Eucalyp</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
    </div>
</body>

</html>