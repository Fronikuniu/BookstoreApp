<?php
session_start();
include "register.php";
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("formularz").submit();
        }
    </script>
</head>

<body>
    <div class="login-register-body">
        <div class="login-register-container">

            <a class="material-icons md-34 login-register-close" href="../">close</a>

            <div class="login-container">
                <h1>Zarejestruj się</h1>

                <div>
                    <form id="formularz" method="POST" class="register-form">
                        <?php
                        echo '<div>';
                        echo '<div class="register-names">';

                        //FirstName remember value
                        if (isset($_SESSION['rd_firstname'])) {
                            $rd_firstname = $_SESSION['rd_firstname'];
                        } else {
                            $rd_firstname = '';
                        }
                        //FirstName input
                        if (isset($_SESSION['error_firstname'])) {
                            echo '<input class="error" type="text" name="firstname" placeholder="Imie">';
                        } else {
                            echo '<input type="text" name="firstname" value="' . $rd_firstname . '" placeholder="Imie">';
                        }

                        //LastName remember value
                        if (isset($_SESSION['rd_lastname'])) {
                            $rd_lastname = $_SESSION['rd_lastname'];
                        } else {
                            $rd_lastname = '';
                        }
                        //LastName input
                        if (isset($_SESSION['error_lastname'])) {
                            echo '<input class="error" type="text" name="lastname" placeholder="Nazwisko">';
                        } else {
                            echo '<input type="text" name="lastname" value="' . @$rd_lastname . '" placeholder="Nazwisko">';
                        }

                        echo '</div>';

                        //FirstName and LastName errot text
                        if (isset($_SESSION['error_firstname']) && isset($_SESSION['error_lastname'])) {
                            echo '<span class="error-text">' . $_SESSION['error_name'] . '</span>';
                            unset($_SESSION['error_name']);
                            unset($_SESSION['error_firstname']);
                            unset($_SESSION['error_lastname']);
                        } elseif (isset($_SESSION['error_firstname'])) {
                            echo '<span class="error-text">' . $_SESSION['error_firstname'] . '</span>';
                            unset($_SESSION['error_firstname']);
                        } elseif (isset($_SESSION['error_lastname'])) {
                            echo '<span class="error-text">' . $_SESSION['error_lastname'] . '</span>';
                            unset($_SESSION['error_lastname']);
                        }

                        echo '</div>';
                        ?>

                        <?php
                        //Login remember value
                        if (isset($_SESSION['rd_login'])) {
                            $rd_login = $_SESSION['rd_login'];
                        } else {
                            $rd_login = '';
                        }
                        //Login input and login error text
                        if (isset($_SESSION['error_login'])) {
                            echo '<div>';
                            echo '<input class="error" type="text" name="login" placeholder="Login">';
                            echo '<span class="error-text">' . $_SESSION['error_login'] . '</span>';
                            echo '</div>';
                            unset($_SESSION['error_login']);
                        } else {
                            echo '<input type="text" name="login" value="' . $rd_login . '" placeholder="Login">';
                        }
                        ?>

                        <?php
                        //Email remember value
                        if (isset($_SESSION['rd_email'])) {
                            $rd_email = $_SESSION['rd_email'];
                        } else {
                            $rd_email = '';
                        }
                        //Email input and email error text
                        if (isset($_SESSION['error_email'])) {
                            echo '<div>';
                            echo '<input class="error" type="email" name="email" placeholder="E-mail">';
                            echo '<span class="error-text">' . $_SESSION['error_email'] . '</span>';
                            echo '</div>';
                            unset($_SESSION['error_email']);
                        } else {
                            echo '<input type="email" name="email" value="' . $rd_email . '" placeholder="E-mail">';
                        }
                        ?>

                        <?php
                        echo '<div>';
                        echo '<div class="register-passwords">';

                        //Password remember value
                        if (isset($_SESSION['rd_password'])) {
                            $rd_password = $_SESSION['rd_password'];
                        } else {
                            $rd_password = '';
                        }
                        //Password input
                        if (isset($_SESSION['error_password'])) {
                            echo '<input class="error" type="password" name="password" placeholder="Hasło">';
                        } else {
                            echo '<input type="password" name="password" value="' . $rd_password . '" placeholder="Hasło">';
                        }

                        //RepeatPassword remember value
                        if (isset($_SESSION['rd_repeatpassword'])) {
                            $rd_repeatpassword = $_SESSION['rd_repeatpassword'];
                        } else {
                            $rd_repeatpassword = '';
                        }
                        //RepeatPassword input
                        if (isset($_SESSION['error_password'])) {
                            echo '<input class="error" type="password" name="repeatpassword" placeholder="Powtórz hasło">';
                        } else {
                            echo '<input type="password" name="repeatpassword" value="' . $rd_repeatpassword . '" placeholder="Powtórz hasło">';
                        }

                        echo '</div>';

                        //Password and RepeatPassword error text
                        if (isset($_SESSION['error_password'])) {
                            echo '<span class="error-text">' . $_SESSION['error_password'] . '</span>';
                            unset($_SESSION['error_password']);
                        }

                        echo '</div>';
                        ?>

                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="termsofuser" <?php //TermsOfUser remember value
                                                                            if (isset($_SESSION['rd_termsofuser'])) {
                                                                                echo "checked";
                                                                                unset($_SESSION['rd_termsofuser']);
                                                                            } ?> />
                                Zgadzam się z
                                <a href="">warunkami uzytkownika</a>
                            </label>
                            <?php
                            if (isset($_SESSION['error_termsofuser'])) {
                                echo '<span class="error-text error-text-left">' . $_SESSION['error_termsofuser'] . '</span>';
                                unset($_SESSION['error_termsofuser']);
                            }
                            ?>
                        </div>

                        <input type="submit" name="login-submit" value="Zarejestruj się" class="g-recaptcha" data-sitekey="6Le8MHgaAAAAAA9rXIEeYFCB4eGLqbvyq-phw_da" data-callback='onSubmit'>

                    </form>
                </div>

                <div class="responsive-login-register--text">
                    <h2>Masz już konto?</h2>
                    <button>
                        <a href="../Login/">Zaloguj się!</a>
                    </button>
                </div>
            </div>

            <div class="register-container">
                <div class="login-register--text">
                    <h2>Masz już konto?</h2>
                    <p>Nie czekaj i zaloguj sie na nie już teraz!</p>
                    <button>
                        <a href="../Login/">Zaloguj się!</a>
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