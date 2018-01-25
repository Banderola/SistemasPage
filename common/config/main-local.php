<?php

	function url(){
		if(isset($_SERVER['HTTPS'])){
			$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
		}
		else{
			$protocol = 'http';
		}
		return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	$aux=explode("?",url());
	$aux2=explode("/",$aux[0]);
	$lenew='';
	for($i =0; $i<count($aux2)-1; $i++){
		$lenew= $lenew . $aux2[$i] . '/';
	}
	$baseUrl = str_replace('/backend/web', '', $lenew);
        $baseUrl = str_replace('/frontend/web', '', $baseUrl);
        $baseUrl2=$baseUrl . 'frontend/web/uploads/user/photo';
	$baseUrl= $baseUrl . 'common/';
        
        
    Yii::setAlias('@uploadUrl', $baseUrl.'uploads/'); //backend url
    Yii::setAlias('@uploadUrl2', $baseUrl2); //frontend url
    
    $aux2=str_replace("\\config","",(dirname(__FILE__)));//path backend
    Yii::setAlias('@uploadPath', $aux2.'\\uploads\\'); 
    
    
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=edson',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
