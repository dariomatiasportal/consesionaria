<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dhtmlx\Connector\GridConnector;

class Grid extends CI_Controller {

	public function index() {
		$this->load->view("GridView");
	}

    public function data() {
        $this->load->database();

        $connector = new GridConnector($this->db, "PHPCI");
        $connector->configure("scheduler_events", "event_id", "start_date, end_date, event_name");
        $connector->render();
    }
}
