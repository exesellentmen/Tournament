<?php


namespace App\Service\Game\Tournament\KnightTournament\DIContainer;


use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

interface DIContainerTournamentInterface
{
    public function get():ContainerInterface;

    /**
     * @param string $name
     * @return RoundInterface[]
     */
    public function getRoundList():array;

    /**
     * @return KnightInterface
     */
    public function getKnight(ParticipantInterface $participant): KnightInterface;


    public function getInformation():InformationInterface;
}