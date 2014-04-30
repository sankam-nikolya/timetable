<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ads_model extends CI_Model
{
	function get_ads($num, $offset)
    {
    	$this->db->order_by('idannouncements', 'desc');
        return $this->db->get("announcements", $num, $offset)->result_array();
    }

    function add_ads($data)
    {
    	$this->db->insert('announcements', $data);
    }

    function get_ad($id)
    {
			$this->db->select('
					announcements.idannouncements,
					announcements.title,
					announcements.text,
					DATE_FORMAT(announcements.start_datestamp, "%Y-%m-%d %H:%i") as "start_datestamp",
					DATE_FORMAT(announcements.end_datestamp, "%Y-%m-%d %H:%i") as "end_datestamp"', false);
    	$this->db->where('idannouncements', $id);
        return $this->db->get("announcements")->result_array();
    }

    function update_ad($id, $data)
    {
    	$this->db->where('idannouncements', $id);
    	$this->db->update('announcements', $data);
    }
}
