<?php

require_once('lib/restful.php');

// header specifications
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');

$call = new Request; // new restful request

// ------------ input is good, proceed to elaboration  ----------------------

//var_dump ($call);

if ($call->url_elements[1] == "")
 die('no relation specified');

if (!isset($call->parameters))
 die('no parameters for command');


// preload class prototype
require_once('lib/exceptions.php');
require_once('lib/api_proto.php');

// case command of
try {
	switch ($call->url_elements[1]) {

		case 'users':
		case 'all':
			$file = 'resources_api/'. $call->url_elements[1] . '.php';

			if (file_exists($file))
				require_once($file);
			else
				throw new MethodNotImplementedException(); 		 	

			$api = new api_instance($call);

			// echo json data response
			header('Content-Type: application/json');
			echo json_encode($api->response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

			break;

		default : throw new MethodNotImplementedException();
	}
}
catch (MethodNotImplementedException $e) {
	return die ('Method not implemented');
}
catch (InternalErrorException $e) {
	return die ('Internal server error');
}
catch (BadRequestException $e) {
	return die ('Bad request');
}
catch (Exception $e) {
	return die ('Internal server error');
}

?>

