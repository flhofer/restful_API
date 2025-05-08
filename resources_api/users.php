<?php

class api_instance extends _api_proto {

	protected function addElement() {
        throw new MethodNotImplementedException(); 
	}

	protected function getElement() {

	// get values
        $query = 'SELECT * FROM "users";"';
	    $result = $this->db->query($query);

        // transfer results to array, init response
        $this->response = array();        
	    while ($row = $result->fetchArray()) {
			// reset element
		    $element = null;
		    $element['uid'] = intval($row['uid']);
		    $element['user_name'] = $row['user_name'];
		    $element['full_name'] = $row['full_name'];
			$this->response[] = $element;
        }
	}

	protected function updElement() {
        throw new MethodNotImplementedException(); 
	}

	protected function delElement() {
        throw new MethodNotImplementedException(); 
	}

}

?>

