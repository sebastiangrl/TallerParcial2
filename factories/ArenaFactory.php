<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArenaFactory
 *
 * @author PELITOS
 */
class ArenaFactory {
    
    public static function createArena($idChallenger, $idDefender) {
        $arena = ArenaFactory::newArena($idChallenger, $idDefender);
        $arena->createArena($idChallenger, $idDefender);
        $arena->setId($arena->getArenaId($idChallenger, $idDefender));
        return $arena;
    }
    
    public static function newArena($idChallenger, $idDefender) {
        return new Arena($idChallenger, $idDefender);
    }
}
