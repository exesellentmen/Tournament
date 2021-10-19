<?php


namespace App\Service\Game\Tournament\KnightTournament\Config;


class ConfigKnightTournament implements ConfigInterface
{
    private int $startPoins;
    public bool $activityParticipant;

    public function __construct(int $startPoins, bool $activityParticipant)
    {
        $this->startPoins = $startPoins;
        $this->activityParticipant = $activityParticipant;
    }

    public function getParticipantPoints(): int
    {
        return $this->startPoins;
    }

    public function setParticipantPoints(int $points)
    {
        $this->startPoins = $points;
    }


    public function getActivityParticipant(): bool
    {
        return $this->activityParticipant;
    }

    public function setActivityParticipant(bool $activity)
    {
        $this->activityParticipant = $activity;
    }
}