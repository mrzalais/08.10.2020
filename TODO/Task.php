<?php


class Task
{
    private string $name;
    private float $time;

    public function __construct(string $name, float $time)
    {

        $this->name = $name;
        $this->time = $time;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'time' => $this->getTime(),
        ];
    }

}