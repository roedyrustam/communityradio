<?php
    require('../model/Category.php');
    
    $category = new Category();
    $params = [
        'page' => isset($_GET) && isset($_GET['page']) ? $_GET['page'] : '1',
        'order' => isset($_GET) && isset($_GET['order']) ? $_GET['order'] : null,
        'order_by' => isset($_GET) && isset($_GET['order_by']) ? $_GET['order_by'] : null,
    ];
    $category_records = $category->mightyGetRecords($params);
    $master_array = $category_records;

    $newJsonString = json_encode($master_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
    http_response_code(200);
    echo $newJsonString;
    die;
    header("Location: ../index.php");