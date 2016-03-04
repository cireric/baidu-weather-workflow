<?php
require_once("weather.php");

function test() {
    $logArray = array();
    $o = Weather::getInstance();
    $citysArray = city::getAll();
    $iconArray = wicon::getAllIcon();
    foreach ( $citysArray as $key => $city ) {
        $res = $o->getResource($city);
        if ($res->error === 0 && 
            isset($res->results) && count($res->results) > 0 &&
            isset($res->results[0]->weather_data) && count($res->results[0]->weather_data) > 0) {
			$forecast = $res->results[0]->weather_data;
			foreach($forecast as $key => $value) {
                $weather = trim($value->weather);
                if (!isset($iconArray[$weather])) {
                   array_push($logArray, $weather); 
                }
			}
        }
    }

    $logArray = array_unique($logArray);
    var_dump($logArray);
    //for ( $i = 0, $len = count($logArray); $i < $len; $i++ ) {
    //    echo "\"" + $logArray[$i] + "\"" + " => \"\",\r\n";
    //}
}

test();
?>
