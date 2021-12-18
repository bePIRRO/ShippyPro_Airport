<?php
require_once __DIR__ . '/data/airports.php';
require_once __DIR__ . '/models/airport.php';
require_once __DIR__ . '/models/flight.php';
?>



<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>ShippyPro - Airport</title>
</head>

<body>
    <h1>ShippyPro - Airport</h1>

    <!-- airpots section -->
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


    <!-- flights -->
    <section>
        <h2>flights</h2>
        <?php
        $flights = [
            [
                'id' => '',
                'code_departure' => '',
                'code_arrival' => '',
                'price' => '',
                'stopovers' => '',
            ],
        ];
        
        for ($i = 1; $i <= 20; $i++) {
        
            
            $n = array_rand($airports, 2);
            $rdm_airport = $airports[$n];
            
            $flight['id'] = $i;
            $flight['code_departure'] = $airports[$n[0]]['code'];
            $flight['code_arrival']  = $airports[$n[1]]['code'];
            $flight['price'] = rand(150, 900);
            $flight['stopovers'] = rand(0, 4);
            array_push($flights, $flight);
        }
        array_shift($flights);
        // find cheapest
        $cheapest = 1000;
        for ($i = 0; $i < count($flights); $i++) {
            if ($flights[$i]['price'] < $cheapest && $flights[$i]['stopovers'] < 3) {
                $cheapest = $flights[$i]['price'];
            };
        }
        ?>

        <h1><?php echo $cheapest ?></h1>

        <!-- flights section -->
        <section id="flights">  
            <?php
                    for ($i = 0; $i < count($flights); $i++) {
                        if ($flights[$i]['stopovers'] < 3) {                  
                            ?>
                        <div class="flight <?php if ($flights[$i]['price'] == $cheapest) echo 'cheapest'; ?>">
                            <div>partenza: 
                                <?php 
                                    $n = 0;
                                    while ($flights[$i]['code_departure'] != $airports[$n]['code']):
                                        $n++;
                                    endwhile;    
                                    echo $airports[$n]['name']
                                ?>
                            </div>
                            <div>arrivo: 
                                <?php 
                                    $n = 0;
                                    while ($flights[$i]['code_arrival'] != $airports[$n]['code']):
                                        $n++;
                                    endwhile;    
                                    echo $airports[$n]['name']
                                ?>
                            </div>
                            <div>prezzo: <?php echo $flights[$i]['price']; ?></div>
                            <div>scali: <?php echo $flights[$i]['stopovers']; ?></div>
                        </div>
                <?php }}?>           
        </section>
                        
    </section>
</body>

</html>