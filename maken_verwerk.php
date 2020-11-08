<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Account maken ...</title>
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
          require "config.php";
          // If form submitted, insert values into the database.
          if (isset($_REQUEST['username']))
          {
           // removes backslashes
           $username = stripslashes($_REQUEST['username']);
           //escapes special characters in a string
           $username = mysqli_real_escape_string($mysqli,$username);

           $email = stripslashes($_REQUEST['email']);
           $email = mysqli_real_escape_string($mysqli,$email);

           $password = stripslashes($_REQUEST['password']);
           $password = mysqli_real_escape_string($mysqli,$password);

           $trn_date = date("Y-m-d H:i:s");


           $query = "INSERT INTO `Users`(`username`, `email`, `password`, `datecreated`)
                    VALUES ('$username', '$email', '".md5($password)."', '$trn_date')";

           if(mysqli_query($mysqli, $query))
           {
            echo "<div class='form'>
            <h3>Je bent successvol aangemeld.</h3>
            <br/>Klik hier voor <a href='index.php'>Login</a></div>";
           } else
           {
               echo "<p> Fout bij toevoegen </p>";
               echo "Query: $query";
               echo "Foutmelding: " . mysqli_error($mysqli);
           }
          }else
          {
            echo "<p>Geen gegevens ontvangen...</p>";
          }

          echo "<p> Is er iets fout gegaan? <a href='account_maken.php'>terug naar account maken</a></p>";
      ?>
      </div>
    </div>
  </body>
</html>
