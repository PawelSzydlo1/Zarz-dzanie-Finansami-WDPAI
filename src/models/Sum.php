<?php


class Sum
{

    private $sum;


    public function __construct($sum)
    {
        $this->sum = $sum;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function setSum($sum): void
    {
        $this->sum = $sum;
    }
}