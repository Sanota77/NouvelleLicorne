<?php
try
    {
      $db = new PDO('mysql:host=localhost;dbname=nouvelle_licorne;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $eventStat = $db->prepare('SELECT * FROM evenement');
    $eventStat->execute();
    $event = $eventStat->fetchAll();

    /* affichage de la team */
    ?>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">nom</th>
            <th scope="col">lieu</th>
            <th scope="col">date</th>
            <th scope="col">categorie</th>
            <th scope="col">materiel</th>
          </tr>
        </thead>
        <tbody>
        <?php
         foreach($event as $e){
           ?>
          <tr>
            <td><?php echo $e['nom']; ?></td>
            <td><?php echo $e['lieu']; ?></td>
            <td><?php echo $e['date']; ?></td>
            <td><?php echo $e['categorie']; ?></td>
            <td><?php echo $e['materiel']; ?></td>
          </tr> 
        </tbody>
      </table>

    <?php
    }

?>