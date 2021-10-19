<?php


namespace App\Service\Game\Tournament\KnightTournament\Config;


interface ConfigInterface
{
    public function __construct(int $startPoins, bool $activityParticipant);

    public function getParticipantPoints():int;
    public function setParticipantPoints(int $points);

    public function getActivityParticipant():bool;
    public function setActivityParticipant(bool $activity);
}