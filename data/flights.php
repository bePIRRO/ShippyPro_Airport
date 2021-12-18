<?php
require_once __DIR__ . '/data/airports.php';
require_once __DIR__ . '/models/airport.php';
require_once __DIR__ . '/models/flight.php';

$flights = [];
$flight = [];

$n = array_rand($airports, 1);
$airtest = $airports[$n];
$airtest = new Airport($airports[$n]['id'], $airports[$n]['name'], $airports[$n]['code'], $airports[$n]['lat'], $airports[$n]['lng']);


?>