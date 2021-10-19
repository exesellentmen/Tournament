<?php


namespace App\Service\Game\GameGenerator\DIContainer;


use Symfony\Component\DependencyInjection\ContainerInterface;

interface DIContainerInterface
{
    public function get():ContainerInterface;
}