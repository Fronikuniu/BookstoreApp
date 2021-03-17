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

            <a class="material-icons md-34 login-register-close" href="../">close</a>

            <div class="login-container">
                <h1>Zaloguj się</h1>

                <div>
                    <form action="login.php" method="POST" class="login-form">
                        <?php
                        //Login, password input and Login, password error text
                        if (isset($_SESSION['error'])) {
                            echo '<input class="error" type="text" name="login" placeholder="Login">';
                            echo '<div>';
                            echo '<input class="error" type="password" name="password" placeholder="Hasło">';
                            echo '<span class="error-text">' . $_SESSION['error'] . '</span>';
                            echo '</div>';
                            unset($_SESSION['error']);
                        } else {
                            echo '<input type="text" name="login" placeholder="Login">';
                            echo '<input type="password" name="password" placeholder="Hasło">';
                        }
                        ?>

                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="remember">
                                Zapamiętaj mnie
                            </label>
                        </div>

                        <input type="submit" name="login-submit" value="Zaloguj się">

                        <a href="">Nie pamiętasz hasła?</a>
                    </form>
                </div>

                <div class="responsive-register-container">
                    <div class="responsive-login-register--text">
                        <h2>Nie masz jeszcze konta?</h2>
                        <button>
                            <a href="../Register/">Zarejestruj się!</a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="register-container">
                <div class="login-register--text">
                    <h2>Nie masz jeszcze konta?</h2>
                    <p>Zarejestruj sie i korzystaj z naszej aplikacji księgarni internetowej!</p>
                    <button>
                        <a href="../Register/">Zarejestruj się!</a>
                    </button>
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