<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Accueil</title>
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
        <form class="form col-md-12 center-block">
          <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="text" class="form-control input-lg" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Mot de passe</label>
            <input type="password" class="form-control input-lg" placeholder="Mot de passe">
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
            <form class="form col-md-12 center-block">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="form-control input-lg" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Mot de passe</label>
                <input type="password" class="form-control input-lg" placeholder="Mot de passe">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Confirmation</label>
                <input type="password" class="form-control input-lg" placeholder="Mot de passe">
              </div>

              <button class="btn btn-lg btn-primary btn-block" type="submit" id="boutonInscription">S'inscrire</button>
              <br />
            </form>
            <br />
            <p class="text-center"><a href="#" id="lienAnnulation">Annuler</a></p>
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

        $('#lienAnnulation').on('click', function(e){
          e.preventDefault();

          $('#loginForm').show();
          $('#signinForm').hide();
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
              alert('OK');
            }
          });
        });
      });
    </script>

  </body>
</html>
