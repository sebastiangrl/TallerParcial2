<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlArena
 *
 * @author PELITOS
 */
class BlArena {
    static function searchFighters(Character $challenger): array {
        $level = $challenger->getLevel();
        //$Fighters = (select * from [personajes] where level between $level-2 and $level+2)  
        return $Fighters;
    }
    
    static function setArenaBda($param): void {
        
    }
    
    static function getArenaBda($user): array {
        
        return $arena;
    }
}
