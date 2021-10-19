<?php


namespace App\Service\Game\Tournament;


class Information implements InformationInterface
{
    private array $information = [];

    public function getInformation(): array
    {
        return $this->information;
    }

    public function addString(string $str)
    {
        array_push($this->information, $str);
    }

    public function setInformation(array $str)
    {
        $this->information = $str;
    }
}