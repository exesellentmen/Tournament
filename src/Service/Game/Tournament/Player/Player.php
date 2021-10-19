<?php


namespace App\Service\Game\Tournament\Player;


use phpDocumentor\Reflection\Types\This;

class Player implements PlayerInterface
{
    private string $name;
    private int $id;

    public function __construct()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}