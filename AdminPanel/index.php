<?php
session_start();

if (!isset($_SESSION['logged']) && ($_SESSION['logged'] == false)) {
    // if (!isset($_SESSION['AdminPanel']) && ($_SESSION['AdminPanel'] == false)) {
    header('Location: ../');
    exit();
    // }
};

include "AddToBase.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" media="(min-width: 768px)" href="/styles/tablet.css">
    <link rel="stylesheet" media="(min-width: 1024px)" href="/styles/laptop.css">
    <link rel="stylesheet" media="(min-width: 1440px)" href="/styles/desktop.css">
    <link rel="shortcut icon" href="/images/icon-AdminPanel.svg">
    <title>Księgarnia internetowa | Admin Panel</title>
</head>

<body>
    <div class="admin-panel-container">
        <h1>Admin Panel</h1>
        <div class="admin-panel-form">

            <a class="material-icons md-34 login-register-close" href="../">close</a>

            <form method="POST" class="ap-form">
                <?php
                //Title input and Title error text
                if (isset($_SESSION['error_title'])) {
                    echo '<div>';
                    echo '<input class="error" type="text" name="title" placeholder="Tytuł">';
                    echo '<span class="error-textPA">' . $_SESSION['error_title'] . '</span>';
                    echo '</div>';
                    unset($_SESSION['error_title']);
                } else {
                    echo '<input type="text" name="title" placeholder="Tytuł">';
                }

                //Author input and Author error text
                if (isset($_SESSION['error_author'])) {
                    echo '<div>';
                    echo '<input class="error" type="text" name="author" placeholder="Autor">';
                    echo '<span class="error-textPA">' . $_SESSION['error_author'] . '</span>';
                    echo '</div>';
                    unset($_SESSION['error_author']);
                } else {
                    echo '<input type="text" name="author" placeholder="Autor">';
                }

                //Description input and Description error text
                if (isset($_SESSION['error_description'])) {
                    echo '<div>';
                    echo '<textarea type="text" name="description" class="panel-admin-desc error" placeholder="Opis"></textarea>';
                    echo '<span class="error-textPA">' . $_SESSION['error_description'] . '</span>';
                    echo '</div>';
                    unset($_SESSION['error_description']);
                } else {
                    echo '<textarea type="text" name="description" class="panel-admin-desc" placeholder="Opis"></textarea>';
                }
                ?>

                <label for="table">Wybierz tablice:</label>
                <select name="table" id="">
                    <option value="ksiazki">Ksiazki</option>
                    <option value="wideo">Wideo</option>
                </select>

                <label for="category">Wybierz kategorię:</label>
                <select name="category">
                    <optgroup label="Kategorie dla ksiazek">
                        <option value="literatura">Literatura</option>
                        <option value="lektury">Lektury</option>
                        <option value="ksiazki_obcojezyczne">Ksiązki obcojęzyczne</option>
                        <option value="podreczniki">Podreczniki</option>
                        <option value="biografie">Biografie</option>
                        <option value="dokumentalne">Dokumentalne</option>
                    </optgroup>
                    <optgroup label="Kategorie dla wideo">
                        <option value="ebooki">E-booki</option>
                        <option value="audiobooki">Audiobooki</option>
                        <option value="filmy">Filmy</option>
                        <option value="muzyka">Muzyka</option>
                    </optgroup>
                </select>

                <div class="admin-panel-buttons">
                    <input type="reset" value="Wyczyść formularz">
                    <input type="submit" value="Dodaj książkę">
                </div>
            </form>

            <?php
            //Message if book was added into database
            if (isset($_SESSION['Added'])) {
                echo '<div>';
                echo '<span class="error-textPA--added">' . $_SESSION['Added'] . '</span>';
                echo '<div>';
                unset($_SESSION['Added']);
            }
            ?>
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