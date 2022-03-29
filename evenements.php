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
    <title>Licorne evenements</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>
    
    <h2 style="margin-top: 50px;margin-bottom: 50px;">Nos Évènements</h2>

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
      /**requete bdd materiel */
      $mat = $bdd->query('SELECT * FROM materiel');
      foreach($mat as $mat){
      ?>
        <div>
            <h5><?php echo $mat['materiel']; ?></h5>
        </div>    
      <?php
      }
       /**requete bdd lieu  */
      $lieu = $bdd->query('SELECT distinct lieu FROM evenement ORDER BY id DESC');
      foreach($lieu as $lieu){
      ?>
        <div>
            <h5><?php echo $lieu['lieu']; ?></h5>
        </div>    
      <?php
      }
      /**requete bdd evenement futur strasbourg */
      $futur = $bdd->query('SELECT * FROM evenement WHERE lieu = "strasbourg" AND date > NOW()');
      foreach($futur as $futur){
      ?>
        <div>
            <h5><?php echo $futur['lieu']; ?></h5>
            <p><?php echo $futur['nom']; ?></p>
            <p><?php echo $futur['date']; ?></p>
        </div>    
      <?php
      }
	 
      $articles = $bdd->query('SELECT * FROM evenement ORDER BY id DESC');
      if(isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $articles = $bdd->query('SELECT * FROM evenement WHERE 
          nom LIKE "%'.$q.'%" 
          OR lieu LIKE "%'.$q.'%" 
          OR date LIKE "%'.$q.'%"
          OR categorie LIKE "%'.$q.'%"
          OR materiel LIKE "%'.$q.'%"
          ');
        if($articles->rowCount() == 0) {
            $articles = $bdd->query('SELECT * FROM evenement WHERE CONCAT(nom, lieu) LIKE "%'.$q.'%" ORDER BY id DESC');
        }
         /**on filtre les espace vide dans la bdd */
        if($_GET['q'] == "je vous montre que le null est filtrable" ) {
          $q = htmlspecialchars($_GET['q']);
          $articles = $bdd->query('SELECT * FROM evenement WHERE nom IS null 
          OR lieu IS null 
          OR date IS null 
          OR categorie IS null 
          OR materiel IS null 
          ');
       }
        /**on filtre les espace vide dans la bdd */
        if($_GET['q'] == "je vous montre que le null est filtrable" ) {
          $q = htmlspecialchars($_GET['q']);
          $articles = $bdd->query('SELECT * FROM evenement WHERE mater IS null 
          OR lieu IS null 
          OR date IS null 
          OR categorie IS null 
          OR materiel IS null 
          ');
        }
      }
      ?>

    <div class="col-8">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">lieu</th>
            <th scope="col">date</th>
            <th scope="col">categorie</th>
            <th scope="col">materiel</th>
          </tr>
        </thead>
        <tbody>
    <!-- Traitement -->
        <?php if($articles->rowCount() > 0) { ?>
          <?php while($a = $articles->fetch()) { ?>
              <tr>
                  <td><?php echo $a['nom']; ?></td>
                  <td><?php echo $a['lieu']; ?></td>
                  <td><?php echo $a['date']; ?></td>
                  <td><?php echo $a['categorie']; ?></td>
                  <td><?php echo $a['materiel']; ?></td>
                </tr>  
          <?php 
              } 
            ?>
       </tbody>
    </table>
    </div>
	<?php } else { ?>
    <div class="card" style="width: 18rem;">
      <img src="https://img.myloview.fr/posters/strong-angry-unicorn-mascot-flexing-its-arm-vector-clip-art-illustration-with-simple-gradients-all-on-a-single-layer-700-217715955.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Erreur !</h5>
        <p class="card-text">⛔ Aucun résultat pour: <?= $q ?></p>
        <a href="./evenements.php" class="btn btn-danger">Retour</a>
      </div>
    </div>
	<?php } ?>  
      </div>
      <div class="col">

      </div>
    </div>
  </div>
    
    
  </body>
</html>
