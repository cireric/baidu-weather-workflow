<?php

class City {

    private static $cityNames = array(
        "BEIJING" => "北京",
        "SHANGHAI" => "上海",
        "TIANJIN" => "天津",
        "CHONGQING" => "重庆",
        "AKESU" => "阿克苏",
        "AOMEN" => "澳门",
        "ANNING" => "安宁",
        "ANQING" => "安庆",
        "ANSHAN" => "鞍山",
        "ANSHUN" => "安顺",
        "ANYANG" => "安阳",
        "BAICHENG" => "白城",
        "BAISHAN" => "白山",
        "BAIYIN" => "白银",
        "BENGBU" => "蚌埠",
        "BAODING" => "保定",
        "BAOJI" => "宝鸡",
        "BAOSHAN" => "保山",
        "BAZHONG" => "巴中",
        "BEIHAI" => "北海",
        "BENXI" => "本溪",
        "BINZHOU" => "滨州",
        "BOLE" => "博乐",
        "BOZHOU" => "亳州",
        "CANGZHOU" => "沧州",
        "CHANGDE" => "常德",
        "CHANGJI" => "昌吉",
        "CHANGSHU" => "常熟",
        "CHANGZHOU" => "常州",
        "CHAOHU" => "巢湖",
        "CHAOYANG" => "朝阳",
        "CHAOZHOU" => "潮州",
        "CHENGDE" => "承德",
        "CHENGDU" => "成都",
        "CHENGGU" => "城固",
        "CHENZHOU" => "郴州",
        "CHIBI" => "赤壁",
        "CHIFENG" => "赤峰",
        "CHISHUI" => "赤水",
        "CHIZHOU" => "池州",
        "CHONGZUO" => "崇左",
        "CHUXIONG" => "楚雄",
        "CHUZHOU" => "滁州",
        "CIXI" => "慈溪",
        "CONGHUA" => "从化",
        "DALI" => "大理",
        "DALIAN" => "大连",
        "DANDONG" => "丹东",
        "DANYANG" => "丹阳",
        "DAQING" => "大庆",
        "DATONG" => "大同",
        "DAZHOU" => "达州",
        "DEYANG" => "德阳",
        "DEZHOU" => "德州",
        "DONGGUAN" => "东莞",
        "DONGYANG" => "东阳",
        "DONGYING" => "东营",
        "DOUYUN" => "都匀",
        "DUNHUA" => "敦化",
        "EERDUOSI" => "鄂尔多斯",
        "ENSHI" => "恩施",
        "FOSHAN" => "佛山",
        "FANGCHENGGANG" => "防城港",
        "FEICHENG" => "肥城",
        "FENGHUA" => "奉化",
        "FUSHUN" => "抚顺",
        "FUXIN" => "阜新",
        "FUYANG" => "阜阳",
        "FUYANG1" => "富阳",
        "FUZHOU" => "福州",
        "FUZHOU1" => "抚州",
        "FULING" => "涪陵",
        "FUQING" => "福清",
        "GANYU" => "赣榆",
        "GANZHOU" => "赣州",
        "GAOMING" => "高明",
        "GAOYOU" => "高邮",
        "GEERMU" => "格尔木",
        "GEJIU" => "个旧",
        "GONGYI" => "巩义",
        "GUAN" => "固安",
        "GUANGAN" => "广安",
        "GUANGYUAN" => "广元",
        "GUANGZHOU" => "广州",
        "GUBAOTOU" => "古包头",
        "GUIGANG" => "贵港",
        "GUILIN" => "桂林",
        "GUIYANG" => "贵阳",
        "GUYUAN" => "固原",
        "HAERBIN" => "哈尔滨",
        "HAICHENG" => "海城",
        "HAIKOU" => "海口",
        "HAIMEN" => "海门",
        "HAINING" => "海宁",
        "HAMI" => "哈密",
        "HANDAN" => "邯郸",
        "HANGZHOU" => "杭州",
        "HANZHONG" => "汉中",
        "HEBI" => "鹤壁",
        "HEIHE" => "黑河",
        "HEFEI" => "合肥",
        "HENGSHUI" => "衡水",
        "HENGYANG" => "衡阳",
        "HETIAN" => "和田",
        "HEYUAN" => "河源",
        "HEZE" => "菏泽",
        "HUADOU" => "花都",
        "HUAIAN" => "淮安",
        "HUAIBEI" => "淮北",
        "HUAIHUA" => "怀化",
        "HUAINAN" => "淮南",
        "HUANGGANG" => "黄冈",
        "HUANGSHAN" => "黄山",
        "HUANGSHI" => "黄石",
        "HUHEHAOTE" => "呼和浩特",
        "HUIZHOU" => "惠州",
        "HULUDAO" => "葫芦岛",
        "HUZHOU" => "湖州",
        "JIAMUSI" => "佳木斯",
        "JIAN" => "吉安",
        "JIANGDOU" => "江都",
        "JIANGMEN" => "江门",
        "JIANGYIN" => "江阴",
        "JIAONAN" => "胶南",
        "JIAOZHOU" => "胶州",
        "JIAOZUO" => "焦作",
        "JIASHAN" => "嘉善",
        "JIAXING" => "嘉兴",
        "JIEXIU" => "介休",
        "JILIN" => "吉林",
        "JIMO" => "即墨",
        "JINAN" => "济南",
        "JINCHENG" => "晋城",
        "JINGDEZHEN" => "景德镇",
        "JINGHONG" => "景洪",
        "JINGJIANG" => "靖江",
        "JINGMEN" => "荆门",
        "JINGZHOU" => "荆州",
        "JINHUA" => "金华",
        "JINING1" => "集宁",
        "JINING" => "济宁",
        "JINJIANG" => "晋江",
        "JINTAN" => "金坛",
        "JINZHONG" => "晋中",
        "JINZHOU" => "锦州",
        "JISHOU" => "吉首",
        "JIUJIANG" => "九江",
        "JIUQUAN" => "酒泉",
        "JIXI" => "鸡西",
        "JIYUAN" => "济源",
        "JURONG" => "句容",
        "KAIFENG" => "开封",
        "KAILI" => "凯里",
        "KAIPING" => "开平",
        "KAIYUAN" => "开远",
        "KASHEN" => "喀什",
        "KELAMAYI" => "克拉玛依",
        "KUERLE" => "库尔勒",
        "KUITUN" => "奎屯",
        "KUNMING" => "昆明",
        "KUNSHAN" => "昆山",
        "LAIBIN" => "来宾",
        "LAIWU" => "莱芜",
        "LAIXI" => "莱西",
        "LAIZHOU" => "莱州",
        "LANGFANG" => "廊坊",
        "LANZHOU" => "兰州",
        "LASA" => "拉萨",
        "LESHAN" => "乐山",
        "LIANYUNGANG" => "连云港",
        "LIAOCHENG" => "聊城",
        "LIAOYANG" => "辽阳",
        "LIAOYUAN" => "辽源",
        "LIJIANG" => "丽江",
        "LINAN" => "临安",
        "LINCANG" => "临沧",
        "LINFEN" => "临汾",
        "LINGBAO" => "灵宝",
        "LINHE" => "临河",
        "LINXIA" => "临夏",
        "LINYI" => "临沂",
        "LISHUI" => "丽水",
        "LIUAN" => "六安",
        "LIUPANSHUI" => "六盘水",
        "LIUZHOU" => "柳州",
        "LIYANG" => "溧阳",
        "LONGHAI" => "龙海",
        "LONGYAN" => "龙岩",
        "LOUDI" => "娄底",
        "LUOHE" => "漯河",
        "LUOYANG" => "洛阳",
        "LUXI" => "潞西",
        "LUZHOU" => "泸州",
        "LVLIANG" => "吕梁",
        "LVSHUN" => "旅顺",
        "MAANSHAN" => "马鞍山",
        "MAOMING" => "茂名",
        "MEIHEKOU" => "梅河口",
        "MEISHAN" => "眉山",
        "MEIZHOU" => "梅州",
        "MIANXIAN" => "勉县",
        "MIANYANG" => "绵阳",
        "MUDANJIANG" => "牡丹江",
        "NANAN" => "南安",
        "NANCHANG" => "南昌",
        "NANCHONG" => "南充",
        "NANJING" => "南京",
        "NANNING" => "南宁",
        "NANPING" => "南平",
        "NANTONG" => "南通",
        "NANYANG" => "南阳",
        "NEIJIANG" => "内江",
        "NINGBO" => "宁波",
        "NINGDE" => "宁德",
        "PANJIN" => "盘锦",
        "PANZHIHUA" => "攀枝花",
        "PENGLAI" => "蓬莱",
        "PINGDINGSHAN" => "平顶山",
        "PINGDU" => "平度",
        "PINGHU" => "平湖",
        "PINGLIANG" => "平凉",
        "PINGXIANG" => "萍乡",
        "PULANDIAN" => "普兰店",
        "PUNING" => "普宁",
        "PUTIAN" => "莆田",
        "PUYANG" => "濮阳",
        "QIANNAN" => "黔南",
        "QIDONG" => "启东",
        "QINGDAO" => "青岛",
        "QINGYANG" => "庆阳",
        "QINGYUAN" => "清远",
        "QINGZHOU" => "青州",
        "QINHUANGDAO" => "秦皇岛",
        "QINZHOU" => "钦州",
        "QIONGHAI" => "琼海",
        "QIQIHAER" => "齐齐哈尔",
        "QUANZHOU" => "泉州",
        "QUJING" => "曲靖",
        "QUZHOU" => "衢州",
        "RIKAZE" => "日喀则",
        "RIZHAO" => "日照",
        "RONGCHENG" => "荣成",
        "RUGAO" => "如皋",
        "RUIAN" => "瑞安",
        "RUSHAN" => "乳山",
        "SANMENXIA" => "三门峡",
        "SANMING" => "三明",
        "SANYA" => "三亚",
        "XIAMEN" => "厦门",
        "SHANGLUO" => "商洛",
        "SHANGQIU" => "商丘",
        "SHANGRAO" => "上饶",
        "SHANGYU" => "上虞",
        "SHANTOU" => "汕头",
        "ANKANG" => "安康",
        "SHAOGUAN" => "韶关",
        "SHAOXING" => "绍兴",
        "SHAOYANG" => "邵阳",
        "SHENYANG" => "沈阳",
        "SHENZHEN" => "深圳",
        "SHIHEZI" => "石河子",
        "SHIJIAZHUANG" => "石家庄",
        "SHILIN" => "石林",
        "SHISHI" => "石狮",
        "SHIYAN" => "十堰",
        "SHOUGUANG" => "寿光",
        "SHUANGYASHAN" => "双鸭山",
        "SHUOZHOU" => "朔州",
        "SHUYANG" => "沭阳",
        "SIMAO" => "思茅",
        "SIPING" => "四平",
        "SONGYUAN" => "松原",
        "SUINING" => "遂宁",
        "SUIZHOU" => "随州",
        "SUZHOU" => "苏州",
        "TACHENG" => "塔城",
        "TAIAN" => "泰安",
        "TAICANG" => "太仓",
        "TAIXING" => "泰兴",
        "TAIYUAN" => "太原",
        "TAIZHOU" => "泰州",
        "TAIZHOU1" => "台州",
        "TANGSHAN" => "唐山",
        "TENGCHONG" => "腾冲",
        "TENGZHOU" => "滕州",
        "TIANMEN" => "天门",
        "TIANSHUI" => "天水",
        "TIELING" => "铁岭",
        "TONGCHUAN" => "铜川",
        "TONGLIAO" => "通辽",
        "TONGLING" => "铜陵",
        "TONGLU" => "桐庐",
        "TONGREN" => "铜仁",
        "TONGXIANG" => "桐乡",
        "TONGZHOU" => "通州",
        "TONGHUA" => "通化",
        "TULUFAN" => "吐鲁番",
        "WAFANGDIAN" => "瓦房店",
        "WEIFANG" => "潍坊",
        "WEIHAI" => "威海",
        "WEINAN" => "渭南",
        "WENDENG" => "文登",
        "WENLING" => "温岭",
        "WENZHOU" => "温州",
        "WUHAI" => "乌海",
        "WUHAN" => "武汉",
        "WUHU" => "芜湖",
        "WUJIANG" => "吴江",
        "WULANHAOTE" => "乌兰浩特",
        "WUWEI" => "武威",
        "WUXI" => "无锡",
        "WUZHOU" => "梧州",
        "XIAN" => "西安",
        "XIANGCHENG" => "项城",
        "XIANGFAN" => "襄樊",
        "XIANGGANG" => "香港",
        "XIANGGELILA" => "香格里拉",
        "XIANGSHAN" => "象山",
        "XIANGTAN" => "湘潭",
        "XIANGXIANG" => "湘乡",
        "XIANNING" => "咸宁",
        "XIANTAO" => "仙桃",
        "XIANYANG" => "咸阳",
        "XICANG" => "西藏",
        "XICHANG" => "西昌",
        "XINGTAI" => "邢台",
        "XINGYI" => "兴义",
        "XINHUI" => "新会",
        "XINING" => "西宁",
        "XINXIANG" => "新乡",
        "XINYANG" => "信阳",
        "XINYU" => "新余",
        "XINZHOU" => "忻州",
        "SUQIAN" => "宿迁",
        "SUYU" => "宿豫",
        "SUZHOU1" => "宿州",
        "XUANCHENG" => "宣城",
        "XUCHANG" => "许昌",
        "XUZHOU" => "徐州",
        "YAAN" => "雅安",
        "YAKESHI" => "牙克石",
        "YANAN" => "延安",
        "YANBIAN" => "延边",
        "YANCHENG" => "盐城",
        "YANGJIANG" => "阳江",
        "YANGQUAN" => "阳泉",
        "YANGZHOU" => "扬州",
        "YANJI" => "延吉",
        "YANTAI" => "烟台",
        "YANZHOU" => "兖州",
        "YIBIN" => "宜宾",
        "YICHANG" => "宜昌",
        "YICHUN" => "宜春",
        "YICHUN1" => "伊春",
        "YILI" => "伊犁",
        "YINCHUAN" => "银川",
        "YINGKOU" => "营口",
        "YINGTAN" => "鹰潭",
        "YINING" => "伊宁",
        "YIWU" => "义乌",
        "YIXING" => "宜兴",
        "YIYANG" => "益阳",
        "YONGKANG" => "永康",
        "YONGZHOU" => "永州",
        "YUEYANG" => "岳阳",
        "YUHUAN" => "玉环",
        "YULIN1" => "榆林",
        "YULIN" => "玉林",
        "YUNCHENG" => "运城",
        "YUXI" => "玉溪",
        "YUYAO" => "余姚",
        "ZAOZHUANG" => "枣庄",
        "ZENGCHENG" => "增城",
        "CHANGCHUN" => "长春",
        "CHANGHAI" => "长海",
        "ZHANGJIAGANG" => "张家港",
        "ZHANGJIAJIE" => "张家界",
        "ZHANGJIAKOU" => "张家口",
        "CHANGLE" => "长乐",
        "ZHANGQIU" => "章丘",
        "CHANGSHA" => "长沙",
        "ZHANGYE" => "张掖",
        "CHANGZHI" => "长治",
        "ZHANGZHOU" => "漳州",
        "ZHANJIANG" => "湛江",
        "ZHAODONG" => "肇东",
        "ZHAOQING" => "肇庆",
        "ZHAOTONG" => "昭通",
        "ZHENGZHOU" => "郑州",
        "ZHENJIANG" => "镇江",
        "ZHONGSHAN" => "中山",
        "ZHOUKOU" => "周口",
        "ZHOUSHAN" => "舟山",
        "ZHUCHENG" => "诸城",
        "ZHUHAI" => "珠海",
        "ZHUJI" => "诸暨",
        "ZHUMADIAN" => "驻马店",
        "ZHUZHOU" => "株洲",
        "ZIBO" => "淄博",
        "ZIGONG" => "自贡",
        "ZUNYI" => "遵义",
        "WULUMUQI" => "乌鲁木齐",
        "EZHOU" => "鄂州",
        "BAOTOU" => "包头",
        "XIAOSHAN" => "萧山",
        "XUANHUA" => "宣化",
        "JIANGYOU" => "江油",
        "ZIYANG" => "资阳",
        "XINJI" => "辛集",
        "WANZHOU" => "万州",
        "ZOUCHENG" => "邹城",
        "SHAOWU" => "邵武",
        "JIANGYAN" => "姜堰",
        "XIANGYIN" => "湘阴",
        "SONGJIANG" => "松江",
        "QITAIHE" => "七台河",
        "LILING" => "醴陵",
        "GONGZHULING" => "公主岭",
        "SHEXIAN" => "歙县",
        "XINGHUA" => "兴化"
    );

    public static function getName($pinyin) {
        $pinyin = strtoupper(trim($pinyin));
        if (isset(self::$cityNames[$pinyin])) {
            return self::$cityNames[$pinyin];
        } else {
            return "";
        }
    }

    public static function getAll() {
        return self::$cityNames;
    }

}
