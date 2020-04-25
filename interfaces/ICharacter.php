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
interface ICharacter {

    function getStats(): array;

    function setStats(array $stats): void;

    function getStat(string $statName): float;

    function setStat(string $statName, float $value): void;

    function attack(ICharacter $target): string;

    function getDamage(float $value, bool $isMagical): string;

    function iDie(): bool;

    static function getModel(int $id);

    static function getClassName(int $id);
    
    static function getClassNameId(string $className);

    function create();

    function update();

    function delete();
}
