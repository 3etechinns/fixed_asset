<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_users extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_tbl_users' ); 
		
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
        $this->model_tbl_users->pagination( TRUE );
		$data_info = $this->model_tbl_users->lister( $page, $showAll);
        //display or hide "show all" button on list page
        if(isset($showAll) && !empty($showAll)){
            //hide button
            $this->template->assign( 'showall', 1);
        }else{
            //display button
             $this->template->assign( 'showall', 0);
        }
        $fields = $this->model_tbl_users->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_tbl_users->pager );
		$this->template->assign( 'tbl_users_fields', $fields );
		$this->template->assign( 'tbl_users_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_users' ));
        $this->template->assign( 'template', 'list_tbl_users' );
        $this->template->assign( 'page_title', lang('tbl_users' ));
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_tbl_users->get( $id );
        if(isset($data) && !empty($data)){
            $fields = $this->model_tbl_users->fields( TRUE );
            

            
            $this->template->assign( 'id', $id );
    		$this->template->assign( 'tbl_users_fields', $fields );
    		$this->template->assign( 'tbl_users_data', $data );
    		$this->template->assign( 'table_name', lang('tbl_users' ));
    		$this->template->assign( 'template', 'show_tbl_users' );
            $this->template->assign( 'page_title', lang('tbl_users' ));
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
                $fields = $this->model_tbl_users->fields();
                $tbl_roles_set = $this->model_tbl_users->related_tbl_roles();

                $this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'tbl_users_fields', $fields );
                $this->template->assign( 'metadata', $this->model_tbl_users->metadata() );
        		$this->template->assign( 'table_name', lang('tbl_users' ));
        		$this->template->assign( 'template', 'form_tbl_users' );
                $this->template->assign( 'page_title', lang('tbl_users' ));
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO tbl_users table
             */
            case 'POST':
                $fields = $this->model_tbl_users->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[128]' );
				$this->form_validation->set_rules( 'password', lang('password'), 'required|max_length[128]' );
				$this->form_validation->set_rules( 'name', lang('name'), '128' );
				$this->form_validation->set_rules( 'mobile', lang('mobile'), '20' );
				$this->form_validation->set_rules( 'roleId', lang('roleId'), 'required|max_length[4]|integer' );
				$this->form_validation->set_rules( 'isDeleted', lang('isDeleted'), 'required|max_length[4]|integer' );
				$this->form_validation->set_rules( 'createdBy', lang('createdBy'), '11' );
				$this->form_validation->set_rules( 'createdDtm', lang('createdDtm'), 'required' );
				$this->form_validation->set_rules( 'updatedBy', lang('updatedBy'), '11' );

				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['mobile'] = $this->input->post( 'mobile' );
				$data_post['roleId'] = $this->input->post( 'roleId' );
				$data_post['isDeleted'] = $this->input->post( 'isDeleted' );
				$data_post['createdBy'] = $this->input->post( 'createdBy' );
				$data_post['createdDtm'] = $this->input->post( 'createdDtm' );
				$data_post['updatedBy'] = $this->input->post( 'updatedBy' );
				$data_post['updatedDtm'] = $this->input->post( 'updatedDtm' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $tbl_roles_set = $this->model_tbl_users->related_tbl_roles();

                    $this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'tbl_users_data', $data_post );
            		$this->template->assign( 'tbl_users_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_users->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_users'));
            		$this->template->assign( 'template', 'form_tbl_users' );
                    $this->template->assign( 'page_title', lang('tbl_users' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_tbl_users->insert( $data_post );
                    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
					redirect( 'tbl_users' );
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
                $this->model_tbl_users->raw_data = TRUE;
        		$data = $this->model_tbl_users->get( $id );
                if(isset($data) && !empty($data)){
                    $fields = $this->model_tbl_users->fields();
                    $tbl_roles_set = $this->model_tbl_users->related_tbl_roles();

                    
                    $this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
            		$this->template->assign( 'tbl_users_data', $data );
            		$this->template->assign( 'tbl_users_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_users->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_users'));
            		$this->template->assign( 'template', 'form_tbl_users' );
            		$this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_users'));
            		$this->template->display( 'frame_admin.tpl' );
                }else{
                    redirect("notfound");
                }
            break;
    
            case 'POST':
    
                $fields = $this->model_tbl_users->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[128]' );
				$this->form_validation->set_rules( 'password', lang('password'), 'required|max_length[128]' );
				$this->form_validation->set_rules( 'name', lang('name'), '128' );
				$this->form_validation->set_rules( 'mobile', lang('mobile'), '20' );
				$this->form_validation->set_rules( 'roleId', lang('roleId'), 'required|max_length[4]|integer' );
				$this->form_validation->set_rules( 'isDeleted', lang('isDeleted'), 'required|max_length[4]|integer' );
				$this->form_validation->set_rules( 'createdBy', lang('createdBy'), '11' );
				$this->form_validation->set_rules( 'createdDtm', lang('createdDtm'), 'required' );
				$this->form_validation->set_rules( 'updatedBy', lang('updatedBy'), '11' );

				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['mobile'] = $this->input->post( 'mobile' );
				$data_post['roleId'] = $this->input->post( 'roleId' );
				$data_post['isDeleted'] = $this->input->post( 'isDeleted' );
				$data_post['createdBy'] = $this->input->post( 'createdBy' );
				$data_post['createdDtm'] = $this->input->post( 'createdDtm' );
				$data_post['updatedBy'] = $this->input->post( 'updatedBy' );
				$data_post['updatedDtm'] = $this->input->post( 'updatedDtm' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    $tbl_roles_set = $this->model_tbl_users->related_tbl_roles();

                    $this->template->assign( 'related_tbl_roles', $tbl_roles_set );

                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'tbl_users_data', $data_post );
            		$this->template->assign( 'tbl_users_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_tbl_users->metadata() );
            		$this->template->assign( 'table_name', lang('tbl_users' ));
            		$this->template->assign( 'template', 'form_tbl_users' );
        		    $this->template->assign( 'record_id', $id );
                    $this->template->assign( 'page_title', lang('tbl_users' ));
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_tbl_users->update( $id, $data_post );
				    
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
					redirect( 'tbl_users/show/' . $id );   
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
                $this->model_tbl_users->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_tbl_users->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
    //START NAVIGATION
    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page=false){
        $this->model_tbl_users->raw_data = TRUE;
        $data = $this->model_tbl_users->get( $id, false, $direction);
        //var_dump($data);
        if(isset($data) && !empty($data)){                    
            $this->template->assign( 'record_id', $data['userId']);
            $this->template->assign( 'id', $data['userId']);           
        }else{
            //redirect("notfound");
            $data = $this->model_tbl_users->get( $id, false, false);                    
            $this->template->assign( 'direction', $direction ); 
            $this->template->assign( 'record_id', $id);
            $this->template->assign( 'id', $id);
        }
             
                  
             $fields = $this->model_tbl_users->fields();          
            $this->template->assign( 'action_mode', $page);
            $this->template->assign( 'tbl_users_data', $data );
            $this->template->assign( 'tbl_users_fields', $fields );
            $this->template->assign( 'metadata', $this->model_tbl_users->metadata() );
            $this->template->assign( 'table_name', lang('tbl_users'));
            if($page=='show'){
                $this->template->assign( 'template', 'show_tbl_users' );
            }else{
                $this->template->assign( 'action_mode', 'edit' );
                $this->template->assign( 'template', 'form_tbl_users' );
            }
            $this->template->assign( 'page_title', lang('tbl_users'));
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
        $this->model_tbl_users->pagination( TRUE );
        $data_info = $this->model_tbl_users->search($keyword, $page );
        $fields = $this->model_tbl_users->fields( TRUE );
        
         //hide show all button on list page
        $this->template->assign( 'showall', 1);
        $this->template->assign( 'search_result', 'Search result with keyword <b>"'.$keyword.'"</b>' );
        $this->template->assign( 'pager', $this->model_tbl_users->pager );
        $this->template->assign( 'tbl_users_fields', $fields );
        $this->template->assign( 'tbl_users_data', $data_info );
        $this->template->assign( 'table_name', lang('tbl_users' ));
        $this->template->assign( 'template', 'list_tbl_users' );
        $this->template->assign( 'page_title', lang('tbl_users') );
        
        $this->template->display( 'frame_admin.tpl' );
    }
    //END SEARCH
     //START DATA GRID CRUD
    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function listGrid()
    {      
        $data_info = $this->model_tbl_users->listerGrid();
        $resultObject= array(
            "odata.metadata"=>"",
            "value" =>$data_info
        );
        echo json_encode($resultObject);
    }
    function insertGrid(){
        				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['mobile'] = $this->input->post( 'mobile' );
				$data_post['roleId'] = $this->input->post( 'roleId' );
				$data_post['isDeleted'] = $this->input->post( 'isDeleted' );
				$data_post['createdBy'] = $this->input->post( 'createdBy' );
				$data_post['createdDtm'] = $this->input->post( 'createdDtm' );
				$data_post['updatedBy'] = $this->input->post( 'updatedBy' );
				$data_post['updatedDtm'] = $this->input->post( 'updatedDtm' );

        $insert_id = $this->model_tbl_users->insertGrid( $data_post ); 
        //id should be primary key column name
         echo json_encode(array('userId'=>$insert_id, 'statusCode'=>($insert_id!='error')?200:'error', 'type'=>'save'));
    }
    function updateGrid(){
        //Primary key variable assignment
        $data_post['userId'] = $this->input->post( 'userId');
        				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['name'] = $this->input->post( 'name' );
				$data_post['mobile'] = $this->input->post( 'mobile' );
				$data_post['roleId'] = $this->input->post( 'roleId' );
				$data_post['isDeleted'] = $this->input->post( 'isDeleted' );
				$data_post['createdBy'] = $this->input->post( 'createdBy' );
				$data_post['createdDtm'] = $this->input->post( 'createdDtm' );
				$data_post['updatedBy'] = $this->input->post( 'updatedBy' );
				$data_post['updatedDtm'] = $this->input->post( 'updatedDtm' );

        $update_id = $this->model_tbl_users->updateGrid( $data_post );
        //id should be primary key column name
        echo json_encode(array('userId'=>$update_id, 'statusCode'=>($update_id!='error')?200:'error', 'type'=>'update'));
    }
    
    function deleteGrid(){
        //id should not be changed
        $id=$this->input->post('userId');
        $result= $this->model_tbl_users->deleteGrid( $id);
        echo json_encode(array('userId'=>$result, 'statusCode'=>($result!='error')?200:'error', 'type'=>'delete'));
    }
     //END DATA GRID CRUD
}
