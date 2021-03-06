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
    <title>Licorne Lieux</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>
    
    <h2 style="margin-top: 50px;margin-bottom: 50px;">Nos Lieux</h2>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Tableau: Nouvelle_Licorne -->
  <div class="container">
    <div class="row">
      <div class="col"></div>
  <!-- insertion tableau evenement -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
      <!-- div de gauche reste vide pour centrer avec GRID -->
      </div>
      <?php
        $bdd = new PDO('mysql:host=localhost;dbname=nouvelle_licorne;charset=utf8','root','');
        /**requete bdd lieu  */
        $lieu = $bdd->query('SELECT distinct lieu FROM evenement ORDER BY id DESC');
      ?>
      <!-- div du milieu avec contenu centré -->
      <div class="col-8">
        <ul class="list-group list-group-flush">
        <?php
          foreach($lieu as $lieu){
        ?>
          <li class="list-group-item"><?php echo $lieu['lieu']; ?></li>
        <?php
        }
        ?>
        </ul>
      </div>
      <div class="col">
      <!-- div de droite reste vide pour centrer avec GRID -->
      </div>
    </div>
  </div>
  </body>
</html>
