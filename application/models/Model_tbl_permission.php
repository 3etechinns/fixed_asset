<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tbl_permission extends MY_Model 
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
		 *     - TRUE:  just the field names of the tbl_permission table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false,$direction=false)
	{
        $meta = $this->metadata();
	    $select_statement = ( $this->raw_data ) ? 'pm_id,pm_pg_id,pm_enabled,pm_edit,pm_insert,pm_view,pm_delete,pm_show,pm_role,pm_description' : 'pm_id,tbl_pages.pg_name AS pm_pg_id,pm_enabled,pm_edit,pm_insert,pm_view,pm_delete,pm_show,tbl_roles.role AS pm_role,pm_description';
		$this->db->select( $select_statement );
		$this->db->from('tbl_permission');
        $this->db->join( 'tbl_pages', 'tbl_permission.pm_pg_id = tbl_pages.pg_id', 'left' );
$this->db->join( 'tbl_roles', 'tbl_permission.pm_role = tbl_roles.roleId', 'left' );

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
            $this->navigateRecord($direction, 'pm_id', 'tbl_permission', $id);            
        }

		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
		$temp_result[] = array(
            //'pg_name' => $row['pg_name'], 
    'pm_id' => $row['pm_id'],
    'pm_pg_id' => $row['pm_pg_id'],
    'pm_enabled' => $row['pm_enabled'],
    'pm_edit' => $row['pm_edit'],
    'pm_insert' => $row['pm_insert'],
    'pm_view' => $row['pm_view'],
    'pm_delete' => $row['pm_delete'],
    'pm_show' => $row['pm_show'],
    'pm_role' => $row['pm_role'],
    'pm_description' => $row['pm_description'],
 );
		}
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'tbl_permission', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'pm_id', $id );
		$this->db->update( 'tbl_permission', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'pm_id', $id );            
        }
        else
        {
            $this->db->where( 'pm_id', $id );
        }
        $this->db->delete( 'tbl_permission' );
        
	}



	function lister ( $page = FALSE, $showAll=FALSE )
	{
        $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'pm_id,tbl_pages.pg_name AS pm_pg_id,pm_enabled,pm_edit,pm_insert,pm_view,pm_delete,pm_show,tbl_roles.role AS pm_role,pm_description');
		$this->db->from( 'tbl_permission' );
		$this->db->order_by( 'pm_id', 'DESC' );

        $this->db->join( 'tbl_pages', 'tbl_permission.pm_pg_id = tbl_pages.pg_id', 'left' );
$this->db->join( 'tbl_roles', 'tbl_permission.pm_role = tbl_roles.roleId', 'left' );

        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE && $showAll==FALSE)
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_permission/index/';
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
           // 'pg_name' => $row['pg_name'], 
    'pm_id' => $row['pm_id'],
    'pm_pg_id' => $row['pm_pg_id'],
    'pm_enabled' => $row['pm_enabled'],
    'pm_edit' => $row['pm_edit'],
    'pm_insert' => $row['pm_insert'],
    'pm_view' => $row['pm_view'],
    'pm_delete' => $row['pm_delete'],
    'pm_show' => $row['pm_show'],
    'pm_role' => $row['pm_role'],
    'pm_description' => $row['pm_description'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'pm_id,tbl_pages.pg_name AS pm_pg_id,pm_enabled,pm_edit,pm_insert,pm_view,pm_delete,pm_show,tbl_roles.role AS pm_role,pm_description');
		$this->db->from( 'tbl_permission' );
        $this->db->join( 'tbl_pages', 'tbl_permission.pm_pg_id = tbl_pages.pg_id', 'left' );
        $this->db->join( 'tbl_roles', 'tbl_permission.pm_role = tbl_roles.roleId', 'left' );

        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
		// Delete this line after setting up the search conditions 
        //die('Please see models/model_tbl_permission.php for setting up the search method.');
		
        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
		 */
        $this->db->where( 'pm_id LIKE "%'.$keyword.'%"' );

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_permission/search/'.$keyword.'/';
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
            'pg_name' => $row['pg_name'], 
    'pm_id' => $row['pm_id'],
    'pm_pg_id' => $row['pm_pg_id'],
    'pm_enabled' => $row['pm_enabled'],
    'pm_edit' => $row['pm_edit'],
    'pm_insert' => $row['pm_insert'],
    'pm_view' => $row['pm_view'],
    'pm_delete' => $row['pm_delete'],
    'pm_show' => $row['pm_show'],
    'pm_role' => $row['pm_role'],
    'pm_description' => $row['pm_description'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}

	function related_tbl_pages()
    {
        $this->db->select( 'pg_id AS tbl_pages_id, pg_name AS tbl_pages_name' );
        $rel_data = $this->db->get( 'tbl_pages' );
        return $rel_data->result_array();
    }



	function related_tbl_roles()
    {
        $this->db->select( 'roleId AS tbl_roles_id, role AS tbl_roles_name' );
        $rel_data = $this->db->get( 'tbl_roles' );
        return $rel_data->result_array();
    }







    /**
     *  Some utility methods
     */
    function fields( $withID = FALSE )
    {
        $fs = array(
	'pm_id' => lang('pm_id'),
	'pm_pg_id' => lang('pm_pg_id'),
	'pm_enabled' => lang('pm_enabled'),
	'pm_edit' => lang('pm_edit'),
	'pm_insert' => lang('pm_insert'),
	'pm_view' => lang('pm_view'),
	'pm_delete' => lang('pm_delete'),
	'pm_show' => lang('pm_show'),
	'pm_role' => lang('pm_role'),
	'pm_description' => lang('pm_description')
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

        $metadata = $this->explain_table->parse( 'tbl_permission' );

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
            $this->db->insert('tbl_permission', $data );
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
        $id=$data['pm_id'];
        $this->db->where( 'pm_id', $id );
        $this->db->update( 'tbl_permission', $data );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }


    
    function deleteGrid ( $id )
    {        
        $this->db->where( 'pm_id', $id );
        $this->db->delete( 'tbl_permission' );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }

    function listerGrid ()
    {
        
         $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select( 'pm_id,pm_enabled,pm_edit,pm_insert,pm_view,pm_delete,pm_show,pm_role,pm_description, pg_name, tbl_pages.pg_id as pm_pg_id');
        $this->db->from( 'tbl_permission' );
        $this->db->join( 'tbl_pages', 'tbl_pages.pg_id=tbl_permission.pm_pg_id','right' );
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        $query = $this->db->get();        
        $temp_result = array();
        foreach ( $query->result_array() as $row )
        {
            $temp_result[] = array(
            'pg_name' => $row['pg_name'], 
    'pm_id' => $row['pm_id'],
    'pm_pg_id' => $row['pm_pg_id'],
    'pm_enabled' => $row['pm_enabled'],
    'pm_edit' => $row['pm_edit'],
    'pm_insert' => $row['pm_insert'],
    'pm_view' => $row['pm_view'],
    'pm_delete' => $row['pm_delete'],
    'pm_show' => $row['pm_show'],
    'pm_role' => $row['pm_role'],
    'pm_description' => $row['pm_description'],
 );
        }
        $this->db->flush_cache(); 
        return $temp_result;
    }
    //END DATA GRID CRUD
}
