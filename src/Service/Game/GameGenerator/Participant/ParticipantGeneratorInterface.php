<?php


namespace App\Service\Game\GameGenerator\Participant;


use App\Service\Game\GameGenerator\DIContainer\DIContainerInterface;
use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

interface ParticipantGeneratorInterface
{
    public function __construct(DIContainerInterface $DIContainer);

    /**
     * @param PlayerInterface[] $playerList
     * @return ParticipantInterface[]
     */
    public function generate(array $playerList, ConfigInterface $config):array;
}