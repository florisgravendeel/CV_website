<?php 
class Quiz {
  private $db;

  /*---------------------------------------------------- 
   * De constructor
   -----------------------------------------------------*/
  public function __construct($database) {
    $this->db = $database;
  }	
 
  /*---------------------------------------------------- 
   * met deze functie krijgen we een overzicht van de volledige quiz
   -----------------------------------------------------*/
  public function overzicht_quiz() {
    $query = $this->db->prepare(
      "SELECT * 
      FROM quiz 
	  ORDER BY vraagnummer"
    );
	
    try{
      $query->execute();
    }catch(PDOException $e){
      die($e->getMessage());
    }
    return $query->fetchAll();
  }

	
  /*---------------------------------------------------- 
   * met deze functie krijgen we een overzicht van het
   * aantal klanten
   -----------------------------------------------------*/
  public function aantal_vragen() {
    $query = $this->db->prepare(
      "SELECT COUNT(*) 
      FROM quiz"
    );
	
    try{
      $query->execute();
      $rows = $query->fetchColumn();
      return $rows;
    }catch(PDOException $e){
      die($e->getMessage());
    }
  }
    
 
  /*---------------------------------------------------- 
   * met deze functie kunnen we de klant opvragen met
   * behulp van het klantnummer
   -----------------------------------------------------*/
  public function quizvraag($vraagnummer) {
    $query = $this->db->prepare(
      "SELECT * 
      FROM quiz
      WHERE vraagnummer = ?"
    );

    $query->bindValue(1, $vraagnummer);
	
    try{
      $query->execute();
    }catch(PDOException $e){
      die($e->getMessage());
    }	
    return $query->fetchAll();
  }   
}
