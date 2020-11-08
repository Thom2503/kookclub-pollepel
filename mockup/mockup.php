<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css">
  <title>Log in</title>
</head>
  <body>
    <?php
      //php gaat hier
     ?>
    <div class="container">
      <div class="header">
        <h1>Kookclub de Pollepel</h1>
        <div class="menu">
          <nav>
            <ul>
              <li><a href="index.php"> Home </a></li>
              <li><a href="voor_gerechten.php">Voorgerechten</a></li>
              <li><a href="#">Hoofdgerechten</a></li>
              <li><a href="#">Nagerechten</a></li>
              <li><a href="#">Basistechnieken</a></li>
              <li><a href="#">Specials</a></li>
              <li><a href="#">Gerecht toevoegen</a></li>
              <li><a href="inlog.php">Inloggen</a></li>
              <li><a href='loguit.php'>Log uit</a></li>
              <li><input class="search" id="search-bar-input" placeholder="Zoek voor een gerecht"></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="main">
        <!-- hier gaat de html van de main content die daar moet komen. -->
      </div>
    </div>
    <?php
    }
    ?>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
