<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Config;


interface ConfigInterface
{
    public function __construct(int $countPlayerInBattle);

    public function getCountPlayerInBattle():int;

}