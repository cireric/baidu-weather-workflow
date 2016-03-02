<?php
require_once('workflows.php');

class Weather {

    private static $instance = null;

	private $url = "http://api.map.baidu.com/telematics/v3/weather?output=json&ak=Gy7SGUigZ4HxGYDaq9azWy09&location=";

    private $wIcon = array(
        "多云" => "cloudy",
        "多云转晴" => "partlysunny",
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
        "晴转阴" => "partlycloudy",
        "阵雨" => "chancerain",
        "阵雨转阴" => "chancerain",
        "雨加冰雹" => "chancesleet",
        "雨夹雪" => "sleet",
        "雷阵雨" => "tstorms",
        "雷阵雨转多云" => "chancetstorms",
        "雾" => "fog",
        "霾" => "hazy",
        "阴转多云" => "cloudy",
        "多云转小雨" => "chancesleet",
        "小雨转晴" => "mostlycloudy",
        "雷阵雨转阴" => "chancetstorms",
        "阵雨转多云" => "chancerain",
        "多云转阴" => "hazy",
        "阴转小雨" => "chancerain",
        "小雨转多云" => "chancerain", 
        "多云转阵雨" => "chancerain",
        "多云转雨夹雪" => "chancesleet",
        "雨夹雪转多云" => "chancesleet",
        "晴转小雪" => "chancesnow",
        "阴转雨夹雪" => "chanceflurries",
        "阴转阵雨" => "chancerain",
        "多云转大雪" => "chanceflurries",
        "大雪转小雪" => "chanceflurries",
        "阵雪转多云" => "fog"
    );

    private function __construct() {
        return $this;
    }

    public static function getInstance() {
        if (!empty(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new Weather();
        }
        return self::$instance;
    }

	public function getWeather($query){
        $query = trim(strip_tags($query));
		$workflows = new Workflows();
		$api = $this->url. $query;
		$res = $workflows->request($api);
		$res = json_decode( $res );

        if ($res->error === 0 && 
            isset($res->results) && count($res->results) > 0 &&
            isset($res->results[0]->weather_data) && count($res->results[0]->weather_data) > 0) {

            //var_dump($res->results[0]->weather_data);

            $curCityName = $res->currentCity;
			$forecast = $res->results[0]->weather_data;
			foreach($forecast as $key => $value) {
                $weather = trim($value->weather);
                $title = $this->getTitle($value->date, $weather);
                //echo $title . "\r\n";

                $icon = $this->getIcon($weather);
                //echo $icon . "\r\n";

				$workflows->result( $key,
									$query,
									$title,
									ucfirst($query). ' ・ '.$value->wind." ・ 温度：".$value->temperature,
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

    private function getTitle($dataStr, $weatherStr) {
        $title = "";
        $dateArray = split(' ', $dataStr);
        if (count($dateArray) > 0) {
            $date = array_shift($dateArray);
            $other = join(' ', $dateArray);
            $sep = "      ";
            $title = trim($date . $sep . $weatherStr . $sep . $sep . $other);
        } else {
            $title = "╮(￣▽￣)╭";
        }
        return $title;
    }

    private function getIcon($weather) {
        $icon = "";
        if (isset($this->wIcon[$weather])) {
            $icon = "w_icon/" . $this->wIcon[$weather] . ".gif";
        } else {
            $icon = $weather;
        }
        return $icon;
    }
}

//$o = Weather::getInstance();
//$o->getWeather("beijing");

/*
$cityArray = ["重庆","天津","沈阳","南京","武汉","成都","大连","杭州","青岛","济南","厦门","福州","西安","长沙","哈尔滨","长春","大庆","宁波","苏州","无锡","合肥","郑州","佛山","南昌","贵阳","南宁","石家庄","太原","温州","烟台","珠海","常州","南通","扬州","徐州","东莞","威海","淮安","呼和浩特","镇江","潍坊","中山","临沂","咸阳","包头","嘉兴","惠州","泉州","秦皇岛","洛阳","黑河"];
for ($i=0, $length=count($cityArray); $i < $length; $i++) {
    //echo $cityArray[$i] . "\r\n";
    $o->getWeather($cityArray[$i]);
}
*/
