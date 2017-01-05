<html>
  <head>
    <title>Mon mini-CMS</title>

    <!-- Un style basique pour bien distinguer les différentes zones -->
    <style>

      header{
        background-color: grey;
        width: 80%;
        text-align: center;
        display: inline-block;
      }

      aside{
        background-color: red;
        width: 20%;
        height: 100%;
        float: right;
        display: inline-block;
      }

      main{
        padding: 100px;
      }
    </style>
  </head>

  <body>
    <header>Ici mon texte d'en-tête</header>

    <aside>Choisissez l'article que vous souhaitez consulter :<br /><br />
      <?php
      // On ouvre le dossier contenant les articles
        if($dossier = opendir('./articles')){
          // On parcourt la liste des fichiers du dossier
          while($fichier = readdir($dossier)){
            // On vérifie que le fichier ait bien une extension .html
            if(preg_match('#\.html$#',$fichier)){
              // Si oui, on ne récupère que le nom du fichier, sans l'extension
              $nom = preg_replace('#(.+)\.html$#','$1',$fichier);
              // On construit le lien vers la page index.php, en passant le nom de l'article en paramètre de l'URL
              echo "<a href=index.php?article=$nom>$nom</a>";
            }
          }
        }else{
          echo "Dossier inexistant";
        }
      ?>
    </aside>

    <main>
      <?php
      // Si un paramètre article est passé par l'URL, on l'inclut (en allant le chercher dans le dossier correspondant)
        if(isset($_GET['article'])){
          include("articles/".$_GET['article'].".html");
        }else{
          // Sinon, on inclut une page d'accueil basique
          include("accueil.html");
        }
      ?>
    </main>

  </body>
</html>
