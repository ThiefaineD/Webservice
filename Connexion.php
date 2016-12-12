<?php
  require "BDD.php";

  if(isset($_POST['email']) && isset($_POST['password']))
  {
    $req = BDD::getConnexion()->getPDO()->prepare('SELECT Email, Password FROM client WHERE Email = ?');
    $req->execute(array($_POST['email']));
    $client = $req->fetch();

    if($client['Password'] == sha1($_POST['password']))
    {
      $token = uniqid(rand(), true);
      $req = BDD::getConnexion()->getPDO()->prepare('UPDATE client SET Token = ? WHERE Email = ?');
      $req->execute(array($token, $client['Email']));

      session_start();
      $_SESSION['Email'] = $client['Email'];
      $_SESSION['Token'] = $token;
      $_SESSION['Token_time'] = time();
      echo 1;
    }
    else
      echo "Ce compte n'existe pas.";
  }
  else
    echo "Veuillez remplir tous les champs.";
?>
