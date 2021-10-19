<?php


namespace App\Service\Game\Tournament\KnightTournament\Round;


use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournament;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Game\GameInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\SwordFighting;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

class SwordRound implements RoundInterface
{
    private ConfigInterface $config;

    private DIContainerTournamentInterface $dIContainerTournament;

    /**
     * @var ParticipantInterface[]
     */
    private array $participantList;

    /**
     * @var GameInterface[]
     */
    private array $games;

    private InformationInterface $information;

    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @inheritDoc
     */
    public function setParticipantList(array $participants)
    {
        $this->participantList = $participants;
    }

    /**
     * @inheritDoc
     */
    public function getParticipantList(): array
    {
        return $this->participantList;
    }

    /**
     * @inheritDoc
     */
    public function getGames(): array
    {
        $games = [];
        $participants = $this->getParticipantList();
        if(!isset($this->games)){
            for($i=1;$i<=count($this->participantList)/2;$i++){
                $game = new SwordFighting();
                $game->setDIContainerTournament($this->getDIContainerTournament());
                $game->setParticipantList([array_shift($participants),array_shift($participants)]);
                array_push($games, $game);
            }
            $this->games = $games;
        }
        return $this->games;
    }


    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        $this->information->addString("</br>&emsp;&emsp;&emsp;<b>Sword fighting rounds:</b>");

        $i = 1;
        //We play games
        foreach ($this->getGames() as $game){
            $this->information->addString("</br>&emsp;&emsp;&emsp;&emsp;<b>Game № $i:</b></br>");
            $i++;
            $game->execute();
        }
        //We get the remaining participants
        $participantList = $this->getParticipantList();
        $participants = [];
        foreach ($participantList as $participant){
            if($participant->getActivity()){
                array_push($participants, $participant);
            }
        }
        return $participants;
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
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): RoundInterface
    {
        $this->dIContainerTournament = $dIContainerTournament;
        $this->information = $this->dIContainerTournament->getInformation();
        return $this;
    }


    public static function make(): RoundInterface
    {
        return new self();
    }
}