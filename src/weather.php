<?php
date_default_timezone_set("PRC"); 

require_once('workflows.php');
require_once('city.php');

/**
 * http://apistore.baidu.com/microservice/weather?citypinyin=guangzhou
 * {"errNum":0,"errMsg":"success","retData":{"city":"\u5e7f\u5dde","pinyin":"guangzhou","citycode":"101280101","date":"16-03-03","time":"08:00","postCode":"510000","longitude":113.265,"latitude":23.108,"altitude":"43","weather":"\u6674","temp":"24","l_tmp":"13","h_tmp":"24","WD":"\u65e0\u6301\u7eed\u98ce\u5411","WS":"\u5fae\u98ce(<10km\/h)","sunrise":"06:46","sunset":"18:31"}}
 *
 */

//$logArray = array();

class Weather {

    private static $instance = null;

	private $url = "http://api.map.baidu.com/telematics/v3/weather?output=json&ak=Gy7SGUigZ4HxGYDaq9azWy09&location=";

    private $workflows = null;

    private $wIcon = array(

        "多云" => "cloudy",
        "多云转晴" => "partlysunny",
        "多云转阴" => "hazy",
        "多云转小雨" => "chancesleet",
        "多云转阵雨" => "chancerain",
        "多云转雷阵雨" => "chancerain",
        "多云转小雪" => "chancesleet",
        "多云转中雪" => "chanceflurries",
        "多云转中到大雪" => "chancesnow",
        "多云转大雪" => "chanceflurries",
        "多云转雨夹雪" => "chancesleet",
        "多云转雾" => "fog",
        "多云转扬沙" => "fog",

        "小雨" => "rain",
        "小雨转阴" => "chancerain",
        "小雨转晴" => "mostlycloudy",
        "小雨转多云" => "chancerain", 
        "小雨转阵雨" => "rain",
        "小雨转中雨" => "rain",
        "小雨转阵雪" => "chancesnow",
        "小雨转雨夹雪" => "chancesleet",
        "小到中雨转多云" => "chancerain",
        "小到中雨转小雪" => "chancesnow",
        "中雨转阴" => "partlycloudy",
        "中雨转晴" => "partlycloudy",
        "中雨转多云" => "partlycloudy",
        "中雨转阵雨" => "chancerain",
        "大雨" => "rain",
        "大雨转阴" => "chancerain",
        "阵雨" => "chancerain",
        "阵雨转晴" => "chancerain",
        "阵雨转阴" => "chancerain",
        "阵雨转多云" => "chancerain",
        "阵雨转小雨" => "chancerain",
        "阵雨转雷阵雨" => "chancetstorms",
        "雨加冰雹" => "chancesleet",
        "雨夹雪" => "sleet",
        "雨夹雪转多云" => "chancesleet",
        "雨夹雪转小雨" => "chancesleet",
        "雨夹雪转小到中雨" => "chancesleet",
        "雨夹雪转小雪" => "chanceflurries",
        "雨夹雪转大雪" => "chanceflurries",
        "雨夹雪转阵雪" => "chanceflurries",

        "小雪" => "flurries",
        "小雪转晴" => "mostlycloudy",
        "小雪转多云" => "flurries",
        "小雪转大雪" => "snow",
        "中雪" => "flurries",
        "中到大雪转多云" => "snow",
        "大雪" => "snow",
        "大雪转小雪" => "chanceflurries",
        "阵雪转多云" => "fog",

        "晴" => "sunny",
        "晴转阴" => "partlycloudy",
        "晴转多云" => "mostlycloudy",
        "晴转小雨" => "chancerain",
        "晴转阵雨" => "chancerain",
        "晴转雨夹雪" => "chanceflurries",
        "晴转小雪" => "chancesnow",
        "晴转霾" => "partlycloudy",
        "晴转浮尘" => "partlycloudy",

        "阴" => "hazy",
        "阴转晴" => "partlysunny",
        "阴转多云" => "cloudy",
        "阴转小雨" => "chancerain",
        "阴转雨夹雪" => "chanceflurries",
        "阴转阵雨" => "chancerain",
        "阴转雷阵雨" => "chanceflurries",

        "雷阵雨" => "tstorms",
        "雷阵雨转多云" => "chancetstorms",
        "雷阵雨转阴" => "chancetstorms",

        "雾" => "fog",
        "霾" => "hazy",
        "霾转晴" => "partlycloudy",
        "霾转阴" => "cloudy",
        "霾转多云" => "cloudy",
        "霾转小雨" => "chancerain",
        "霾转雾" => "hazy",
        "浮尘" => "hazy",
        "浮尘转晴" => "partlycloudy",
        "扬沙转晴" => "partlycloudy",
        "扬沙转多云" => "cloudy",
        "扬沙转浮尘" => "cloudy",
        "扬沙转小雪" => "chanceflurries",
        "扬沙转雨夹雪" => "chancesleet",
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
        $cityName = City::getName($query);
        if (!empty($cityName)) {
            $query = $cityName;
        }

		$this->workflows = new Workflows();
		$api = $this->url. $query;
		$res = $this->workflows->request($api);
		$res = json_decode( $res );

        if ($res->error === 0 && 
            isset($res->results) && count($res->results) > 0 &&
            isset($res->results[0]->weather_data) && count($res->results[0]->weather_data) > 0) {

            //var_dump($res->results[0]);

            $curCityName = $res->currentCity;
			$forecast = $res->results[0]->weather_data;
			foreach($forecast as $key => $value) {
                $weather = trim($value->weather);
                $date = $this->getDate($res->date, $key);
                $title = $this->getTitle($value->date, $weather, $date);
                //echo $title . "\r\n";

                $icon = $this->getIcon($weather);
                //echo $icon . "\r\n";

				$this->workflows->result($key,
									     $query,
									     $title,
									     $query. ' ・ '.$value->wind." ・ 温度：".$value->temperature,
									     $icon);
			}
        } else {
			$this->workflows->result(	'',
		  						'',
					  			'没查到呀', 
					  			'没找到你所查询城市的天气',
					  			'unknown.png' );
        }
        $this->output();
	}

    private function getTitle($weekStr, $weatherStr, $date) {
        $title = "";
        $weekArray = split(' ', $weekStr);
        if (count($weekArray) > 0) {
            $sep = "      ";
            $week = array_shift($weekArray);
            $other = array_pop($weekArray);
            $title = trim($week . '/' . $date . $sep . $weatherStr . $sep . $sep . $other);
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
            /////////////////////////////////
            //global $logArray;
            //array_push($logArray, $weather);
            /////////////////////////////////

            $icon = $weather;
        }
        return $icon;
    }

    private function getDate($curDate, $index) {
        if ($index > 0) {
            return date("m-d", strtotime($curDate) + intval($index) * 86400);
        } else {
            return date("m-d", strtotime($curDate));
        }
    }

    private function output() {
        //return;
        echo $this->workflows->toxml();
    }
}

//$o = Weather::getInstance();
//$o->getWeather("beijing");

/*
$cityArray = City::getAll();
foreach ( $cityArray as $key => $value ) {
    $o->getWeather($value);
}
var_dump(array_unique($logArray));
 */

