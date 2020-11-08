<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("location:inlog.php");
  } else
  {
    echo "<h2 hidden> Welkom, ". $_SESSION['username'] ."</h2>";
    echo "<h2 hidden>Je ID is ". $_SESSION['User_ID'] ."</h2>";
    echo "<h2 hidden>Je Level is ". $_SESSION['level'] ."</h2>";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css">
  <title>Verwijderen aan het verwerken...</title>
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
          if (isset($_POST['submit']))
          {
            require 'config.php';

            //om zeker te weten dat de data is gevuld.
            $user = null;
            $ID = null;
            if(isset($_POST['ID'])){
                $ID = $_POST['ID'];
            }

            if(isset($_POST['user'])){
                $user = $_POST['user'];
            }

            //for debugging
            //var_dump($user);

            $query = 'DELETE FROM Gerechten WHERE Gerecht_ID = ' . $ID;
            //for debugging
            //echo $query . "<br>";
            if ($_SESSION['User_ID'] == $user or $_SESSION['level'] >= 1)
            {
              if (mysqli_query($mysqli, $query))
              {
                  echo "<p> Gerecht is verwijderd!</p>";
              } else
              {
                echo "<p>FOUT, de gerecht is niet verwijderd!</p>";
                echo mysqli_error($mysqli);
              }
            } else
            {
              //als de user geen admin is of niet de user is van wie de post is mag het niet verwijderd worden.
              die('Je hebt niet de rechten om dit gerecht te verwijderen!');
            }
          } else
          {
            echo "<p> Geen gegevens ontvangen!</p>";
          }

          echo "<p><a href='index.php'>TERUG</a> naar homepagina</p>";
       ?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
