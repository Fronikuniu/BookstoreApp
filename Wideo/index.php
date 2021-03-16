<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" media="(min-width: 768px)" href="/styles/tablet.css">
    <link rel="stylesheet" media="(min-width: 1024px)" href="/styles/laptop.css">
    <link rel="stylesheet" media="(min-width: 1440px)" href="/styles/desktop.css">
    <link rel="shortcut icon" href="/images/icon-wideo.svg">
    <title>Księgarnia internetowa | Wideo</title>
</head>

<body>
    <?php include "../HTML/nav.php" ?>

    <main>
        <div class="landing-page landing-page-video">
            <div class="landing-page-shadow">
                <div class="container">
                    <div class="landing-page__text">
                        <h1>Witaj w dziale poświęconym audio i wideo.</h1>
                        <h2>Wpisz co chcesz wyszukać:</h2>
                        <p></p>

                        <a href="#ReadOn" class="landing-page__button">
                            <span class="material-icons md-48">keyboard_arrow_down</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php include "displayWideo.php" ?>

        <?php include "../HTML/footer.php" ?>

        <?php include "../HTML/scripts.php" ?>
</body>

</html>