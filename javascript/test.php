<?php

	

	return echo json_encode([
		"code"=> 0 //0表示成功，其它失败
		,"msg"=> "" //提示信息 //一般上传失败后返回
		,"data"=> [
			"src"=> "http://local.js/zhang.jpg"
			,"title"=> "图片名称" //可选
		]
	]);
