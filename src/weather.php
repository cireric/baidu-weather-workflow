<?php
date_default_timezone_set("PRC"); 

require_once('workflows.php');
require_once('city.php');
require_once('wicon.php');

/**
 * http://apistore.baidu.com/microservice/weather?citypinyin=guangzhou
 * {"errNum":0,"errMsg":"success","retData":{"city":"\u5e7f\u5dde","pinyin":"guangzhou","citycode":"101280101","date":"16-03-03","time":"08:00","postCode":"510000","longitude":113.265,"latitude":23.108,"altitude":"43","weather":"\u6674","temp":"24","l_tmp":"13","h_tmp":"24","WD":"\u65e0\u6301\u7eed\u98ce\u5411","WS":"\u5fae\u98ce(<10km\/h)","sunrise":"06:46","sunset":"18:31"}}
 *
 */

class Weather {

    private static $instance = null;

	private $url = "http://api.map.baidu.com/telematics/v3/weather?output=json&ak=Gy7SGUigZ4HxGYDaq9azWy09&location=";

    private static $shortcut = array(
        "bj" => "beijing",
        "gz" => "guangzhou",
        "sz" => "shenzhen",
        "sh" => "shanghai",
        "jm" => "jiangmen",
        "xh" => "xinhui",
        "hk" => "hongkong",
        "hz" => "hangzhou",
        "zh" => "zhuhai",
        "am" => "aomen"
    );

    private $workflows = null;

    private function __construct() {
        $this->workflows = new Workflows();
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

    public function getResource($query) {
		$api = $this->url. $query;
		return json_decode($this->workflows->request($api));
    }

	public function getWeather($query){
        $query = $this->getCityName($query);
		$res = $this->getResource($query);
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
        return Wicon::getName($weather);
    }

    private function getDate($curDate, $index) {
        if ($index > 0) {
            return date("m-d", strtotime($curDate) + intval($index) * 86400);
        } else {
            return date("m-d", strtotime($curDate));
        }
    }

    private function getCityName($query) {
        $query = trim(strip_tags($query));
        //find in $shortcut
        if ( isset(self::$shortcut[$query]) ) {
            $query = self::$shortcut[$query];
        }
        //find the city in chinese
        $cityName = City::getName($query);
        if ( !empty($cityName) ) {
            $query = $cityName;
        }
        return $query;
    }

    private function output() {
        //return;
        echo $this->workflows->toxml();
    }
}

//$o = Weather::getInstance();
//$o->getWeather("beijing");
