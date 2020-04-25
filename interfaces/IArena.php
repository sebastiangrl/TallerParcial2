<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author PELITOS
 */
interface IArena {
    
    function getId():int;
    
    function setId(int $id):void;

    function getChallenger(): int;
    
    function setChallenger($challenger): void;
    
    function getDefender(): int;
    
    function setDefender($defender): void;
    
    function getWinner (): int;
    
    function setWinner ($winner): void;
    
    function setHistoria (array $historia):void;
    
    function getHistoria ():array;
    
}
