<?php
require_once __DIR__ . '/data/airports.php';
require_once __DIR__ . '/models/airport.php';
require_once __DIR__ . '/models/flight.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>ShippyPro - Airport</title>
</head>
<body>
    <h1>ShippyPro - Airport</h1>

    <!-- airpots -->
    <h2>Airports</h2>
    <section id="airports">
        <?php 

        foreach ($airports as $airport) {
            $new_airport = new Airport($airport['id'], $airport['name'], $airport['code'], $airport['lat'], $airport['lng']);
            ?>
            <div class="airport">
                <h6><?php echo $new_airport->id ?></h6>
                <h3><?php echo $new_airport->name ?></h3>
                <h5><?php echo $new_airport->code ?></h5>
                <h5><?php echo $new_airport->lat ?></h5>
                <h5><?php echo $new_airport->lng ?></h5>
            </div>
        <?php } ?>    

    </section>    
        <section>
            <h2>test</h2>
            <?php
                $n = array_rand($airports, 1);
                $rdm_airport = $airports[$n];
            ?>
            <div>numero random: <?php echo $n ?></div>
            <div>nome: <?php echo $rdm_airport['name']?></div>
            <div>codice: <?php echo $rdm_airport['code']?></div>

            <h2>test-test</h2>
            <?php
                $n = array_rand($airports, 2);
                $rdm_airport = $airports[$n];
                ?>
            <div>codice: <?php echo $airports[$n[0]]['name']?></div>
            <div>codice: <?php echo $airports[$n[1]]['name']?></div>
        </section>

            
        <section>
            <h2>flights</h2>
            <?php
                $flights = [
                    [
                        'id' => '',
                        'code_departure' => '',
                        'code_arrival' => '',
                        'price' => '',
                        'stopover' => '',
                    ],
                ];

                $flight = [
                    'id' => '',
                    'code_departure' => '',
                    'code_arrival' => '',
                    'price' => '',
                    'stopover' => '',
                ];

                // for ($i = 1; $i >= 3; $i++) {

                    $n = array_rand($airports, 2);
                    $rdm_airport = $airports[$n];

                    $flight['id'] = $i;
                    $flight['code_departure'] = $airports[$n[0]]['name'];
                    $flight['code_arrival']  = $airports[$n[1]]['name'];
                    $flight['price'] = rand(150, 900);
                    $flight['stopover'] = rand(0, 4);

                    array_push($flights, $flight);
                // }

                foreach ($flights as $flight => $value) {
                    echo $flight . $value;
                }
            ?>
            <div>test: <?php echo $flight['code_departure'] ?></div>
            <div>test: <?php echo $flight['code_arrival'] ?></div>
            <div>test: <?php echo $flight['price'] ?></div>
            <div>test: <?php echo $flight['stopover'] ?></div>


            <div class="flights">
                <?php
                    foreach ($flights as $flight) {
                        $new_flight = new Flight($flight['id'], $flight['code_departure'], $flight['code_arrival'], $flight['price'], $flight['stopover']);
                    ?>

                    <div class="flight">
                        <div>id: <?php echo $new_flight->id ?></div>
                        <div>partenza: <?php echo $new_flight->code_departure ?></div>
                        <div>arrivo: <?php echo $new_flight->code_arrival ?></div>
                        <div>prezzo: <?php echo $new_flight->price ?></div>
                        <div>scali: <?php echo $new_flight->stopover ?></div>
                    </div>
                    <?php } ?>

                </div>
            </section>
</body>
</html>