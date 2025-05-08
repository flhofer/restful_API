<?php

class api_instance extends _api_proto {

	protected function addElement() {
        throw new MethodNotImplementedException(); 
	}

	protected function getElement() {

        $this->response = array();

	    // get values
        $query = 'SELECT * FROM "plants";"';
	    $result = $this->db->query($query);

        // transfer results to array, init response
        $this->response['plants'] = array();
	    while ($row = $result->fetchArray()) {
			// reset element
		    $element = null;
		    $element['pid'] = intval($row['pid']);
		    $element['plant_name'] = $row['plant_name'];
		    $element['ip_cpu'] = $row['ip_cpu'];
		    $element['ip_vnc'] = $row['ip_vnc'];
		    $element['port_cpu'] = intval( $row['port_cpu']);
		    $element['pwd_vnc'] = $row['pwd_vnc'];
			$this->response['plants'][] = $element;
        }

	// ..
	// More results here $this->response['xxxx']...
	//
	
	}

	protected function updElement() {
        throw new MethodNotImplementedException(); 
	}

	protected function delElement() {
        throw new MethodNotImplementedException(); 
	}

}

?>

