<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    echo "<h2 hidden> U bent nog niet ingelogd dat kan u hier doen: </h2>";
    echo "<a href='account_maken.php' hidden>hier</a>";
  } else
  {
    echo "<h2 hidden> Welkom, ". $_SESSION['username'] ."</h2>";
    echo "<h2 hidden>Je ID is ". $_SESSION['User_ID'] ."</h2>";
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css">
  <title><?php echo $rij['titel']; ?></title>
</head>
  <body>
    <div class="container">
      <div class="header">
        <h1>Kookclub de Pollepel</h1>
        <div class="menu">
          <nav>
            <ul>
              <li><a href="index.php"> Home </a></li>
              <li><a href="voor_gerechten.php">Voorgerechten</a></li>
              <li><a href="hoofd_gerechten.php">Hoofdgerechten</a></li>
              <li><a href="na_gerechten.php">Nagerechten</a></li>
              <li><a href="basis.php">Basistechnieken</a></li>
              <li><a href="specials.php">Specials</a></li>
              <li><a href="gerecht_toevoeg.php">Gerecht toevoegen</a></li>
              <li><a href="inlog.php">Inloggen</a></li>
              <li><a href='loguit.php'>Log uit</a></li>
              <li><form class="" action="search.php" method="post"></li>
              <li><input class="search" name="search-bar-input"  placeholder="Zoek een gerecht"></li>
              <li><input type="submit" onclick=""class="searchButton" value="" name="search-input"></li>
              <li></form></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="main">
        <?php
          require 'config.php';

          $id = $_GET['id'];

          $query = "SELECT * FROM Gerechten WHERE Gerecht_ID = " . $id;
          $resultaat = mysqli_query($mysqli, $query);
          $band = mysqli_fetch_array($resultaat);

          //$q = "SELECT * FROM Users WHERE id";

          if (mysqli_num_rows($resultaat) == 0)
          {
            echo "<p> Er is geen gerecht met ID $id.</p>";
          } else
          {
            $result = mysqli_query($mysqli, $query);
            $rij = mysqli_fetch_array($result);
            ?>
            <div class="container_gerecht">
              <div class="titel">
                <?php echo "<h2>". $rij['titel'] ."</h2>"; ?>
              </div>
              <div class="user">
                <h3>Gebruiker</h3>
                <?php
                  // dit is zo gedaan om de username te laten zien inplaats dan de user ID7
                  $idUser = $rij['user'];
                  $q = "SELECT * FROM Users WHERE User_ID = " . $idUser;
                  $r = mysqli_query($mysqli, $q);
                  $user = mysqli_fetch_array($r);

                  echo $user['username'];
                ?>
              </div>
              <div class="soort">
                <h3>Soort gerecht</h3>
                <?php echo $rij['soort']; ?>
              </div>
              <div class="bereidingstijd">
                <h3>Bereidingstijd</h3>
                <?php echo $rij['tijd']; ?>
              </div>
              <div class="ingredienten">
                <h3>Ingredienten</h3>
                <?php echo $rij['ingredienten']; ?>
              </div>
              <div class="bereiding">
                <h3>Bereiding</h3>
                <?php echo $rij['bereiding']; ?>
              </div>
            </div>
            <?php
            }
         ?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
