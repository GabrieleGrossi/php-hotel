<!-- 
Stampare tutti i nostri hotel con tutti i dati disponibili, iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
-->
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    if (!empty($_GET['parking']) && $_GET['parking'] == 'on'){
        $filteredHotels = [];
        foreach ($hotels as $hotel) {
            if ($hotel['parking'] === true){
                $filteredHotels[] = $hotel;
            }
        }

        $hotels = $filteredHotels;
}

if (!empty($_GET['vote']) && is_numeric($_GET['vote'])){
    $filteredHotels = [];
    foreach ($hotels as $hotel) {
        if ($hotel['vote'] >= $_GET['vote']){
            $filteredHotels[] = $hotel;
        }
    }

    $hotels = $filteredHotels;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Php Hotel</title>
</head>
<body>
    <h1>
        DILAPIDATED HOTELS
    </h1>
    <div class="d-flex flex-wrap">
        <?php 
            foreach($hotels as $hotel) {
        ?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-header ">
                    <h5 class="card-title">
                        <?php
                            echo $hotel['name']
                        ?>
                    </h5>
                </div>
                <ul>
                    <li>
                        Description ||
                        <?php
                            echo $hotel['description'];
                        ?>
                    </li>
                    <li>
                        Vote ||
                        <?php
                            echo $hotel['vote']. ' stars';
                        ?>
                    </li>
                    <li>
                        Distance to center ||
                        <?php
                            if ($hotel['distance_to_center'] == '1'){
                                echo $hotel['distance_to_center']. ' km';
                            } else {
                                echo $hotel['distance_to_center']. ' kms';
                            }
                        ?>
                    </li>
                    <li>
                        Parking ||
                        <?php
                            if ($hotel['parking'] === true ){
                                echo 'Yes';
                            } else {
                                echo 'No';
                            };
                        ?>
                    </li>
                </ul>
            </div>
        <?php
            }
        ?>
    </div>
    <div class="row">
            <div class="col-12">
                <form class="row px-5">

                    <div class="form-check mb-3 col-6">
                        <input class="form-check-number" type="number" id="flexCheckDefault" name="vote">
                        <label class="form-check-label" for="flexCheckDefault">
                            Show only hotels with an higher vote than
                        </label>
                    </div>

                    <div class="form-check mb-3 col-6">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="parking">
                        <label class="form-check-label" for="flexCheckDefault">
                            Show only hotels with available parking
                        </label>
                    </div>


                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
</body>
</html>