<div class="display">
  <div class="container">
    <div id="ReadOn" class="display-books">
      <form method="POST">
        <select name="select">
          <option value="tytul" selected>Tytuł</option>
          <option value="autor">Autor</option>
        </select>
        <input type="text" name="search" placeholder="Podaj tytuł lub autora">
        <input type="submit" value="Wyszukaj" href="#ReadOn">
      </form>
    </div>
  </div>

  <div class="container">
    <div class="wrap-list">
      <?php
      require_once "../PHP/connect.php";

      if (isset($_POST['search'])) {
        $regexTitle = '/!|@|#|\$|%|\^|&|\*|\(|\)|_|=|\+|\[|\]|{|}|\||\\\\|:|;|"|\'|,|\.|<|>|\?|\/|`|~/m';
        $subst = '';
        $select = $_POST['select'];
        $search = $_POST['search'];
        $search = preg_replace($regexTitle, $subst, $search);

        try {
          $connect = new mysqli($host, $db_user, $db_password, $db_name);

          if ($connect->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
          }

          $sql = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `$select` LIKE '%$search%';";

          $response = $connect->query($sql);
          if (!$response) {
            throw new Exception($connect->error);
          } else {

            $numberOfRows = $response->num_rows;
            if ($numberOfRows > 0) {
              while ($row = $response->fetch_assoc()) {
                $title = $row['tytul'];
                $author = $row['autor'];
                $description = $row['opis'];
                $category = $row['kategoria'];
                $number = 100;

                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="https://via.placeholder.com/210x195" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $title . '</h5>';
                echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
                echo '<p class="card-text">' . slice($description, $number) . '</p>';
                echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo '<b>Brak danych pasujących do zapytania</b>';
            }

            $connect->close();
          }
        } catch (Exception $error) {
          echo "Błąd serwera";
          echo $error;
        }
      } else {
        echo '<p style="font-size: 20px;">Wpisz dane w polu teskstowym aby wyświetlić poszukiwaną frazę.</p>';
      }

      //Function to slice text
      function slice($description, $number)
      {
        $count = strlen($description);
        if ($count >= $number) {
          $slice = substr($description, 0, $number);
          $finalDesc = $slice . " ...";
        } else {
          $finalDesc = $description;
        }
        return $finalDesc;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Literatura</h1>
    <div id="literatura" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='literatura';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Lektury</h1>
    <div id="lektury" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='lektury';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Książki obcojęzyczne</h1>
    <div id="ksiazki_obcojezyczne" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='ksiazki_obcojezyczne';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Podręczniki</h1>
    <div id="podreczniki" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='podreczniki';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Książki biograficzne</h1>
    <div id="biografie" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='biografie';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>

  <div class="container">
    <h1>Książki dokumentalne</h1>
    <div id="dokumentalne" class="wrap-list">
      <?php
      try {
        //Polaczenie z tablica ksiazki
        $connect1 = new mysqli($host, $db_user, $db_password, $db_name);

        if ($connect1->connect_errno != 0) {
          throw new Exception(mysqli_connect_errno());
        } else {
          $sql1 = "SELECT `tytul`, `autor`, `opis`, `kategoria` FROM `ksiazki` WHERE `kategoria`='dokumentalne';";

          $response1 = $connect1->query($sql1);
          if (!$response1) {
            throw new Exception($connect1->error);
          }

          while ($row = $response1->fetch_assoc()) {
            $title = $row['tytul'];
            $author = $row['autor'];
            $description = $row['opis'];
            $category = $row['kategoria'];
            $number = 100;

            echo '<div class="card" style="width: 18rem;">';
            echo '<img src="https://via.placeholder.com/250x195" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text"><small class="text-muted">' . $author . '</small></p>';
            echo '<p class="card-text">' . slice($description, $number) . '</p>';
            echo '<p class="card-text"><small class="text-mutedC">' . $category . '</small></p>';
            echo '</div>';
            echo '</div>';
          }

          $connect1->close();
        }
      } catch (Exception $error) {
        echo "Błąd serwera";
        echo $error;
      }
      ?>
    </div>
  </div>
</div>