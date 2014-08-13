<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ads_model extends CI_Model
{
	function get_ads($num, $offset)
    {
        $this->db->query("SET `time_zone`='".date(TIMEZONE)."'");
        $this->db->select('
            announcements.idannouncements,
            announcements.title,
            announcements.text,
            DATE_FORMAT(FROM_UNIXTIME(announcements.start_datestamp), "%Y-%m-%d %H:%i") as "start_datestamp",
            DATE_FORMAT(FROM_UNIXTIME(announcements.end_datestamp), "%Y-%m-%d %H:%i") as "end_datestamp",
            announcements.allTime', false);
    	$this->db->order_by('idannouncements', 'desc');
        $this->db->where('active', 1);
        return $this->db->get("announcements", $num, $offset)->result_array();
    }

    function count_ads()
    {
        $this->db->where('active', 1);
        return $this->db->count_all_results('announcements');
    }

    function add_ads($data)
    {
    	$this->db->insert('announcements', $data);
    }

    function get_ad($id)
    {
        $this->db->query("SET `time_zone`='".date(TIMEZONE)."'");
		$this->db->select('
			announcements.idannouncements,
			announcements.title,
			announcements.text,
			DATE_FORMAT(FROM_UNIXTIME(announcements.start_datestamp), "%Y-%m-%d %H:%i") as "start_datestamp",
			DATE_FORMAT(FROM_UNIXTIME(announcements.end_datestamp), "%Y-%m-%d %H:%i") as "end_datestamp",
            announcements.allTime', false);
	   $this->db->where('idannouncements', $id);
       return $this->db->get("announcements")->result_array();
    }

    function update_ad($id, $data)
    {
    	$this->db->where('idannouncements', $id);
    	$this->db->update('announcements', $data);
    }

    function delete_ad($id)
    {
        $this->db->where('idannouncements', $id);
        $this->db->set('active', 0);
        $this->db->update('announcements');
    }
}
