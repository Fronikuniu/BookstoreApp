<?php

session_start();
require_once "../PHP/connect.php";

$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if ($connect->connect_errno != 0) {
  echo "Error: " . $connect->connect_errno;
} else {

  $login = $_POST['login'];
  $haslo = $_POST['password'];

  $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

  $sql = sprintf(
    "SELECT * FROM users WHERE BINARY Login='%s' AND BINARY Password='%s'",
    mysqli_real_escape_string($connect, $login),
    mysqli_real_escape_string($connect, $haslo)
  );

  if ($response = @$connect->query($sql)) {

    $numberOfUsers = $response->num_rows;

    if ($numberOfUsers > 0) {

      $_SESSION['logged'] = true;

      $row = $response->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['Name'] = $row['Login'];
      $_SESSION['AdminPanel'] = $row['AccessToAP'];

      unset($_SESSION['error']);
      $response->close();
      header('Location: ../');
    } else {
      $_SESSION['error'] = '<span style="color: tomato;">Niepoprawny login lub hasło!</span>';

      header('Location: ../Login/');
    }
  }

  $connect->close();
}
