<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_asset_category');

        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('model_auth');
        $this->lang->load('db_fields', 'english');

        //$this->logged_in = $this->model_auth->check( TRUE );
        //$this->template->assign( 'logged_in', $this->logged_in );
    }


    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0, $showAll = false)
    {
        $this->model_asset_category->pagination(TRUE);
        $data_info = $this->model_asset_category->lister($page, $showAll);
        //display or hide "show all" button on list page
        if (isset($showAll) && !empty($showAll)) {
            //hide button
            $this->template->assign('showall', 1);
        } else {
            //display button
            $this->template->assign('showall', 0);
        }
        $fields = $this->model_asset_category->fields(TRUE);


        $this->template->assign('pager', $this->model_asset_category->pager);
        $this->template->assign('asset_category_fields', $fields);
        $this->template->assign('asset_category_data', $data_info);
        $this->template->assign('table_name', lang('asset_category'));
        $this->template->assign('template', 'list_asset_category');
        $this->template->assign('page_title', lang('asset_category'));

        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_asset_category->get($id);
        if (isset($data) && !empty($data)) {
            $fields = $this->model_asset_category->fields(TRUE);


            $this->template->assign('id', $id);
            $this->template->assign('asset_category_fields', $fields);
            $this->template->assign('asset_category_data', $data);
            $this->template->assign('table_name', lang('asset_category'));
            $this->template->assign('template', 'show_asset_category');
            $this->template->assign('page_title', lang('asset_category'));
            $this->template->display('frame_admin.tpl');
        } else {
            redirect("notfound");
        }
    }


    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */
    function create($id = false)
    {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $fields = $this->model_asset_category->fields();


                $this->template->assign('action_mode', 'create');
                $this->template->assign('asset_category_fields', $fields);
                $this->template->assign('metadata', $this->model_asset_category->metadata());
                $this->template->assign('table_name', lang('asset_category'));
                $this->template->assign('template', 'form_asset_category');
                $this->template->assign('page_title', lang('asset_category'));
                $this->template->display('frame_admin.tpl');
                break;

            /**
             *  Insert data TO asset_category table
             */
            case 'POST':
                $fields = $this->model_asset_category->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('cat_code', lang('cat_code'), 'required|max_length[45]');
                $this->form_validation->set_rules('cat_name', lang('cat_name'), 'required|max_length[45]');
                $this->form_validation->set_rules('depriciation_life', lang('depriciation_life'), 'required|max_length[15]');
//                $this->form_validation->set_rules('sub_category', lang('sub_category'), 'required|max_length[15]');

                $this->form_validation->set_rules('cat_description', lang('cat_description'), 'max_length[445]');
                $this->form_validation->set_rules('cat_status', lang('cat_status'), 'max_length[45]');
//				$this->form_validation->set_rules( 'Asset_ass_id', lang('Asset_ass_id'), 'max_length[11]' );

                $data_post['cat_code'] = $this->input->post('cat_code');
                $data_post['cat_name'] = $this->input->post('cat_name');
                $data_post['depriciation_life'] = $this->input->post('depriciation_life');
                $data_post['cat_description'] = $this->input->post('cat_description');
//                $data_post['sub_category'] = $this->input->post('sub_category');
                if ($this->input->post('cat_status') == "") {
                    $status = 0;
                } else {
                    $status = 1;
                }
                $data_post['cat_status'] = $status;
//				$data_post['Asset_ass_id'] = $this->input->post( 'Asset_ass_id' );

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();


                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('asset_category_data', $data_post);
                    $this->template->assign('asset_category_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset_category->metadata());
                    $this->template->assign('table_name', lang('asset_category'));
                    $this->template->assign('template', 'form_asset_category');
                    $this->template->assign('page_title', lang('asset_category'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $insert_id = $this->model_asset_category->insert($data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
                    redirect('asset_category');
                }
                break;
        }
    }


    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit($id = false)
    {
        $this->load->library('form_validation');
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_asset_category->raw_data = TRUE;
                $data = $this->model_asset_category->get($id);
                if (isset($data) && !empty($data)) {
                    $fields = $this->model_asset_category->fields();


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('asset_category_data', $data);
                    $this->template->assign('asset_category_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset_category->metadata());
                    $this->template->assign('table_name', lang('asset_category'));
                    $this->template->assign('template', 'form_asset_category');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('asset_category'));
                    $this->template->display('frame_admin.tpl');
                } else {
                    redirect("notfound");
                }
                break;

            case 'POST':

                $fields = $this->model_asset_category->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('cat_code', lang('cat_code'), 'required|max_length[45]');
                $this->form_validation->set_rules('cat_name', lang('cat_name'), 'required|max_length[45]');
                $this->form_validation->set_rules('cat_description', lang('cat_description'), 'max_length[445]');
//                $this->form_validation->set_rules('sub_category', lang('sub_category'), 'max_length[445]');
                $this->form_validation->set_rules('cat_status', lang('cat_status'), 'max_length[45]');
//				$this->form_validation->set_rules( 'Asset_ass_id', lang('Asset_ass_id'), 'max_length[11]' );
                $this->form_validation->set_rules('depriciation_life', lang('depriciation_life'), 'max_length[15]');

                $data_post['cat_code'] = $this->input->post('cat_code');
                $data_post['cat_name'] = $this->input->post('cat_name');
                $data_post['cat_description'] = $this->input->post('cat_description');
//                $data_post['sub_category'] = $this->input->post('sub_category');
                $data_post['cat_status'] = $this->input->post('cat_status');
//				$data_post['Asset_ass_id'] = $this->input->post( 'Asset_ass_id' );
                $data_post['depriciation_life'] = $this->input->post('depriciation_life');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('asset_category_data', $data_post);
                    $this->template->assign('asset_category_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset_category->metadata());
                    $this->template->assign('table_name', lang('asset_category'));
                    $this->template->assign('template', 'form_asset_category');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('asset_category'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_asset_category->update($id, $data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
                    redirect('asset_category/show/' . $id);
                }
                break;
        }
    }


    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array
     */
    function delete($id = FALSE)
    {
        switch ($_SERVER ['REQUEST_METHOD']) {
            case 'GET':
                $this->model_asset_category->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_asset_category->delete($this->input->post('delete_ids'));
                redirect($_SERVER['HTTP_REFERER']);
                break;
        }
    }
    //START NAVIGATION

    /**
     *  SHOWS A RECORD VIEW
     */
    function navigate($direction, $id, $page = false)
    {
        $this->model_asset_category->raw_data = TRUE;
        $data = $this->model_asset_category->get($id, false, $direction);
        //var_dump($data);
        if (isset($data) && !empty($data)) {
            $this->template->assign('record_id', $data['cat_id']);
            $this->template->assign('id', $data['cat_id']);
        } else {
            //redirect("notfound");
            $data = $this->model_asset_category->get($id, false, false);
            $this->template->assign('direction', $direction);
            $this->template->assign('record_id', $id);
            $this->template->assign('id', $id);
        }


        $fields = $this->model_asset_category->fields();
        $this->template->assign('action_mode', $page);
        $this->template->assign('asset_category_data', $data);
        $this->template->assign('asset_category_fields', $fields);
        $this->template->assign('metadata', $this->model_asset_category->metadata());
        $this->template->assign('table_name', lang('asset_category'));
        if ($page == 'show') {
            $this->template->assign('template', 'show_asset_category');
        } else {
            $this->template->assign('action_mode', 'edit');
            $this->template->assign('template', 'form_asset_category');
        }
        $this->template->assign('page_title', lang('asset_category'));
        $this->template->display('frame_admin.tpl');
    }
    //END NAVIGATION
    //START SEARCH
    /**
     *  SEARCH MODEL DATA INTO A TABLE
     */
    function search($searchWord = false, $page = 0)
    {
        $keyword = $this->input->post("search") != '' ? $this->input->post("search") : $searchWord;
        $this->model_asset_category->pagination(TRUE);
        $data_info = $this->model_asset_category->search($keyword, $page);
        $fields = $this->model_asset_category->fields(TRUE);

        //hide show all button on list page
        $this->template->assign('showall', 1);
        $this->template->assign('search_form', $this->displaySearchForm());
        $this->template->assign('pager', $this->model_asset_category->pager);
        $this->template->assign('asset_category_fields', $fields);
        $this->template->assign('asset_category_data', $data_info);
        $this->template->assign('table_name', lang('asset_category'));
        $this->template->assign('template', 'list_asset_category');
        $this->template->assign('page_title', lang('asset_category'));

        $this->template->display('frame_admin.tpl');
    }
    //END SEARCH

}
