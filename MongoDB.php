<?php
  class MongoDB
  {
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            try
            {
                $m = new MongoDB\Driver\Manager("mongodb://trainingup.eu:27017");

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
