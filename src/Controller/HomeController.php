<?php

namespace App\Controller;

use App\Service\Game\GameGenerator\DIContainer\DIContainer;
use App\Service\Game\GameGenerator\Player\PlayerGeneratorInterface;
use App\Service\Game\Tournament\KnightTournament\Config\ConfigKnightTournament;
use App\Service\Game\Tournament\KnightTournament\DIContainer\DIContainerTournament;
use App\Service\Game\Tournament\KnightTournament\Tournament;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
