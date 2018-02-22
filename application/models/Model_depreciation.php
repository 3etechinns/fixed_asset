<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_depreciation extends MY_Model
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
         *     - TRUE:  just the field names of the depreciation table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {


        $select_statement = ($this->raw_data) ? 'dep_id,dep_date,dep_amount,dep_status,dep_description,dep_commnet,asset_ass_id,book_value,accumulative_value' : 'dep_id,dep_date,dep_amount,dep_status,dep_description,dep_commnet,book_value,accumulative_value,asset.ass_serial_number AS asset_ass_id';
        $this->db->select($select_statement);
        $this->db->from('depreciation');
        $this->db->join('asset', 'depreciation.asset_ass_id = asset.ass_id', 'left');


        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'dep_id', 'depreciation', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'dep_id' => $row['dep_id'],
                'dep_date' => $row['dep_date'],
                'dep_amount' => $row['dep_amount'],
                'dep_status' => $row['dep_status'],
                'dep_description' => $row['dep_description'],
                'dep_commnet' => $row['dep_commnet'],
                'asset_ass_id' => $row['asset_ass_id'],
                'book_value' => $row['book_value'],
                'accumulative_value' => $row['accumulative_value'],
            );
        } else {
            return array();
        }
        $this->db->close();
    }


    function insert($data)
    {
        $this->db->insert('depreciation', $data);
        return $this->db->insert_id();
    }

    function depreciationDetailById($id)
    {

        $this->db->start_cache();
        $this->db->select('*');
        $this->db->from('depreciation');
        $this->db->where('Asset_ass_id', $id);
        $data = $this->db->get();

//        $this->db->start_cache();
//        $sql = "call `depreciationDetailById` (?)";
//        $execute = $this->db->query($sql, $id);
        //  $temp_result[] = array();
        foreach ($data->result_array() as $row) {
            $temp_result[] = array(
                'dep_id' => $row['dep_id'],
                'dep_date' => $row['dep_date'],
                'dep_amount' => $row['dep_amount'],
                'dep_status' => $row['dep_status'],
                'dep_description' => $row['dep_description'],
                'dep_commnet' => $row['dep_commnet'],
                'asset_ass_id' => $row['asset_ass_id'],
                'book_value' => $row['book_value'],
                'accumulative_value' => $row['accumulative_value'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();
    }

    function depreciationInitializer($data)
    {
        $sql = "call `initial_depreciation` (?,?,?,?)";
        $this->db->query($sql, $data);
        return 1;
        $this->db->close();

    }

    function update($id, $data)
    {
        $this->db->where('dep_id', $id);
        $this->db->update('depreciation', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('dep_id', $id);
        } else {
            $this->db->where('dep_id', $id);
        }
        $this->db->delete('depreciation');

    }


    function lister($page = FALSE, $showAll = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('dep_id,dep_date,dep_amount,dep_status,dep_description,dep_commnet,book_value,accumulative_value,asset.ass_serial_number AS asset_ass_id');
        $this->db->from('depreciation');
        $this->db->order_by('dep_id', 'DESC');

        $this->db->join('asset', 'depreciation.asset_ass_id = asset.ass_id', 'left');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'depreciation/index/';
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
                'dep_id' => $row['dep_id'],
                'dep_date' => $row['dep_date'],
                'dep_amount' => $row['dep_amount'],
                'dep_status' => $row['dep_status'],
                'dep_description' => $row['dep_description'],
                'dep_commnet' => $row['dep_commnet'],
                'asset_ass_id' => $row['asset_ass_id'],
                'book_value' => $row['book_value'],
                'accumulative_value' => $row['accumulative_value'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('dep_id,dep_date,dep_amount,dep_status,dep_description,dep_commnet,asset.ass_serial_number AS asset_ass_id');
        $this->db->from('depreciation');
        $this->db->join('asset', 'depreciation.asset_ass_id = asset.ass_id', 'left');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_depreciation.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        if (isset($keyword) && !empty($keyword)) {
            $this->db->where('dep_id LIKE "%' . $keyword . '%"');
        }
        $this->selectByDate('dep_id', $this->input->post('startDate'), $this->input->post('endDate'));
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'depreciation/search/' . $keyword . '/';
            $config['uri_segment'] = 4;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        $query = $this->db->get();


        foreach ($query->result_array() as $row) {
            $temp_result[] = array(
                'dep_id' => $row['dep_id'],
                'dep_date' => $row['dep_date'],
                'dep_amount' => $row['dep_amount'],
                'dep_status' => $row['dep_status'],
                'dep_description' => $row['dep_description'],
                'dep_commnet' => $row['dep_commnet'],
                'asset_ass_id' => $row['asset_ass_id'],
                'book_value' => $row['book_value'],
                'accumulative_value' => $row['accumulative_value'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;

    }

    function related_asset()
    {
        $this->db->select('ass_id AS asset_id, ass_serial_number AS asset_name');
        $rel_data = $this->db->get('asset');
        return $rel_data->result_array();
    }


    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array(
            'dep_id' => lang('dep_id'),
            'dep_date' => lang('dep_date'),
            'dep_amount' => lang('dep_amount'),
            'dep_status' => lang('dep_status'),
            'dep_description' => lang('dep_description'),
            'dep_commnet' => lang('dep_commnet'),
            'asset_ass_id' => lang('asset_ass_id'),
            'book_value' => lang('book_value'),
            'accumulative_value' => lang('accumulative_value'),
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

        $metadata = $this->explain_table->parse('depreciation');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    function totalDepre()
    {
        return $this->db->where(array('dep_status' => 'depreciated'))->from('depreciation')->count_all_results();
//        $total = $this->db->count_all("asset");
//        return $total;
    }
}
