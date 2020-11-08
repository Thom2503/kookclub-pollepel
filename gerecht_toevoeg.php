<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("location:inlog.php");
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
  <title>Gerecht Toevoegen</title>
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
        <div class="toevoegger">
        <form class="gerechtToevoegForm" action="gerecht_verwerk.php" method="post">
          <table>
            <tr>
              <td>Titel gerecht: </td>
              <td><input type="text" name="titel" required></td>
            </tr>
            <tr>
              <td>Gebruikersid: </td>
              <td><input type="number" name="user" value="<?php echo $_SESSION['User_ID'];?>" disabled></td>
            </tr>
            <tr>
              <td>Soort gerecht : </td>
              <td>
                <select name="soort">
                  <option value="voorgerecht">Voorgerecht</option>
                  <option value="hoofdgerecht">Hoofdgerecht</option>
                  <option value="nagerecht">Nadgerecht</option>
                  <option value="basistechniek">Basistechniek</option>
                  <option value="special">Speciaal</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Bereidingstijd: </td>
              <td><input type="text" name="tijd" required></td>
            </tr>
            <tr>
              <td>Ingredienten: </td>
              <td><textarea name="ingredienten"></textarea></td>
            </tr>
            <tr>
              <td>Bereiding: </td>
              <td><textarea name="bereiding"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp</td>
              <td><input type="submit" name="toevoegKnop" value="Voeg Gerecht Toe"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
