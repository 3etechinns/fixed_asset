<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_pages extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_tbl_pages' ); 
		
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
        $this->model_tbl_pages->pagination( TRUE );
		$data_info = $this->model_tbl_pages->lister( $page, $showAll);
        //display or hide "show all" button on list page
        if(isset($showAll) && !empty($showAll)){
            //hide button
            $this->template->assign( 'showall', 1);
        }else{
            //display button
             $this->template->assign( 'showall', 0);
        }
        $fields = $this->model_tbl_pages->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_tbl_pages->pager );
		$this->template->assign( 'tbl_pages_fields', $fields );
		$this->template->assign( 'tbl_pages_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_pages' ));
        $this->template->assign( 'template', 'list_tbl_pages' );
        $this->template->assign( 'page_title', lang('tbl_pages' ));
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_tbl_pages->get( $id );
        if(isset($data) && !empty($data)){
            $fields = $this->model_tbl_pages->fields( TRUE );
            

            
            $this->template->assign( 'id', $id );
    		$this->template->assign( 'tbl_pages_fields', $fields );
    		$this->template->assign( 'tbl_pages_data', $data );
    		$this->template->assign( 'table_name', lang('tbl_pages' ));
    		$this->template->assign( 'template', 'show_tbl_pages' );
            $this->template->assign( 'page_title', lang('tbl_pages' ));
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
                $fields = $this->model_tbl_pages->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'tbl_pages_fields', $fields );
                $this->template->assign( 'metadata', $this->model_tbl_pages->metadata() );
        		$this->template->assign( 'table_name', lang('tbl_pages' ));
        		$this->template->assign( 'template', 'form_tbl_pages' );
                $this->template->assign( 'page_title', lang('tbl_pages' ));
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO tbl_pages table
             */
            case 'POST':
                $fields = $this->model_tbl_pages->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'pg_name', lang('pg_name'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'pg_description', lang('pg_description'), '225' );
				$this->form_validation->set_rules( 'pg_controller', lang('pg_controller'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'pg_status', lang('pg_status'), '4' );

				$data_post['pg_name'] = $this->input->post( 'pg_name' );
				$data_post['pg_description'] = $this->input->post( 'pg_description' );
				$data_post['pg_controller'] = $this->input->post( 'pg_controller' );
				$data_post['pg_status'] = $this->input->post( 'pg_status' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'tbl_pages_data', $data_post );
            		$this->template->assign( 'tbl_pages_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_pages->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_pages'));
            		$this->template->assign( 'template', 'form_tbl_pages' );
                    $this->template->assign( 'page_title', lang('tbl_pages' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_tbl_pages->insert( $data_post );
                    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
					redirect( 'tbl_pages' );
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
                $this->model_tbl_pages->raw_data = TRUE;
        		$data = $this->model_tbl_pages->get( $id );
                if(isset($data) && !empty($data)){
                    $fields = $this->model_tbl_pages->fields();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
            		$this->template->assign( 'tbl_pages_data', $data );
            		$this->template->assign( 'tbl_pages_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_pages->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_pages'));
            		$this->template->assign( 'template', 'form_tbl_pages' );
            		$this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_pages'));
            		$this->template->display( 'frame_admin.tpl' );
                }else{
                    redirect("notfound");
                }
            break;
    
            case 'POST':
    
                $fields = $this->model_tbl_pages->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'pg_name', lang('pg_name'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'pg_description', lang('pg_description'), '225' );
				$this->form_validation->set_rules( 'pg_controller', lang('pg_controller'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'pg_status', lang('pg_status'), '4' );

				$data_post['pg_name'] = $this->input->post( 'pg_name' );
				$data_post['pg_description'] = $this->input->post( 'pg_description' );
				$data_post['pg_controller'] = $this->input->post( 'pg_controller' );
				$data_post['pg_status'] = $this->input->post( 'pg_status' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'tbl_pages_data', $data_post );
            		$this->template->assign( 'tbl_pages_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_pages->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_pages' ));
            		$this->template->assign( 'template', 'form_tbl_pages' );
        		    $this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_pages' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_tbl_pages->update( $id, $data_post );
				    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
					redirect( 'tbl_pages/show/' . $id );   
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
                $this->model_tbl_pages->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_tbl_pages->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
    //START NAVIGATION
    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page=false){
        $this->model_tbl_pages->raw_data = TRUE;
        $data = $this->model_tbl_pages->get( $id, false, $direction);
        //var_dump($data);
        if(isset($data) && !empty($data)){                    
            $this->template->assign( 'record_id', $data['pg_id']);
            $this->template->assign( 'id', $data['pg_id']);           
        }else{
            //redirect("notfound");
            $data = $this->model_tbl_pages->get( $id, false, false);                    
            $this->template->assign( 'direction', $direction ); 
            $this->template->assign( 'record_id', $id);
            $this->template->assign( 'id', $id);
        }
             
                  
             $fields = $this->model_tbl_pages->fields();          
            $this->template->assign( 'action_mode', $page);
            $this->template->assign( 'tbl_pages_data', $data );
            $this->template->assign( 'tbl_pages_fields', $fields );
            $this->template->assign( 'metadata', $this->model_tbl_pages->metadata() );
            $this->template->assign( 'table_name', lang('tbl_pages'));
            if($page=='show'){
                $this->template->assign( 'template', 'show_tbl_pages' );
            }else{
                $this->template->assign( 'action_mode', 'edit' );
                $this->template->assign( 'template', 'form_tbl_pages' );
            }
            $this->template->assign( 'page_title', lang('tbl_pages'));
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
        $this->model_tbl_pages->pagination( TRUE );
        $data_info = $this->model_tbl_pages->search($keyword, $page );
        $fields = $this->model_tbl_pages->fields( TRUE );
        
         //hide show all button on list page
        $this->template->assign( 'showall', 1);
        $this->template->assign( 'search_result', 'Search result with keyword <b>"'.$keyword.'"</b>' );
        $this->template->assign( 'pager', $this->model_tbl_pages->pager );
        $this->template->assign( 'tbl_pages_fields', $fields );
        $this->template->assign( 'tbl_pages_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_pages' ));
        $this->template->assign( 'template', 'list_tbl_pages' );
        $this->template->assign( 'page_title', lang('tbl_pages') );
        
        $this->template->display( 'frame_admin.tpl' );
    }
    //END SEARCH
     //START DATA GRID CRUD
    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function listGrid()
    {      
        $data_info = $this->model_tbl_pages->listerGrid();
        $resultObject= array(
            "odata.metadata"=>"",
            "value" =>$data_info
        );
        echo json_encode($resultObject);
    }
    function insertGrid(){
        				$data_post['pg_name'] = $this->input->post( 'pg_name' );
				$data_post['pg_description'] = $this->input->post( 'pg_description' );
				$data_post['pg_controller'] = $this->input->post( 'pg_controller' );
				$data_post['pg_status'] = $this->input->post( 'pg_status' );

        $insert_id = $this->model_tbl_pages->insertGrid( $data_post ); 
        //id should be primary key column name
         echo json_encode(array('pg_id'=>$insert_id, 'statusCode'=>($insert_id!='error')?200:'error', 'type'=>'save'));
    }
    function updateGrid(){
        //Primary key variable assignment
        $data_post['pg_id'] = $this->input->post( 'pg_id');
        				$data_post['pg_name'] = $this->input->post( 'pg_name' );
				$data_post['pg_description'] = $this->input->post( 'pg_description' );
				$data_post['pg_controller'] = $this->input->post( 'pg_controller' );
				$data_post['pg_status'] = $this->input->post( 'pg_status' );

        $update_id = $this->model_tbl_pages->updateGrid( $data_post );
        //id should be primary key column name
        echo json_encode(array('pg_id'=>$update_id, 'statusCode'=>($update_id!='error')?200:'error', 'type'=>'update'));
    }
    
    function deleteGrid(){
        //id should not be changed
        $id=$this->input->post('pg_id');
        $result= $this->model_tbl_pages->deleteGrid( $id);
        echo json_encode(array('pg_id'=>$result, 'statusCode'=>($result!='error')?200:'error', 'type'=>'delete'));
    }
     //END DATA GRID CRUD
}
