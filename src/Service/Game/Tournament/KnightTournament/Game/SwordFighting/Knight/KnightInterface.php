<?php


namespace App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight;


use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor\ArmorInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon\WeaponInterface;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;

interface KnightInterface
{
    public function __construct(ParticipantInterface $participant);

    /**
     * @param WeaponInterface[] $weaponList
     * @return void
     */
    public function setWeaponList(array $weaponList);

    /**
     * @return WeaponInterface[]
     */
    public function getWeaponList():array;

    /**
     * @param ArmorInterface[] $armourList
     * @return void
     */
    public function setArmorList(array $armourList);

    /**
     * @return ArmorInterface[]
     */
    public function getArmorList():array;

    public function setParticipant(ParticipantInterface $participant);

    public function getParticipant():ParticipantInterface;

    public function takeDamage(int $damage);

}