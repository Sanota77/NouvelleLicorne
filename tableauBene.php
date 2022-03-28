<?php
try
    {
      $db = new PDO('mysql:host=localhost;dbname=nouvelle_licorne;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $beneStat = $db->prepare('SELECT * FROM benevoles');
    $beneStat->execute();
    $bene = $beneStat->fetchAll();

    /* affichage de la team */
    ?>
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
        <?php
         foreach($bene as $b){
           ?>
          <tr>
            <td><?php echo $b['prenom']; ?></td>
            <td><?php echo $b['nom']; ?></td>
            <td><?php echo $b['date_naissance']; ?></td>
            <td><?php echo $b['adresse']; ?></td>
            <td><?php echo $b['ville']; ?></td>
            <td><?php echo $b['telephone']; ?></td>
          </tr> 
        </tbody>
      </table>

    <?php
    }

?>