<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_asset');
        $this->load->model('Model_depreciation');
        $this->load->model('Model_ass_track');


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
        $this->model_asset->pagination(TRUE);
        $data_info = $this->model_asset->lister($page, $showAll);
        //display or hide "show all" button on list page
        if (isset($showAll) && !empty($showAll)) {
            //hide button
            $this->template->assign('showall', 1);
        } else {
            //display button
            $this->template->assign('showall', 0);
        }
        $fields = $this->model_asset->fields(TRUE);


        $this->template->assign('pager', $this->model_asset->pager);
        $this->template->assign('asset_fields', $fields);
        $this->template->assign('asset_data', $data_info);
        $this->template->assign('table_name', lang('asset'));
        $this->template->assign('template', 'list_asset');
        $this->template->assign('page_title', lang('asset'));

        $this->template->display('frame_admin.tpl');
    }


    /**
     *  SHOWS A RECORD VIEW
     */
    function show($id)
    {
        $data = $this->model_asset->get($id);
        $assTrackData = $this->Model_ass_track->get($id);
        $st = $this->Model_depreciation->depreciationDetailById($id);


        if (isset($data) && !empty($data)) {
            $fields = $this->model_asset->fields(TRUE);
            $dep_fields = $this->Model_depreciation->fields(TRUE);
            $ass_track_fields = $this->Model_ass_track->fields(TRUE);
            // $ss = $this->Model_ass_track->fields(TRUE);

            $this->template->assign('id', $id);
            //  $this->template->assign('st', $st);
            $this->template->assign('asset_fields', $fields);
            $this->template->assign('depreciation_fields', $dep_fields);
            $this->template->assign('ass_track_fields', $ass_track_fields);

            $this->template->assign('asset_data', $data);
            $this->template->assign('deep_data', $st);
            $this->template->assign('ass_track_data', $assTrackData);

            $this->template->assign('table_name', lang('asset'));
            $this->template->assign('template', 'show_asset');
            $this->template->assign('page_title', lang('asset'));
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
                $fields = $this->model_asset->fields();
                $status_set = $this->model_asset->related_status();
                $asset_category = $this->model_asset->asset_category();


                $this->template->assign('related_status', $status_set);
                $this->template->assign('asset_category', $asset_category);
//                print_r($asset_category);
//                exit();
                $this->template->assign('action_mode', 'create');
                $this->template->assign('asset_fields', $fields);

                $this->template->assign('metadata', $this->model_asset->metadata());
                $this->template->assign('table_name', lang('asset'));
                $this->template->assign('template', 'form_asset');
                $this->template->assign('page_title', lang('asset'));
                $this->template->display('frame_admin.tpl');
                break;

            /**
             *  Insert data TO asset table
             */
            case 'POST':
                $fields = $this->model_asset->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('ass_status', lang('ass_status'), 'max_length[45]');
                $this->form_validation->set_rules('ass_model', lang('ass_model'), 'max_length[45]');
                $this->form_validation->set_rules('ass_serial_number', lang('ass_serial_number'), 'max_length[45]');
                $this->form_validation->set_rules('ass_barcode_number', lang('ass_barcode_number'), 'max_length[45]');
                $this->form_validation->set_rules('ass_date_acquired', lang('ass_date_acquired'), 'max_length[15]');
                $this->form_validation->set_rules('ass_date_sold', lang('ass_date_sold'), 'max_length[15]');
                $this->form_validation->set_rules('ass_dep_method', lang('ass_dep_method'), 'max_length[45]');
                $this->form_validation->set_rules('ass_dep_life', lang('ass_dep_life'), 'max_length[45]');
                $this->form_validation->set_rules('ass_comment', lang('ass_comment'), 'max_length[445]');
                $this->form_validation->set_rules('ass_description', lang('ass_description'), 'max_length[445]');
                $this->form_validation->set_rules('status_status_id', lang('status_status_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('ass_cat_id', lang('ass_cat_id'), 'required|max_length[11]|integer');

                $data_post['ass_status'] = $this->input->post('ass_status');
                $data_post['ass_model'] = $this->input->post('ass_model');
                $data_post['ass_serial_number'] = $this->input->post('ass_serial_number');
                $data_post['ass_barcode_number'] = $this->input->post('ass_barcode_number');
                $data_post['ass_date_acquired'] = $this->input->post('ass_date_acquired');
                $data_post['ass_date_sold'] = $this->input->post('ass_date_sold');
                $data_post['ass_purchase_price'] = $this->input->post('ass_purchase_price');
                $data_post['ass_dep_method'] = $this->input->post('ass_dep_method');
                $data_post['ass_dep_life'] = $this->input->post('ass_dep_life');
                $data_post['ass_cat_id'] = $this->input->post('ass_cat_id');
                $data_post['ass_comment'] = $this->input->post('ass_comment');
                $data_post['ass_description'] = $this->input->post('ass_description');
                $data_post['status_status_id'] = $this->input->post('status_status_id');

                $data_for_depreciation['ass_cat_id'] = $this->input->post('ass_cat_id');
                $data_for_depreciation['ass_purchase_price'] = $this->input->post('ass_purchase_price');
                $data_for_depreciation['ass_date_acquired'] = $this->input->post('ass_date_acquired');


                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $status_set = $this->model_asset->related_status();

                    $this->template->assign('related_status', $status_set);


                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'create');
                    $this->template->assign('asset_data', $data_post);
                    $this->template->assign('asset_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset->metadata());
                    $this->template->assign('table_name', lang('asset'));
                    $this->template->assign('template', 'form_asset');
                    $this->template->assign('page_title', lang('asset'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $insert_id = $this->model_asset->insert($data_post);
                    if ($insert_id != null) {
                        $data_for_depreciation['asset_as_id'] = $insert_id;
                        $this->Model_depreciation->depreciationInitializer($data_for_depreciation);

                        $this->session->set_userdata('msg_type', 'success');
                        $this->session->set_userdata('msg', 'New Record added Successfully!');
                        redirect('asset');
                    }
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
                $this->model_asset->raw_data = TRUE;
                $data = $this->model_asset->get($id);
                if (isset($data) && !empty($data)) {
                    $fields = $this->model_asset->fields();
                    $status_set = $this->model_asset->related_status();


                    $this->template->assign('related_status', $status_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('asset_data', $data);
                    $this->template->assign('asset_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset->metadata());
                    $this->template->assign('table_name', lang('asset'));
                    $this->template->assign('template', 'form_asset');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('asset'));
                    $this->template->display('frame_admin.tpl');
                } else {
                    redirect("notfound");
                }
                break;

            case 'POST':

                $fields = $this->model_asset->fields();
                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('ass_status', lang('ass_status'), 'max_length[45]');
                $this->form_validation->set_rules('ass_model', lang('ass_model'), 'max_length[45]');
                $this->form_validation->set_rules('ass_serial_number', lang('ass_serial_number'), 'max_length[45]');
                $this->form_validation->set_rules('ass_barcode_number', lang('ass_barcode_number'), 'max_length[45]');
                $this->form_validation->set_rules('ass_date_acquired', lang('ass_date_acquired'), 'max_length[15]');
                $this->form_validation->set_rules('ass_date_sold', lang('ass_date_sold'), 'max_length[15]');
                $this->form_validation->set_rules('ass_dep_method', lang('ass_dep_method'), 'max_length[45]');
                $this->form_validation->set_rules('ass_dep_life', lang('ass_dep_life'), 'max_length[45]');
                $this->form_validation->set_rules('ass_comment', lang('ass_comment'), 'max_length[45]');
                $this->form_validation->set_rules('ass_description', lang('ass_description'), 'max_length[445]');
                $this->form_validation->set_rules('status_status_id', lang('status_status_id'), 'required|max_length[11]|integer');
                $this->form_validation->set_rules('ass_cat_id', lang('ass_cat_id'), 'required|max_length[11]|integer');

                $data_post['ass_status'] = $this->input->post('ass_status');
                $data_post['ass_model'] = $this->input->post('ass_model');
                $data_post['ass_serial_number'] = $this->input->post('ass_serial_number');
                $data_post['ass_barcode_number'] = $this->input->post('ass_barcode_number');
                $data_post['ass_date_acquired'] = $this->input->post('ass_date_acquired');
                $data_post['ass_date_sold'] = $this->input->post('ass_date_sold');
                $data_post['ass_purchase_price'] = $this->input->post('ass_purchase_price');
                $data_post['ass_dep_method'] = $this->input->post('ass_dep_method');
                $data_post['ass_dep_life'] = $this->input->post('ass_dep_life');
                $data_post['ass_cat_id'] = $this->input->post('ass_cat_id');
                $data_post['ass_comment'] = $this->input->post('ass_comment');
                $data_post['ass_description'] = $this->input->post('ass_description');
                $data_post['status_status_id'] = $this->input->post('status_status_id');

                if ($this->form_validation->run() == FALSE) {
                    $errors = validation_errors();

                    $status_set = $this->model_asset->related_status();

                    $this->template->assign('related_status', $status_set);


                    $this->template->assign('action_mode', 'edit');
                    $this->template->assign('errors', $errors);
                    $this->template->assign('asset_data', $data_post);
                    $this->template->assign('asset_fields', $fields);
                    $this->template->assign('metadata', $this->model_asset->metadata());
                    $this->template->assign('table_name', lang('asset'));
                    $this->template->assign('template', 'form_asset');
                    $this->template->assign('record_id', $id);
                    $this->template->assign('page_title', lang('asset'));
                    $this->template->display('frame_admin.tpl');
                } elseif ($this->form_validation->run() == TRUE) {
                    $this->model_asset->update($id, $data_post);

                    $this->session->set_userdata('msg_type', 'success');
                    $this->session->set_userdata('msg', 'Successfully Updated!');
                    redirect('asset/show/' . $id);
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
                $this->model_asset->delete($id);
                redirect($_SERVER['HTTP_REFERER']);
                break;

            case 'POST':
                $this->model_asset->delete($this->input->post('delete_ids'));
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
        $this->model_asset->raw_data = TRUE;
        $data = $this->model_asset->get($id, false, $direction);
        //var_dump($data);
        if (isset($data) && !empty($data)) {
            $this->template->assign('record_id', $data['ass_id']);
            $this->template->assign('id', $data['ass_id']);
        } else {
            //redirect("notfound");
            $data = $this->model_asset->get($id, false, false);
            $this->template->assign('direction', $direction);
            $this->template->assign('record_id', $id);
            $this->template->assign('id', $id);
        }


        $fields = $this->model_asset->fields();
        $this->template->assign('action_mode', $page);
        $this->template->assign('asset_data', $data);
        $this->template->assign('asset_fields', $fields);
        $this->template->assign('metadata', $this->model_asset->metadata());
        $this->template->assign('table_name', lang('asset'));
        if ($page == 'show') {
            $this->template->assign('template', 'show_asset');
        } else {
            $this->template->assign('action_mode', 'edit');
            $this->template->assign('template', 'form_asset');
        }
        $this->template->assign('page_title', lang('asset'));
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
        $this->model_asset->pagination(TRUE);
        $data_info = $this->model_asset->search($keyword, $page);
        $fields = $this->model_asset->fields(TRUE);

        //hide show all button on list page
        $this->template->assign('showall', 1);
        $this->template->assign('search_form', $this->displaySearchForm());
        $this->template->assign('pager', $this->model_asset->pager);
        $this->template->assign('asset_fields', $fields);
        $this->template->assign('asset_data', $data_info);
        $this->template->assign('table_name', lang('asset'));
        $this->template->assign('template', 'list_asset');
        $this->template->assign('page_title', lang('asset'));

        $this->template->display('frame_admin.tpl');
    }
    //END SEARCH

}
