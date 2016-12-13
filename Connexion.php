<?php
  require "MongoBDD.php";

  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
    $clients = MongoBDD::getInstance()->webservice->user;
    $client = $clients->findOne(array('email' => $_POST['email']));


    if($client['password'] == $_POST['password'])
    {
      $token = uniqid(rand(), true);

      $data = array(
        '$set' => array(
          'token' => $token
        )
      );

      $clients->update(array('email' => $_POST['email']), $data);

      session_start();
      $_SESSION['Email'] = $client['email'];
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
