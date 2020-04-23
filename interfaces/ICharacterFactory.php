<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author pabhoz
 */
interface ICharacterFactory {
    static function getCharacter(int $id): ICharacter;
    static function newMage(string $name): Mage;
    static function newRogue(string $name): Rogue;
    static function newWarrior(string $name): Warrior;
    static function createCharacter();
}
