<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_employee' ); 
		
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
        $this->model_employee->pagination( TRUE );
		$data_info = $this->model_employee->lister( $page, $showAll);
        //display or hide "show all" button on list page
        if(isset($showAll) && !empty($showAll)){
            //hide button
            $this->template->assign( 'showall', 1);
        }else{
            //display button
             $this->template->assign( 'showall', 0);
        }
        $fields = $this->model_employee->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_employee->pager );
		$this->template->assign( 'employee_fields', $fields );
		$this->template->assign( 'employee_data', $data_info );
        $this->template->assign( 'table_name', lang('employee' ));
        $this->template->assign( 'template', 'list_employee' );
        $this->template->assign( 'page_title', lang('employee' ));
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_employee->get( $id );
        if(isset($data) && !empty($data)){
            $fields = $this->model_employee->fields( TRUE );
            

            
            $this->template->assign( 'id', $id );
    		$this->template->assign( 'employee_fields', $fields );
    		$this->template->assign( 'employee_data', $data );
    		$this->template->assign( 'table_name', lang('employee' ));
    		$this->template->assign( 'template', 'show_employee' );
            $this->template->assign( 'page_title', lang('employee' ));
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
                $fields = $this->model_employee->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'employee_fields', $fields );
                $this->template->assign( 'metadata', $this->model_employee->metadata() );
        		$this->template->assign( 'table_name', lang('employee' ));
        		$this->template->assign( 'template', 'form_employee' );
                $this->template->assign( 'page_title', lang('employee' ));
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO employee table
             */
            case 'POST':
                $fields = $this->model_employee->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'firstName', lang('firstName'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'lastName', lang('lastName'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'title', lang('title'), 'max_length[45]' );
				$this->form_validation->set_rules( 'telephone', lang('telephone'), 'max_length[45]' );
				$this->form_validation->set_rules( 'location', lang('location'), 'max_length[45]' );

				$data_post['firstName'] = $this->input->post( 'firstName' );
				$data_post['lastName'] = $this->input->post( 'lastName' );
				$data_post['title'] = $this->input->post( 'title' );
				$data_post['telephone'] = $this->input->post( 'telephone' );
				$data_post['location'] = $this->input->post( 'location' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'employee_data', $data_post );
            		$this->template->assign( 'employee_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_employee->metadata() );
            		$this->template->assign( 'table_name', lang('employee'));
            		$this->template->assign( 'template', 'form_employee' );
                    $this->template->assign( 'page_title', lang('employee' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_employee->insert( $data_post );
                    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
					redirect( 'employee' );
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
                $this->model_employee->raw_data = TRUE;
        		$data = $this->model_employee->get( $id );
                if(isset($data) && !empty($data)){
                    $fields = $this->model_employee->fields();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
            		$this->template->assign( 'employee_data', $data );
            		$this->template->assign( 'employee_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_employee->metadata() );
            		$this->template->assign( 'table_name', lang('employee'));
            		$this->template->assign( 'template', 'form_employee' );
            		$this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('employee'));
            		$this->template->display( 'frame_admin.tpl' );
                }else{
                    redirect("notfound");
                }
            break;
    
            case 'POST':
    
                $fields = $this->model_employee->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'firstName', lang('firstName'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'lastName', lang('lastName'), 'required|max_length[45]' );
				$this->form_validation->set_rules( 'title', lang('title'), 'max_length[45]' );
				$this->form_validation->set_rules( 'telephone', lang('telephone'), 'max_length[45]' );
				$this->form_validation->set_rules( 'location', lang('location'), 'max_length[45]' );

				$data_post['firstName'] = $this->input->post( 'firstName' );
				$data_post['lastName'] = $this->input->post( 'lastName' );
				$data_post['title'] = $this->input->post( 'title' );
				$data_post['telephone'] = $this->input->post( 'telephone' );
				$data_post['location'] = $this->input->post( 'location' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'employee_data', $data_post );
            		$this->template->assign( 'employee_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_employee->metadata() );
            		$this->template->assign( 'table_name', lang('employee' ));
            		$this->template->assign( 'template', 'form_employee' );
        		    $this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('employee' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_employee->update( $id, $data_post );
				    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
					redirect( 'employee/show/' . $id );   
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
                $this->model_employee->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_employee->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
    //START NAVIGATION
    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page=false){
        $this->model_employee->raw_data = TRUE;
        $data = $this->model_employee->get( $id, false, $direction);
        //var_dump($data);
        if(isset($data) && !empty($data)){                    
            $this->template->assign( 'record_id', $data['idEmployee']);
            $this->template->assign( 'id', $data['idEmployee']);           
        }else{
            //redirect("notfound");
            $data = $this->model_employee->get( $id, false, false);                    
            $this->template->assign( 'direction', $direction ); 
            $this->template->assign( 'record_id', $id);
            $this->template->assign( 'id', $id);
        }
             
                  
             $fields = $this->model_employee->fields();          
            $this->template->assign( 'action_mode', $page);
            $this->template->assign( 'employee_data', $data );
            $this->template->assign( 'employee_fields', $fields );
            $this->template->assign( 'metadata', $this->model_employee->metadata() );
            $this->template->assign( 'table_name', lang('employee'));
            if($page=='show'){
                $this->template->assign( 'template', 'show_employee' );
            }else{
                $this->template->assign( 'action_mode', 'edit' );
                $this->template->assign( 'template', 'form_employee' );
            }
            $this->template->assign( 'page_title', lang('employee'));
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
        $this->model_employee->pagination( TRUE );
        $data_info = $this->model_employee->search($keyword, $page );
        $fields = $this->model_employee->fields( TRUE );
        
         //hide show all button on list page
        $this->template->assign( 'showall', 1);
        $this->template->assign( 'search_form', $this->displaySearchForm());
        $this->template->assign( 'pager', $this->model_employee->pager );
        $this->template->assign( 'employee_fields', $fields );
        $this->template->assign( 'employee_data', $data_info );
        $this->template->assign( 'table_name', lang('employee' ));
        $this->template->assign( 'template', 'list_employee' );
        $this->template->assign( 'page_title', lang('employee') );
        
        $this->template->display( 'frame_admin.tpl' );
    }
    //END SEARCH
    
}
