<?php
  class BDD
  {
    private static $connexion = null;
    private $pdo;

    private $hote = 'localhost';
    private $utilisateur = 'root';
    private $mot_de_passe = 'root';
    private $db = 'webservice';

    private function __construct()
    {
        try
        {
          $this->pdo = new PDO('mysql:host='.$this->hote.';dbname='.$this->db, $this->utilisateur, $this->mot_de_passe);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
          die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getConnexion()
    {
      if(!self::$connexion instanceof self)
      {
          self::$connexion = new self;
      }

      return self::$connexion;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
  }
?>
