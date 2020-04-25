<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Warrior
 *
 * @author pabhoz
 */
class Warrior extends Character{
    
  function __construct($name) {
        parent::__construct($name, 1, 10, 4, 6, 2, 6, 110);
    }

    public function attack(\ICharacter $target): string {
        $damage = (!$this->isCritical((0.6 * $this->getStr()) / 100)) ? 1.4 * $this->getStr() : (1.4 * $this->getStr()) * 2;
        return $this->getName() . " burns " . $target->getName() . " for " . $damage . " hp! </br>".$target->getDamage($damage, false);
    }

    public function getDamage(float $value, bool $isMagical): string {
        $takenDamage = ($isMagical) ? $value - $this->getMDef() : $value - (0.8 * $this->getFDef());
        $this->setHp($this->getHp() - $takenDamage);
        return $this->getName() . " now has " . $this->getHp() . " hp </br>";
    }

    public function getStat(string $statName): float {
        
    }

    public function iDie(): bool {
        return ($this->getHp() <= 0)?true:false;
    }

    public function setStat(string $statName, float $value): void {
        
    }

    public function setStats(array $stats): void {
        
    }

    function setLevel($level): void {
        $this->level = $level;
        $this->setStr($this->getStr() * (2.3 * ($this->getLevel() - 1)));
        $this->setIntl($this->getIntl() * (1.5 * ($this->getLevel() - 1)));
        $this->setAgi($this->getAgi() * (1.6 * ($this->getLevel() - 1)));
        $this->setMDef($this->getMDef() * (1.1 * ($this->getLevel() - 1)));
        $this->setFDef($this->getFDef() * (1.6 * ($this->getLevel() - 1)));
        $this->setHp($this->getHp() * (1.5 * ($this->getLevel() - 1)));
    }

}

