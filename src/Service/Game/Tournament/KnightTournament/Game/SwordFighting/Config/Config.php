<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Config;


class Config implements ConfigInterface
{
    private int $countPlayerInBattle;

    public function __construct(int $countPlayerInBattle)
    {
        $this->countPlayerInBattle = $countPlayerInBattle;
    }

    public function getCountPlayerInBattle(): int
    {
        return $this->countPlayerInBattle;
    }
}