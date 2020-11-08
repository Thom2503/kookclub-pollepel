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
  <title>Zoekresultaten</title>
</head>
  <body>
    <?php
      require 'config.php';

      if (!isset($_POST['search-input']))
      {
        header("location: index.php");
      }

      $search = $_POST['search-bar-input'];

      $query = "SELECT * FROM Gerechten WHERE titel LIKE '%". $search ."%' OR ingredienten LIKE '%". $search ."%'";
      $searchQuery = mysqli_query($mysqli, $query);
      if (mysqli_num_rows($searchQuery) != 0)
      {
        $result = mysqli_fetch_assoc($searchQuery);
      }


     ?>
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
        <h2>Resultaten van het zoeken</h2>
        <p>Wat je hebt gezocht: </p><?php echo $search ?>
        <?php
          if (mysqli_num_rows($searchQuery) != 0)
          {
            do
            {
              ?>
                <div class="gerechten">
                  <table border="0">
                    <td><a class='voor' href='<?php echo 'gerecht_detail.php?id='. $result['Gerecht_ID'] .'' ?>'><?php echo $result['titel']; ?></a></td>
                    <td><?php echo $result['datum']; ?></td>
                    <td><?php echo $result['tijd']; ?></td>
                    <td> <a  class='wvknop' href='<?php echo 'wijzig.php?id='. $result['Gerecht_ID'] .'' ?>'>wijzig</a></td>;
                    <td> <a  class='wvknop' href='<?php echo 'verwijderen.php?id='. $result['Gerecht_ID'] .'' ?>'>verwijder</a></td>;
                  </table>
                </div>
              <?php
            } while ($result = mysqli_fetch_assoc($searchQuery));
          } else
          {
            die("Geen resultaten gevonden!");
          }
         ?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
