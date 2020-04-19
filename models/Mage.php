<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mage
 *
 * @author pabhoz
 */
class Mage extends Character {

    private $house;
     
    function __construct($name, $house) {
        parent::__construct($name, 1, 4, 10, 6, 5, 2, 80);
        $this->house = $house;
    }
    
    public function attack(\ICharacter $target): void {
        $damage = (!$this->isCritical( (0.5 * $this->getIntl()) / 100)) ? 1.2 * $this->getIntl() : (1.2 * $this->getIntl()) * 2 ;
        $housePrint = (is_null($this->getHouse())) ? '' : " of ".$this->getHouse();
        echo $this->getName().$housePrint." burns ".$target->getName()." for ".$damage." hp! </br>";
        $target->getDamage($damage, true);
    }

    public function getDamage(float $value, bool $isMagical): void {
        $takenDamage = ($isMagical) ? $value - (0.8 * $this->getMDef()): $value - $this->getFDef();
        $this->setHp($this->getHp() - $takenDamage);
        echo $this->getName()." now has ".$this->getHp()." hp </br>";
    }

    public function getStat(string $statName): float {
        
    }

    public function iDie(): void {
        
    }

    public function setStat(string $statName, float $value): void {
        
    }

    public function setStats(array $stats): void {
        
    }
    
    function getHouse() {
        return $this->house;
    }

    function setHouse($house): void {
        $this->house = $house;
    }

        
    function setLevel($level): void {
        $this->level = $level;
        $this->setStr($this->getStr() * (1.5 * ($this->getLevel() - 1)));
        $this->setIntl($this->getIntl() * (2.3 * ($this->getLevel() - 1)));
        $this->setAgi($this->getAgi() * (1.6 * ($this->getLevel() - 1)));
        $this->setMDef($this->getMDef() * (1.5 * ($this->getLevel() - 1)));
        $this->setFDef($this->getFDef() * (1.1 * ($this->getLevel() - 1)));
        $this->setHp($this->getHp() * (1.4 * ($this->getLevel() - 1)));
    }

}
