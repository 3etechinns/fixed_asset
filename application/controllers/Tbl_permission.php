<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_permission extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_tbl_permission' ); 
		
		$this->load->helper( 'form' );
		$this->load->helper( 'language' ); 
		$this->load->helper( 'url' );
        $this->load->model( 'model_auth' );
        $this->lang->load( 'db_fields', 'english' );

        //$this->logged_in = $this->model_auth->check( TRUE );
        //$this->template->assign( 'logged_in', $this->logged_in );
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0, $showAll=false )
    {
        $this->model_tbl_permission->pagination( TRUE );
		$data_info = $this->model_tbl_permission->lister( $page, $showAll);
        //display or hide "show all" button on list page
        if(isset($showAll) && !empty($showAll)){
            //hide button
            $this->template->assign( 'showall', 1);
        }else{
            //display button
             $this->template->assign( 'showall', 0);
        }
        $fields = $this->model_tbl_permission->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_tbl_permission->pager );
		$this->template->assign( 'tbl_permission_fields', $fields );
		$this->template->assign( 'tbl_permission_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_permission' ));
        $this->template->assign( 'template', 'list_tbl_permission' );
        $this->template->assign( 'page_title', lang('tbl_permission' ));
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_tbl_permission->get( $id );
        if(isset($data) && !empty($data)){
            $fields = $this->model_tbl_permission->fields( TRUE );
            

            
            $this->template->assign( 'id', $id );
    		$this->template->assign( 'tbl_permission_fields', $fields );
    		$this->template->assign( 'tbl_permission_data', $data );
    		$this->template->assign( 'table_name', lang('tbl_permission' ));
    		$this->template->assign( 'template', 'show_tbl_permission' );
            $this->template->assign( 'page_title', lang('tbl_permission' ));
    		$this->template->display( 'frame_admin.tpl' );
        }else{
            redirect("notfound");
        }
    }



    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */         
    function create( $id = false )
    {
		$this->load->library('form_validation');
        
		switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $fields = $this->model_tbl_permission->fields();
                $tbl_pages_set = $this->model_tbl_permission->related_tbl_pages();
$tbl_roles_set = $this->model_tbl_permission->related_tbl_roles();

                $this->template->assign( 'related_tbl_pages', $tbl_pages_set );
$this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'tbl_permission_fields', $fields );
                $this->template->assign( 'metadata', $this->model_tbl_permission->metadata() );
        		$this->template->assign( 'table_name', lang('tbl_permission' ));
        		$this->template->assign( 'template', 'form_tbl_permission' );
                $this->template->assign( 'page_title', lang('tbl_permission' ));
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO tbl_permission table
             */
            case 'POST':
                $fields = $this->model_tbl_permission->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'pm_pg_id', lang('pm_pg_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'pm_role', lang('pm_role'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'pm_description', lang('pm_description'), '225' );

				$data_post['pm_pg_id'] = $this->input->post( 'pm_pg_id' );
				$data_post['pm_enabled'] = $this->input->post( 'pm_enabled' );
				$data_post['pm_edit'] = $this->input->post( 'pm_edit' );
				$data_post['pm_insert'] = $this->input->post( 'pm_insert' );
				$data_post['pm_view'] = $this->input->post( 'pm_view' );
				$data_post['pm_delete'] = $this->input->post( 'pm_delete' );
				$data_post['pm_show'] = $this->input->post( 'pm_show' );
				$data_post['pm_role'] = $this->input->post( 'pm_role' );
				$data_post['pm_description'] = $this->input->post( 'pm_description' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $tbl_pages_set = $this->model_tbl_permission->related_tbl_pages();
$tbl_roles_set = $this->model_tbl_permission->related_tbl_roles();

                    $this->template->assign( 'related_tbl_pages', $tbl_pages_set );
$this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'tbl_permission_data', $data_post );
            		$this->template->assign( 'tbl_permission_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_permission->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_permission'));
            		$this->template->assign( 'template', 'form_tbl_permission' );
                    $this->template->assign( 'page_title', lang('tbl_permission' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_tbl_permission->insert( $data_post );
                    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
					redirect( 'tbl_permission' );
                }
            break;
        }
    }



    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit( $id = false )
    {
        $this->load->library('form_validation');
        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_tbl_permission->raw_data = TRUE;
        		$data = $this->model_tbl_permission->get( $id );
                if(isset($data) && !empty($data)){
                    $fields = $this->model_tbl_permission->fields();
                    $tbl_pages_set = $this->model_tbl_permission->related_tbl_pages();
$tbl_roles_set = $this->model_tbl_permission->related_tbl_roles();

                    
                    $this->template->assign( 'related_tbl_pages', $tbl_pages_set );
$this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
            		$this->template->assign( 'tbl_permission_data', $data );
            		$this->template->assign( 'tbl_permission_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_permission->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_permission'));
            		$this->template->assign( 'template', 'form_tbl_permission' );
            		$this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_permission'));
            		$this->template->display( 'frame_admin.tpl' );
                }else{
                    redirect("notfound");
                }
            break;
    
            case 'POST':
    
                $fields = $this->model_tbl_permission->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'pm_pg_id', lang('pm_pg_id'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'pm_role', lang('pm_role'), 'required|max_length[11]|integer' );
				$this->form_validation->set_rules( 'pm_description', lang('pm_description'), '225' );

				$data_post['pm_pg_id'] = $this->input->post( 'pm_pg_id' );
				$data_post['pm_enabled'] = $this->input->post( 'pm_enabled' );
				$data_post['pm_edit'] = $this->input->post( 'pm_edit' );
				$data_post['pm_insert'] = $this->input->post( 'pm_insert' );
				$data_post['pm_view'] = $this->input->post( 'pm_view' );
				$data_post['pm_delete'] = $this->input->post( 'pm_delete' );
				$data_post['pm_show'] = $this->input->post( 'pm_show' );
				$data_post['pm_role'] = $this->input->post( 'pm_role' );
				$data_post['pm_description'] = $this->input->post( 'pm_description' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $tbl_pages_set = $this->model_tbl_permission->related_tbl_pages();
$tbl_roles_set = $this->model_tbl_permission->related_tbl_roles();

                    $this->template->assign( 'related_tbl_pages', $tbl_pages_set );
$this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'tbl_permission_data', $data_post );
            		$this->template->assign( 'tbl_permission_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_permission->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_permission' ));
            		$this->template->assign( 'template', 'form_tbl_permission' );
        		    $this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_permission' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_tbl_permission->update( $id, $data_post );
				    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
					redirect( 'tbl_permission/show/' . $id );   
                }
            break;
        }
    }



    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array  
     */
    function delete( $id = FALSE )
    {
        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_tbl_permission->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_tbl_permission->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
    //START NAVIGATION
    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page=false){
        $this->model_tbl_permission->raw_data = TRUE;
        $data = $this->model_tbl_permission->get( $id, false, $direction);
        //var_dump($data);
        if(isset($data) && !empty($data)){                    
            $this->template->assign( 'record_id', $data['pm_id']);
            $this->template->assign( 'id', $data['pm_id']);           
        }else{
            //redirect("notfound");
            $data = $this->model_tbl_permission->get( $id, false, false);                    
            $this->template->assign( 'direction', $direction ); 
            $this->template->assign( 'record_id', $id);
            $this->template->assign( 'id', $id);
        }
             
                  
             $fields = $this->model_tbl_permission->fields();          
            $this->template->assign( 'action_mode', $page);
            $this->template->assign( 'tbl_permission_data', $data );
            $this->template->assign( 'tbl_permission_fields', $fields );
            $this->template->assign( 'metadata', $this->model_tbl_permission->metadata() );
            $this->template->assign( 'table_name', lang('tbl_permission'));
            if($page=='show'){
                $this->template->assign( 'template', 'show_tbl_permission' );
            }else{
                $this->template->assign( 'action_mode', 'edit' );
                $this->template->assign( 'template', 'form_tbl_permission' );
            }
            $this->template->assign( 'page_title', lang('tbl_permission'));
            $this->template->display( 'frame_admin.tpl' );
    }
    //END NAVIGATION
    //START SEARCH
    /**
     *  SEARCH MODEL DATA INTO A TABLE
     */         
    function search($searchWord=false, $page = 0 )
    {
        $keyword=$this->input->post("search")!='' ? $this->input->post("search"):$searchWord;
        $this->model_tbl_permission->pagination( TRUE );
        $data_info = $this->model_tbl_permission->search($keyword, $page );
        $fields = $this->model_tbl_permission->fields( TRUE );
        
         //hide show all button on list page
        $this->template->assign( 'showall', 1);
        $this->template->assign( 'search_result', 'Search result with keyword <b>"'.$keyword.'"</b>' );
        $this->template->assign( 'pager', $this->model_tbl_permission->pager );
        $this->template->assign( 'tbl_permission_fields', $fields );
        $this->template->assign( 'tbl_permission_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_permission' ));
        $this->template->assign( 'template', 'list_tbl_permission' );
        $this->template->assign( 'page_title', lang('tbl_permission') );
        
        $this->template->display( 'frame_admin.tpl' );
    }
    //END SEARCH
     //START DATA GRID CRUD
    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function listGrid()
    {      
        $data_info = $this->model_tbl_permission->listerGrid();
        $resultObject= array(
            "odata.metadata"=>"",
            "value" =>$data_info
        );
        echo json_encode($resultObject);
    }
    function insertGrid(){
        				$data_post['pm_pg_id'] = $this->input->post( 'pm_pg_id' );
				$data_post['pm_enabled'] = $this->input->post( 'pm_enabled' );
				$data_post['pm_edit'] = $this->input->post( 'pm_edit' );
				$data_post['pm_insert'] = $this->input->post( 'pm_insert' );
				$data_post['pm_view'] = $this->input->post( 'pm_view' );
				$data_post['pm_delete'] = $this->input->post( 'pm_delete' );
				$data_post['pm_show'] = $this->input->post( 'pm_show' );
				$data_post['pm_role'] = $this->input->post( 'pm_role' );
				$data_post['pm_description'] = $this->input->post( 'pm_description' );

        $insert_id = $this->model_tbl_permission->insertGrid( $data_post ); 
        //id should be primary key column name
         echo json_encode(array('pm_id'=>$insert_id, 'statusCode'=>($insert_id!='error')?200:'error', 'type'=>'save'));
    }
    function updateGrid(){
        //Primary key variable assignment
        $data_post['pm_id'] = $this->input->post( 'pm_id');
        				$data_post['pm_pg_id'] = $this->input->post( 'pm_pg_id' );
				$data_post['pm_enabled'] = $this->input->post( 'pm_enabled' );
				$data_post['pm_edit'] = $this->input->post( 'pm_edit' );
				$data_post['pm_insert'] = $this->input->post( 'pm_insert' );
				$data_post['pm_view'] = $this->input->post( 'pm_view' );
				$data_post['pm_delete'] = $this->input->post( 'pm_delete' );
				$data_post['pm_show'] = $this->input->post( 'pm_show' );
				$data_post['pm_role'] = $this->input->post( 'pm_role' );
				$data_post['pm_description'] = $this->input->post( 'pm_description' );
            if(isset($data_post['pm_id']) && !empty($data_post['pm_id'])){
                    $update_id = $this->model_tbl_permission->updateGrid( $data_post );
                    //id should be primary key column name
                    echo json_encode(array('pm_id'=>$update_id, 'statusCode'=>($update_id!='error')?200:'error', 'type'=>'update'));
                }else{
                    $insert_id = $this->model_tbl_permission->insertGrid( $data_post ); 
                    //id should be primary key column name
                     echo json_encode(array('pm_id'=>$insert_id, 'statusCode'=>($insert_id!='error')?200:'error', 'type'=>'save'));
                }
    }
    
    function deleteGrid(){
        //id should not be changed
        $id=$this->input->post('pm_id');
        $result= $this->model_tbl_permission->deleteGrid( $id);
        echo json_encode(array('pm_id'=>$result, 'statusCode'=>($result!='error')?200:'error', 'type'=>'delete'));
    }
     //END DATA GRID CRUD
}
