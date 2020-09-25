<?php 
class Scoreboard {
	
  private $db;

  /*---------------------------------------------------- 
   * De constructor
   -----------------------------------------------------*/
  public function __construct($database) {
    $this->db = $database;
  }	

  
  /*---------------------------------------------------- 
   * met deze functie kunnen we nieuwe klant
   * toevoegen
   -----------------------------------------------------*/
  public function toevoegen_score($id, $nickname, $score){
    $query = $this->db->prepare(
      "INSERT INTO scoreboard 
      (id, nickname, score, time) VALUES (?,?,?,NOW()) ");
      
    $query->bindValue(1, $id);
    $query->bindValue(2, $nickname);
    $query->bindValue(3, $score);
    try{
      $query->execute();
    }catch(PDOException $e){
      die($e->getMessage());
    }	
  }

  
  /*---------------------------------------------------- 
   * met deze functie kunnen we de klant opvragen met
   * behulp van het klantnummer
   -----------------------------------------------------*/
  public function krijg_scoreboard() {
    $query = $this->db->prepare(
      "SELECT * 
      FROM scoreboard
      ORDER BY score DESC"
    );
      
    try{
      $query->execute();
    }catch(PDOException $e){
      die($e->getMessage());
    }	
    return $query->fetchAll();
  }

  /*---------------------------------------------------- 
   * met deze functie krijgen we het aantal primary keys van het scoreboard
   -----------------------------------------------------*/
  public function scoreboard_aantal() {
    $query = $this->db->prepare(
      "SELECT COUNT(*) 
      FROM scoreboard"
    );
	
    try{
      $query->execute();
      $rows = $query->fetchColumn();
      return $rows;
    }catch(PDOException $e){
      die($e->getMessage());
    }
  }
}
  
