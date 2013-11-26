<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function get_teachers()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $this->db->order_by('teachers.last_name');
        $this->db->order_by('teachers.first_name');
        $this->db->order_by('teachers.patronymic');
        $query = $this->db->get("teachers");
        return $query->result_array();
    }

    function get_teacher_info($id)
    {
        $this->db->where('idteacher', $id);
        $query = $this->db->get("teachers");
        return $query->result_array();
    }

    function get_subject_info($id)
    {
        $this->db->where('idsubects', $id);
        $query = $this->db->get("subjects");
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
        //TODO reformat to AR
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT
            groups.idgroups,
            groups.`name` AS `group`,
            subjects.idsubects AS idsubjects,
            subjects.`name` AS `subject`,
            teachers.first_name AS teacher_fname,
            teachers.patronymic AS teacher_patronymic
        FROM teachers
             INNER JOIN BindingTeacherSubjects ON teachers.idteacher = BindingTeacherSubjects.idTeacher
             INNER JOIN subjects ON subjects.idsubects = BindingTeacherSubjects.idSubject
             LEFT OUTER JOIN BindingSubjectGroup ON BindingSubjectGroup.idSubject = subjects.idsubects
             LEFT OUTER JOIN groups ON BindingSubjectGroup.idGroup = groups.idgroups
        WHERE groups.idgroups = $id_group
        ");

        return $query->result_array();
    }
    function get($from, $to)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $this->db->select("
            iddays,
            date,
            DATE_FORMAT (date, '%W %d.%m.%Y') as 'formated_date',
            visibility
        ", FALSE);
        $this->db->where("date BETWEEN '$from' AND '$to'");
        $query = $this->db->get("days");
        return $query->result_array();
    }
    public function get_time()
    {
        $query = $this ->db->query('SELECT idlessons_time, num, DATE_FORMAT (start_time, "%H:%i") AS start_time, DATE_FORMAT (end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    function get_audits()
    {
        $this->db->where('active', 1);
        return $this->db->get('cabinets')->result_array();
    }

    function insert_days($array_date)
    {
        $this->db->insert('days', $array_date);
    }

    function insert_binding($data)
    {
        $this->db->insert('binding', $data);
    }

    function get_binding_info($from, $to)
    {
        $this->db->where("iddays BETWEEN ".(int)$from ." AND ". (int)$to);
        return $this->db->get("binding")->result_array();
    }

    function delete_iddays_from_bidning($id)
    {
        $this->db->where('iddays', $id);
        $this->db->delete('binding');
    }

    function update_teacher($id, $data)
    {
        $this->db->where('idteacher', $id);
        $this->db->update('teachers', $data);
    }

    function update_subject($id, $data)
    {
        $this->db->where('idsubects', $id);
        $this->db->update('subjects', $data);
    }

    function insert_teacher($data)
    {
        $this->db->insert('teachers', $data);
    }

    function insert_subject($data)
    {
        $this->db->insert('subjects', $data);
    }

    function delete_subject($id)
    {
        $this->db->where('idsubects', $id);
        $this->db->delete('subjects');
    }

    function delete_teacher($id)
    {
        $this->db->where('idteacher', $id);
        $this->db->delete('teachers');
    }
}