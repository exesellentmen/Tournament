<?php


namespace App\Service\Game\Tournament\KnightTournament\DIContainer;

use App\Service\Game\Tournament\Information;
use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor\Shield;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\Knight;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\KnightInterface;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon\Sword;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\KnightTournament\Round\JoustRound;
use App\Service\Game\Tournament\KnightTournament\Round\MixJoustAndSwordRound;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\KnightTournament\Round\SwordRound;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DIContainerTournament implements DIContainerTournamentInterface
{
    private ContainerInterface $containerBuilder;

    private InformationInterface $information;

    /**
     * @var RoundInterface[]
     */
    private array $rounds;


    public function get(): ContainerInterface
    {
        if(!isset($this->containerBuilder)){
            $builder = new ContainerBuilder();
            $loader = new YamlFileLoader($builder, new FileLocator(__DIR__."/.."));
            $loader->load('services.yaml');
            $this->containerBuilder = $builder;
        }
        return $this->containerBuilder;
    }

    public function getRoundList(): array
    {
        return [
            SwordRound::make()
                ->setDIContainerTournament($this)
//            ,
//            JoustRound::make()
//              ->setDIContainerTournament($this),
        ];
    }

    /**
     * @return KnightInterface
     */
    public function getKnight(ParticipantInterface $participant): KnightInterface
    {
        $knight = new Knight($participant);

        $armor = new Shield();
        $armor->setName("Shield");
        mt_rand();
        $armor->setMinProtection(mt_rand(1,3));
        mt_rand();
        $armor->setMaxProtection(mt_rand(4,5));

        $weapon = new Sword();
        $weapon->setName("Sword");
        mt_rand();
        $weapon->setMinDamage(mt_rand(1,10));
        mt_rand();
        $weapon->setMaxDamage(mt_rand(11,20));
        $knight->setArmorList([$armor]);
        $knight->setWeaponList([$weapon]);

        return $knight;
    }

    public function getInformation(): InformationInterface
    {
        if(!isset($this->information)){
            $this->information = new Information();
        }
        return $this->information;
    }

}