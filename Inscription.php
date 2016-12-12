<?php
  require "BDD.php";

  if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmation']))
  {
    if($_POST['password'] == $_POST['confirmation'])
    {
      $req = BDD::getConnexion()->getPDO()->prepare("INSERT INTO client(Prenom, Nom, Email, Password) VALUES(?, ?, ?, ?)");
      $req->execute(array($_POST['prenom'], $_POST['nom'], $_POST['email'], sha1($_POST['password'])));
      echo 1;
    }
    else
      echo "Les deux mots de passe ne correspondent pas.";
  }
  else
    echo "Veuillez remplir tous les champs.";
?>
