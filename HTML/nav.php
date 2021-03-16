<nav class="menu" id="menu">
  <div class="container">
    <div class="menu__top">
      <a href="/">
        <img src="/images/logo.svg" alt="Logo">
      </a>

      <div class="menu__top__search" style="display: none;">
        <label for="SearchBooks"></label>
        <input placeholder="Wyszukaj w internecie" type="text" name="SearchBooks" class="input-search" id="searchInput">
        <button class="btn btn--search " type="submit" id="searchButton">
          <span class="material-icons md-36">search</span>
        </button>
      </div>


      <button class="btn burger-menu material-icons md-36" id="burger-menu">
        menu
      </button>

      <div class="menu__top__login">

        <?php
        //If the user has access to the admin panel

        if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
          if ($_SESSION['AdminPanel'] == 1) {
            echo "<p>Zalogowano jako: <br>" . @$_SESSION['Name'] . "</p>";
          } else {
            echo "<p>Zalogowano jako: <br>" . @$_SESSION['Name'] . "</p>";
          }
        } else {
          echo "<p>Witaj Nieznajomy!</p>";
        }

        ?>
        <div>
          <?php
          if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
            if ($_SESSION['AdminPanel'] == 1) {
              echo '<button class="btn">
                <a href="../AdminPanel/" class="material-icons md-36">admin_panel_settings</a>
                </button>';
            }
          }
          ?>
          <button class="btn">
            <a href="/Login/" class="material-icons md-36">person</a>
          </button>
          <button class="btn">
            <a href="/Login/logout.php" class="material-icons md-36">person_off</a>
          </button>
        </div>
      </div>
    </div>

    <div class="menu__bottom">
      <div class="dropdown">
        <button>
          <a href="/">Strona główna</a>
        </button>

        <div class="books">
          <button>
            <a href="/Ksiazki/">Książki</a>
            <span class="material-icons">keyboard_arrow_down</span>
          </button>

          <ul>
            <li>
              <a href="/Ksiazki/#Literatura">
                <span class="material-icons">book</span>
                Literatura
              </a>
            </li>
            <li>
              <a href="/Ksiazki/#Lektury">
                <span class="material-icons">auto_stories</span>
                Lektury
              </a>
            </li>
            <li>
              <a href="/Ksiazki/#Ksiązki_obcojęzyczne">
                <span class="material-icons">menu_book</span>
                Ksiązki obcojęzyczne
              </a>
            </li>
            <li>
              <a href="/Ksiazki/#Podreczniki">
                <span class="material-icons">import_contacts</span>
                Podręczniki
              </a>
            </li>
            <li>
              <a href="/Ksiazki/#Biografie">
                <span class="material-icons">local_library</span>
                Biografie
              </a>
            </li>
            <li>
              <a href="/Ksiazki/#Dokumentalne">
                <span class="material-icons">description</span>
                Dokumentalne
              </a>
            </li>
          </ul>
        </div>

        <div class="video">
          <button>
            <a href="/Wideo/">Wideo</a>
            <span class="material-icons">keyboard_arrow_down</span>
          </button>

          <ul>
            <li>
              <a href="/Wideo/#EBooki">
                <span class="material-icons md-30">earbuds</span>
                E-booki
              </a>
            </li>
            <li>
              <a href="/Wideo/#Audiobooki">
                <span class="material-icons md-30">headphones</span>
                Audiobooki
              </a>
            </li>
            <li>
              <a href="/Wideo/#Filmy">
                <span class="material-icons md-30">local_movies</span>
                Filmy
              </a>
            </li>
            <li>
              <a href="/Wideo/#Muzyka">
                <span class="material-icons md-30">audiotrack</span>
                Muzyka
              </a>
            </li>
          </ul>
        </div>

        <button>
          <a href="#Onas">O nas</a>
        </button>

        <button>
          <a href="#Kontakt">Kontakt</a>
        </button>
      </div>
    </div>
  </div>
</nav>

<div class="responsive-menu" id="responsive-menu" style="display: none;">
  <div class="responsive-menu__links">
    <button class="btn">
      <a href="/">Strona główna</a>
    </button>

    <div class="r_books">
      <button class="btn">
        <a href="/Ksiazki/">Książki</a>
      </button>

      <ul>
        <li>
          <a href="/Ksiazki/#Literatura">
            <span class="material-icons md-24">book</span>
            Literatura
          </a>
        </li>
        <li>
          <a href="/Ksiazki/#Lektury">
            <span class="material-icons md-24">auto_stories</span>
            Lektury
          </a>
        </li>
        <li>
          <a href="/Ksiazki/#Ksiązki_obcojęzyczne">
            <span class="material-icons md-24">menu_book</span>
            Ksiązki obcojęzyczne
          </a>
        </li>
        <li>
          <a href="/Ksiazki/#Podreczniki">
            <span class="material-icons md-24">import_contacts</span>
            Podręczniki
          </a>
        </li>
        <li>
          <a href="/Ksiazki/#Biografie">
            <span class="material-icons md-24">local_library</span>
            Biografie
          </a>
        </li>
        <li>
          <a href="/Ksiazki/#Dokumentalne">
            <span class="material-icons md-24">description</span>
            Dokumentalne
          </a>
        </li>
      </ul>
    </div>

    <div class="r_video">
      <button class="btn">
        <a href="/Wideo/">Wideo</a>
      </button>

      <ul>
        <li>
          <a href="/Wideo/#E-Booki">
            <span class="material-icons md-24">earbuds</span>
            E-booki
          </a>
        </li>
        <li>
          <a href="/Wideo/#Audiobooki">
            <span class="material-icons md-24">headphones</span>
            Audiobooki
          </a>
        </li>
        <li>
          <a href="/Wideo/#Filmy">
            <span class="material-icons md-24">local_movies</span>
            Filmy
          </a>
        </li>
        <li>
          <a href="/Wideo/#Muzyka">
            <span class="material-icons md-24">audiotrack</span>
            Muzyka
          </a>
        </li>
      </ul>
    </div>

    <button class="btn">
      <a href="#Onas">O nas</a>
    </button>

    <button class="btn">
      <a href="#Kontakt">Kontakt</a>
    </button>
  </div>

  <div class="responsive-menu__buttons">
    <?php
    //If the user has access to the admin panel

    if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
      if ($_SESSION['AdminPanel'] == 1) {
        echo '<p>Zalogowano jako: <br><span style="color: tomato;">' . @$_SESSION['Name'] . '</span></p>';
      } else {
        echo '<p>Zalogowano jako: <br><span style="color: tomato;">' . @$_SESSION['Name'] . '</span></p>';
      }
    } else {
      echo "<p>Witaj Nieznajomy!</p>";
    }

    ?>
    <div class="responsive-buttons">
      <?php
      if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
        if ($_SESSION['AdminPanel'] == 1) {
          echo '<button class="btn">
                <a href="../AdminPanel/" class="material-icons md-36">admin_panel_settings</a>
                </button>';
        }
      }
      ?>
      <button class="btn">
        <a href="/Login/" class="material-icons md-36">person</a>
      </button>
      <button class="btn">
        <a href="/Login/logout.php" class="material-icons md-36">person_off</a>
      </button>
    </div>
  </div>
</div>
</div>