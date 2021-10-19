<?php


namespace App\Service\Game\GameGenerator\Player;


use App\Service\Game\GameGenerator\DIContainer\DIContainerInterface;
use App\Service\Game\Tournament\Player\PlayerInterface;

interface PlayerGeneratorInterface
{

    public function __construct(DIContainerInterface $DIContainer);

    /**
     * @param int $count
     * @return PlayerInterface[]
     */
    public function generate(int $count):array;
}