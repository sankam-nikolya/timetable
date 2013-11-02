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
    function get_subjects()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->get("subjects");
        return $query->result_array();
    }
    function get_bindingSubjectGroup($id_group)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT groups.`idgroups`,
               groups.`name` AS `group`,
               subjects.`idsubects` as 'idsubjects',
               subjects.`name` AS `subject`,
	           teachers.first_name as 'teacher_fname',
	           teachers.patronymic as 'teacher_patronymic'
        FROM BindingSubjectGroup
             INNER JOIN subjects ON BindingSubjectGroup.idSubject = subjects.idsubects
             INNER JOIN teachers ON subjects.idteacher = teachers.idteacher
             INNER JOIN groups ON BindingSubjectGroup.idGroup = groups.idgroups
        WHERE groups.idgroups = $id_group
        ");

        return $query->result_array();
    }
    function get($from, $to)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $this->db->where("date BETWEEN '$from' AND '$to'");
        $query = $this->db->get("days");
        return $query->result_array();
    }
    public function get_time()
    {
        $query = $this ->db->query('SELECT idlessons_time, num, DATE_FORMAT (start_time, "%H:%i") AS start_time, DATE_FORMAT (end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    function insert_days($array_date)
    {
        $this->db->insert('days', $array_date);
    }
}