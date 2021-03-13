<?php

if (isset($_POST['firstname'])) {
  //If validation complete
  $validationComplete = true;

  $regexName = '/!|@|#|\$|%|\^|&|\*|\(|\)|-|_|=|\+|\[|\]|{|}|\||\\\\|:|;|"|\'|,|\.|<|>|\?|\/|`|~|\s/m';
  $regexLogin = '/!|@|#|\$|%|\^|&|\*|\(|\)|_|=|\+|\[|\]|{|}|\||\\\\|:|;|"|\'|,|\.|<|>|\?|\/|`|~|\s/m';

  //Correctness of the FirstName
  $firstname = $_POST['firstname'];
  if ((strlen($firstname) < 3) || (strlen($firstname) > 23)) {
    $validationComplete = false;
    $_SESSION['error_firstname'] = "Imię musi zawierać od 3 do 23 znaków.";
    $_SESSION['error_name'] = "Imię i nazwisko muszą zawierać od 3 do 23 znaków.";
  }

  if (preg_match_all($regexName, $firstname, $matchesFName, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_firstname'] = "Imię musi składać sie tylko z liter i cyfr. Niedozwolone znaki: " . json_encode($matchesFName);
    $_SESSION['error_name'] = "Imię i nazwisko muszą składać sie tylko z liter i cyfr.";
  }

  //Correctness of the LastName
  $lastname = $_POST['lastname'];
  if ((strlen($lastname) < 3) || (strlen($lastname) > 23)) {
    $validationComplete = false;
    $_SESSION['error_lastname'] = "Nazwisko musi zawierać od 3 do 23 znaków.";
    $_SESSION['error_name'] = "Imię i nazwisko muszą zawierać od 3 do 23 znaków.";
  }

  if (preg_match_all($regexName, $lastname, $matchesLName, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_lastname'] = "Nazwisko musi składać sie tylko z liter i cyfr. Niedozwolone znaki: " . json_encode($matchesLName);
    $_SESSION['error_name'] = "Imię i nazwisko muszą składać sie tylko z liter i cyfr.";
  }

  //Correctness of the Login
  $login = $_POST['login'];
  if ((strlen($login) < 3) || (strlen($login) > 20)) {
    $validationComplete = false;
    $_SESSION['error_login'] = "Login musi zawierać od 3 do 20 znaków.";
  }

  if (preg_match_all($regexLogin, $login, $matchesLogin, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_login'] = "Login musi składać sie tylko z liter i cyfr. Niedozwolone znaki: " . json_encode($matchesLogin);
  }

  //Correctness of the Email
  $email = $_POST['email'];
  $emailSafe = filter_var($email, FILTER_SANITIZE_EMAIL);
  if ((filter_var($emailSafe, FILTER_VALIDATE_EMAIL) == false) || ($emailSafe != $email)) {
    $validationComplete = false;
    $_SESSION['error_email'] = "Podałeś błędny email.";
  }

  //Correctness of the Password
  $password = $_POST['password'];
  $repeatpassword = $_POST['repeatpassword'];
  if ((strlen($password) < 8) || (strlen($password) > 30)) {
    $validationComplete = false;
    $_SESSION['error_password'] = "Hasło powinno zawierac od 8 do 30 znaków.";
  }

  if ($password != $repeatpassword) {
    $validationComplete = false;
    $_SESSION['error_password'] = "Podane hasła nie zgadzają się.";
  }

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  //Correctness of accepting the TermsOfUser
  if (!isset($_POST['termsofuser'])) {
    $validationComplete = false;
    $_SESSION['error_termsofuser'] = "Musisz zaakceptowac regulamin.";
  }

  //CAPTCHA
  $secretKey = "6Le8MHgaAAAAAFK2STjErN3FCr0jG0rrkxOyCHyL";
  $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
  $response = json_decode($check);

  if ($response->success == false) {
    $validationComplete = false;
    $_SESSION['error_captcha'] = "Musisz pomyślnie przejść captche.";
  }

  //Remembering the entered data
  $_SESSION['rd_firstname'] = $firstname;
  $_SESSION['rd_lastname'] = $lastname;
  $_SESSION['rd_login'] = $login;
  $_SESSION['rd_email'] = $email;
  $_SESSION['rd_password'] = $password;
  $_SESSION['rd_repeatpassword'] = $repeatpassword;
  if (isset($_POST['termsofuser'])) $_SESSION['rd_termsofuser'] = true;

  //Connect with DataBase
  require_once "../PHP/connect.php";
  mysqli_report(MYSQLI_REPORT_STRICT);

  try {
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    if ($connect->connect_errno != 0) {
      throw new Exception(mysqli_connect_errno());
    } else {

      //Checking if the same email is already in the database
      $responseEmail = $connect->query("SELECT id FROM users WHERE email='$email'");
      if (!$responseEmail) {
        throw new Exception($connect->error);
      }

      $numberOfRows = $responseEmail->num_rows;
      if ($numberOfRows > 0) {
        $validationComplete = false;
        $_SESSION['error_email'] = "Podany adres email jest juz przypisany do innego konta.";
      }

      //Checking if the same login is already in the database
      $responseLogin = $connect->query("SELECT id FROM users WHERE login='$login'");
      if (!$responseLogin) {
        throw new Exception($connect->error);
      }

      $numberOfRows = $responseLogin->num_rows;
      if ($numberOfRows > 0) {
        $validationComplete = false;
        $_SESSION['error_login'] = "Podany login jest już zajęty przez innego użytkownika.";
      }

      //If all validation was complete
      if ($validationComplete == true) {

        if ($connect->query("INSERT INTO `users` (`firstName`, `lastName`, `login`, `password`, `email`) VALUES('$firstname', '$lastname', '$login', '$password_hash', '$email');")) {
          $_SESSION['RegisterComplete'] = true;

          header('Location: welcome.php');
        } else {
          throw new Exception($connect->error);
        }
      }

      $connect->close();
    }
  } catch (Exception $error) {
    echo 'Błąd serwera.';
    // echo $error;
  }
}
