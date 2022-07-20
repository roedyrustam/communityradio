<?php
    require('../model/Station.php');
    $station = new Station();
    
    $params = [
        'is_popular'    => isset($_GET) && isset($_GET['is_popular']) ? $_GET['is_popular'] : null,
        'category_id'   => isset($_GET) && isset($_GET['category_id']) ? $_GET['category_id'] : null,
        'order_by'      => isset($_GET) && isset($_GET['order_by']) ? $_GET['order_by'] : null,
        'order'         => isset($_GET) && isset($_GET['order']) ? $_GET['order'] : null,
    ];

    $station_records = $station->mightyGetRecords($params);
       
    $master_array = $station_records;

    $newJsonString = json_encode($master_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
    http_response_code(200);
    echo $newJsonString;
    die;
    header("Location: ../index.php");