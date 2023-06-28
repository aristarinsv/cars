<?php

abstract class BaseCar
{
    public string $carType = "";
    public string $brand = "";
    public string $photoFileName = "";
    public float $carrying;

    public function __construct($data)
    {
        $this->carType = $data['car_type'];
        $this->brand = $data['brand'];
        $this->photoFileName = $data['photo_file_name'];
        $this->carrying = (float) $data['carrying'];
    }


    public function getPhotoFileExt():string
    {
        $arr = pathinfo($this->photoFileName);
        return $arr['extension'];
    }



}