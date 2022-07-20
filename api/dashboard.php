<?php
    require('../model/AppSetting.php');
    require('../model/Category.php');
    require('../model/Station.php');
    require('../model/Slider.php');

    $master_array = [];

    $appsetting = new AppSetting();
    $appsetting_records = $appsetting->mightyQuery("SELECT * FROM `app_settings`");
    
    if($appsetting_records->num_rows > 0){
        foreach( $appsetting_records as $k => $val ){
            $value = json_decode($val['value']);
            $master_array[$val['key']] = $value;
        }
    }
    
    $slider = new Slider();
    $slider_records = $slider->mightyGetRecords([ 'status' => 1 ]);
    $master_array['slider'] = $slider_records;

    $station = new Station();
    $station_records = $station->mightyGetRecords( ['is_popular' => 1]);
    $master_array['popular_station'] = $station_records;

    $station = new Station();
    $latest_station = $station->mightyGetRecords( ['order' => 'DESC', 'order_by' => 'id' ] );
    $master_array['latest_station'] = $latest_station;

    $category = new Category();
    $category_record = $category->mightyGetRecord();
    $category_list = [];
    foreach ($category_record as $key => $value) {
        $value['station'] = [];
        $value['station'] = $station->mightyGetRecords([ 'category_id' => $value['id'] ]);
        $category_list[] = $value;
    }

    $master_array['category'] = $category_list;

    $newJsonString = json_encode($master_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
    http_response_code(200);
    echo $newJsonString;
    
    die;