<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Arena
 *
 * @author PELITOS
 */
class Arena implements IArena{
    
    private $id;
    private $challenger;
    private $defender;
    private $winner;
    private $historia;
    static $db;
    
    public function __construct($challenger, $defender, $id = null) {
        $this->challenger = $challenger;
        $this->defender = $defender;
        $this->id = $id;
    }
    
    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }

    public function fight(\ICharacter $challenger, \ICharacter $defenders): int {
            $this->createAction("~ ".$defenders->attack($challenger));
            if($challenger->iDie()){
                $this->loser($challenger->getId());
                return $defenders->getId();
            }
            $this->createAction("~ ".$challenger->attack($defenders));
            if($defenders->iDie()){
                $this->loser($defenders->getId());
                return $challenger->getId();
            }
        return self::fight($challenger, $defenders);
    }
    
    public function update() {
        self::getConnection();
        //print_r(get_object_vars($this));
        $values = ["Winner" => $this->getWinner()];
        $data = self::$db->update("Arena", $values, "id = " . $this->getId());
    }
    
    public function createAction($action) {
        self::getConnection();
        //print_r(get_object_vars($this));
        $values = ["Action" => $action, "Arena_id" => $this->getId()];
        $data = self::$db->insert("arenahistoria", $values);
    }
    
    public function createArena($challenger, $defender) {
        self::getConnection();
        $values = ["Ccharacterid" => $challenger, "Dcharacterid" => $defender];
        $data = self::$db->insert("Arena", $values);
    }
    
    public function getModel($action) {
        self::getConnection();
        $id = $_SESSION['user']->getId();
        $data = self::$db->select('*', "Arena", "(Ccharacterid or Dcharacterid) in (select Characterid from user_has_character where userid = $id)");
        return $data[0];
    }
    
    public function getArenaId($challenger, $defender) {
        self::getConnection();
        $data = self::$db->select('id', "Arena", "Ccharacterid = $challenger and Dcharacterid = $defender");
        return $data[0]['id'];
    }
    
    public function getModeloHistoria(){
        self::getConnection();
        $data = self::$db->select('Action', "arenahistoria", "Arena_id = $this->id");
        return $data;
    }
    
    public function loser($id) {
        self::getConnection();
        $values = ["visible" => 0];
        $data = self::$db->update("character", $values, "id = " . $id);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getChallenger():int {
        return $this->challenger;
    }

    public function getDefender():int {
        return $this->defender;
    }

    public function setChallenger($challenger): void {
        $this->challenger = $challenger;
    }

    public function setDefender($defender): void {
        $this->defender = $defender;
    }

    public function setWinner($Winner): void {
        echo $Winner;
        $this->winner = $Winner;
        
        
    }

    public function getHistoria(): array {
        return $this->historia;
    }

    public function setHistoria(array $historia): void {
        $this->historia = $historia;
        
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getWinner(): int {
        return $this->winner;
    }

}
