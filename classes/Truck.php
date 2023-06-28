<?php

class Truck extends BaseCar
{
    public float $bodyLength = 0.0;
    public float $bodyWidth = 0.0;
    public float $bodyHeight = 0.0;
    const BODY_WHL_SEPARATOR = 'x';

    public function __construct($data)
    {
         parent::__construct($data);
         if($data['body_whl'] !== "")
         {
             if(!strpos($data['body_whl'], self::BODY_WHL_SEPARATOR))
             {
                 throw new \Exception("body_whl имеет неверный формат.");
             }
             $size = explode(self::BODY_WHL_SEPARATOR, $data['body_whl']);
             $this->bodyLength = (float) $size[0];
             $this->bodyWidth = (float) $size[1];
             $this->bodyHeight = (float) $size[2];
         }
    }

    public function getBodyVolume() : float
    {
         return (float) $this->bodyHeight  *  $this->bodyLength * $this->bodyWidth;
    }
}