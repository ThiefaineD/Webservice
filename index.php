<?php
  session_start();
  // Si le client est connecté
  if(isset($_SESSION['Email'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Webservice</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Accueil</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fonctionnalités <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Client</a></li>
                <li><a href="#">Objets</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="Deconnexion.php">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
<?php } else { ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <div id="loginForm" class="modal show margin-top-20" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="text-center">Connexion</h1>
      </div>

      <div class="modal-body">
        <form id="login-form" class="form col-md-12 center-block">
          <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="text" name="email" class="form-control input-lg" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Mot de passe</label>
            <input type="password" name="password" class="form-control input-lg" placeholder="Mot de passe">
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" id="boutonConnexion">Se connecter</button>
          <br />
        </form>
        <br />
        <p class="text-center">Pas encore inscrit ? <a href="#" id="lienInscription">C'est par ici</a></p>
      </div>

      <div id="signinForm" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" style="display: none !important;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="text-center">Inscription</h1>
            </div>

          <div class="modal-body">
            <form id="signin-form" class="form col-md-12 center-block">
              <div class="form-group">
                <label for="prenom" class="sr-only">Prénom</label>
                <input type="text" name="prenom" class="form-control input-lg" placeholder="Prénom">
              </div>
              <div class="form-group">
                <label for="nom" class="sr-only">Nom</label>
                <input type="text" name="nom" class="form-control input-lg" placeholder="Nom">
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" class="form-control input-lg" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Mot de passe</label>
                <input type="password" name="password" class="form-control input-lg" placeholder="Mot de passe">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Confirmation</label>
                <input type="password" name="confirmation" class="form-control input-lg" placeholder="Confirmation">
              </div>

              <button class="btn btn-lg btn-primary btn-block" type="submit" id="boutonInscription">S'inscrire</button>
              <br />
            </form>
            <br />
            <p class="text-center"><a href="index.php">Annuler</a></p>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#lienInscription').on('click', function(e){
          e.preventDefault();

          $('#loginForm').hide();
          $('#signinForm').show();
        });

        // Inscription
        $('#boutonInscription').on('click', function(e){
          e.preventDefault();
          var data = $('#signin-form').serialize();

          $.ajax({
            type: "POST",
            url: "Inscription.php",
            data: data,
            success: function(data){
              if(data == 1)
              {
                alert('Inscription réussie !');
              }
              else
              {
                alert(data);
              }
            }
          });
        });

      // Connexion
      $('#boutonConnexion').on('click', function(e){
        e.preventDefault();
        var data = $('#login-form').serialize();

        $.ajax({
          type: "POST",
          url: "Connexion.php",
          data: data,
          success: function(data){
            if(data == 1)
            {
              window.location.href = "index.php";
            }
            else
            {
              alert(data);
            }
          }
        });
      });
    });
    </script>
  </body>
</html>

<?php } ?>
