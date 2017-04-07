<html>
  <head>
    <title>Page d'accueil du CRUD</title>
    <script src="../JQuery/jquery-3.1.1.js"></script>

    <style>
      .liste{
        background-color: antiquewhite;
        margin: 20px;
      }
      td,th{
        padding: 20px;
      }
    </style>
  </head>

  <body>

    <div class ="liste">
      <table id="liste">
        <tr>
          <th>Pseudo</th>
          <th>Mail</th>
          <th>Nom</th>
          <th>Prénom</th>
        </tr>
      </table>
      <table id="ajout">
      </table>
    </div>

    <script>
      // Fonction pour ajouter des lignes de la base de données depuis data au format JSON
      function ajoutLignes(data){
        var elem;
        var i = 0;
        while(elem = data[i]){
          // On construit une nouvele ligne
          var newLine = $("<tr id="+elem["id"]+">"+"<td><input type=\"text\" class=\"pseudo\" value="+elem["pseudo"]+" /></td>"+"<td><input type=\"text\" class=\"mail\" value="+elem["mail"]+" /></td>"+"<td><input type=\"text\" class=\"name\" value="+elem["name"]+" /></td>"+"<td><input type=\"text\" class=\"surname\" value="+elem["surname"]+" /></td>"+" </tr>");
          var buttonUpdate = $("<td><button>Update</button></td>");
          // On ajoute une fonction associée à un clic sur le bouton Update
          $(buttonUpdate).click(function(){
            var line = $(this).parent();
            $.post(
              'update.php',
              {
                id : $(line).attr('id'),
                pseudo : $(".pseudo",line).val() ,
                name : $(".name",line).val() ,
                mail : $(".mail",line).val() ,
                surname : $(".surname",line).val()
              },
              function(texte){
                alert(texte);
              },
              'text'
            );
          });
          $(newLine).append(buttonUpdate);

          var buttonDelete = $("<td><button>Delete</button></td>");
          // On ajoute une fonction associée à un clic sur le bouton Delete
          $(buttonDelete).click(function(){
            var line = $(this).parent();
            $.post(
              'delete.php',
              {
                id : $(line).attr('id'),
              },
              function(texte){
                $(line).remove();
                alert(texte);
              },
              'text'
            );
          });
          $(newLine).append(buttonDelete);
          // On ajoute les éléments dans la page
          $('#liste').append(newLine);
          i++;
        }
      }

      $(document).ready(function(){
        // On récupère le contenu de notre base de données depuis read.php
        $.getJSON("read.php",function(data) {
          // On reçoit le JSON et on le passe en paramètre de notre fonction d'ajout de lignes
          ajoutLignes(data);
          var newLine = $("<tr class=\"add\">"+"<td><input type=\"text\" class=\"pseudo\" /></td><td><input type=\"text\" class=\"mail\" /></td><td><input type=\"text\" class=\"name\" /></td><td><input type=\"text\" class=\"surname\" /></td></tr>");
          var buttonAdd = $("<td><button>Add</button></td>");
          // On ajoute une fonction associée à un clic sur le bouton Add
          $(buttonAdd).click(function(){
            var line = $(this).parent();
            $.post(
              'add.php',
              {
                pseudo : $(".pseudo",line).val() ,
                name : $(".name",line).val() ,
                mail : $(".mail",line).val() ,
                surname : $(".surname",line).val()
              },
              function(data){
                ajoutLignes(data);
                $(".pseudo",line).val("");
                $(".name",line).val("");
                $(".mail",line).val("");
                $(".surname",line).val("");
                alert("L'ajout a été effectué");
              },
              'json'
            );
          });
          // On ajoute les éléments dans la page
          $(newLine).append(buttonAdd);
          $('#ajout').append(newLine);
        });
      });
    </script>
  </body>
</html>
