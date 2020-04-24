<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlUser
 *
 * @author PELITOS
 */

class BlUser {
    static function getBdaUser(string $userName, string $password) {
        //encriptado de password
        $criptPasword = cript($password);
        //$Fighters = "select id, name from [user] where password = $criptPasword and name = $userName";  
        return (!mssql_num_rows($query))? null: self::toUser(/*result query*/);
        
    }
    
    static function cript($param): string {
        
        return $criptPasword;
    }
    
    static function toUser($array): \User {
        
        return $user;
    }
}