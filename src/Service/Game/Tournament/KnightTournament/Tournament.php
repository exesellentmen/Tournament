<?php


namespace App\Service\Game\Tournament\KnightTournament;


use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\KnightTournament\Round\SwordRound;
use App\Service\Game\Tournament\Player\PlayerInterface;
use phpDocumentor\Reflection\Types\This;
use function PHPUnit\Framework\isEmpty;

class Tournament implements TournamentInterface
{
    private ConfigInterface $config;

    /**
     * @var ParticipantInterface[]
     */
    private array $participantList;

    /**
     * @var PlayerInterface[]
     */
    private array $playerList;

    private DIContainerTournamentInterface $container;

    /**
     * @var RoundInterface[]
     */
    private array $roundList;

    private ParticipantInterface $winner;

    private InformationInterface $information;

    public function __construct(ConfigInterface $config, DIContainerTournamentInterface $container)
    {
        $this->config = $config;
        $this->container = $container;
        $this->information = $this->container->getInformation();
    }

    public function setName(string $name)
    {
        // TODO: Implement setName() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function execute():ParticipantInterface
    {
        $this->information->addString("&emsp;<b>Tournament has begun:</b><br>");
        $participantList = $this->getParticipantList();
        $roundList = $this->container->getRoundList();
        $this->information->addString("&emsp;&emsp;<b>Rounds:</b>");
        while (count($participantList) > 1) {
            $currentRound = null;
            if(isEmpty($roundList)){
                $roundList = $this->container->getRoundList();
            }
            $currentRound = array_shift($roundList);
            $currentRound->setConfig($this->config);
            $currentRound->setParticipantList($participantList);
            $participantList = $currentRound->execute();
            shuffle($participantList);
        }
        $this->winner = $participantList[0];
        $this->information->addString("<br><br><b>Winner:<b><br>");
        $this->information->addString("<b>".$this->winner->getPlayer()->getName()." Points(".$this->winner->getPoints().")"."<b>");
        return $this->winner;
    }

    public function setParticipantList(array $participant)
    {
        $this->participantList = $participant;
    }

    public function getParticipantList(): array
    {
        return $this->participantList;
    }

    public function setPlayerList(array $players)
    {
        $builder = $this->container->get();
        $participants = [];
        $this->participant = [];
        foreach ($players as $player){
            $participant = $builder->get(ParticipantInterface::class);
            $participant->setConfig($this->config);
            $participant->setPlayer($player);
            $participant->setDIContainerTournament($this->container);
            array_push($participants,$participant);
        }
        $this->playerList = $players;
        $this->setParticipantList($participants);
    }

    public function getPlayerList(): array
    {
        return $this->playerList;
    }

    /**
     * @return RoundInterface[]
     */
    public function getRoundList(): array
    {
        return $this->roundList;
    }

    /**
     * @param RoundInterface[] $roundList
     */
    public function setRoundList(array $roundList): void
    {
        $this->roundList = $roundList;
    }
}