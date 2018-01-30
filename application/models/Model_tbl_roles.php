<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tbl_roles extends MY_Model 
{
    function __construct()
    {
        parent::__construct();
 
		$this->load->database();

		// Paginaiton defaults
		$this->pagination_enabled = FALSE;
		$this->pagination_per_page = 10;
		$this->pagination_num_links = 5;
		$this->pager = '';

        /**
		 *    bool $this->raw_data		
		 *    Used to decide what data should the SQL queries retrieve if tables are joined
		 *     - TRUE:  just the field names of the tbl_roles table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false,$direction=false)
	{
        
	    $select_statement = ( $this->raw_data ) ? 'roleId,role' : 'roleId,role';
		$this->db->select( $select_statement );
		$this->db->from('tbl_roles');
        
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
		// Pick one record
		// Field order sample may be empty because no record is requested, eg. create/GET event
		if( $get_one )
        {
            $this->db->limit(1,0);
        }
		else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'roleId', 'tbl_roles', $id);            
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'roleId' => $row['roleId'],
	'role' => $row['role'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'tbl_roles', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'roleId', $id );
		$this->db->update( 'tbl_roles', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'roleId', $id );            
        }
        else
        {
            $this->db->where( 'roleId', $id );
        }
        $this->db->delete( 'tbl_roles' );
        
		$this->db->where( 'tbl_roles_id', $id );
        $this->db->delete('tbl_permission_tbl_roles');


		$this->db->where( 'tbl_roles_id', $id );
        $this->db->delete('tbl_users_tbl_roles');


	}



	function lister ( $page = FALSE, $showAll=FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'roleId,role');
		$this->db->from( 'tbl_roles' );
		$this->db->order_by( 'roleId', 'DESC' );

        
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE && $showAll==FALSE)
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_roles/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page']    = $this->pagination_per_page;
            $config['num_links']   = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();
    
            $this->db->limit( $config['per_page'], $page );
        }

        // Get the results
		$query = $this->db->get();
		
		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'roleId' => $row['roleId'],
	'role' => $row['role'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'roleId,role');
		$this->db->from( 'tbl_roles' );
        
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
		// Delete this line after setting up the search conditions 
        //die('Please see models/model_tbl_roles.php for setting up the search method.');
		
        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
		 */
        $this->db->where( 'roleId LIKE "%'.$keyword.'%"' );

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_roles/search/'.$keyword.'/';
            $config['uri_segment'] = 4;
            $config['per_page']    = $this->pagination_per_page;
            $config['num_links']   = $this->pagination_num_links;
    
            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();
    
            $this->db->limit( $config['per_page'], $page );
        }

		$query = $this->db->get();

		$temp_result = array();

		foreach ( $query->result_array() as $row )
		{
			$temp_result[] = array( 
	'roleId' => $row['roleId'],
	'role' => $row['role'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}





    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'roleId' => lang('roleId'),
	'role' => lang('role')
);

        if( $withID == FALSE )
        {
            unset( $fs[0] );
        }
        return $fs;
    }  
    


    function pagination( $bool )
    {
        $this->pagination_enabled = ( $bool === TRUE ) ? TRUE : FALSE;
    }



    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */             
    function metadata()
    {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse( 'tbl_roles' );

        foreach( $metadata as $k => $md )
        {
            if( !empty( $md['enum_values'] ) )
            {
                $metadata[ $k ]['enum_names'] = array_map( 'lang', $md['enum_values'] );                
            } 
        }
        return $metadata; 
    }
    //START DATA GRID CRUD
    function insertGrid ( $data )
    {
        try {
            $this->db->insert('tbl_roles', $data );
            $insertedId= $this->db->insert_id();
            if (!$insertedId)
            {
              throw new Exception('error in query');
                return 'error';
            } else{
                return $insertedId;
            } 
        } catch (Exception $e) {
            return 'error';
        }
    }

    function updateGrid ($data )
    {
        // id should be primary key
        $id=$data['roleId'];
        $this->db->where( 'roleId', $id );
        $this->db->update( 'tbl_roles', $data );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }


    
    function deleteGrid ( $id )
    {        
        $this->db->where( 'roleId', $id );
        $this->db->delete( 'tbl_roles' );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }

    function listerGrid ()
    {
         $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select( 'roleId,role');
        $this->db->from( 'tbl_roles' );
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        $query = $this->db->get();        
        $temp_result = array();
        foreach ( $query->result_array() as $row )
        {
            $temp_result[] = array( 
	'roleId' => $row['roleId'],
	'role' => $row['role'],
 );
        }
        $this->db->flush_cache(); 
        return $temp_result;
    }
    //END DATA GRID CRUD
    function getAccess ($roleId, $controllerId){
        $select_statement = 'tbl_permission.*';
        $this->db->select( $select_statement );
        $this->db->from('tbl_pages');
        $this->db->join('tbl_permission', 'tbl_permission.pm_pg_id=tbl_pages.pg_id');
        $this->db->where('pm_role',$roleId);
        $this->db->where('tbl_pages.pg_controller',$controllerId);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }
}
