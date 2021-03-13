<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" media="(min-width: 768px)" href="/styles/tablet.css">
    <link rel="stylesheet" media="(min-width: 1024px)" href="/styles/laptop.css">
    <link rel="stylesheet" media="(min-width: 1440px)" href="/styles/desktop.css">
    <link rel="shortcut icon" href="/images/icon.svg">
    <title>Księgarnia internetowa | Home</title>
</head>

<body>
    <?php include "HTML/nav.html" ?>

    <main>
        <div class="landing-page">
            <div class="landing-page-shadow">
                <div class="container">
                    <div class="landing-page__text">
                        <h1>Witamy na stronie naszej księgarni internetowej.</h1>
                        <h2>Znajdziesz tutaj wiele ciekawych książek!</h2>
                        <p></p>
                    </div>

                    <a href="#ReadOn" class="landing-page__button">
                        <span class="material-icons md-48">keyboard_arrow_down</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="ReadOn">

        </div>

        <div class="about" id="Onas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4311.6357021834865!2d21.99259769394797!3d50.01671691681238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5263b5bb18f1d1c1!2zWmVzcMOzxYIgU3prw7PFgiBFbGVrdHJvbmljem55Y2ggdyBSemVzem93aWU!5e0!3m2!1spl!2spl!4v1614690259285!5m2!1spl!2spl" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </main>

    <?php include "HTML/footer.html" ?>

    <script src="/JS/main.js" type="module"></script>
    <script src="/JS/fixed-menu.js"></script>
</body>

</html>