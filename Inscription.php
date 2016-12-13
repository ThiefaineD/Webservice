<?php
  //require "BDD.php";
  require "MongoDB.php";

  if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmation']))
  {
    if($_POST['password'] == $_POST['confirmation'])
    {
      $bulk = new MongoDB\Driver\BulkWrite();
      array_pop($_POST);
      $bulk->insert($_POST);
      MongoDB::getInstance()->executeBulkWrite('webservice.user', $bulk);
      echo 1;
    }
    else
      echo "Les deux mots de passe ne correspondent pas.";
  }
  else
    echo "Veuillez remplir tous les champs.";
?>
