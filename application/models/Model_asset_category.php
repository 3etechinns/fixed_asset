<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_asset_category extends MY_Model
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
         *     - TRUE:  just the field names of the asset_category table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {

        $select_statement = ($this->raw_data) ? 'cat_id,cat_code,cat_name,cat_description,sub_category,cat_status,depriciation_life' : 'cat_id,cat_code,cat_name,cat_description,sub_category,cat_status,depriciation_life';
        $this->db->select($select_statement);
        $this->db->from('asset_category');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'cat_id', 'asset_category', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'cat_id' => $row['cat_id'],
                'cat_code' => $row['cat_code'],
                'cat_name' => $row['cat_name'],
                'cat_description' => $row['cat_description'],
                'sub_category' => $row['sub_category'],
                'cat_status' => $row['cat_status'],
                'depriciation_life' => $row['depriciation_life'],
            );
        } else {
            return array();
        }
    }


    function insert($data)
    {
        $this->db->insert('asset_category', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('cat_id', $id);
        $this->db->update('asset_category', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('cat_id', $id);
        } else {
            $this->db->where('cat_id', $id);
        }
        $this->db->delete('asset_category');

    }


    function lister($page = FALSE, $showAll = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('cat_id,cat_code,cat_name,cat_description,cat_status,sub_category,depriciation_life');
        $this->db->from('asset_category');
        $this->db->order_by('cat_id', 'DESC');


        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'asset_category/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'cat_id' => $row['cat_id'],
                'cat_code' => $row['cat_code'],
                'cat_name' => $row['cat_name'],
                'cat_description' => $row['cat_description'],
                'sub_category' => $row['sub_category'],
                'cat_status' => $row['cat_status'],
                'depriciation_life' => $row['depriciation_life'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('cat_id,cat_code,cat_name,cat_description,cat_status,depriciation_life');
        $this->db->from('asset_category');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_asset_category.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        if (isset($keyword) && !empty($keyword)) {
            $this->db->where('cat_id LIKE "%' . $keyword . '%"');
        }
        $this->selectByDate('cat_id', $this->input->post('startDate'), $this->input->post('endDate'));
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'asset_category/search/' . $keyword . '/';
            $config['uri_segment'] = 4;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'cat_id' => $row['cat_id'],
                'cat_code' => $row['cat_code'],
                'cat_name' => $row['cat_name'],
                'cat_description' => $row['cat_description'],
                'cat_status' => $row['cat_status'],
                'depriciation_life' => $row['depriciation_life'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array(
            'cat_id' => lang('cat_id'),
            'cat_code' => lang('cat_code'),
            'cat_name' => lang('cat_name'),
            'cat_description' => lang('cat_description'),
            'cat_status' => lang('cat_status'),
            'sub_category' => lang('sub_category'),
            'depriciation_life' => lang('depriciation_life')
        );

        if ($withID == FALSE) {
            unset($fs[0]);
        }
        return $fs;
    }


    function pagination($bool)
    {
        $this->pagination_enabled = ($bool === TRUE) ? TRUE : FALSE;
    }


    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */
    function metadata()
    {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse('asset_category');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }
}
