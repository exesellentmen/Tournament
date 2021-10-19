<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor;


interface ArmorInterface
{

    public function setMaxProtection(int $protection);
    public function getMaxProtection():int;

    public function setMinProtection(int $protection);
    public function getMinProtection():int;

    public function protect(int $damage):int;

    public function getName():string;
    public function setName(string $name);

    public function setId(int $id);
    public function getId():int;


}