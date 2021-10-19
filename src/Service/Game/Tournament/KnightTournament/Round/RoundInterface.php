<?php


namespace App\Service\Game\Tournament\KnightTournament\Round;


use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Game\GameInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

interface RoundInterface
{

    public static function make():RoundInterface;


    public function setConfig(ConfigInterface $config);
    public function getConfig():ConfigInterface;

    /**
     * @param ParticipantInterface[] $participants
     * @return mixed
     */
    public function setParticipantList(array $participants);

    /**
     * @return ParticipantInterface[]
     */
    public function getParticipantList():array;


    /**
     * @return GameInterface[]
     */
    public function getGames():array;


    /**
     * @return ParticipantInterface[]
     */
    public function execute():array;






    /**
     * @return DIContainerTournamentInterface
     */
    public function getDIContainerTournament(): DIContainerTournamentInterface;

    /**
     * @param DIContainerTournamentInterface $dIContainerTournament
     */
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): RoundInterface;


}