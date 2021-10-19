<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor;


class Shield implements ArmorInterface
{

    private int $maxProtection;
    private int $minProtection;
    private string $name;


    public function setMaxProtection(int $protection)
    {
        $this->maxProtection = $protection;
    }

    public function getMaxProtection(): int
    {
        return $this->maxProtection;
    }

    public function setMinProtection(int $protection)
    {
        $this->minProtection = $protection;
    }

    public function getMinProtection(): int
    {
        return $this->minProtection;
    }

    public function protect(int $damage): int
    {
        mt_rand();
        $damage = $damage - mt_rand($this->getMinProtection(), $this->getMaxProtection());
        if($damage<0){
            $damage = 0;
        }
        return $damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setId(int $id)
    {
        // TODO: Implement setId() method.
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
    }
}