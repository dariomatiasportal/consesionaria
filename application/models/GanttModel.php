<?php

class GanttModel extends CI_Model {

    var $id;
    var $text;
    var $start_date;

    public function __construct() {
        $this->load->database();
    }

    //returns an array with data
    function get($request) {
        $query = $this->db->get("gantt_tasks");
        return $query->result_array();
    }

    //the function takes values of the row data
    protected function get_values($action) {
        $this->id = $action->get_value("id");
        $this->text = $action->get_value("text");
        $this->start_date = $action->get_value("start_date");
    }

    //inserts a new event
    function insert($action) {
        $this->get_values($action);

        if ($this->validate($action)) {
            $this->db->insert("gantt_tasks", $this);
            $action->success($this->db->insert_id());
        }
    }

    public function nombreMecanico($ids = null) {
        //if($ids) {
        $sql = "SELECT fname FROM members WHERE id = (SELECT members_id FROM gantt_tasks_has_members WHERE ? = gantt_tasks_id);";
        $query = $this->db->query($sql, array($id));
        echo json_encode($query);
        //}
        //$sql = "SELECT * FROM members";
        //$query = $this->db->query($sql);
        //return $query->result_array();
    }

}
