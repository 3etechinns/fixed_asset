<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{
	//get current user
	function __construct() {
	//Call the Model construct and load db
		parent::__construct();	        
		$this->userId=$this->session->userdata('userId');
		$this->userRole=$this->session->userdata('role');
	}
	var $userRole='';
	var $userId='';
	//START DISPLAY CHART
	public function displayChart($chartParams=false, $searchParams=false){
		$id=$chartParams[0];
		$aggregate=$chartParams[1];
		$groupBy=$chartParams[2];
		$tableName=$chartParams[3];
        $this->db->select("".$groupBy." as group_param, count(".$id.") as param_value");
        $this->db->from("".$tableName."");
        $this->searchQuery($searchParams);
        //$this->db->where('inv_store_location.str_id', $currentstore);
        $this->db->group_by("".$groupBy."");
        $query = $this->db->get();
        return $query->result_array();
	}
	//END DISPLAY CHART
	//START SEARCH
	public function searchQuery($searchParams=false){		
		//$searchParams=array(array("lg_name",'text'), array("lg_country",'text'), array("lg_desc",'text'));
		//var_dump($searchParams);
		if(count($searchParams) > 1){
			foreach ($searchParams as $key => $row) { 
	        	$fieldName=$searchParams[$key][0];
	        	$fieldValue=$this->input->post("".$fieldName."");
	        	//var_dump($fieldValue);
	        	if(isset($fieldValue) && !empty($fieldValue)){
	        		$this->db->where("".$fieldName." LIKE '%$fieldValue%'");
					//$this->db->where("".$fieldName."", $fieldValue);
				}
	    	}
		}
	}
	public function selectByOwner($ownerFieldName=FALSE){
		$ownAccess=$this->session->userdata('ownaccess');
		//var_dump($ownAccess);		
		if(isset($ownAccess) && !empty($ownAccess) && $ownAccess=='yes') {
			if(isset($ownerFieldName) && !empty($ownerFieldName)){
				$this->db->where("".$ownerFieldName."", $this->userId);
				$this->session->set_userdata('ownaccess','no');
			}
		}
	}
	public function selectByDate($dateFieldName=FALSE, $startDate=FALSE, $endDate=FALSE){
		//str_replace("-", "/", $this->input->post('endDate'));
			if(isset($dateFieldName) && !empty($dateFieldName)){
				if(isset($startDate) && !empty($endDate)){
				$this->db->where("".$dateFieldName.">=", str_replace("-", "/", $startDate));
				$this->db->where("".$dateFieldName."<=", str_replace("-", "/", $endDate));
				}
			}
	}
	//END SEARCH
	//START NAVIGATION
	public function navigateRecord($direction, $primaryKey, $tableName, $id){
		if(isset($direction) && !empty($direction)){
                if($direction=='left'){
                    $this->db->where( ''.$primaryKey.'', "(select max(".$primaryKey.") from ".$tableName." where ".$primaryKey." < ".$id.")" ,false);  
                }elseif ($direction=='right') {
                    $this->db->where( ''.$primaryKey.'', "(select max(".$primaryKey.") from ".$tableName." where ".$primaryKey." > ".$id.")" , false);  
                }
        }else{
            $this->db->where( ''.$primaryKey.'', $id );
        }
	}
	//END NAVIGATION
	
}