<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FiltroModel extends CI_Model {

    var $table = 'gantt_tasks';
    var $column_order = array(null, 'estado', 'patente', 'vehiculo', 'cliente'); //set column field database for datatable orderable
    var $column_search = array('estado', 'patente', 'vehiculo', 'cliente'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {

        //add custom filter here
        if ($this->input->post('estado')) {
            $this->db->like('estado', $this->input->post('estado'));
        }
        if ($this->input->post('patente')) {
            $this->db->like('patente', $this->input->post('patente'));
        }
        if ($this->input->post('vehiculo')) {
            $this->db->like('vehiculo', $this->input->post('vehiculo'));
        }
        if ($this->input->post('cliente')) {
            $this->db->where('cliente', $this->input->post('cliente'));
        }


        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_list_countries() {
        $this->db->select('estado');
        $this->db->from($this->table);
        $this->db->order_by('estado', 'asc');
        $query = $this->db->get();
        $result = $query->result();

        $countries = array();
        foreach ($result as $row) {
            $countries[] = $row->estado;
        }
        return $countries;
    }

    public function fetchMemberData($id = null) {
        if ($id) {
            $sql = "SELECT * FROM gantt_tasks WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM gantt_tasks";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
