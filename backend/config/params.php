<?php
return [
    'adminEmail' => 'admin@example.com',

    'imageUploadRelativePath' => '../../uploads', // 图片默认上传的目录
    'videoUploadSuccessPath' => '/videos/',
	'imageUploadSuccessPath' => '/images/', // 图片上传成功后，路径前缀
    'webuploader' => [
    	//后端图片处理路径
    	'uploadUrl' => 'banner/upload',
    	'delimiter' => ',',

    	'baseConfig' => [
    		'defaultImage' => 'http://',
    		'disableGlobalDnd' => true,
    		'accept' => [
    			'title' => 'file',
    			'extensions' => 'gif,jpg,jpeg,bmp,png,3gp,mp4,rmvb,mov,avi,m4v',
    			'mimeTypes' => 'image/gif,image/jpg,image/jpeg,image/bmp,image/png,video/mp4,video/3gp,video/rmvb,video/avi,video/m4v',
    		],
    		'pick' => [
    			'multiple' => false,
    		],
    	],
    ],
];
