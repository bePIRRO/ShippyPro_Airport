<?php
require_once __DIR__ . '/data/airports.php';
require_once __DIR__ . '/models/airport.php';
require_once __DIR__ . '/models/flight.php';
require_once __DIR__ . '/data/links.php';
?>



<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>ShippyPro - Airport</title>
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="ShippyPro" class="logo"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll ms-5" style="--bs-scroll-height: 100px;" id="nav">
                    <li class="nav-item hover dropdown">
                            <span class="pointer dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Prodotti
                            </span>
                        </li>
                        <li class="nav-item hover">
                            <span class="pointer" href="#">Integrazioni</span>
                        </li>
                        <li class="nav-item hover">
                            <span class="pointer" href="#">Prezzi</span>
                        </li>
                        <li class="nav-item hover dropdown">
                            <span class="pointer dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Azienda
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- airpots section -->
    <div class="container mt-5">
        <section class="hero">

            <h2 class="text-center">Scopri le nostre mete disponibili</h2>
            <section class="d-flex flex-wrap justify-content-center my-5" id="">
                <?php

                    foreach ($airports as $airport) {
                    $new_airport = new Airport($airport['id'], $airport['name'], $airport['code'], $airport['lat'], $airport['lng']);
                    ?>
                    <div class="airport text-center pointer">
                        <div><?php echo $new_airport->name ?></div>
                    </div>
                    <?php } ?>
            
            </section>
        </section>
    </div>    
        
        <!-- flights -->
        <section class="mt-5">
            <h2 class="text-center my-5">Vola con noi</h2>
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

            $sort_flights = [
                [
                    'id' => '',
                    'code_departure' => '',
                    'code_arrival' => '',
                    'price' => '',
                    'stopovers' => '',
                ],
            ];
        
            for ($i = 1; $i <= 30; $i++) {
            
            
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

            <!-- flights section -->
            <section class="container-fluid d-flex flex-column align-items-center mt-5 py-5" id="flights">  
                    <?php
                            

                            function array_sort($array, $on, $order=SORT_ASC)
                            {
                                $new_array = array();
                                $sortable_array = array();
                            
                                if (count($array) > 0) {
                                    foreach ($array as $k => $v) {
                                        if (is_array($v)) {
                                            foreach ($v as $k2 => $v2) {
                                                if ($k2 == $on) {
                                                    $sortable_array[$k] = $v2;
                                                }
                                            }
                                        } else {
                                            $sortable_array[$k] = $v;
                                        }
                                    }
                            
                                    switch ($order) {
                                        case SORT_ASC:
                                            asort($sortable_array);
                                        break;
                                        case SORT_DESC:
                                            arsort($sortable_array);
                                        break;
                                    }
                            
                                    foreach ($sortable_array as $k => $v) {
                                        $new_array[$k] = $array[$k];
                                    }
                                }
                            
                                return $new_array;
                            }

                           
                           $sort_flights = array_sort($flights, 'price', SORT_ASC);
                        //    print_r($sort_flights);

                        for ($i = 0; $i < count($sort_flights); $i++) {
                            if ($sort_flights[$i]['stopovers'] < 3) {              
                    ?>
                        <div class="flight d-flex row pointer hover <?php if ($sort_flights[$i]['price'] == $cheapest) echo 'cheapest cheapest-icon'; ?>">
                            <ul class="p-0 d-flex">
                                <li class="col-4">Partenza: 
                                    <?php 
                                    $n = 0;
                                    while ($sort_flights[$i]['code_departure'] != $airports[$n]['code']):
                                        $n++;
                                    endwhile;    
                                    echo $airports[$n]['name']
                                    ?>
                            </li>
                            <li class="col-4">Arrivo: 
                                <?php 
                                    $n = 0;
                                    while ($sort_flights[$i]['code_arrival'] != $airports[$n]['code']):
                                        $n++;
                                    endwhile;    
                                    echo $airports[$n]['name']
                                    ?>
                            </li>
                            <li class="col-2">Prezzo: <?php echo $sort_flights[$i]['price']; ?> €</li>
                            <li class="col-2">Scali: <?php echo $sort_flights[$i]['stopovers']; ?></li>
                        </ul>
                        </div>
                    <?php }}?>           
            </section>
                    
        </section>

        <footer class="py-5">
            <div class="container">
                <div class="row justify-content-center links">
                    <div class="col-3">
                        <ul>
                            <?php
                                for ($i = 0; $i < count($products); $i++) {
                                ?>
                                <li class="pointer"><?php echo $products[$i] ?></li>
                               <?php } ?>
                        </ul>
                    </div>
                    <div class="col-3">
                    <ul>
                            <?php
                                for ($i = 0; $i < count($prices); $i++) {
                                ?>
                                <li class="pointer"><?php echo $prices[$i] ?></li>
                               <?php } ?>
                        </ul>
                    </div>
                    <div class="col-3">
                    <ul>
                            <?php
                                for ($i = 0; $i < count($help); $i++) {
                                ?>
                                <li class="pointer"><?php echo $help[$i] ?></li>
                               <?php } ?>
                    </ul>
                    <ul>
                            <?php
                                for ($i = 0; $i < count($comparison); $i++) {
                                ?>
                                <li class="pointer"><?php echo $comparison[$i] ?></li>
                               <?php } ?>
                        </ul>
                    </div>
                    <div class="col-3">
                    <ul>
                            <?php
                                for ($i = 0; $i < count($company); $i++) {
                                ?>
                                <li class="pointer"><?php echo $company[$i] ?></li>
                               <?php } ?>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="privacy">
                    <div class="row justify-content-center">
                        <div class="col-2">
                            Italiano (IT) &#9660;
                        </div>
                        <div class="col-7 d-flex justify-content-center">
                        <span>
                            © ShippyPro, Tutti i diritti riservati
                        </span>

                        <span class="px-2">|</span>

                        <span class="pointer privacy-link">
                        Privacy Policy
                        </span>

                        <span class="px-2">|</span>

                        <span class="pointer privacy-link">
                        Termini & Condizioni
                        </span>
                        
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <ul>
                                <li class="pointer"><i class="fab fa-facebook"></i></li>
                                <li class="pointer"><i class="fab fa-instagram"></i></li>
                                <li class="pointer"><i class="fab fa-linkedin"></i></li>
                                <li class="pointer"><i class="fab fa-twitter"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>        
</html>