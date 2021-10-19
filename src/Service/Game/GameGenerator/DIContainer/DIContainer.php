<?php


namespace App\Service\Game\GameGenerator\DIContainer;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DIContainer implements DIContainerInterface
{
    private ContainerInterface $containerBuilder;

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
}