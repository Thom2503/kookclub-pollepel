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
      if (isset($_POST['submit']))
      {
        require 'config.php';

        $gebruikersnaam = $_POST['Gebruikersnaam'];
        $wachtwoord = $_POST['Wachtwoord'];

        $username = $gebruikersnaam;
        $username = mysqli_real_escape_string($mysqli,$username);

        $password = $wachtwoord;
        $password = mysqli_real_escape_string($mysqli,$password);

        //sql query om de table te vinden
        $sql = "SELECT * FROM `Users` WHERE username = '$username' AND
                password = '".md5($password)."'";

        //check connectie met de database en voer de query uit
        $resultaat = mysqli_query($mysqli, $sql);
        if (!$resultaat) {
            printf("Error: %s\n", mysqli_error($mysqli));
            exit();
        }

        if (!$resultaat || mysqli_num_rows($resultaat) > 0)
        {
          //pakt de user uit de database
          $user = mysqli_fetch_array($resultaat);
          //koppelt de session aan de gebruikersnaam
          $_SESSION['username']   	  = $user['username'];
          $_SESSION['level']          = $user['level'];
          $_SESSION['User_ID']        = $user['User_ID'];

          //geeft de melding
          header("location:index.php");
          //echo "<p> Hallo $gebruikersnaam, u bent successvol ingelogd</p>";
          //echo "<p> ga <a href='index.php'>verder </a></p>";
        } else
        {
          echo "<p>Naam en/of wachtwoord zijn onjuist ingevoerd!</p>";
          echo "<p><a href='inlog.php'>ga terug</a></p>";
        }
      } else
      {
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
        <h2>Log hier in: </h2>
        <div class="login">
        <form method="post" action="">
          <table border="0">
            <tr>
              <td>Gebruikersnaam: </td>
              <td><input type="text" name="Gebruikersnaam"></td>
            </tr>
            <tr>
              <td>Wachtwoord: </td>
              <td><input type="password" name="Wachtwoord"></td>
            </tr>
            <tr>
              <td>&nbsp </td>
              <td><input type="submit" name="submit" value="Login"></td>
            </tr>
            <tr>
              <td>Nog geen account? </td>
              <td><a href="account_maken.php">Maak hier een account aan</a></td>
            </tr>
          </table>
        </form>
      </div>
      </div>
    </div>
    <?php
    }
    ?>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
