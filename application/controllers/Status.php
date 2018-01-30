<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_status' ); 
		
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
        $this->model_status->pagination( TRUE );
		$data_info = $this->model_status->lister( $page, $showAll);
        //display or hide "show all" button on list page
        if(isset($showAll) && !empty($showAll)){
            //hide button
            $this->template->assign( 'showall', 1);
        }else{
            //display button
             $this->template->assign( 'showall', 0);
        }
        $fields = $this->model_status->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_status->pager );
		$this->template->assign( 'status_fields', $fields );
		$this->template->assign( 'status_data', $data_info );
        $this->template->assign( 'table_name', lang('status' ));
        $this->template->assign( 'template', 'list_status' );
        $this->template->assign( 'page_title', lang('status' ));
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_status->get( $id );
        if(isset($data) && !empty($data)){
            $fields = $this->model_status->fields( TRUE );
            

            
            $this->template->assign( 'id', $id );
    		$this->template->assign( 'status_fields', $fields );
    		$this->template->assign( 'status_data', $data );
    		$this->template->assign( 'table_name', lang('status' ));
    		$this->template->assign( 'template', 'show_status' );
            $this->template->assign( 'page_title', lang('status' ));
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
                $fields = $this->model_status->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'status_fields', $fields );
                $this->template->assign( 'metadata', $this->model_status->metadata() );
        		$this->template->assign( 'table_name', lang('status' ));
        		$this->template->assign( 'template', 'form_status' );
                $this->template->assign( 'page_title', lang('status' ));
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO status table
             */
            case 'POST':
                $fields = $this->model_status->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'status', lang('status'), 'max_length[45]' );

				$data_post['status'] = $this->input->post( 'status' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'status_data', $data_post );
            		$this->template->assign( 'status_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_status->metadata() );
            		$this->template->assign( 'table_name', lang('status'));
            		$this->template->assign( 'template', 'form_status' );
                    $this->template->assign( 'page_title', lang('status' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_status->insert( $data_post );
                    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
					redirect( 'status' );
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
                $this->model_status->raw_data = TRUE;
        		$data = $this->model_status->get( $id );
                if(isset($data) && !empty($data)){
                    $fields = $this->model_status->fields();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
            		$this->template->assign( 'status_data', $data );
            		$this->template->assign( 'status_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_status->metadata() );
            		$this->template->assign( 'table_name', lang('status'));
            		$this->template->assign( 'template', 'form_status' );
            		$this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('status'));
            		$this->template->display( 'frame_admin.tpl' );
                }else{
                    redirect("notfound");
                }
            break;
    
            case 'POST':
    
                $fields = $this->model_status->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'status', lang('status'), 'max_length[45]' );

				$data_post['status'] = $this->input->post( 'status' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'status_data', $data_post );
            		$this->template->assign( 'status_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_status->metadata() );
            		$this->template->assign( 'table_name', lang('status' ));
            		$this->template->assign( 'template', 'form_status' );
        		    $this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('status' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_status->update( $id, $data_post );
				    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
					redirect( 'status/show/' . $id );   
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
                $this->model_status->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_status->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
    //START NAVIGATION
    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page=false){
        $this->model_status->raw_data = TRUE;
        $data = $this->model_status->get( $id, false, $direction);
        //var_dump($data);
        if(isset($data) && !empty($data)){                    
            $this->template->assign( 'record_id', $data['status_id']);
            $this->template->assign( 'id', $data['status_id']);           
        }else{
            //redirect("notfound");
            $data = $this->model_status->get( $id, false, false);                    
            $this->template->assign( 'direction', $direction ); 
            $this->template->assign( 'record_id', $id);
            $this->template->assign( 'id', $id);
        }
             
                  
             $fields = $this->model_status->fields();          
            $this->template->assign( 'action_mode', $page);
            $this->template->assign( 'status_data', $data );
            $this->template->assign( 'status_fields', $fields );
            $this->template->assign( 'metadata', $this->model_status->metadata() );
            $this->template->assign( 'table_name', lang('status'));
            if($page=='show'){
                $this->template->assign( 'template', 'show_status' );
            }else{
                $this->template->assign( 'action_mode', 'edit' );
                $this->template->assign( 'template', 'form_status' );
            }
            $this->template->assign( 'page_title', lang('status'));
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
        $this->model_status->pagination( TRUE );
        $data_info = $this->model_status->search($keyword, $page );
        $fields = $this->model_status->fields( TRUE );
        
         //hide show all button on list page
        $this->template->assign( 'showall', 1);
        $this->template->assign( 'search_form', $this->displaySearchForm());
        $this->template->assign( 'pager', $this->model_status->pager );
        $this->template->assign( 'status_fields', $fields );
        $this->template->assign( 'status_data', $data_info );
        $this->template->assign( 'table_name', lang('status' ));
        $this->template->assign( 'template', 'list_status' );
        $this->template->assign( 'page_title', lang('status') );
        
        $this->template->display( 'frame_admin.tpl' );
    }
    //END SEARCH
    
}
