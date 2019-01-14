<?php
	function vd($arr){
		echo '<pre>';
		var_dump($arr);
	}
	$lottery = array(
		array('一等奖',5),
		array('二等奖',10),
		array('三等奖',15),
		array('四等奖',20),
		array('没有奖',50),
	);
	/*方案一
	function lottery($probability){
		$winId = 0;
		$sum = array_sum($probability);
		foreach($probability as $k => $v){
			$randId = mt_rand(1, $sum);//vd($sum);echo '<hr/>';
			if($v >= $randId){
				$winId = $k;
				break;
			}else{
				$sum -= $v;
			}
		}
		return $winId;
	}
	方案一*/
	/*方案二*/
	function lottery_rand($probability){//vd($probability);exit;
		static $lotteryArr = array();
		$sum = array_sum($probability);
		foreach($probability as $k => $v){
			/*$v = ($v / $sum) * 100;
			for($i=1;$i<=$v;$i++){$lotteryArr[]=$k;}*/
			$v = ceil($v/$sum * 1000); 
			$temp = array_fill(0, $v, $k);
			$lotteryArr = array_merge($lotteryArr, $temp);
		}
		 //vd($lotteryArr);exit;
		return $lotteryArr[mt_rand(0, count($lotteryArr)-1)];
	}
	/*方案二*/


	$probability = array();
	foreach($lottery as $v){
		$probability[] = $v[1];
	}
	$winId = lottery_rand($probability);//file_put_contents('lottery.txt', $winId, FILE_APPEND);echo $winId;exit;
	//$winId = 2;
	$target['yes'] = $lottery[$winId][0];
	unset($lottery[$winId]);
	shuffle($lottery);
	foreach($lottery as $v){
		$target['no'][] = $v[0];
	}
	vd($target);







/*网上抄袭来的*/
function random($ps){
	    $arr = array();
	    $key = md5(serialize($ps));
	    if (!isset($arr[$key])) {
	        $max = array_sum($ps);
	        foreach ($ps as $k=>$v) {
	            $v = $v / $max * 10000;
	            for ($i=0; $i<$v; $i++) $arr[$key][] = $k;
	        }
	    }
	    return $arr[$key][mt_rand(0,count($arr[$key])-1)];
	} 

	function get_rand($proArr) {
	    $result = '';
	    //概率数组的总概率精度
	    $proSum = array_sum($proArr);
	    //概率数组循环
	    foreach ($proArr as $key => $proCur) {
	        $randNum = mt_rand(1, $proSum);vd($proSum);echo '<hr/>';
	        if ($randNum <= $proCur) {
	            $result = $key;
	            break;
	        } else {
	            $proSum -= $proCur;
	        }
	    }
	    unset ($proArr);
	 
	    return $result;
	}

	//奖品数组
	$prize_arr = array(
	    array('id'=>1,'prize'=>'一等奖','v'=>10),
	    array('id'=>2,'prize'=>'二等奖','v'=>20),
	    array('id'=>3,'prize'=>'三等奖','v'=>60)
	); 

	foreach ($prize_arr as $key => $val) {
	    $arr[$val['id']] = $val['v'];
	}
	 //vd($arr);exit;
	$rid = get_rand($arr); exit;//根据概率获取奖项id
	 //echo $rid;exit;
	$res['yes'] = $prize_arr[$rid-1]['prize']; //中奖项
	//将中奖项从数组中剔除，剩下未中奖项，如果是数据库验证，这里可以省掉
	unset($prize_arr[$rid-1]);
	shuffle($prize_arr); //打乱数组顺序
	for($i=0;$i<count($prize_arr);$i++){
	    $pr[] = $prize_arr[$i]['prize'];
	}
	$res['no'] = $pr;
	vd($res); 












