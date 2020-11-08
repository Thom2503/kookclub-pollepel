<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Account maken</title>
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
        <h2>Maak hier een account aan: </h2>
          <form method="post" action="maken_verwerk.php">
          <div class="maak">
            <table>
              <tr>
                <td>Gebruikersnaam: </td>
                <td><input type="text" name="username" placeholder="Username" required></td>
              </tr>
              <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Email" required /></td>
              </tr>
              <tr>
                <td>Wachtwoord: </td>
                <td> <input type="password" name="password" placeholder="Password" required></td>
              </tr>
              <tr>
                <td>&nbsp </td>
                <td><input type="submit" name="submit" value="Login"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
