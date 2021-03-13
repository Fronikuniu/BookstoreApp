<?php

if (isset($_POST['title'])) {

  $regexTitle = '/!|@|#|\$|%|\^|&|\*|\(|\)|_|=|\+|\[|\]|{|}|\||\\\\|:|;|"|\'|,|\.|<|>|\?|\/|`|~/m';
  $regexAuthor = '/!|@|#|\$|%|\^|&|\*|\(|\)|_|=|\+|\[|\]|{|}|\||\\\\|:|;|"|\'|,|\.|<|>|\?|\/|`|~/m';
  $regexDescription = '/@|#|\$|%|\^|&|\*|\(|\)|_|=|\+|\[|\]|{|}|\||\\\\|:|;|\'|\/|`|~/m';
  $regexSpaces = '/\s{2,}/m';
  $subst = ' ';
  $validationComplete = true;

  //Correctness of the Title
  $title = $_POST['title'];
  $title = preg_replace($regexSpaces, $subst, $title);
  if ((strlen($title) < 3)) {
    $validationComplete = false;
    $_SESSION['error_title'] = "Tytuł nie może mieć mniej niż 3 znaki.";
  }

  if (preg_match_all($regexTitle, $title, $matchesTitle, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_title'] = 'Niedozwolone znaki: ' . json_encode($matchesTitle);
  }

  //Correctness of the Author
  $author = $_POST['author'];
  $author = preg_replace($regexSpaces, $subst, $author);
  if ((strlen($author) < 3)) {
    $validationComplete = false;
    $_SESSION['error_author'] = "Autor nie może mieć mniej niż 3 znaki.";
  }

  if (preg_match_all($regexAuthor, $author, $matchesAuthor, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_author'] = 'Niedozwolone znaki: ' . json_encode($matchesAuthor);
  }

  //Correctness of the Description
  $description = $_POST['description'];
  $description = preg_replace($regexSpaces, $subst, $description);
  if ((strlen($description) < 10) || (strlen($description) > 500)) {
    $validationComplete = false;
    $_SESSION['error_description'] = "Opis musi posiadać od 10 do 500 znaków";
  }

  if (preg_match_all($regexDescription, $description, $matchesDescription, PREG_SET_ORDER, 0) == true) {
    $validationComplete = false;
    $_SESSION['error_description'] = 'Niedozwolone znaki: ' . json_encode($matchesDescription);
  }

  //Extrude selected table
  $table = $_POST['table'];

  //Extrude selected category
  $category = $_POST['category'];

  //Connect with DataBase
  require_once "../PHP/connect.php";
  mysqli_report(MYSQLI_REPORT_STRICT);

  try {
    $connect = new mysqli($host, $db_user, $db_password, $db_name);

    if ($connect->connect_errno != 0) {
      throw new Exception(mysqli_connect_errno());
    } else {

      //If all validations was complete
      if ($validationComplete == true) {
        $name = $_SESSION['Name'];
        if ($connect->query("INSERT INTO `$table` (`tytul`, `autor`, `opis`, `kategoria`, `dodanoPrzez`) VALUES ('$title', '$author', '$description', '$category', '$name');")) {

          $_SESSION['Added'] = '"' . $title . '" Zostało dodane do tabeli "' . $table . '"';
        } else {
          throw new Exception($connect->error);
        }
      }
      $connect->close();
    }
  } catch (Exception $error) {
    echo 'Błąd serwera.';
    echo $error;
  }
}
