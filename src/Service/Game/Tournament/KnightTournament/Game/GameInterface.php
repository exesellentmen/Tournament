<?php


namespace App\Service\Game\Tournament\KnightTournament\Game;


use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

interface GameInterface
{
    /**
     * @param ParticipantInterface[] $participants
     * @return mixed
     */
    public function setParticipantList(array $participants);

    /**
     * @return ParticipantInterface[]
     */
    public function getParticipantList():array;

    public function execute();

    /**
     * @return DIContainerTournamentInterface
     */
    public function getDIContainerTournament(): DIContainerTournamentInterface;

    /**
     * @param DIContainerTournamentInterface $dIContainerTournament
     */
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): void;

}