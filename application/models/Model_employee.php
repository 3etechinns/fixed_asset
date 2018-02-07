<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_employee extends MY_Model
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
         *     - TRUE:  just the field names of the employee table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {

        $select_statement = ($this->raw_data) ? 'idEmployee,firstName,lastName,title,telephone,location' : 'idEmployee,firstName,lastName,title,telephone,location';
        $this->db->select($select_statement);
        $this->db->from('employee');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'idEmployee', 'employee', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'idEmployee' => $row['idEmployee'],
                'firstName' => $row['firstName'],
                'lastName' => $row['lastName'],
                'title' => $row['title'],
                'telephone' => $row['telephone'],
                'location' => $row['location'],
            );
        } else {
            return array();
        }
    }


    function insert($data)
    {
        $this->db->insert('employee', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('idEmployee', $id);
        $this->db->update('employee', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('idEmployee', $id);
        } else {
            $this->db->where('idEmployee', $id);
        }
        $this->db->delete('employee');

    }


    function lister($page = FALSE, $showAll = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('idEmployee,firstName,lastName,title,telephone,location');
        $this->db->from('employee');
        $this->db->order_by('idEmployee', 'DESC');


        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'employee/index/';
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
                'idEmployee' => $row['idEmployee'],
                'firstName' => $row['firstName'],
                'lastName' => $row['lastName'],
                'title' => $row['title'],
                'telephone' => $row['telephone'],
                'location' => $row['location'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }


    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('idEmployee,firstName,lastName,title,telephone,location');
        $this->db->from('employee');

        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_employee.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        if (isset($keyword) && !empty($keyword)) {
            $this->db->where('idEmployee LIKE "%' . $keyword . '%"');
        }
        $this->selectByDate('idEmployee', $this->input->post('startDate'), $this->input->post('endDate'));
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'employee/search/' . $keyword . '/';
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
                'idEmployee' => $row['idEmployee'],
                'firstName' => $row['firstName'],
                'lastName' => $row['lastName'],
                'title' => $row['title'],
                'telephone' => $row['telephone'],
                'location' => $row['location'],
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
            'idEmployee' => lang('idEmployee'),
            'firstName' => lang('firstName'),
            'lastName' => lang('lastName'),
            'title' => lang('title'),
            'telephone' => lang('telephone'),
            'location' => lang('location')
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

        $metadata = $this->explain_table->parse('employee');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    function searchEmployee($name)
    {


//        $this->db->order_by('idEmployee', 'DESC');
//        $this->db->like("firstName", $name);
//        $query = $this->db->get('employee');

//        $name = trim($this->input->get($name, TRUE)); //get term parameter sent via text field. Not sure how secure get() is
//

        $this->db->start_cache();
        $this->db->select('firstName');
        $this->db->from('employee');

        $this->db->where('firstName LIKE "%' . $name . '%"');
//

        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row) {
            $temp_result[] = array(

                'firstName' => $row['firstName'],

            );
        }
        // $this->db->flush_cache();
        return $temp_result;
//        if ($query->num_rows() > 0) {
//            $data['response'] = 'true'; //If username exists set true
//            $data['message'] = array();
//
//            foreach ($query->result() as $row) {
//                $data['message'] = array(
//                    'emp_id' => $row->idEmployee,
//                    'fullName' => ($row->firstName . " " . $row->lastName)
//                );
//            }
//        } else {
//            $data['response'] = 'false'; //Set false if user not valid
//        }


    }


}
