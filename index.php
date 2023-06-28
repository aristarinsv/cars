<?php
const TYPE_CAR = "car";
const TYPE_TRUCK = "truck";
const TYPE_SPEC_MACHINE = "spec_machine";
const CSV_COUNT_ROWS = 7;
const CSV_SEPARATOR = ';';
include __DIR__ . '/classes/BaseCar.php';
include __DIR__ . '/classes/Car.php';
include __DIR__ . '/classes/Truck.php';
include __DIR__ . '/classes/SpecMachine.php';
function getCarsObject(){
    $file = __DIR__ . '/load/source_car_data.csv';
    $result = [];
    if(!file_exists($file))
    {
        throw new \Exception("Файл '{$file}' не существует.");
    }
    $fh = fopen($file, "r");
    while (($row = fgetcsv($fh, 0, CSV_SEPARATOR)) !== false)
    {
        $car_type = "";
        if(is_array($row) && count($row)-1 !== CSV_COUNT_ROWS)
        {
            continue 1;
        }
        list($car_type, $brand, $passenger_seats_count, $photo_file_name, $body_whl, $carrying, $extra) = $row;
        $data = [
            'car_type' => $car_type,
            'brand' => $brand,
            'passenger_seats_count' => $passenger_seats_count,
            'photo_file_name' => $photo_file_name,
            'body_whl' => $body_whl,
            'carrying' => $carrying,
            'extra' => $extra
        ];
        switch ($data['car_type'])
        {
            case TYPE_CAR:
                $result[] = new Car($data);
                break;
            case TYPE_SPEC_MACHINE:
                $result[]  = new SpecMachine($data);
                break;
            case TYPE_TRUCK:
                $result[]  = new Truck($data);
                break;
        }
    }
    return $result;
}

$listObj = getCarsObject();
