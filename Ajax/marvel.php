<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Liste des comics Marvel</title>

    <script src="hmac-md5.js"></script>
    <script src="../JQuery/jquery-3.1.1.js"></script>

    <style>
      .comic{
        background-color: antiquewhite;
        margin: 20px;
      }
      .description{
        background-color: lightgrey;
        padding: 20px;
      }
    </style>
  </head>

  <body>

    <div id="liste">
    </div>

    <script>
      $(document).ready(function(){
        // Instanciation des différents éléments
        var date = new Date();
        var ts = date.getTime().toString();
        var publickey = "";
        var privatekey = "";
        var hash = CryptoJS.MD5(ts+privatekey+publickey);

        // Construction de l'URL
        var url = "https://gateway.marvel.com:443/v1/public/comics?ts="+ts+"&apikey="+publickey+"&hash="+hash;

        // Récupération du JSON à l'URL indiquée
        $.getJSON(url,function(data) {
          // Récupération de la liste des comics
          var liste = data["data"]["results"];
          // On boucle sur tous les comics
          for(var comic in liste){
            // On construit la div à rajouter pour chaque élément
            var elem = liste[comic];
            var newDiv =   $("<div class=\"comic\" id="+elem["id"]+">"+elem["title"]+" </div>");
            var newLink = $("<a href=\"#\">Description</a>");

            // Construction du comportement en cas de clic
            $(newLink).click(function(){
              // Récupération de l'id du comic
              var id = $(this).parent().attr("id");

              // Construction de l'URL
              var url = "https://gateway.marvel.com:443/v1/public/comics/"+id+"?ts="+ts+"&apikey="+publickey+"&hash="+hash;

              // Récupération du JSON à l'URL indiquée
              $.getJSON(url,function(data) {
                // On récupère la description du comic
                var results = data["data"]["results"];
                var description = results[0]["description"];
                var newDiv =   $("<div class=\"description\">"+description+" </div>");
                $("#"+id).append(newDiv);
              });
            });
            $(newDiv).append(newLink);
            $(newDiv).appendTo("#liste");
          }
        });
      });
    </script>

  </body>

</html>
