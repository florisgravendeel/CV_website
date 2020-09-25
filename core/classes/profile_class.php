<?php 
	class Profile
    {

        private $db;

        /*----------------------------------------------------
         * De constructor
         * Als we de klasse Projects willen gaan gebruiken
         * maken we (in init.php) een object variabele aan
         * met behulp van de constructor.
         * Daarna kunnen we gebruik maken van de functies
         * in deze klasse
         -----------------------------------------------------*/
        public function __construct($database)
        {
            $this->db = $database;
        }

        /*----------------------------------------------------
        * met deze functie krijgen we een overzicht
        * van mijn profiel
        -----------------------------------------------------*/
        public function profileinfo()
        {
            $query = $this->db->prepare(
                "SELECT profileinfo FROM website.profile where id = 1;"
            );

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            return $query->fetchAll();
        }
    }
?>
