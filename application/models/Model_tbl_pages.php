<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_tbl_pages extends MY_Model
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
         *     - TRUE:  just the field names of the tbl_pages table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {

        $select_statement = ($this->raw_data) ? 'pg_id,pg_name,pg_description,pg_controller,pg_status' : 'pg_id,pg_name,pg_description,pg_controller,pg_status';
        $this->db->select($select_statement);
        $this->db->from('tbl_pages');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'pg_id', 'tbl_pages', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'pg_id' => $row['pg_id'],
                'pg_name' => $row['pg_name'],
                'pg_description' => $row['pg_description'],
                'pg_controller' => $row['pg_controller'],
                'pg_status' => $row['pg_status'],
            );
        } else {
            return array();
        }
    }


    function insert($data)
    {
        $this->db->insert('tbl_pages', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('pg_id', $id);
        $this->db->update('tbl_pages', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('pg_id', $id);
        } else {
            $this->db->where('pg_id', $id);
        }
        $this->db->delete('tbl_pages');

        $this->db->where('tbl_pages_id', $id);
        $this->db->delete('tbl_permission_tbl_pages');


        $this->db->where('tbl_pages_id', $id);
        $this->db->delete('tbl_permission_tbl_pages');


        $this->db->where('tbl_pages_id', $id);
        $this->db->delete('tbl_permission_tbl_pages');


        $this->db->where('tbl_pages_id', $id);
        $this->db->delete('tbl_permission_tbl_pages');


    }


    function lister($page = FALSE, $showAll = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('pg_id,pg_name,pg_description,pg_controller,pg_status');
        $this->db->from('tbl_pages');
        $this->db->order_by('pg_id', 'DESC');


        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'tbl_pages/index/';
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
                'pg_id' => $row['pg_id'],
                'pg_name' => $row['pg_name'],
                'pg_description' => $row['pg_description'],
                'pg_controller' => $row['pg_controller'],
                'pg_status' => $row['pg_status'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('pg_id,pg_name,pg_description,pg_controller,pg_status');
        $this->db->from('tbl_pages');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_tbl_pages.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        $this->db->where('pg_id LIKE "%' . $keyword . '%"');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'tbl_pages/search/' . $keyword . '/';
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
                'pg_id' => $row['pg_id'],
                'pg_name' => $row['pg_name'],
                'pg_description' => $row['pg_description'],
                'pg_controller' => $row['pg_controller'],
                'pg_status' => $row['pg_status'],
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
            'pg_id' => lang('pg_id'),
            'pg_name' => lang('pg_name'),
            'pg_description' => lang('pg_description'),
            'pg_controller' => lang('pg_controller'),
            'pg_status' => lang('pg_status')
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

        $metadata = $this->explain_table->parse('tbl_pages');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    //START DATA GRID CRUD
    function insertGrid($data)
    {
        try {
            $this->db->insert('tbl_pages', $data);
            $insertedId = $this->db->insert_id();
            if (!$insertedId) {
                throw new Exception('error in query');
                return 'error';
            } else {
                return $insertedId;
            }
        } catch (Exception $e) {
            return 'error';
        }
    }

    function updateGrid($data)
    {
        // id should be primary key
        $id = $data['pg_id'];
        $this->db->where('pg_id', $id);
        $this->db->update('tbl_pages', $data);
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }


    function deleteGrid($id)
    {
        $this->db->where('pg_id', $id);
        $this->db->delete('tbl_pages');
        return ($this->db->affected_rows() > 0) ? $id : 'error';
    }

    function listerGrid()
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('pg_id,pg_name,pg_description,pg_controller,pg_status');
        $this->db->from('tbl_pages');
        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        $query = $this->db->get();
        $temp_result = array();
        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'pg_id' => $row['pg_id'],
                'pg_name' => $row['pg_name'],
                'pg_description' => $row['pg_description'],
                'pg_controller' => $row['pg_controller'],
                'pg_status' => $row['pg_status'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }
    //END DATA GRID CRUD
}
