<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("location:inlog.php");
  } else
  {
    echo "<h2 hidden> Welkom, ". $_SESSION['username'] ."</h2>";
    echo "<h2 hidden>Je ID is ". $_SESSION['User_ID'] ."</h2>";
    echo "<h2 hidden>Je level is ". $_SESSION['level'] ."</h2>";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css">
  <title>Verwijder</title>
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
          $gid = $_GET['id'];

          $query = "SELECT * FROM Gerechten WHERE Gerecht_ID = " . $gid;

          $resultaat = mysqli_query($mysqli, $query);

          if (mysqli_num_rows($resultaat) == 0)
          {
            echo "<p> Er is geen gerecht met ID $gid</p>";
          } else
          {
            $rij = mysqli_fetch_array($resultaat);
            ?>
            <p> Wilt u het volgende gerecht verwijderen?</p>
            <form name='form1' action="verwijderen_verwerk.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $rij['Gerecht_ID'] ?>" >
              <p> Titel Gerecht:
              <input type="text" name="naam" value="<?php echo $rij['titel'] ?>" disabled></p>
              <p> Soort:
              <input type="text" name="soort" value="<?php echo $rij['soort'] ?>" disabled></p>
              <p> Gebruiker:
              <input type="number" name="userDecoy" value="<?php echo $rij['user'] ?>"  disabled></p>
              <input type="hidden" name="user" value="<?php echo $rij['user'] ?>"></p>
              <p><input type="submit" name="submit" value="Verwijder!"></p>
            </form>
            <?php
          }
          echo "<p><a href='index.php'>TERUG</a> naar overzicht.</p>";
         ?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
