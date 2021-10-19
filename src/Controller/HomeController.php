<?php

namespace App\Controller;

use App\Service\Game\GameGenerator\DIContainer\DIContainer;
use App\Service\Game\GameGenerator\Participant\ParticipantGeneratorInterface;
use App\Service\Game\GameGenerator\Player\PlayerGenerator;
use App\Service\Game\GameGenerator\Player\PlayerGeneratorInterface;
use App\Service\Game\Tournament\InformationInterface;
use App\Service\Game\Tournament\KnightTournament\Config\ConfigKnightTournament;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournament;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Armor\Shield;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Battle\Battle;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Config\Config;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Knight\Knight;
use App\Service\Game\Tournament\KnightTournament\Game\SwordFighting\Weapon\Sword;
use App\Service\Game\Tournament\KnightTournament\Participant\Participant;
use App\Service\Game\Tournament\KnightTournament\Participant\ParticipantInterface;
use App\Service\Game\Tournament\KnightTournament\Round\RoundInterface;
use App\Service\Game\Tournament\KnightTournament\Round\SwordRound;
use App\Service\Game\Tournament\KnightTournament\Tournament;
use App\Service\Game\Tournament\Player\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/game", name="game")
     */
    public function game(Request $request): Response
    {
        $request->query->get('number');

        $count = $request->query->get('number');
        //Create dependency injection Container
        $dIContainer = new DIContainer();
        $dIContainerBuilder = $dIContainer->get();

        $configTournament = new ConfigKnightTournament(100,true);

        // Create Tournir ---------------------------
        $dIContainerTournament = new DIContainerTournament();
        $tournament = new Tournament($configTournament,$dIContainerTournament);

        //Generate Players
        $playerGenerator = $dIContainerBuilder->get(PlayerGeneratorInterface::class);
        $players = $playerGenerator->generate($count);

        $tournament->setPlayerList($players);

        $tournament->execute();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'info'=>$dIContainerTournament->getInformation()->getInformation()
        ]);
    }
}
