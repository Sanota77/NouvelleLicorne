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
    <title>Licorne Benevoles</title>
  </head>
  <body>
    
    <title>Licorne Benevoles</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>

    <h2 style="margin-top: 50px;margin-bottom: 50px;">Nos Bénévoles</h2>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- insertion tableau benevoles -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <!--FORM-->
        <form method="GET">
          <input class="form-control" type="search" name="q" placeholder="Recherche..." />
          <input class="form-control" type="submit" value="Valider" />
        </form>
      </div>
      <!-- div de gauche reste vide pour centrer avec GRID -->
      
      <!-- traitement search -->
      <?php
      $bdd = new PDO('mysql:host=localhost;dbname=nouvelle_licorne;charset=utf8','root','');
	 
      $articles = $bdd->query('SELECT * FROM benevoles ORDER BY id DESC');
      if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $articles = $bdd->query('SELECT * FROM benevoles WHERE 
          prenom LIKE "%'.$q.'%" 
          OR nom LIKE "%'.$q.'%" 
          OR date_naissance LIKE "%'.$q.'%"
          OR ville LIKE "%'.$q.'%"
          OR adresse LIKE "%'.$q.'%"
          OR telephone LIKE "%'.$q.'%"
          ');
        if($articles->rowCount() == 0) {
            $articles = $bdd->query('SELECT * FROM benevoles WHERE CONCAT(nom, ville) LIKE "%'.$q.'%" ORDER BY id DESC');
        }
      }
      ?>
    

    <div class="col-8">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Adresse</th>
            <th scope="col">Ville</th>
            <th scope="col">Téléphone</th>
          </tr>
        </thead>
        <tbody>
    <!-- Traitement -->
        <?php if($articles->rowCount() > 0) { ?>
          <?php while($a = $articles->fetch()) { ?>
              <tr>
                  <td><?php echo $a['prenom']; ?></td>
                  <td><?php echo $a['nom']; ?></td>
                  <td><?php echo $a['date_naissance']; ?></td>
                  <td><?php echo $a['adresse']; ?></td>
                  <td><?php echo $a['ville']; ?></td>
                  <td><?php echo $a['telephone']; ?></td>
                </tr>  
          <?php 
              } 
            ?>
       </tbody>
    </table>
    </div>
	<?php } else { ?>
	Aucun résultat pour: <?= $q ?>...
	<?php } ?>  
  <!-- div de droite reste vide pour centrer avec GRID -->
      <div class="col-md-2">
        
      </div>
      
      <div class="col">
       
      </div>
    </div>
  </div>
   
  </body>
</html>
