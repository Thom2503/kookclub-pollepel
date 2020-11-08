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
  <title> Voorgerechten </title>
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
        <ul>
          <li><a href="gerecht_toevoeg.php" class="toevoeg">Gerecht toevoegen</a></li>
        </ul>
      </br>
      </br>
      </br>
      <hr>
        <?php
      		require "config.php";

          $query = "SELECT * FROM `Gerechten` WHERE `soort` = 'voorgerecht' ORDER BY datum DESC";

          if ($resultaat = mysqli_query($mysqli, $query))
          {
            echo "<div class='gerechten'>";
            echo "<table border=0>";
            while ($gerecht = mysqli_fetch_array($resultaat))
            {
              echo "<td><a class='voor' href='gerecht_detail.php?id=".$gerecht['Gerecht_ID']."'>" . $gerecht['titel'] . "</a></td>";
              echo "<td> Datum: " . $gerecht['datum'] . "</td>";
              echo "<td> Tijd: " . $gerecht['tijd'] . "</td>";
              //De verwijder en wijzig kopjes
              echo "<td> <a class='wvknop' href='wijzig.php?id=".$gerecht['Gerecht_ID']."'>wijzig</a></td>";
              echo "<td> <a class='wvknop' href='verwijderen.php?id=".$gerecht['Gerecht_ID']."'>verwijder</a></td>";
            }
            echo "</table>";
            echo "</div>";
          } else
          {
            echo "Gerechten kunnen niet gevonden worden.";
          }
      	?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
