<?php


namespace App\Service\Game\Tournament\Player;


interface PlayerInterface
{
    public function __construct();

    public function getName():string;
    public function setName(string $name);

    public function getId():int;
    public function setId(int $id);
}