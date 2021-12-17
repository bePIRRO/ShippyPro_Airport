<?php

class Fight
{
    public $id;
    public $code_departure;
    public $code_arrival;
    public $price;

    public function __construct($_id, $_code_departure, $_code_arrival, $_code, $_lat, $_price)
    {
        $this->id = $_id;
        $this->code_departure = $_code_departure;
        $this->code_arrival = $_code_arrival;
        $this->price = $_price;
    }
}

?>