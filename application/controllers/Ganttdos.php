<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dhtmlx\Connector\GanttConnector;

class Ganttdos extends CI_Controller {

    public function index() {
        //$this->load->view("GanttViewUno");
        $this->load->view("GanttViewDos");
    }

    public function data() {
        $this->load->database();

        $scheduler = new GanttConnector($this->db, "PHPCI");
        $scheduler->render_links("gantt_links", "id", "source,target,type");
        $scheduler->render_table("gantt_tasks","id","start_date,duration,text,mecanico,vehiculo,orden,cliente, asesor");
    }

}
