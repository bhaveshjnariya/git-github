<?php

/*Register device*/

/*$identifiers = preg_replace("/[^A-Za-z0-9 ]/", '', "dVHiXMv4ukcPv4NCE0N9hT:APA91bFPdeVl0SrHfbQpWqhyFZzOkBboqkvuuzdl_ZZ0K4XZHP4EqY3VvD5L9d2e_AEyVHcOy7cvbLwNzFJFBZ8DLL5l8A0qFaCm71UbjryvbpbZlYEX5RNPQyDcMX5Ho2JrHWJr-aZi");
$fields = array( 
	'app_id' => "095aec66-0968-4554-802f-078ea9dd7a56", 
	'identifier' => $identifiers, 
	'language' => "en", 
	'device_type' => 0,
	'test_type' => 1,
	'external_user_id' => '095aec66ss095aec65ssdYYY456ppcc45'
); 

$fields = json_encode($fields);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_POST, TRUE); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

$response = curl_exec($ch); 
curl_close($ch); 

$return = json_decode( $response );
print_r($return);
exit;*/
/*Send Push*/

function sendMessage(){
		$content = array(
			"en" => 'Anita Softpulse ??'
			);
		
		$fields = array(
			'app_id' => "095aec66-0968-4554-802f-078ea9dd7a56",
			'include_external_user_ids' => array("095aec66ss095aec65ssdYYY456ppcc"),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic YThhNjllYjktYTk2Zi00ZWRiLWI2NmYtOWYxMjUzMzk2ODZi'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
	print("\n\nJSON received:\n");
	print($return);
	print("\n");