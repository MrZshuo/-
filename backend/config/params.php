<?php
return [
    'adminEmail' => 'admin@example.com',
    //图片服务器域名
    'domain' => 'http://backend.yii.com/',
    'imageUploadRelativePath' => 'uploads/', // 图片默认上传的目录
	'imageUploadSuccessPath' => 'uploads/', // 图片上传成功后，路径前缀
    'webuploader' => [
    	//后端图片处理路径
    	'uploadUrl' => 'banner/upload',
    	'delimiter' => ',',

    	'baseConfig' => [
    		'defaultImage' => 'http://',
    		'disableGlobalDnd' => true,
    		'accept' => [
    			'title' => 'Images',
    			'extensions' => 'gif,jpg,jpeg,bmp,png',
    			'mimeTypes' => 'image/*',
    		],
    		'pick' => [
    			'multiple' => false,
    		],
    	],
    ],
];
