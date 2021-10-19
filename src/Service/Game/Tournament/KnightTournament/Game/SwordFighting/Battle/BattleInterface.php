<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Battle;


use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;

interface BattleInterface
{
    public function __construct(ConfigInterface $config);

    /**
     * @return KnightInterface[]
     */
    public function getKnightList():array;

    /**
     * @param KnightInterface[] $knightList
     * @return void
     */
    public function setKnightList(array $knightList);

    public function execute();


}