<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CharacterFactory
 *
 * @author pabhoz
 */
class CharacterFactory implements ICharacterFactory {

    public static function getCharacter(int $id = null, $data = null): \ICharacter {
        if(!is_null($id)){
            $data = Character::getModel($id);
        }
        $className = "new" . ucfirst(Character::getClassName($data["characterClassId"]));
        $character = CharacterFactory::{$className}($data["name"]);
        //print_r($character);
        $character->setId($data["id"]);
        if($data["level"] > 1){$character->setLevel($data["level"]);}
        //print_r($character);
        return $character;
    }

    public static function newMage(string $name): \Mage {
        return new Mage($name);
    }

    public static function newRogue(string $name): \Rogue {
        return new Rogue($name);
    }

    public static function newWarrior(string $name): \Warrior {
        return new Warrior($name);
    }

    
    public static function createCharacter() {

        if (isset($_POST['name']) && isset($_POST['selectClass'])) {
            $name = $_POST['name'];
            $selectClass = $_POST['selectClass'];
            
            $className = "new" . ucfirst($selectClass);
            $character = CharacterFactory::{$className}($name);
            $character->create();   
            $character->setID(Character::getCharacterId($character->getName()));
            $character->setUser();
        }
    }
}
