<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects_model extends CI_Model {

    public function get_subjects()
    {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

}