<?php

	
	/*===========================================================================================================================================================================================
	 一。微信公众号自定义菜单创建
	 

		//1.获取token【开发文档 https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140183】
		$url="https://api.weixin.qq.com/cgi-bin/token";
		$data1 = array(
		    'grant_type' => 'client_credential',
		    'appid'	=> 'wx779f35f2feb3d58f',
		    'secret' => '03ec065f47f3eb9ba120280d0b8c1dee'
		);
		$result=curl_post($url, $data1);
		$token = $result['access_token'];
		api_log('a_token.log',array('$request' => $result));
		

		//2.创建菜单【开发文档 https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421141013】
		$url_menu="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$token;
		$data_menu=array( 
			'button' => array( 
				array( 'type' => 'view', 'name' => '对山任性', 'url' => 'https://www.2bulu.com/community/gotohuatinfo.htm?id=162099'),
				array( 'type' => 'view', 'name' => '对海疯狂', 'url' => 'https://www.2bulu.com/community/gotohuatinfo.htm?id=162219'), 
				array( 'type' => 'view', 'name' => '我就是我', 'url' => 'https://user.qzone.qq.com/403361400/infocenter')
			)
		);
		$result=curl_post($url_menu, json_encode($data_menu));
		api_log('a_create_menu.log',array('$request' => $result));


		//[3].查询菜单【开发文档 https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421141014】
		//执行链接即可 https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$token
		

		//4.删除菜单【开发文档 https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421141015】
		//执行链接即可 https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=$token
		
	==============================================================================================================================================================================================
	*/
	





	/*===========================================================================================================================================================================================
	 二。微信网页授权【开发文档 https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140842】
	 
	
		//1.通过code换取网页授权access_token
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
		$data = array(
		    'appid'	=> 'wx17468688e6388990',
		    'secret' => '728b13f16e463bc7d0d0bf08a943422a',
		    'code'	=> $_REQUEST['code'],
		    'grant_type' => 'authorization_code'
		);
		$result = curl_post($url, $data);
		echo '2.获取access_token成功';
		api_log('abc.log',array('$result'=>$result));


        //2.刷新access_token（由于access_token有效时间为5min，此时用上步获取的refresh_token重新刷授权，此授权有效期为30天）
        $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token';
        $das = array(
            'appid'	=> 'wx17468688e6388990',
            'grant_type' => 'refresh_token',
            'refresh_token'	=> $result['refresh_token']
        );
        $results = curl_post($url, $das);
        echo '3.刷新授权成功';
        api_log('abc.log',array('$results'=>$results));


        //3.拉取用户信息(需scope为 snsapi_userinfo)
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        $das = array(
            'access_token'  => $results['access_token'],
            'openid'  => $results['openid'],
            'lang'  =>  'zh_CN'
        );
        $resultss = curl_post($url, $das);
        echo '4.获取用户信息成功';
        api_log('abc.log',array('$resultss'=>$resultss));


        //[4]验证授权凭证是否有效
        $url = 'https://api.weixin.qq.com/sns/auth';
        $das = array(
            'access_token'  => $results['access_token'],
            'openid'  => $results['openid']
        );
        $resultsss = curl_post($url, $das);
        if($resultsss['errcode'] == 0){
            echo '5.授权有效';
        }
        api_log('abc.log',array('$resultsss'=>$resultsss));

	==============================================================================================================================================================================================
	*/


