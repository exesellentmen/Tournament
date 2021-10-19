<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon;


use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;

interface WeaponInterface
{
    public function attack(KnightInterface $knight);

    public function setId(int $id);
    public function getId():int;

    public function setMaxDamage(int $damage);
    public function getMaxDamage():int;

    public function setMinDamage(int $damage);
    public function getMinDamage():int;

    public function getName():string;
    public function setName(string $name);

}