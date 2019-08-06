<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filtro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('FiltroModel', 'filtro');
    }

    public function index() {
        $this->load->helper('url');
        $this->load->helper('form');

        $countries = $this->filtro->get_list_countries();

        $opt = array('' => 'Estado de la Tarea...');
        foreach ($countries as $country) {
            $opt[$country] = $country;
        }

        $data['form_country'] = form_dropdown('', $opt, '', 'id="estado" class="form-control"');
        $this->load->view('filtroview', $data);
    }

    public function ajax_list() {
        $list = $this->filtro->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $filtro) {
            $no++;            
            
            $row = array();
            $row[] = $no;
            $row[] = $filtro->mecanico;
            $row[] = $filtro->cliente;
            $row[] = $filtro->patente;
            $row[] = $filtro->vehiculo;
            $row[] = $filtro->text;
            $row[] = $filtro->estado;
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->filtro->count_all(),
            "recordsFiltered" => $this->filtro->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function fetchMemberData() 
    {
        $result = array('data' => array());

        $data = $this->FiltroModel->fetchMemberData();
        foreach ($data as $key => $value) {
            // button
            $buttons = '
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a type="button" onclick="editMember('.$value['id'].')" data-toggle="modal" data-target="#editMemberModal">Edit</a></li>
                <li><a type="button" onclick="removeMember('.$value['id'].')" data-toggle="modal" data-target="#removeMemberModal">Remove</a></li>              
              </ul>
            </div>
            ';

            $result['data'][$key] = array(
                $name,
                $value['age'],
                $value['contact'],
                $value['address'],
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }
}
