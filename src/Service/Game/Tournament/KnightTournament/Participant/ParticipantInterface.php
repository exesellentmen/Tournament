<?php


namespace App\Service\Game\Tournament\KnightTournament\Participant;


use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

interface ParticipantInterface
{

    public function getPoints():int;
    public function setPoints(int $points);

    public function getActivity():bool;
    public function setActivity(bool $activity);


    public function setPlayer(PlayerInterface $player);
    public function getPlayer():PlayerInterface;

    public function setConfig(ConfigInterface $config);
    public function getConfig():ConfigInterface;

    /**
     * @return DIContainerTournamentInterface
     */
    public function getDIContainerTournament(): DIContainerTournamentInterface;

    /**
     * @param DIContainerTournamentInterface $dIContainerTournament
     * @return ParticipantInterface
     */
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): ParticipantInterface;

}