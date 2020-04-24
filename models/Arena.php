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
    private $Winner;
    static $db;
    
    public function __construct($challenger, $defender, $Winner, $id = null) {
        $this->challenger = $challenger;
        $this->defender = $defender;
        $this->Winner = $Winner;
        $this->id = $id;
    }
    
    private static function getConnection() {
        self::$db = new MySQLiManager('localhost', 'root', '', 'mmorpg');
    }

    
    public function getId() {
        return $this->id;
    }

    public function getChallenger() {
        return $this->challenger;
    }

    public function getDefender() {
        return $this->defender;
    }

    public function getWinner() {
        return $this->Winner;
    }

    public function setChallenger($challenger): void {
        $this->challenger = $challenger;
    }

    public function setDefender($defender): void {
        $this->defender = $defender;
    }

    public function setWinner($Winner): void {
        $this->Winner = $Winner;
    }


}
