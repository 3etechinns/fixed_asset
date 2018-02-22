<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_asset extends MY_Model
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
         *     - TRUE:  just the field names of the asset table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false, $direction = false)
    {
        $meta = $this->metadata();
        $select_statement = ($this->raw_data) ? 'ass_id,ass_model,ass_serial_number,ass_date_acquired,ass_purchase_price,ass_cat_id,ass_comment,ass_description,status_status_id,ass_name,model_number,sub_cat_id,isAvailable' : 'ass_id,ass_name,ass_model,ass_serial_number,ass_date_acquired,ass_purchase_price,ass_cat_id,ass_comment,ass_description,ass_name,model_number,sub_cat_id,status.status AS status_status_id,asset_category.cat_name as ass_cat_id,asset_category.cat_status as sub_cat_id,isAvailable';
        $this->db->select($select_statement);
        $this->db->from('asset');
        $this->db->join('status', 'asset.status_status_id = status.status_id', 'left');
        $this->db->join('asset_category', 'asset.ass_cat_id = asset_category.cat_id', 'left');

//        ,asset_category.sub_category as sub_category
        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one) {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            //Navigate record left and right
            $this->navigateRecord($direction, 'ass_id', 'asset', $id);
        }

        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return array(
                'ass_id' => $row['ass_id'],
//                'ass_status' => $row['ass_status'],
                'ass_name' => $row['ass_name'],
                'ass_model' => $row['ass_model'],
                'ass_serial_number' => $row['ass_serial_number'],
                'isAvailable' => $row['isAvailable'],
                'ass_date_acquired' => $row['ass_date_acquired'],
                'ass_purchase_price' => $row['ass_purchase_price'],
//                'ass_dep_method' => $row['ass_dep_method'],
                'model_number' => $row['model_number'],
                'ass_cat_id' => $row['ass_cat_id'],
                'sub_category' => $row['sub_cat_id'],
                'ass_comment' => $row['ass_comment'],
                'ass_description' => $row['ass_description'],
                'status_status_id' => $row['status_status_id'],
//                'sub_cat_id' => $row['sub_cat_id'],
            );
        } else {
            return array();
        }
        $this->db->close();
    }


    function insert($data)
    {
        $this->db->insert('asset', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('ass_id', $id);
        $this->db->update('asset', $data);
    }


    function delete($id)
    {
        if (is_array($id)) {
            $this->db->where_in('ass_id', $id);
        } else {
            $this->db->where('ass_id', $id);
        }
        $this->db->delete('asset');

        $this->db->where('asset_id', $id);
        $this->db->delete('ass_track_asset');


        $this->db->where('asset_id', $id);
        $this->db->delete('depreciation_asset');

    }


    function lister($page = FALSE, $showAll = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('ass_id,ass_name,ass_model,ass_serial_number,ass_barcode_number,ass_date_acquired,ass_purchase_price,model_number,ass_cat_id,ass_comment,ass_description,status.status AS status_status_id,asset_category.cat_name as ass_cat_id,asset_category.cat_status as sub_category,isAvailable');
        $this->db->from('asset');
        $this->db->order_by('ass_id', 'DESC');

        $this->db->join('status', 'asset.status_status_id = status.status_id', 'left');
        $this->db->join('asset_category', 'asset.ass_cat_id = asset_category.cat_id', 'left');


        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE && $showAll == FALSE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'asset/index/';
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
                'ass_id' => $row['ass_id'],
//                'ass_status' => $row['ass_status'],
                'ass_name' => $row['ass_name'],
                'ass_model' => $row['ass_model'],
                'ass_serial_number' => $row['ass_serial_number'],
                'isAvailable' => $row['isAvailable'],
                'ass_date_acquired' => $row['ass_date_acquired'],
                'ass_purchase_price' => $row['ass_purchase_price'],
//                'ass_dep_method' => $row['ass_dep_method'],
                'model_number' => $row['model_number'],
                'ass_cat_id' => $row['ass_cat_id'],
                'ass_comment' => $row['ass_comment'],
                'ass_description' => $row['ass_description'],
                'sub_category' => $row['sub_category'],
                'status_status_id' => $row['status_status_id'],
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
        $this->db->select('ass_id,ass_name,ass_model,ass_serial_number,ass_barcode_number,ass_date_acquired,ass_purchase_price,model_number,ass_cat_id,ass_comment,ass_description,status.status AS status_status_id,asset_category.cat_name as ass_cat_id,asset_category.cat_status as sub_category,isAvailable');
        $this->db->from('asset');
        $this->db->order_by('ass_id', 'DESC');

        $this->db->join('status', 'asset.status_status_id = status.status_id', 'left');
        $this->db->join('asset_category', 'asset.ass_cat_id = asset_category.cat_id', 'left');
        $ownerFieldName = '';
        $this->selectByOwner($ownerFieldName);
        // Delete this line after setting up the search conditions
        //die('Please see models/model_asset.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search
         *  or create advanced search conditions here
         */
        if (isset($keyword) && !empty($keyword)) {
            $this->db->where('ass_serial_number LIKE "%' . $keyword . '%"');
        }
        $this->selectByDate('ass_id', $this->input->post('startDate'), $this->input->post('endDate'));
        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE) {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results();
            $config['base_url'] = 'asset/search/' . $keyword . '/';
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
                'ass_id' => $row['ass_id'],
//                'ass_status' => $row['ass_status'],
                'ass_name' => $row['ass_name'],
                'ass_model' => $row['ass_model'],
                'ass_serial_number' => $row['ass_serial_number'],
                'isAvailable' => $row['isAvailable'],
                'ass_date_acquired' => $row['ass_date_acquired'],
                'ass_purchase_price' => $row['ass_purchase_price'],
//                'ass_dep_method' => $row['ass_dep_method'],
                'model_number' => $row['model_number'],
                'ass_cat_id' => $row['ass_cat_id'],
                'ass_comment' => $row['ass_comment'],
                'ass_description' => $row['ass_description'],
                'sub_category' => $row['sub_category'],
                'status_status_id' => $row['status_status_id'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();
    }

    function related_status()
    {
        $this->db->select('status_id AS status_id, status AS status_name');
        $rel_data = $this->db->get('status');
        return $rel_data->result_array();
        $this->db->close();
    }

    function asset_category($status = 0)
    {
        $this->db->select('cat_id AS cat_id, cat_name AS category');
        $this->db->where('cat_status', $status);
        $cat_data = $this->db->get('asset_category');
        return $cat_data->result_array();
        $this->db->close();
    }


    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array(
            'ass_id' => lang('ass_id'),
//            'ass_status' => lang('ass_status'),
            'ass_name' => lang('ass_name'),
            'ass_model' => lang('ass_model'),
            'ass_serial_number' => lang('ass_serial_number'),
            'isAvailable' => lang('isAvailable'),
            'ass_date_acquired' => lang('ass_date_acquired'),
            'ass_date_sold' => lang('ass_date_sold'),
            'ass_purchase_price' => lang('ass_purchase_price'),
//            'ass_dep_method' => lang('ass_dep_method'),
//            'ass_dep_life' => lang('ass_dep_life'),
            'model_number' => lang('model_number'),
            'ass_cat_id' => lang('ass_cat_id'),
            'sub_category' => lang('sub_category'),
            'ass_comment' => lang('ass_comment'),
            'ass_description' => lang('ass_description'),
            'status_status_id' => lang('status_status_id')
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

        $metadata = $this->explain_table->parse('asset');

        foreach ($metadata as $k => $md) {
            if (!empty($md['enum_values'])) {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    function totalAsset()
    {
//        return $this->db->where(array('ass_status' => 1))->from('asset')->count_all_results();
        $total = $this->db->count_all("asset");
        return $total;
    }

    function assetCounterBasedOnCategory()
    {
        try {
            $this->db->reconnect();
            $sql = "call `assetCountBasedOnCategory` ()";
            $data = $this->db->query($sql);
            foreach ($data->result_array() as $row) {
                $temp_result[] = array(
                    'cat_id' => $row['cat_id'],
                    'cat_code' => $row['cat_code'],
                    'cat_name' => $row['cat_name'],
                    'quantity' => $row['quantity'],
                    'depriciation_life' => $row['depriciation_life'],
                );
            }
            $this->db->close();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $temp_result;


    }

    function assetCountBasedOnStatus($type)
    {
        $this->db->reconnect();

        $sql = "call `assetCountBasedOnStatus` (?)";
        $data = $this->db->query($sql, $type);
        $temp_result = array();
        foreach ($data->result_array() as $row) {
            $temp_result[] = array(
                'cat_name' => $row['cat_name'],
                'quantity' => $row['quantity'],

            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();


    }


    function totalDisposed()
    {
        return $this->db->where(array('isAvailable' => "return"))->from('asset')->count_all_results();
    }

    function checkAssetAvailability($id)
    {
        $sql = "call `checkAssetAvailability` (?)";
        $data = $this->db->query($sql, $id);

        foreach ($data->result_array() as $row) {
            $temp_result[] = array(
                'status' => $row['status'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
        $this->db->close();

    }

    function allAssetBySerialNumber()
    {
        $this->db->reconnect();
        $this->db->select('ass_id,ass_serial_number');
        $this->db->from('asset');
        $query = $this->db->get();
        $temp_result = array();
        foreach ($query->result_array() as $row) {
            $temp_result[] = array(

                'id' => $row['ass_id'],
                'value' => $row['ass_serial_number'],

            );
        }
        return $temp_result;

    }

    function updateAssetStatus($id, $status)
    {
        $this->db->set('isAvailable', $status);
        $this->db->where('ass_id', $id);
        $this->db->update('asset');
        return $status;

    }


}
