<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ass_track extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_ass_track');

        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('model_auth');
        $this->load->model('Model_employee');
        $this->lang->load('db_fields', 'english');

        //$this->logged_in = $this->model_auth->check( TRUE );
        //$this->template->assign( 'logged_in', $this->logged_in );
    }


    /**
     *  LISTS MODEL DATA INTO A TABLE
     */
    function index($page = 0, $showAll = false)
    {
        $this->model_ass_track->pagination(TRUE);
        $data_info = $this->model_ass_track->lister($page, $showAll);
        //display or hide "show all" button on list page
        if (isset($showAll) && !empty($showAll)) {
            //hide button
            $this->template->assign('showall', 1);
        } else {
            //display button
            $this->template->assign('showall', 0);
        }
        $fields = $this->model_ass_track->fields(TRUE);


        $this->template->assign('pager', $this->model_ass_track->pager);
        $this->template->assign('ass_track_fields', $fields);
        $this->template->assign('ass_track_data', $data_info);
        $this->template->assign('table_name', lang('ass_track'));
        $this->template->assign('template', 'list_ass_track');
        $this->template->assign('page_title', lang('ass_track'));

        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_ass_track->get($id);
        if (isset($data) && !empty($data)) {
            $fields = $this->model_ass_track->fields(TRUE);


            $this->template->assign('id', $id);
            $this->template->assign('ass_track_fields', $fields);
            $this->template->assign('ass_track_data', $data);
            $this->template->assign('table_name', lang('ass_track'));
            $this->template->assign('template', 'show_ass_track');
            $this->template->assign('page_title', lang('ass_track'));
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
                $fields = $this->model_ass_track->fields();
                $asset_set = $this->model_ass_track->related_asset();

                $this->template->assign('related_asset', $asset_set);


                $this->template->assign('action_mode', 'create');
                $this->template->assign('ass_track_fields', $fields);
                $this->template->assign('metadata', $this->model_ass_track->metadata());
                $this->template->assign('table_name', lang('ass_track'));
                $this->template->assign('template', 'form_ass_track');
                $this->template->assign('page_title', lang('ass_track'));
                $this->template->display('frame_admin.tpl');
                break;

            /**
             *  Insert data TO ass_track table
             */
            case 'POST':
                $fields = $this->model_ass_track->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('date_trasferred', lang('date_trasferred'), 'max_length[15]');
                $this->form_validation->set_rules('date_returned', lang('date_returned'), 'max_length[15]');
                $this->form_validation->set_rules('payment_status', lang('payment_status'), 'max_length[1]');
                $this->form_validation->set_rules('payment_date', lang('payment_date'), 'max_length[15]');
                $this->form_validation->set_rules('Asset_ass_id', lang('Asset_ass_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('ass_emp_id', lang('ass_emp_id'), 'required|max_length[45]');
                $this->form_validation->set_rules('receiving_employee_id', lang('receiving_employee_id'), 'required|max_length[45]');

                $data_post['date_trasferred'] = $this->input->post('date_trasferred');
                $data_post['date_returned'] = $this->input->post('date_returned');
                $data_post['penality_amount'] = $this->input->post('penality_amount');
                $data_post['status'] = $this->input->post('status');
                $data_post['payment_status'] = ($this->input->post('payment_status') == FALSE) ? 0 : $this->input->post('payment_status');
                $data_post['payment_date'] = $this->input->post('payment_date');
                $data_post['Asset_ass_id'] = $this->input->post('Asset_ass_id');
                $data_post['ass_emp_id'] = $this->input->post('employeHiddenId');
                $data_post['receiving_employee_id'] = $this->input->post('reciverHiddenId');
                $data_post['reciver_full_name'] = $this->input->post('receiving_employee_id');
                $data_post['employee_full_name'] = $this->input->post('ass_emp_id');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $asset_set = $this->model_ass_track->related_asset();

                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('ass_track_data', $data_post);
                    $this->template->assign('ass_track_fields', $fields);
                    $this->template->assign('metadata', $this->model_ass_track->metadata());
                    $this->template->assign('table_name', lang('ass_track'));
                    $this->template->assign('template', 'form_ass_track');
                    $this->template->assign('page_title', lang('ass_track'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $insert_id = $this->model_ass_track->insert($data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'New Record added Successfully!');
                    redirect('ass_track');
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
                $this->model_ass_track->raw_data = TRUE;
                $data = $this->model_ass_track->get($id);
                if (isset($data) && !empty($data)) {
                    $fields = $this->model_ass_track->fields();
                    $asset_set = $this->model_ass_track->related_asset();


                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('ass_track_data', $data);
                    $this->template->assign('ass_track_fields', $fields);
                    $this->template->assign('metadata', $this->model_ass_track->metadata());
                    $this->template->assign('table_name', lang('ass_track'));
                    $this->template->assign('template', 'form_ass_track');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('ass_track'));
                    $this->template->display('frame_admin.tpl');
                } else {
                    redirect("notfound");
                }
                break;

            case 'POST':

                $fields = $this->model_ass_track->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('date_trasferred', lang('date_trasferred'), 'max_length[15]');
                $this->form_validation->set_rules('date_returned', lang('date_returned'), 'max_length[15]');
                $this->form_validation->set_rules('payment_status', lang('payment_status'), 'max_length[1]');
                $this->form_validation->set_rules('payment_date', lang('payment_date'), 'max_length[15]');
                $this->form_validation->set_rules('Asset_ass_id', lang('Asset_ass_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('ass_emp_id', lang('ass_emp_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('receiving_employee_id', lang('receiving_employee_id'), 'required|max_length[11]|integer');

                $data_post['date_trasferred'] = $this->input->post('date_trasferred');
                $data_post['date_returned'] = $this->input->post('date_returned');
                $data_post['penality_amount'] = $this->input->post('penality_amount');
                $data_post['status'] = $this->input->post('status');
                $data_post['payment_status'] = ($this->input->post('payment_status') == FALSE) ? 0 : $this->input->post('payment_status');
                $data_post['payment_date'] = $this->input->post('payment_date');
                $data_post['Asset_ass_id'] = $this->input->post('Asset_ass_id');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $asset_set = $this->model_ass_track->related_asset();

                    $this->template->assign('related_asset', $asset_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('ass_track_data', $data_post);
                    $this->template->assign('ass_track_fields', $fields);
                    $this->template->assign('metadata', $this->model_ass_track->metadata());
                    $this->template->assign('table_name', lang('ass_track'));
                    $this->template->assign('template', 'form_ass_track');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('ass_track'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_ass_track->update($id, $data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
                    redirect('ass_track/show/' . $id);
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
                $this->model_ass_track->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_ass_track->delete($this->input->post('delete_ids'));
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
        $this->model_ass_track->raw_data = TRUE;
        $data = $this->model_ass_track->get($id, false, $direction);
        //var_dump($data);
        if (isset($data) && !empty($data)) {
            $this->template->assign('record_id', $data['ass_track_id']);
            $this->template->assign('id', $data['ass_track_id']);
        } else {
            //redirect("notfound");
            $data = $this->model_ass_track->get($id, false, false);
            $this->template->assign('direction', $direction);
            $this->template->assign('record_id', $id);
            $this->template->assign('id', $id);
        }


        $fields = $this->model_ass_track->fields();
        $this->template->assign('action_mode', $page);
        $this->template->assign('ass_track_data', $data);
        $this->template->assign('ass_track_fields', $fields);
        $this->template->assign('metadata', $this->model_ass_track->metadata());
        $this->template->assign('table_name', lang('ass_track'));
        if ($page == 'show') {
            $this->template->assign('template', 'show_ass_track');
        } else {
            $this->template->assign('action_mode', 'edit');
            $this->template->assign('template', 'form_ass_track');
        }
        $this->template->assign('page_title', lang('ass_track'));
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
        $this->model_ass_track->pagination(TRUE);
        $data_info = $this->model_ass_track->search($keyword, $page);
        $fields = $this->model_ass_track->fields(TRUE);

        //hide show all button on list page
        $this->template->assign('showall', 1);
        $this->template->assign('search_form', $this->displaySearchForm());
        $this->template->assign('pager', $this->model_ass_track->pager);
        $this->template->assign('ass_track_fields', $fields);
        $this->template->assign('ass_track_data', $data_info);
        $this->template->assign('table_name', lang('ass_track'));
        $this->template->assign('template', 'list_ass_track');
        $this->template->assign('page_title', lang('ass_track'));

        $this->template->display('frame_admin.tpl');
    }

    //END SEARCH

    function searchEmployeeForAutocomplete()
    {
//        $keyword = strval($_POST['query']);
//        $search_param = "{$keyword}%";
        $data_info = $this->Model_employee->searchEmployee();
        echo json_encode($data_info,JSON_NUMERIC_CHECK);


    }


}
