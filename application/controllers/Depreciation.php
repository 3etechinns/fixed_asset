<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Depreciation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_depreciation');

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


        $this->model_depreciation->pagination(TRUE);
        $data_info = $this->model_depreciation->lister($page, $showAll);
        //display or hide "show all" button on list page
        if (isset($showAll) && !empty($showAll)) {
            //hide button
            $this->template->assign('showall', 1);
        } else {
            //display button
            $this->template->assign('showall', 0);
        }
        $fields = $this->model_depreciation->fields(TRUE);


        $this->template->assign('pager', $this->model_depreciation->pager);
        $this->template->assign('depreciation_fields', $fields);
        $this->template->assign('depreciation_data', $data_info);
        $this->template->assign('table_name', lang('depreciation'));
        $this->template->assign('template', 'list_depreciation');
        $this->template->assign('page_title', lang('depreciation'));

        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_depreciation->get($id);

        if (isset($data) && !empty($data)) {
            $fields = $this->model_depreciation->fields(TRUE);


            $this->template->assign('id', $id);
            $this->template->assign('depreciation_fields', $fields);
            $this->template->assign('depreciation_data', $data);
            $this->template->assign('table_name', lang('depreciation'));
            $this->template->assign('template', 'show_depreciation');
            $this->template->assign('page_title', lang('depreciation'));
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
                $fields = $this->model_depreciation->fields();
                $asset_set = $this->model_depreciation->related_asset();

                $this->template->assign('related_asset', $asset_set);


                $this->template->assign('action_mode', 'create');
                $this->template->assign('depreciation_fields', $fields);
                $this->template->assign('metadata', $this->model_depreciation->metadata());
                $this->template->assign('table_name', lang('depreciation'));
                $this->template->assign('template', 'form_depreciation');
                $this->template->assign('page_title', lang('depreciation'));
                $this->template->display('frame_admin.tpl');


                /**
                 *  Insert data TO depreciation table
                 */


                $fields = $this->model_depreciation->fields();
            case 'POST':

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('dep_amount', lang('dep_amount'), 'max_length[45]');
                $this->form_validation->set_rules('dep_date', lang('dep_date'), 'max_length[15]');
                $this->form_validation->set_rules('dep_status', lang('dep_status'), 'max_length[45]');
                $this->form_validation->set_rules('dep_description', lang('dep_description'), 'max_length[445]');
                $this->form_validation->set_rules('dep_commnet', lang('dep_commnet'), 'max_length[405]');
                $this->form_validation->set_rules('asset_ass_id', lang('asset_ass_id'), 'required|max_length[11]|integer');

                $data_post['dep_date'] = $this->input->post('dep_date');
                $data_post['dep_amount'] = $this->input->post('dep_amount');
                $data_post['dep_status'] = $this->input->post('dep_status');
                $data_post['dep_description'] = $this->input->post('dep_description');
                $data_post['dep_commnet'] = $this->input->post('dep_commnet');
                $data_post['asset_ass_id'] = $this->input->post('asset_ass_id');

                if ($this->form_validation->run() == FALSE) {


                    $errors = validation_errors();

                    $asset_set = $this->model_depreciation->related_asset();

                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('depreciation_data', $data_post);
                    $this->template->assign('depreciation_fields', $fields);
                    $this->template->assign('metadata', $this->model_depreciation->metadata());
                    $this->template->assign('table_name', lang('depreciation'));
                    $this->template->assign('template', 'form_depreciation');
                    $this->template->assign('page_title', lang('depreciation'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {


                    $insert_id = $this->model_depreciation->insert($data_post);
                    echo
                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
                    redirect('depreciation');
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
                $this->model_depreciation->raw_data = TRUE;
                $data = $this->model_depreciation->get($id);
                if (isset($data) && !empty($data)) {
                    $fields = $this->model_depreciation->fields();
                    $asset_set = $this->model_depreciation->related_asset();


                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('depreciation_data', $data);
                    $this->template->assign('depreciation_fields', $fields);
                    $this->template->assign('metadata', $this->model_depreciation->metadata());
                    $this->template->assign('table_name', lang('depreciation'));
                    $this->template->assign('template', 'form_depreciation');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('depreciation'));
                    $this->template->display('frame_admin.tpl');
                } else {
                    redirect("notfound");
                }
                break;

            case 'POST':

                $fields = $this->model_depreciation->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('dep_amount', lang('dep_amount'), 'max_length[45]');
                $this->form_validation->set_rules('dep_status', lang('dep_status'), 'max_length[45]');
                $this->form_validation->set_rules('dep_description', lang('dep_description'), 'max_length[445]');
                $this->form_validation->set_rules('dep_commnet', lang('dep_commnet'), 'max_length[405]');
                $this->form_validation->set_rules('asset_ass_id', lang('asset_ass_id'), 'required|max_length[11]|integer');

                $data_post['dep_date'] = $this->input->post('dep_date');
                $data_post['dep_amount'] = $this->input->post('dep_amount');
                $data_post['dep_status'] = $this->input->post('dep_status');
                $data_post['dep_description'] = $this->input->post('dep_description');
                $data_post['dep_commnet'] = $this->input->post('dep_commnet');
                $data_post['asset_ass_id'] = $this->input->post('asset_ass_id');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $asset_set = $this->model_depreciation->related_asset();

                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('depreciation_data', $data_post);
                    $this->template->assign('depreciation_fields', $fields);
                    $this->template->assign('metadata', $this->model_depreciation->metadata());
                    $this->template->assign('table_name', lang('depreciation'));
                    $this->template->assign('template', 'form_depreciation');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('depreciation'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_depreciation->update($id, $data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
                    redirect('depreciation/show/' . $id);
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
                $this->model_depreciation->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_depreciation->delete($this->input->post('delete_ids'));
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
        $this->model_depreciation->raw_data = TRUE;
        $data = $this->model_depreciation->get($id, false, $direction);
        //var_dump($data);
        if (isset($data) && !empty($data)) {
            $this->template->assign('record_id', $data['dep_id']);
            $this->template->assign('id', $data['dep_id']);
        } else {
            //redirect("notfound");
            $data = $this->model_depreciation->get($id, false, false);
            $this->template->assign('direction', $direction);
            $this->template->assign('record_id', $id);
            $this->template->assign('id', $id);
        }


        $fields = $this->model_depreciation->fields();
        $this->template->assign('action_mode', $page);
        $this->template->assign('depreciation_data', $data);
        $this->template->assign('depreciation_fields', $fields);
        $this->template->assign('metadata', $this->model_depreciation->metadata());
        $this->template->assign('table_name', lang('depreciation'));
        if ($page == 'show') {
            $this->template->assign('template', 'show_depreciation');
        } else {
            $this->template->assign('action_mode', 'edit');
            $this->template->assign('template', 'form_depreciation');
        }
        $this->template->assign('page_title', lang('depreciation'));
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
        $this->model_depreciation->pagination(TRUE);
        $data_info = $this->model_depreciation->search($keyword, $page);
        $fields = $this->model_depreciation->fields(TRUE);

        //hide show all button on list page
        $this->template->assign('showall', 1);
        $this->template->assign('search_form', $this->displaySearchForm());
        $this->template->assign('pager', $this->model_depreciation->pager);
        $this->template->assign('depreciation_fields', $fields);
        $this->template->assign('depreciation_data', $data_info);
        $this->template->assign('table_name', lang('depreciation'));
        $this->template->assign('template', 'list_depreciation');
        $this->template->assign('page_title', lang('depreciation'));

        $this->template->display('frame_admin.tpl');
    }
    //END SEARCH

}
