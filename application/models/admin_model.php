<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function get_teachers()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->get("teachers");
        return $query->result_array();
    }
    function get_groups()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->get("groups");
        return $query->result_array();
    }

    function insert_days($array_date)
    {
        $this->db->insert('days', $array_date);
    }
}