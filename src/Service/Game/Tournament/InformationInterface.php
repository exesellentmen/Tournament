<?php


namespace App\Service\Game\Tournament;


interface InformationInterface
{
    public function getInformation():array;

    public function addString(string $str);

    public function setInformation(array $str);
}