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
   <title>Gerecht verwerken ...</title>
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
           if (isset($_POST['toevoegKnop']))
           {
             require 'config.php';

             $titel              = $_POST['titel'];
             $user               = $_SESSION['User_ID'];
             $soort              = $_POST['soort'];
             $tijd               = $_POST['tijd']; //bereidingstijd
             $ingredienten       = $_POST['ingredienten'];
             $bereiding          = $_POST['bereiding'];
             $datum              = date("Y-m-d H:i:s");

             $ingredienten2 = mysqli_real_escape_string($mysqli, $ingredienten);
             $bereiding2 = mysqli_real_escape_string($mysqli, $bereiding);

             $query = "INSERT INTO `Gerechten`(`Gerecht_ID`, `titel`, `soort`, `user`, `datum`, `tijd`, `ingredienten`, `bereiding`)
                       VALUES (NULL,'$titel','$soort','$user','$datum','$tijd','$ingredienten2','$bereiding2')";

             if (empty($titel) || empty($soort) || empty($tijd) || empty($ingredienten2) || empty($bereiding2) || empty($user))
             {
               echo "<p>FOUT:</p>";
               echo "<br>";
               echo "<p>Een van de vakken is leeg gelaten</p>";
             } else
             {
               //The query is going to be activated
               if (mysqli_query($mysqli, $query))
               {
                 header("location:index.php");
               } else
               {
                   echo "<p> Fout bij toevoegen </p>";
                   echo "Query: $query";
                   echo "Foutmelding: " . mysqli_error($mysqli);
               }
             }

           } else
           {
             echo "<p>Geen gegevens ontvangen...</p>";
           }
           echo "<p>Nog een gerecht? Of is er iets fout gegaan? <a href='gerecht_toevoeg.php'>terug naar toevoegen</a></p>";

          ?>
       </div>
     </div>
     <script src="index.js" charset="utf-8"></script>
   </body>
 </html>
