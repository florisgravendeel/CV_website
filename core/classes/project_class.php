<?php 
	class Project
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
        * van alle projecten
        -----------------------------------------------------*/
        public function overzicht_projecten()
        {
            $query = $this->db->prepare(
                "SELECT * 
			  FROM projects 
			  ORDER BY date"
            );

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            return $query->fetchAll();
        }

        /*----------------------------------------------------
         * met deze functie krijgen we een overzicht
         * van het aantal projecten
         -----------------------------------------------------*/
        public function aantal_projecten()
        {
            $query = $this->db->prepare(
                "SELECT COUNT(*) 
		  FROM projects"
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
        * met deze functie voegen we een nieuw project toe
        -----------------------------------------------------*/
        public function toevoegen_project($titel, $kort_beschrijving, $lang_beschrijving, $date, $img)
        {
            $query = $this->db->prepare(
                "INSERT INTO projects 
		  (title, short_description, long_description, date, img) VALUES (?,?,?,?,?) ");

            $query->bindValue(1, $titel);
            $query->bindValue(2, $kort_beschrijving);
            $query->bindValue(3, $lang_beschrijving);
            $query->bindValue(4, $date);
            $query->bindValue(5, $img);

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }


        /*----------------------------------------------------
         * met deze functie kunnen we een project wijzigen
         -----------------------------------------------------*/
        public function wijzigen_project($titel, $kort_beschrijving, $lang_beschrijving, $date, $img, $id)
        {
            $query = $this->db->prepare(
                "UPDATE project SET 
		  title = ?,
		  short_description = ?,
		  long_description = ?,
		  date = ?,
          img = ?
		  WHERE id = ?"
            );

            $query->bindValue(1, $titel);
            $query->bindValue(2, $kort_beschrijving);
            $query->bindValue(3, $lang_beschrijving);
            $query->bindValue(4, $date);
            $query->bindValue(5, $img);
            $query->bindValue(6, $id);

            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        /*----------------------------------------------------
         * met deze functie kunnen we een project verwijderen
         -----------------------------------------------------*/
        public function verwijderen_project($id)
        {
            $query = $this->db->prepare(
                "DELETE FROM projects
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
