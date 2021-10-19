<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon;


use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;

class Sword implements WeaponInterface
{
    private int $minDamage;
    private int $maxDamage;
    private string $name;

    public function attack(KnightInterface $knight)
    {
        mt_rand();
        $knight->takeDamage(mt_rand($this->minDamage, $this->maxDamage));
    }

    public function setId(int $id)
    {
        // TODO: Implement setId() method.
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function setMaxDamage(int $damage)
    {
        $this->maxDamage = $damage;
    }

    public function getMaxDamage(): int
    {
        return $this->maxDamage;
    }

    public function setMinDamage(int $damage)
    {
        $this->minDamage = $damage;
    }

    public function getMinDamage(): int
    {
        return $this->minDamage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}