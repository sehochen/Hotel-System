<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Demo extends Controller
{
    


        public function index(){
    	    	// 起点坐标 中国重庆市重庆市巴南区新市街79号
			$longitude1 = 120.80603;//起点经度
			$latitude1 = 31.34198;  // 起点纬度
	 
			// 终点坐标 中国黑龙江省哈尔滨市阿城区
			$longitude2 = 120.61991;//终点经度 
			$latitude2 = 31.31799;	//终点纬度

    	$distance=$this->getDistance($longitude1, $latitude1, $longitude2, $latitude2, 1);

	 
		
		echo $distance.'m<br>--------------------<br>'; // 2342.38m
		 
		$distance = $this->getDistance($longitude1, $latitude1, $longitude2, $latitude2, 2);
		echo $distance.'km'; // 2.34km
    }


	/**
	 * 计算两点地理坐标之间的距离
	 * @param  Decimal $longitude1 起点经度
	 * @param  Decimal $latitude1  起点纬度
	 * @param  Decimal $longitude2 终点经度 
	 * @param  Decimal $latitude2  终点纬度
	 * @param  Int     $unit       单位 1:米 2:公里
	 * @param  Int     $decimal    精度 保留小数位数
	 * @return Decimal
	 */
	public function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2){
	 
	    $EARTH_RADIUS = 6370.996; // 地球半径系数
	    $PI = 3.1415926;
	 
	    $radLat1 = $latitude1 * $PI / 180.0;
	    $radLat2 = $latitude2 * $PI / 180.0;
	 
	    $radLng1 = $longitude1 * $PI / 180.0;
	    $radLng2 = $longitude2 * $PI /180.0;
	 
	    $a = $radLat1 - $radLat2;
	    $b = $radLng1 - $radLng2;
	 
	    $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
	    $distance = $distance * $EARTH_RADIUS * 1000;
	 
	    if($unit==2){
	        $distance = $distance / 1000;
	    }
	 
	    return round($distance, $decimal);
	 
	}







	
	 
	
 

}
