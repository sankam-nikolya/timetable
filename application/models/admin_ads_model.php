<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ads_model extends CI_Model
{
	function get_ads($num, $offset)
    {
        return $this->db->get("announcements", $num, $offset)->result_array();
    }
}