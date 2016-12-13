<?php
  class MongoBDD
  {
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            try
            {
                $m = new MongoClient("mongodb://trainingup.eu:27017");

            } catch (MongoConnectionException $e)
            {
                die('Failed to connect to MongoDB '.$e->getMessage());
            }
            self::$instance = $m;
        }

        return self::$instance;
    }
  }
?>
