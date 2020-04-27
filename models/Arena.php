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
class Arena implements IArena {

    private $id;
    private $challenger;
    private $defender;
    private $historia;
    static $db;

    public function __construct($challenger, $defender, $id = null) {
        $this->challenger = $challenger;
        $this->defender = $defender;
        $this->id = $id;
    }

    public function fight(\ICharacter $challenger, \ICharacter $defenders): \ICharacter {
        $this->createAction("~ " . $defenders->attack($challenger));
        if ($challenger->iDie()) {
            $defenders->levelUp();
            return $challenger;
        }
        $this->createAction("~ " . $challenger->attack($defenders));
        if ($defenders->iDie()) {
            $challenger->levelUp();
            return $defenders;
        }
        return self::fight($challenger, $defenders);
    }

    public function createAction($action) {
        $values = ["Action" => $action, "Arena_id" => $this->getId()];
        $data = singleton::create("ArenaHistoria", $values);
    }

    public function createArena($challenger, $defender) {
        $values = ["retador" => $challenger, "defensor" => $defender, "User_id" => $_SESSION['user']->getId()];
        $data = singleton::create("Arena", $values);
    }

    /*public function getModel() {
        $id = $_SESSION['user']->getId();
        $data = singleton::select('*', "Arena", "(Ccharacterid or Dcharacterid) in (select Characterid from User_has_Character where userid = $id)");
        return $data[0];
    }*/

    public function getArenaId($challenger, $defender) {
        $data = singleton::select('id', "Arena", "retador = '$challenger' and defensor = '$defender'");
        return $data[0]['id'];
    }

    public function getModeloHistoria() {
        $data = singleton::select('Action', "ArenaHistoria", "Arena_id = $this->id");
        return $data;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getChallenger(): int {
        return $this->challenger;
    }

    public function getDefender(): int {
        return $this->defender;
    }

    public function setChallenger($challenger): void {
        $this->challenger = $challenger;
    }

    public function setDefender($defender): void {
        $this->defender = $defender;
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

}
