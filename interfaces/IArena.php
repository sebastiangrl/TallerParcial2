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

    function getChallenger(): Character;
    
    function setChallenger(): void;
    
    function getDefender(): Character;
    
    function setDefender(): void;
    
    function getWinner (): Character;
    
    function setWinner (): void;
    
}
