<?php


class Calculator
{
    private int $money;
    private int $years;
    private int $percentage;

    public function __construct(int $money, int $years, int $percentage)
    {

        $this->money = $money;
        $this->years = $years;
        $this->percentage = $percentage;
    }

    public function getResult(): int
    {
        $sum = $this->money;
        for ($i = 0; $i < $this->years; $i++) {
            $sum = $sum + $sum * $this->percentage / 100;
        }
        return $sum;
    }
}