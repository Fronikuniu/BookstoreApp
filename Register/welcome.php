<?php
session_start();

if (!isset($_SESSION['RegisterComplete'])) {
  header('Location: ../Register');
  exit();
} else {
  unset($_SESSION['RegisterComplete']);
}

//Removing stored values from the form
if (isset($_SESSION['rd_firstname'])) unset($_SESSION['rd_firstname']);
if (isset($_SESSION['rd_lastname'])) unset($_SESSION['rd_lastname']);
if (isset($_SESSION['rd_login'])) unset($_SESSION['rd_login']);
if (isset($_SESSION['rd_email'])) unset($_SESSION['rd_email']);
if (isset($_SESSION['rd_password'])) unset($_SESSION['rd_password']);
if (isset($_SESSION['rd_repeatpassword'])) unset($_SESSION['rd_repeatpassword']);
if (isset($_SESSION['rd_termsofuser'])) unset($_SESSION['rd_termsofuser']);

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

  <META HTTP-EQUIV="Refresh" CONTENT="5; URL=http://froniudev.pl/Login/">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
</head>

<body>
  <div class="login-register-body">
    <div class="login-register-container">
      <div class="register-welcome">

        <h1>Dziękujemy za rejestracje w naszym serwisie.</h1>
        <h2>Za 5 sekund nastąpi przeniesienie do logowania.</h2>



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