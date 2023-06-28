<?php

class Car extends BaseCar
{
    public int $passengerSeatsCount = 0;
    public function __construct($data)
    {
        parent::__construct($data);
        $this->passengerSeatsCount = (int) $data['passenger_seats_count'];
    }
}