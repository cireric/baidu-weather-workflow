<?php
require_once('workflows.php');

class Weather{

	private $url = "http://api.map.baidu.com/telematics/v3/weather?output=json&ak=Gy7SGUigZ4HxGYDaq9azWy09&location=";

    private $wIcon = array(
        "多云" => "cloudy",
        "多云转晴" => "mostlysunny",
        "大雨" => "rain",
        "大雨转阴" => "chancerain",
        "小雨转阴" => "chancerain",
        "大雪" => "snow",
        "小雨" => "rain",
        "小雪" => "flurries",
        "晴" => "sunny",
        "晴转多云" => "partlysunny",
        "阴" => "hazy",
        "阴转晴" => "mostlycloudy",
        "阵雨" => "chancerain",
        "阵雨转阴" => "chancerain",
        "雨加冰雹" => "chancesleet",
        "雨夹雪" => "sleet",
        "雷阵雨" => "tstorms",
        "雷阵雨转多云" => "chancetstorms",
        "雾" => "fog"
    );

	public function getWeather($query){
        $query = trim(strip_tags($query));
		$workflows = new Workflows();
		$api = $this->url. $query;
		$res = $workflows->request($api);
		$res = json_decode( $res );

        //var_dump($res->results[0]);
        //exit();

        if ($res->error === 0 && 
            isset($res->results) && count($res->results) > 0 &&
            isset($res->results[0]->weather_data) && count($res->results[0]->weather_data) > 0) {

			$forecast = $res->results[0]->weather_data;
			foreach($forecast as $key => $value) {
                $title = "";
                $dateArray = split(' ', $value->date);
                if (count($dateArray) > 0) {
                    $date = array_shift($dateArray);
                    $other = join(' ', $dateArray);
                    $sep = "      ";
                    $title = $date . $sep . $value->weather . $sep . $other;
                    $title = trim($title);
                } else {
                    $title = "╮(￣▽￣)╭";
                }

                $icon = "";
                if (isset($this->wIcon[$value->weather])) {
                    $icon = "w_icon/" . $this->wIcon[$value->weather] . ".gif";
                } else {
                    $icon = $value->weather;
                }
				$workflows->result( $key,
									$query,
									$title,
									$value->wind.", 温度：".$value->temperature,
									$icon);
			}
        } else {
			$workflows->result(	'',
		  						'',
					  			'没查到呀', 
					  			'没找到你所查询城市的天气',
					  			'unknown.png' );
        }
		echo $workflows->toxml();
	}
}
