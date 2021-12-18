<section>
            <h2>flights array test</h2>
            <h3>sium</h3>
            <?php
            $flights = [];
            // $flight = [];

                for ($i = 1; $i = 2; $i++) {
                    $n = array_rand($airports, 2);
                    $airtest = $airports[$n];
                    $airtest = new Airport($airports[$n[0]]['id'], $airports[$n[0]]['name'], $airports[$n[0]]['code'], $airports[$n[0]]['lat'], $airports[$n[0]]['lng']);
                    
                    $new_flight = new Flight($flight['id'], $flight['code_departure'], $flight['code_arrival'], $flight['priice'], $flight['stopover']);
                    
                    $new_flight->id  = $i;
                    $new_flight->code_departure = $airtest[$n[0]]['code'];
                    $airtest = new Airport($airports[$n[1]]['id'], $airports[$n[1]]['name'], $airports[$n[1]]['code'], $airports[$n[1]]['lat'], $airports[$n[1]]['lng']);
                    $new_flight->code_arrival = $airtest[$n[1]]['code'];
                    $new_flight->price = rand(100, 800);
                    $new_flight->stopover = rand(0, 3);

                    array_push($flights, $new_flight);
                }
            ?>
                    <h3>sium</h3>
                    <div>id: <?php $new_flight->id  = $i; ?></div>
                    <div>code d: <?php $new_flight->code_departure = $airtest[0]['code']; ?></div>
                    <div>code a: <?php $new_flight->code_arrival = $airtest[1]['code']; ?></div>
                    <div>price: <?php $new_flight->price = rand(100, 800); ?></div>
                    <div>stop: <?php $new_flight->stopover = rand(0, 3); ?></div>
                    <h3>sium</h3>
           <?php
                foreach ($flights as $flight) {
                    $new_flight = new Flight($flight['id'], $flight['code_departure'], $flight['code_arrival'], $flight['priice'], $flight['stopover']);
                    ?>

                    <div class="flight">
                        <div>id: <?php echo $new_flight->id ?></div>
                        <div>code d: <?php echo $new_flight->code_departure ?></div>
                        <div>code a: <?php echo $new_flight->code_arrival ?></div>
                        <div>price: <?php echo $new_flight->price ?></div>
                        <div>stop: <?php echo $new_flight->stopover ?></div>
                    </div>
               <?php } ?>
               <h3>sium</h3>
        </section>