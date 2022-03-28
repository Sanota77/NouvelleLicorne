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

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php
        require 'navbar.php';
    ?>
    <!-- NAVBAR -->
    <!-- Video -->
    <div>
      <video id="background-video" width="320" height="240" autoplay loop muted>
        <source src="img/banvideo.mp4" type="video/mp4"/>
      </video>
    </div>
    <!-- Video -->
    <div class="content">

    <h1>Plus qu'une équipe</h1>

    <h2>Une famille</h2>

    <button id="btnVideo" onclick="playAndPause()">Pause II</button>

    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- owners script -->
    <script>

      var video = document.getElementById("background-video");
      var btn = document.getElementById("btnVideo");

      function playAndPause () {
        if(video.paused) {
        video.play();
        btn.innerHTML = "Pause II";

      }else {
        video.pause();
        btn.innerHTML = "Play ▶";
        }

      }
    </script>

  </body>
</html>
