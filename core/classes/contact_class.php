<?php 
	class Contact
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
        * van alle berichten
        -----------------------------------------------------*/
        public function overzicht_berichten()
        {
            $query = $this->db->prepare(
                "SELECT * 
			  FROM contactlist 
			  ORDER BY date"
            );

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            return $query->fetchAll();
        }

        public function verkrijg_bericht($id)
        {
            $query = $this->db->prepare(
                "SELECT * 
			  FROM contactlist 
			  WHERE id = $id"
            );
                //$query->bindValue(1, $id);

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            return $query->fetchAll();
        }

        /*----------------------------------------------------
         * met deze functie krijgen we een overzicht
         * van het aantal berichten
         -----------------------------------------------------*/
        public function aantal_berichten()
        {
            $query = $this->db->prepare(
                "SELECT COUNT(*) 
		  FROM contactlist"
            );

            try {
                $query->execute();
                $rows = $query->fetchColumn();
                return $rows;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        /*----------------------------------------------------
        * met deze functie voegen we een nieuw contact toe
        -----------------------------------------------------*/
        public function toevoegen_contact($naam, $email, $bericht)
        {
            $query = $this->db->prepare(
                "INSERT INTO contactlist 
		  (name, email, message, date) VALUES (?,?,?,now()) ");

            $query->bindValue(1, $naam);
            $query->bindValue(2, $email);
            $query->bindValue(3, $bericht);

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        /*----------------------------------------------------
         * met deze functie kunnen we een contact verwijderen
         -----------------------------------------------------*/
        public function verwijder_contact($id)
        {
            $query = $this->db->prepare(
                "DELETE FROM contactlist
		  WHERE id = ?"
            );

            $query->bindValue(1, $id);

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
?>
