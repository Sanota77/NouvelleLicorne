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
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>
    <!-- NAVBAR -->

    <h2 style="margin-top: 50px;margin-bottom: 50px;">Nos Bénévoles</h2>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- insertion tableau benevoles -->
  <div class="container">
    <div class="row">
      <div class="col">
        
      </div>
      <div class="col-8">
        <?php
          require './tableaubene.php';
        ?>
      </div>
      <div class="col">
       
      </div>
    </div>
  </div>
    
  </body>
</html>
