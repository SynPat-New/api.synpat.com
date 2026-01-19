<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$origin = array('https://synpat.com/','https://www.synpat.com/','https://synpat.com','https://www.synpat.com','https://claimcharts.info','https://www.claimcharts.info','https://backyard.synpat.com','https://www.backyard.synpat.com');
$app->add(function ($req, $res, $next) {
	$headers = $req->getHeaders();
	/*print_r($headers);die;*/
	$header = "";
	if(isset($headers['HTTP_ORIGIN'])){
		$headerOrigin = $headers['HTTP_ORIGIN'];
		foreach($headerOrigin as $org){
			if(in_array($org,$origin)){
				$header = $org;
				break;
			}
		}
		if($header == ""){
			$header = 'https://synpat.com';
		}
	} else {
		$header = "*";
	}
	$header = "*";
	$response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', $header)
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
});
