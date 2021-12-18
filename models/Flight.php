<?php

class Fight
{
    public $id;
    public $code_departure;
    public $code_arrival;
    public $price;
    public $stopover;

    public function __construct($_id, $_code_departure, $_code_arrival, $_code, $_lat, $_price, $_stopover)
    {
        $this->id = $_id;
        $this->code_departure = $_code_departure;
        $this->code_arrival = $_code_arrival;
        $this->price = $_price;
        $this->stopover = $_stopover;
    }
}

?>