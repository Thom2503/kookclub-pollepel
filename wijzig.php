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
  <title>Wijzig gerecht</title>
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

          $id = $_GET['id'];

          $query = "SELECT * FROM Gerechten WHERE Gerecht_ID = " . $id;

          $resultaat = mysqli_query($mysqli, $query);

          if (mysqli_num_rows($resultaat) == 0)
          {
            echo "<p> Er is geen Gerecht met ID $id.</p>";
          } else
          {
            $rij = mysqli_fetch_array($resultaat);
            ?>
            <h2> Aanpassen info van <?php echo $rij['titel'] ?> </h2>
            <form name="wijzig" action="wijzig_verwerk.php" method="post">
              <table border='1'>
                <tr>
                  <td>ID:</td>
                  <td><input type="number" name="ID" value="<?php echo $rij['Gerecht_ID'] ?>" readonly></td>
                </tr>
                <tr>
                  <td>Titel gerecht:</td>
                  <td><input type="text" name="titel" value="<?php echo $rij['titel'] ?>" required></td>
                </tr>
                <tr>
                  <td>Gebruiker:</td>
                  <td><input type="text" name="userdecoy" value="
                    <?php
                    // dit is zo gedaan om de username te laten zien inplaats dan de user ID7
                    $idUser = $rij['user'];
                    $q = "SELECT * FROM Users WHERE User_ID = " . $idUser;
                    $r = mysqli_query($mysqli, $q);
                    $user = mysqli_fetch_array($r);
                    echo $user['username'];
                    ?>" readonly></td>
                </tr>
                <tr>
                  <td><input type="hidden" name="user" value="<?php echo $rij['user']; ?>" ></td>
                </tr>
                <tr>
                  <td>Soort gerecht : </td>
                  <td>
                    <select name="soort">
                      <option value="voorgerecht" <?php if ($rij['soort'] == 'voorgerecht') { echo "selected"; } ?>>Voorgerecht</option>
                      <option value="hoofdgerecht" <?php if ($rij['soort'] == 'hoofdgerecht') { echo "selected"; } ?>>Hoofdgerecht</option>
                      <option value="nagerecht" <?php if ($rij['soort'] == 'nagerecht') { echo "selected"; } ?>>Nadgerecht</option>
                      <option value="basistechniek" <?php if ($rij['soort'] == 'basistechniek') { echo "selected"; } ?>>Basistechniek</option>
                      <option value="special" <?php if ($rij['soort'] == 'special') { echo "selected"; } ?>>Speciaal</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Bereidingstijd:</td>
                  <td><input type="text" name="tijd" value="<?php echo $rij['tijd'] ?>" required></td>
                </tr>
                <tr>
                  <td>Ingredienten:</td>
                  <td><textarea rows='10' cols='50' name="ingredienten" required><?php echo $rij['ingredienten'] ?></textarea></td>
                </tr>
                <tr>
                  <td>Bereiding:</td>
                  <td><textarea rows='10' cols='50' name="bereiding" required><?php echo $rij['bereiding'] ?></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td><input type="submit" name="submit" value="Aanpassen"></td>
                </tr>
              </table>
            </form>
            <?php
          }
         ?>
      </div>
    </div>
    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
