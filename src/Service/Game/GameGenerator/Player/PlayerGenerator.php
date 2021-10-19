<?php


namespace App\Service\Game\GameGenerator\Player;


use App\Service\Game\GameGenerator\DIContainer\DIContainerInterface;
use App\Service\Game\Tournament\Player\Player;
use App\Service\Game\Tournament\Player\PlayerInterface;
use App\Service\TestService;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PlayerGenerator implements PlayerGeneratorInterface
{
    /**
     * @var PlayerInterface[]
     */
    private array $players;

    private DIContainerInterface $DIContainer;

    /**
     * @inheritDoc
     */
    public function generate(int $count): array
    {
        $builder = $this->DIContainer->get();
        $this->players = [];
        for ($i = 1; $i <= $count; $i++){
            $player = $builder->get(PlayerInterface::class);
            $player->setId($i);
            $player->setName("Player ".$i);
            array_push($this->players,$player);
        }
        return $this->players;
    }


    public function __construct(DIContainerInterface $DIContainer)
    {
        $this->DIContainer = $DIContainer;
    }
}