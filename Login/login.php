<?php

session_start();
require_once "../PHP/connect.php";

try {
  $connect = new mysqli($host, $db_user, $db_password, $db_name);

  if ($connect->connect_errno != 0) {
    throw new Exception(mysqli_connect_errno());
  } else {

    $login = $_POST['login'];
    $haslo = $_POST['password'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    $sql = sprintf(
      "SELECT * FROM users WHERE login='%s'",
      mysqli_real_escape_string($connect, $login)
    );

    $response = $connect->query($sql);
    if (!$response) {
      throw new Exception($connect->error);
    }

    $numberOfUsers = $response->num_rows;
    if ($numberOfUsers > 0) {
      $row = $response->fetch_assoc();

      if (password_verify($haslo, $row['password']) == true) {

        $_SESSION['logged'] = true;

        $_SESSION['id'] = $row['id'];
        $_SESSION['Name'] = $row['login'];
        $accessToAP = $row['accessToAP'];

        if ($accessToAP == 1) {
          $_SESSION['AdminPanel'] = true;
        }

        unset($_SESSION['error']);
        $response->close();
        header('Location: ../');
      } else {
        $_SESSION['error'] = 'Niepoprawny login lub hasło!';
        header('Location: ../Login/');
      }
    } else {
      $_SESSION['error'] = 'Niepoprawny login lub hasło!';
      header('Location: ../Login/');
    }

    $connect->close();
  }
} catch (Exception $error) {
  echo 'Błąd serwera';
  echo $error;
}
