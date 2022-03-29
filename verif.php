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
    <!--FORM-->
	<form method="GET">
	   <input type="search" name="q" placeholder="Recherche..." />
	   <input type="submit" value="Valider" />
	</form>

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