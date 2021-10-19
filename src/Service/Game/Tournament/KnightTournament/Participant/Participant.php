<?php


namespace App\Service\Game\Tournament\KnightTournament\Participant;


use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

class Participant implements ParticipantInterface
{
    private int $points;
    private PlayerInterface $player;
    private bool $activity;
    private ConfigInterface $config;
    private DIContainerTournamentInterface $dIContainerTournament;

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points)
    {
        $this->points = $points;
        if($this->points < 1){
            $this->setActivity(false);
        }
    }

    public function getActivity(): bool
    {
        return $this->activity;
    }

    public function setActivity(bool $activity)
    {
        $this->activity = $activity;
    }

    public function setPlayer(PlayerInterface $player)
    {
        $this->player = $player;
    }

    public function getPlayer(): PlayerInterface
    {
        return $this->player;
    }

    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
        $this->points = $this->config->getParticipantPoints();
        $this->setActivity($this->config->getActivityParticipant());
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @inheritDoc
     */
    public function getDIContainerTournament(): DIContainerTournamentInterface
    {
        return $this->dIContainerTournament;
    }

    /**
     * @inheritDoc
     */
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): ParticipantInterface
    {
        $this->dIContainerTournament = $dIContainerTournament;
        $this->information = $this->dIContainerTournament->getInformation();
        return $this;
    }

}