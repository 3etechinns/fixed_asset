<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tbl_users extends MY_Model 
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
		 *     - TRUE:  just the field names of the tbl_users table
		 *     - FALSE: related fields are replaced with the forign tables values
		 *    Triggered to TRUE in the controller/edit method		 
		 */
        $this->raw_data = FALSE;  
    }

	function get ( $id, $get_one = false,$direction=false)
	{        
	    $select_statement = ( $this->raw_data ) ? 'userId,email,password,name,mobile,roleId,isDeleted,createdBy,createdDtm,updatedBy,updatedDtm' : 'userId,email,password,name,mobile,tbl_roles.role AS roleId,isDeleted,createdBy,createdDtm,updatedBy,updatedDtm';
		$this->db->select( $select_statement );
		$this->db->from('tbl_users');
        //$this->db->join( 'tbl_roles', 'tbl_users.roleId = tbl_roles.roleId');

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
            $this->navigateRecord($direction, 'userId', 'tbl_users', $id);            
        }
		$query = $this->db->get();
        //var_dump($query);
        if(isset($query) && !empty($query)){
		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
			return array( 
	'userId' => $row['userId'],
	'email' => $row['email'],
	'password' => $row['password'],
	'name' => $row['name'],
	'mobile' => $row['mobile'],
	'roleId' => $row['roleId'],
	'isDeleted' => $row['isDeleted'],
	'createdBy' => $row['createdBy'],
	'createdDtm' => $row['createdDtm'],
	'updatedBy' => $row['updatedBy'],
	'updatedDtm' => $row['updatedDtm'],
 );
		} }
        else
        {
            return array();
        }
	}



	function insert ( $data )
	{
		$this->db->insert( 'tbl_users', $data );
		return $this->db->insert_id();
	}
	


	function update ( $id, $data )
	{
		$this->db->where( 'userId', $id );
		$this->db->update( 'tbl_users', $data );
	}


	
	function delete ( $id )
	{
        if( is_array( $id ) )
        {
            $this->db->where_in( 'userId', $id );            
        }
        else
        {
            $this->db->where( 'userId', $id );
        }
        $this->db->delete( 'tbl_users' );
        
	}



	function lister ( $page = FALSE, $showAll=FALSE )
	{
        
	    $this->db->start_cache();
		$this->db->select( 'userId,email,password,name,mobile,tbl_roles.role AS roleId,isDeleted,createdBy,createdDtm,updatedBy,updatedDtm');
		$this->db->from( 'tbl_users' );
		$this->db->order_by( 'userId', 'DESC' );

        $this->db->join( 'tbl_roles', 'tbl_users.roleId = tbl_roles.roleId', 'left' );

        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE && $showAll==FALSE)
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_users/index/';
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
	'userId' => $row['userId'],
	'email' => $row['email'],
	'password' => $row['password'],
	'name' => $row['name'],
	'mobile' => $row['mobile'],
	'roleId' => $row['roleId'],
	'isDeleted' => $row['isDeleted'],
	'createdBy' => $row['createdBy'],
	'createdDtm' => $row['createdDtm'],
	'updatedBy' => $row['updatedBy'],
	'updatedDtm' => $row['updatedDtm'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
	}



	function search ( $keyword, $page = FALSE )
	{
	    $meta = $this->metadata();
	    $this->db->start_cache();
		$this->db->select( 'userId,email,password,name,mobile,tbl_roles.role AS roleId,isDeleted,createdBy,createdDtm,updatedBy,updatedDtm');
		$this->db->from( 'tbl_users' );
        $this->db->join( 'tbl_roles', 'tbl_users.roleId = tbl_roles.roleId', 'left' );

        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
		// Delete this line after setting up the search conditions 
        //die('Please see models/model_tbl_users.php for setting up the search method.');
		
        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
		 */
        $this->db->where( 'userId LIKE "%'.$keyword.'%"' );

        /**
         *   PAGINATION
         */
        if( $this->pagination_enabled == TRUE )
        {
            $config = array();
            $config['total_rows']  = $this->db->count_all_results();
            $config['base_url']    = 'tbl_users/search/'.$keyword.'/';
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
	'userId' => $row['userId'],
	'email' => $row['email'],
	'password' => $row['password'],
	'name' => $row['name'],
	'mobile' => $row['mobile'],
	'roleId' => $row['roleId'],
	'isDeleted' => $row['isDeleted'],
	'createdBy' => $row['createdBy'],
	'createdDtm' => $row['createdDtm'],
	'updatedBy' => $row['updatedBy'],
	'updatedDtm' => $row['updatedDtm'],
 );
		}
        $this->db->flush_cache(); 
		return $temp_result;
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
	'userId' => lang('userId'),
	'email' => lang('email'),
	'password' => lang('password'),
	'name' => lang('name'),
	'mobile' => lang('mobile'),
	'roleId' => lang('roleId'),
	'isDeleted' => lang('isDeleted'),
	'createdBy' => lang('createdBy'),
	'createdDtm' => lang('createdDtm'),
	'updatedBy' => lang('updatedBy'),
	'updatedDtm' => lang('updatedDtm')
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

        $metadata = $this->explain_table->parse( 'tbl_users' );

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
            $this->db->insert('tbl_users', $data );
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
        $id=$data['userId'];
        $this->db->where( 'userId', $id );
        $this->db->update( 'tbl_users', $data );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }


    
    function deleteGrid ( $id )
    {        
        $this->db->where( 'userId', $id );
        $this->db->delete( 'tbl_users' );
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }

    function listerGrid ()
    {
         $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select( 'userId,email,password,name,mobile,tbl_roles.role AS roleId,isDeleted,createdBy,createdDtm,updatedBy,updatedDtm');
        $this->db->from( 'tbl_users' );
        $ownerFieldName='';
        $this->selectByOwner($ownerFieldName);
        $query = $this->db->get();        
        $temp_result = array();
        foreach ( $query->result_array() as $row )
        {
            $temp_result[] = array( 
	'userId' => $row['userId'],
	'email' => $row['email'],
	'password' => $row['password'],
	'name' => $row['name'],
	'mobile' => $row['mobile'],
	'roleId' => $row['roleId'],
	'isDeleted' => $row['isDeleted'],
	'createdBy' => $row['createdBy'],
	'createdDtm' => $row['createdDtm'],
	'updatedBy' => $row['updatedBy'],
	'updatedDtm' => $row['updatedDtm'],
 );
        }
        $this->db->flush_cache(); 
        return $temp_result;
    }
    //END DATA GRID CRUD
}
