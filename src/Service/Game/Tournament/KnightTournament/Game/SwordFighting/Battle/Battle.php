<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Battle;


use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Config\ConfigInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;

class Battle implements BattleInterface
{
    private ConfigInterface $config;

    /**
     * @var KnightInterface[]
     */
    private array $knigths;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getKnightList(): array
    {
        return $this->knigths;
    }

    /**
     * @param KnightInterface[] $knightList
     * @return void
     */
    public function setKnightList(array $knightList)
    {
        $this->knigths = $knightList;
        if(count($this->knigths) < $this->config->getCountPlayerInBattle()){
            $this->knigths = $knightList;
        }
    }

    public function execute()
    {
        for ($i = 1; $i <= 9; $i++){
           foreach($this->knigths as $knight){
               if($knight->getParticipant()->getActivity()){
                   foreach ($this->knigths as $rival){
                       if($rival->getParticipant()->getActivity()) {
                           if ($knight !== $rival) {
                               $knight->getWeaponList()[0]->attack($rival);
                           }
                       }
                   }
               }
           }
       }

    }
}