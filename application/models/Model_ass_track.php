<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_ass_track extends MY_Model
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
         *     - TRUE:  just the field names of the ass_track table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {

        $select_statement = ($this->raw_data) ? 'ass_track_id,date_trasferred,date_returned,penality_amount,status,payment_status,payment_date,Asset_ass_id,employee_full_name,reciver_full_name' : 'ass_track_id,date_trasferred,date_returned,penality_amount,status,payment_status,payment_date,ass_emp_id,receiving_employee_id,employee_full_name,reciver_full_name,asset.ass_serial_number AS Asset_ass_id';
        $this->db->select($select_statement);
        $this->db->from('ass_track');
        $this->db->join('asset', 'ass_track.Asset_ass_id = asset.ass_id', 'left');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'ass_track_id', 'ass_track', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'ass_track_id' => $row['ass_track_id'],
                'date_trasferred' => $row['date_trasferred'],
                'date_returned' => $row['date_returned'],
                'penality_amount' => $row['penality_amount'],
                'status' => $row['status'],
                'payment_status' => $row['payment_status'],
                'payment_date' => $row['payment_date'],
                'Asset_ass_id' => $row['Asset_ass_id'],
//                'ass_emp_id' => $row['ass_emp_id'],
//                'receiving_employee_id' => $row['receiving_employee_id'],
                'reciver_full_name' => $row['reciver_full_name'],
                'employee_full_name' => $row['employee_full_name'],
            );
        } else {
            return array();
        }
        $this->db->close();
    }


    function insert($data)
    {
        $this->db->insert('ass_track', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('ass_track_id', $id);
        $this->db->update('ass_track', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('ass_track_id', $id);
        } else {
            $this->db->where('ass_track_id', $id);
        }
        $this->db->delete('ass_track');

    }


    function lister($page = FALSE, $showAll = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('ass_track_id,date_trasferred,date_returned,penality_amount,status,payment_status,payment_date,employee_full_name,reciver_full_name,asset.ass_serial_number AS Asset_ass_id');
        $this->db->from('ass_track');
        $this->db->order_by('ass_track_id', 'DESC');

        $this->db->join('asset', 'ass_track.Asset_ass_id = asset.ass_id', 'left');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'ass_track/index/';
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
                'ass_track_id' => $row['ass_track_id'],
                'date_trasferred' => $row['date_trasferred'],
                'date_returned' => $row['date_returned'],
                'penality_amount' => $row['penality_amount'],
                'status' => $row['status'],
                'payment_status' => $row['payment_status'],
                'payment_date' => $row['payment_date'],
                'Asset_ass_id' => $row['Asset_ass_id'],
//                'ass_emp_id' => $row['ass_emp_id'],
//                'receiving_employee_id' => $row['receiving_employee_id'],
                'reciver_full_name' => $row['reciver_full_name'],
                'employee_full_name' => $row['employee_full_name'],
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
        $this->db->select('ass_track_id,date_trasferred,date_returned,penality_amount,status,payment_status,payment_date,asset.ass_serial_number AS Asset_ass_id');
        $this->db->from('ass_track');
        $this->db->join('asset', 'ass_track.Asset_ass_id = asset.ass_id', 'left');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_ass_track.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        if (isset($keyword) && !empty($keyword)) {
            $this->db->where('ass_track_id LIKE "%' . $keyword . '%"');
        }
        $this->selectByDate('ass_track_id', $this->input->post('startDate'), $this->input->post('endDate'));
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'ass_track/search/' . $keyword . '/';
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
                'ass_track_id' => $row['ass_track_id'],
                'date_trasferred' => $row['date_trasferred'],
                'date_returned' => $row['date_returned'],
                'penality_amount' => $row['penality_amount'],
                'status' => $row['status'],
                'payment_status' => $row['payment_status'],
                'payment_date' => $row['payment_date'],
                'Asset_ass_id' => $row['Asset_ass_id'],
                'ass_emp_id' => $row['ass_emp_id'],
                'receiving_employee_id' => $row['receiving_employee_id'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();
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
            'ass_track_id' => lang('ass_track_id'),
            'date_trasferred' => lang('date_trasferred'),
            'date_returned' => lang('date_returned'),
            'penality_amount' => lang('penality_amount'),
            'status' => lang('status'),
            'payment_status' => lang('payment_status'),
            'payment_date' => lang('payment_date'),
            'Asset_ass_id' => lang('Asset_ass_id'),
            'ass_emp_id' => lang('ass_emp_id'),
            'receiving_employee_id' => lang('receiving_employee_id')

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

        $metadata = $this->explain_table->parse('ass_track');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    function assetTrackDetail($id)
    {
        $this->db->start_cache();
        $this->db->select('*');
        $this->db->from('ass_track');
        $this->db->where('Asset_ass_id', $id);
        $data = $this->db->get();

        $temp_result = Array();
        //   var_dump($data->result_array());
        foreach ($data->result_array() as $row) {
            $temp_result[] = array(
                'ass_track_id' => $row['ass_track_id'],
                'date_trasferred' => $row['date_trasferred'],
                'date_returned' => $row['date_returned'],
                'penality_amount' => $row['penality_amount'],
                'status' => $row['status'],
                'payment_status' => $row['payment_status'],
                'payment_date' => $row['payment_date'],
                'Asset_ass_id' => $row['Asset_ass_id'],
                'ass_emp_id' => $row['ass_emp_id'],
                'receiving_employee_id' => $row['receiving_employee_id'],

            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();


    }

    function recentAssetTrack()
    {
        $this->db->reconnect();
        $sql = "call `recentAssetTrack` ()";
        $data = $this->db->query($sql);
        foreach ($data->result_array() as $row) {
            $temp_result[] = array(
                'ass_track_id' => $row['ass_track_id'],
                'Asset_ass_id' => $row['Asset_ass_id'],
                'recentDate' => $row['recentDate'],
                'reciver_full_name' => $row['reciver_full_name'],
                'ass_serial_number' => $row['ass_serial_number'],
                'ass_name' => $row['ass_name'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();


    }
}
