<?php
session_start();

if (!isset($_SESSION['logged']) && ($_SESSION['logged'] == false)) {
    if (($_SESSION['AdminPanel'] == 0) || ($_SESSION['AdminPanel'] == false)) {
        header('Location: ../');
        exit();
    }
};
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
            <form action="AddToBase.php" class="ap-form">
                <input type="text" name="title" placeholder="Tytuł">
                <input type="text" name="author" placeholder="Autor">
                <textarea type="text" name="description" class="panel-admin-desc" placeholder="Opis"></textarea>

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
                        <option value="ksiązki_obcojęzyczne">Ksiązki obcojęzyczne</option>
                        <option value="podreczniki">Podreczniki</option>
                        <option value="biografie">Biografie</option>
                        <option value="dokumentalne">Dokumentalne</option>
                    </optgroup>
                    <optgroup label="Kategorie dla wideo">
                        <option value="e-booki">E-booki</option>
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