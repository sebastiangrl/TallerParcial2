<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author PELITOS
 */
class User implements IUser{
    private $name;
    private $id;
    
    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }



}
