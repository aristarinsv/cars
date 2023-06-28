<?php

class SpecMachine extends BaseCar
{
    public string $extra = "";
    public function __construct($data)
    {
        parent::__construct($data);
        $this->extra = $data['extra'];
    }
}