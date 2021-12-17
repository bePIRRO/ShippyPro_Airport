<?php
require_once __DIR__ . '/data/airports.php';
require_once __DIR__ . '/models/airport.php';

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
    
    <!-- airports -->
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
    <h2>Flights</h2>
    <section id="flights">

    </section>
</body>
</html>