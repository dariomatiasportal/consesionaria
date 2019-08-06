<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dhtmlx\Connector\SchedulerConnector;

class Scheduler extends CI_Controller {

    public function index() {
        $this->load->view("SchedulerView");
    }

    public function data() {
        $this->load->database();

        $scheduler = new SchedulerConnector($this->db, "PHPCI");
        $scheduler->configure("scheduler_events", "event_id", "start_date, end_date, event_name");
        $scheduler->render();
    }

}
