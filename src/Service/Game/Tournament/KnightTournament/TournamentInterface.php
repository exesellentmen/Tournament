<?php


namespace App\Service\Game\Tournament\KnightTournament;


use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

interface TournamentInterface
{
    public function __construct(ConfigInterface $config, DIContainerTournamentInterface $container);
    public function setName(string $name);
    public function getName():string;
    public function execute():ParticipantInterface;

    /**
     * @param ParticipantInterface[]
     * @return void
     */
    public function setParticipantList(array $participant);

    /**
     * @return ParticipantInterface[]
     */
    public function getParticipantList():array;

    /**
     * @param PlayerInterface[]
     * @return void
     */
    public function setPlayerList(array $players);

    /**
     * @return PlayerInterface[]
     */
    public function getPlayerList():array;

    /**
     * @return RoundInterface[]
     */
    public function getRoundList(): array;

    /**
     * @param RoundInterface[] $roundList
     */
    public function setRoundList(array $roundList): void;

}