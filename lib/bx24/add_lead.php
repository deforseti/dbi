<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function addLeadToBx24($dataAttr = []) {
	// формируем URL в переменной $queryUrl
$queryUrl = 'https://dbi.bitrix24.ua/rest/1/dh3v3cl41vyigwoh/crm.lead.add';
// формируем параметры для создания лида в переменной $queryData
$queryData = http_build_query(array(
  'fields' => array(
    'TITLE' => 'заказ с ' . $_SERVER['SERVER_NAME'] . '['.$dataAttr['type'].']', // Установить значение
    'NAME' => $dataAttr['name'],
    'EMAIL' => [
    	[
    	'VALUE_TYPE' => 'WORK',
    	'VALUE' => $dataAttr['email']
    	]
    ],
	'PHONE' => [
		[
			'VALUE' => $dataAttr['phone'],
			'VALUE_TYPE' => 'WORK',
		]
	],
      	"COMMENTS" => $dataAttr['comment'],
      	'ASSIGNED_BY_ID' => 1,
      	'OPENED' => 'N'
  ),
  'params' => ["REGISTER_SONET_EVENT" => "Y"]
));
// обращаемся к Битрикс24 при помощи функции curl_exec
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_POST => 1,
  CURLOPT_HEADER => 0,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => $queryUrl,
  CURLOPT_POSTFIELDS => $queryData,
));
$result = curl_exec($curl);
curl_close($curl);
// $result = json_decode($result, 1);
// var_dump($result);
// if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
}