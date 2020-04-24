<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface IUser {
    
    public function getId():int;
    
    public function getName():string;
    
    public function setPassword():void;
}
