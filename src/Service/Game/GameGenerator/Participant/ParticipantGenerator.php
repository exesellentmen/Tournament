<?php


namespace App\Service\Game\GameGenerator\Participant;


use App\Service\Game\GameGenerator\DIContainer\DIContainerInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

class ParticipantGenerator implements ParticipantGeneratorInterface
{
    private DIContainerInterface $DIContainer;

    /**
     * @var ParticipantInterface[]
     */
    private array $participant;

    public function __construct(DIContainerInterface $DIContainer)
    {
        $this->DIContainer = $DIContainer;
    }

    /**
     * @inheritDoc
     */
    public function generate(array $playerList, $config): array
    {
        $builder = $this->DIContainer->get();
        $this->participant = [];
        foreach ($playerList as $player){
            $participant = $builder->get(ParticipantInterface::class);
            $participant->setConfig($config);
            $participant->setPlayer($player);
            array_push($this->participant,$participant);
        }
        return $this->participant;
    }
}