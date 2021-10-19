<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight;


use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor\ArmorInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon\WeaponInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

class Knight implements KnightInterface
{
    /**
     * @var ArmorInterface[]
     */
    private array $armorList;

    /**
     * @var WeaponInterface[]
     */
    private array $weaponList;

    private ParticipantInterface $participant;

    private InformationInterface $information;


    public function __construct(ParticipantInterface $participant)
    {
        $this->participant = $participant;
        $this->information = $this->getParticipant()->getDIContainerTournament()->getInformation();

    }

    /**
     * @inheritDoc
     */
    public function setWeaponList(array $weaponList)
    {
        $this->weaponList = $weaponList;
    }

    /**
     * @inheritDoc
     */
    public function getWeaponList(): array
    {
        return $this->weaponList;
    }

    /**
     * @inheritDoc
     */
    public function setArmorList(array $armourList)
    {
        $this->armorList = $armourList;
    }

    /**
     * @inheritDoc
     */
    public function getArmorList(): array
    {
        return $this->armorList;
    }

    public function takeDamage(int $damage)
    {
        $startDamage = $damage;
        $this->information->addString("strikes(".$damage.") ->");
        $points = $this->participant->getPoints();
        foreach ($this->armorList as $armor){
            $damage = $armor->protect($damage);
        }
        if($damage < 0 ){
            $damage = 0;
        }
        $points = $points - $damage;
        if($points<0){
            $points = 0;
        }
        $this->information->addString("protects(".($startDamage - $damage).")");
        $this->information->addString($this->getParticipant()->getPlayer()->getName()."(".$points.")");

        $this->participant->setPoints($points);
    }

    public function getParticipant(): ParticipantInterface
    {
        return $this->participant;
    }

    public function setParticipant(ParticipantInterface $participant)
    {
        $this->participant = $participant;
    }
}