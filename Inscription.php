<?php
  require "MongoBDD.php";

  if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmation']))
  {
    if($_POST['password'] == $_POST['confirmation'])
    {
      array_pop($_POST);
      $collection = MongoBDD::getInstance()->webservice->user;
      $collection->insert($_POST);
      echo 1;
    }
    else
      echo "Les deux mots de passe ne correspondent pas.";
  }
  else
    echo "Veuillez remplir tous les champs.";
?>
