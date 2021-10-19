<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting;


use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournamentInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

class SwordFighting implements \App\Service\Game\Tournament\KnightTournament\Game\GameInterface
{
    /**
     * @var ParticipantInterface[]
     */
    private array $participants;


    /**
     * @var KnightInterface[]
     */
    private array $knigths;

    private DIContainerTournamentInterface $dIContainerTournament;

    private InformationInterface $information;


    /**
     * @inheritDoc
     */
    public function setParticipantList(array $participants)
    {
        $this->participants = $participants;
        $knigths = [];

        foreach ($this->participants as $participant){
            $knight = $this->getDIContainerTournament()->getKnight($participant);
            array_push($knigths, $knight);
        }
        $this->knigths = $knigths;
    }

    /**
     * @inheritDoc
     */
    public function getParticipantList(): array
    {
        return $this->participants;
    }

    public function execute()
    {

        $this->information->addString("&emsp;&emsp;&emsp;&emsp;&emsp;<b>Participant:</b>");
        foreach($this->knigths as $knight){
            $this->information->addString($knight->getParticipant()->getPlayer()->getName());
            $this->information->addString("(points:".$knight->getParticipant()->getPoints()."), ");
        }

        $this->information->addString("<br>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Equipment:</b>");
        foreach($this->knigths as $knight){
            $knightData = [
                "name"=>$knight->getParticipant()->getPlayer()->getName(),
                "weapon"=>$knight->getWeaponList()[0]->getName(),
                "damage"=>"(".$knight->getWeaponList()[0]->getMinDamage()."-".$knight->getWeaponList()[0]->getMaxDamage().")",
                "armor"=>$knight->getArmorList()[0]->getName(),
                "protection"=>"(".$knight->getArmorList()[0]->getMinProtection()."-".$knight->getArmorList()[0]->getMaxProtection().")",
            ];

            $this->information->addString("<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;");
            $this->information->addString("".
                "<b>Player</b>: ".$knightData['name']."; ".
                "<b>Weapon</b>: ".$knightData['weapon'].$knightData['damage']."; ".
                "<b>Armor</b>: ".$knightData['armor'].$knightData['protection']."; "
            );
        }

        $this->information->addString("<br>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Start Game:</b>");

        for ($i = 1; $i <= 3; $i++){
            foreach($this->knigths as $knight){
                if($knight->getParticipant()->getActivity()){
                    foreach ($this->knigths as $rival){
                        if($rival->getParticipant()->getActivity()) {
                            if ($knight !== $rival) {
                                $this->information->addString("<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;");
                                $this->information->addString(
                                    $knight->getParticipant()
                                        ->getPlayer()
                                        ->getName()."(".
                                    $knight->getParticipant()->getPoints().")"
                                );
                                $knight->getWeaponList()[0]->attack($rival);
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @return DIContainerTournamentInterface
     */
    public function getDIContainerTournament(): DIContainerTournamentInterface
    {
        return $this->dIContainerTournament;
    }

    /**
     * @param DIContainerTournamentInterface $dIContainerTournament
     */
    public function setDIContainerTournament(DIContainerTournamentInterface $dIContainerTournament): void
    {
        $this->dIContainerTournament = $dIContainerTournament;
        $this->information = $this->dIContainerTournament->getInformation();
    }
}