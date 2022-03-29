<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- owner  CSS -->
     <link href="style.css" rel="stylesheet">
     <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>


    <title>Licorne Team</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>
    <!-- NAVBAR -->
    <h2 style="margin-top: 50px;margin-bottom: 50px;">Notre Team</h2>

    <!-- code php -->

    <?php

    try
    {
      $db = new PDO('mysql:host=localhost;dbname=nouvelle_licorne;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $teamStat = $db->prepare('SELECT * FROM team');
    $teamStat->execute();
    $team = $teamStat->fetchAll();

    /* affichage de la team */
    foreach ($team as $team) {
      ?>
        <div class="flip-card">
          <div class="flip-card-inner">
              <div class="flip-card-front" style="border-radius:5px;">
                <h5 class="card-title"><?php echo $team['prenom']; ?> <?php echo $team['nom']; ?></h5>
                <p class="card-text"><?php echo $team['text']; ?></p>
              </div>
              <div class="flip-card-back">  
                <img src="<?php echo $team['pic']; ?>" alt="Avatar" style="width:300px;height:300px;border-radius:5px;">
              </div>
          </div>
        </div>      
      <?php
      }

    ?>



    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>