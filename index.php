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
    <title>Kookclub de Pollepel</title>
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

        <div class="algemeen">
          <h2>Welkom <?php echo $_SESSION['username']; ?> bij de Kookclub</h2>
          <em>Wij zijn een kookclub gespecialiseert in de Poolse keuken.</em>
          <p>Wij vinden het gezellig als je met ons clubje mee doet door een
          account aan te maken en/of in te logen.</p>
          <p>Heb je leuke gerechten deel deze met ons. Of kijk rond naar andere
          gedeelde gerechten.</p>
        </div>
        <div class="hyperlinks">
          <a href="voor_gerechten.php"><img src="img/golabki.jpg" width="115" height="115" alt="voor"></a>
          <a href="hoofd_gerechten.php"><img src="img/kotlet.jpg" width="115" height="115"  alt="hoofd"></a>
          <a href="na_gerechten.php"><img src="img/kapusniak.jpg"  width="115" height="115" alt="na"></a>
          <a href="basis.php"><img src="img/rosol.jpg" width="115" height="115" alt="basis"></a>
          <a href="specials.php"><img src="img/pierogi.jpg" width="115" height="115" alt="specials"></a>
        </div>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
