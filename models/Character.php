<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Character
 *
 * @author pabhoz
 */
abstract class Character implements ICharacter {

    protected $id;
    protected $name;
    protected $level;
    protected $str;
    protected $intl;
    protected $agi;
    protected $mDef;
    protected $fDef;
    protected $hp;
    static $db;

    function __construct($name, $level, $str, $intl, $agi, $mDef, $fDef, $hp, $id = null) {
        $this->name = $name;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->mDef = $mDef;
        $this->fDef = $fDef;
        $this->hp = $hp;
        $this->id = $id;
    }

    public function getUserName() {
        $param = $this->id;
        $data = singleton::select('username', "User", "id in (SELECT Userid from User_has_Character where Characterid = $param )");
        return $data[0]['username'];      
    }
    
    public function setUser(){
        $values = ["Userid" => $_SESSION['user']->getID(), "Characterid" => $this->getId()];
        $data = singleton::create("User_has_Character",$values);
    }

    public static function getModel(int $id) {
        $data = singleton::select('*', "Character", "id = $id");
        return $data[0];
    }

    public static function getClassName($id) {
        $data = singleton::select("name", "CharacterClass", "id = $id");
        return $data[0]["name"];
    }

    public static function getCharacterId($Name) {
        $data = singleton::select('id',"Character", "name = \"$Name\"");
        return $data[0]["id"];
    }
    
    public static function getClassNameId(string $className) {
        $data = singleton::select('id', "CharacterClass", "name = \"$className\"");
        return $data[0]["id"];
    }

    public function create() {
        $values = ["name" => $this->getName(), "level" => $this->getLevel(), "characterClassId" => self::getClassNameId(get_class($this)), "visible" => 1];
        $data = singleton::create("Character",$values);
    }

    public function update() {
        $values = ["level" => $this->getLevel()];
        $data = singleton::update("Character", $values, "id = " . $this->getId());
    }

    public function delete() {
        $values = ["name" => $this->getName(), "level" => $this->getLevel(), "characterClassId" => self::getClassNameId(get_class($this)),"id" => $this->getId()];
        $data = singleton::delete("Character", $values);
    }

    abstract public function attack(\ICharacter $target): string;

    abstract public function getDamage(float $value, bool $isMagical): string;

    abstract public function getStat(string $statName): float;
    
    public function levelUp(){
        $this->setLevel($this->getLevel()+1);
        $this->update();
    }

    public function getStats(): array {
        return ["level" => $this->getLevel(), "str" => $this->getStr(), "intl" => $this->getIntl(), "agi" => $this->getAgi()
            , "mDef" => $this->getMDef(), "fDef" => $this->getFDef(), "hp" => $this->getHp()];
    }

    abstract public function iDie(): bool;

    abstract public function setStat(string $statName, float $value): void;

    abstract public function setStats(array $stats): void;

    protected function isCritical(float $rate): bool {
        $roll = mt_rand(0, 100);
        return ($roll <= $rate * 100) ? true : false;
    }

    function getName() {
        return $this->name;
    }

    function getLevel() {
        return $this->level;
    }

    function getStr() {
        return $this->str;
    }

    function getIntl() {
        return $this->intl;
    }

    function getAgi() {
        return $this->agi;
    }

    function getMDef() {
        return $this->mDef;
    }

    function getFDef() {
        return $this->fDef;
    }

    function getHp() {
        return $this->hp;
    }

    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLevel($level): void {
        $this->level = $level;
    }

    function setStr($str): void {
        $this->str = $str;
    }

    function setIntl($intl): void {
        $this->intl = $intl;
    }

    function setAgi($agi): void {
        $this->agi = $agi;
    }

    function setMDef($mDef): void {
        $this->mDef = $mDef;
    }

    function setFDef($fDef): void {
        $this->fDef = $fDef;
    }

    function setHp($hp): void {
        $this->hp = $hp;
    }

}
