<?php

// preload database functions
//require_once('connector.php');

abstract class _api_proto {

	public $response;	// composed restful result
	protected $call;	// restful call variables
	protected $db;		// database connection

	public function __construct($call) {
		$this->call = $call;

		if (!($this->db = New SQLite3('../db/mySQLlitedb.db')))
		{
		   	die ( 'Could not connect: ' . $sqliteerror);
			return FALSE;
	    }

		set_time_limit(150); 

		$this->parseCommand();

		// close database
		$this->db->close();

		return true;
	}

	protected function parseCommand() {

		switch ($this->call->verb) {

		case "PUT"	: 	$this->addElement();
						break;

		case "GET"	: 	$this->getElement();
						break;

		case "POST"	: 	$this->updElement();
						break;

		case "DELETE":	$this->delElement();
						break;

		case "OPTIONS":	$this->optElement();
						break;

		default		:	throw new MethodNotImplementedException();
		}

	}

	// response management functions to be implemented for each type separately
	abstract protected function addElement();
	abstract protected function getElement();
	abstract protected function updElement();
	abstract protected function delElement();

	protected function optElement() {

		$this->response['GET'] = array();
		$this->response['GET']['description']= 'get elements';

		$this->response['PUT'] = array();
		$this->response['PUT']['description']= 'add elements';

		$this->response['PUSH'] = array();
		$this->response['PUSH']['description']= 'update elements';

		$this->response['DELETE'] = array();
		$this->response['DELETE']['description']= 'remove elements';

	}

}

?>
