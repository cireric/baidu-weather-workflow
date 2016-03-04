<?php
class Wicon {
    private static $wIcon = array(
        "多云" => "hazy",
        "多云转晴" => "partlysunny",
        "多云转阴" => "hazy",
        "多云转小雨" => "chancesleet",
        "多云转阵雨" => "chancerain",
        "多云转雷阵雨" => "chancetstorms",
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

        "阴" => "cloudy",
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

    public static function getName($weather) {
        $icon = "";
        if (isset(self::$wIcon[$weather])) {
            $icon = "w_icon/" . self::$wIcon[$weather] . ".gif";
        } else {
            $icon = $weather;
        }
        return $icon;
    }
}
?>
