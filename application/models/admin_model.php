<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function get_teachers()
    {
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
        $this->db->order_by('order');
        $query = $this->db->get("groups");
        return $query->result_array();
    }

    function get_group($id)
    {
        $this->db->where('idgroups', $id);
        $query = $this->db->get("groups");
        return $query->result_array();
    }

    function get_subjects()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $this->db->order_by('name');
        $query = $this->db->get("subjects");
        return $query->result_array();
    }

    function get_bindingSubjectGroup($group)
    {
        $this->db->distinct();
        $this->db->select('
            groups.idgroups as id_group,
            subjects.`name` AS `name`,
            subjects.idsubects as id');

        $this->db->join('BindingSubjectGroup', 'subjects.idsubects = BindingSubjectGroup.idSubject');
        $this->db->join('groups', 'groups.idgroups = BindingSubjectGroup.idGroup');

        $this->db->where('BindingSubjectGroup.idGroup', (int)$group);

        $this->db->group_by('subjects.idsubects');
        $this->db->order_by('subjects.`name`');

        return $this->db->get('subjects')->result_array();
    }

    function get($from, $to)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $this->db->distinct();
        $this->db->select("
            iddays,
            date,
            DATE_FORMAT(date, '%W %d.%m.%Y') as 'formated_date',
            visibility
        ", FALSE);
        $this->db->where("date BETWEEN '$from' AND '$to'");
        $this->db->order_by('date');
        return $this->db->get("days")->result_array();
    }

    function get_time()
    {
        $query = $this->db->query('SELECT idlessons_time, num, DATE_FORMAT(start_time, "%H:%i") AS start_time, DATE_FORMAT(end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    function get_audits()
    {
        $this->db->where('active', 1);
        return $this->db->get('cabinets')->result_array();
    }

    function get_cabinet($id){
        $this->db->where('idcabinets', $id);
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
        $this->db->select("
            binding.iddays,
            g.idgroups,
            g.`name` AS `group`,
            lt.num,
            s.`name` AS `subject`,
            s.idsubects,
            c.`name` AS cabinet,
            binding.type,
            binding.idlessons_time,
            teachers.first_name, 
            teachers.patronymic,
            c.name as 'cabinet'
        ");

        $this->db->join("cabinets c", "binding.idcabinets = c.idcabinets", "LEFT");
        $this->db->join("days d", "binding.iddays = d.iddays");
        $this->db->join("groups g", "binding.idgroups = g.idgroups");
        $this->db->join("lessons_time lt", "binding.idlessons_time = lt.idlessons_time");
        $this->db->join("subjects s", "binding.idsubjects = s.idsubects");
        $this->db->join("BindingTeacherSubjects", "s.idsubects = BindingTeacherSubjects.idSubject", "LEFT");
        $this->db->join("teachers", "BindingTeacherSubjects.idTeacher = teachers.idteacher", "LEFT");

        $this->db->where("d.date BETWEEN '$from' AND '$to'");

        $this->db->group_by("binding.idbinding");

        $this->db->order_by("binding.iddays, g.`order`, lt.num, binding.type",  "ASC");

        return $this->db->get("binding")->result_array();
    }

    function get_binding_info_for_popup($data)
    {
        $this->db->select("
            s.idsubects,
            c.idcabinets,
            binding.type,
            s.name,
            c.name as 'cab'
        ");

        $this->db->join("cabinets c", "binding.idcabinets = c.idcabinets", "LEFT");
        $this->db->join("days d", "binding.iddays = d.iddays");
        $this->db->join("groups g", "binding.idgroups = g.idgroups");
        $this->db->join("lessons_time lt", "binding.idlessons_time = lt.idlessons_time");
        $this->db->join("subjects s", "binding.idsubjects = s.idsubects");
        $this->db->join("BindingTeacherSubjects", "s.idsubects = BindingTeacherSubjects.idSubject", "LEFT");
        $this->db->join("teachers", "BindingTeacherSubjects.idTeacher = teachers.idteacher", "LEFT");

        $this->db->where("binding.iddays", (int)$data['day']);
        $this->db->where("binding.idgroups", (int)$data['group']);
        $this->db->where("binding.idlessons_time", (int)$data['lt']);

        $this->db->group_by("binding.idbinding");

        $this->db->order_by("binding.iddays, g.`order`, lt.num, binding.type",  "ASC");

        return $this->db->get("binding")->result_array();
    }

    function get_binding_TeacherSubject($idTeacher)
    {
        $this->db->where('idTeacher', $idTeacher);
        return $this->db->get('BindingTeacherSubjects')->result_array();
    }

    function get_binding_SubjectGroup($idSubject)
    {
        $this->db->where('idSubject', $idSubject);
        return $this->db->get('BindingSubjectGroup')->result_array();
    }

    function get_event($from, $to)
    {
        $this->db->select('
            BindingDayGroupEvent.idDay,
            BindingDayGroupEvent.idGroup,
            BindingDayGroupEvent.txtEvent
        ');

        $this->db->join('days', 'days.iddays = BindingDayGroupEvent.idDay');

        $this->db->where('days.date <=', $from);
        $this->db->where('days.date >=', $to);

        return $this->db->get('BindingDayGroupEvent')->result_array();
    }

    function delete_from_bidning($data)
    {
        $this->db->where('iddays', $data['iddays']);
        $this->db->where('idgroups', $data['idgroups']);
        $this->db->where('idlessons_time', $data['idlessons_time']);
        $this->db->where('type', $data['type']);
        $this->db->delete('binding');
    }

    function delete_from_bidning_0($data)
    {
        $this->db->where('iddays', $data['iddays']);
        $this->db->where('idgroups', $data['idgroups']);
        $this->db->where('idlessons_time', $data['idlessons_time']);
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

    function update_group($id, $data)
    {
        $this->db->where('idgroups', $id);
        $this->db->update('groups', $data);
    }

    function update_cabinet($id, $data)
    {
        $this->db->where('idcabinets', $id);
        $this->db->update('cabinets', $data);
    }

    function insert_teacher($data)
    {
        $this->db->insert('teachers', $data);
    }

    function insert_group($data)
    {
        $this->db->insert('groups', $data);
    }

    function insert_cabinet($data)
    {
        $this->db->insert('cabinets', $data);
    }

    function insert_binding_TeacherSubject($idTeacher, $idSubject)
    {
        $this->db->set('idTeacher', $idTeacher);
        $this->db->set('idSubject', $idSubject);
        $this->db->insert('BindingTeacherSubjects');
    }

    function insert_binding_SubjectGroup($idSubject, $idGroup)
    {
        $this->db->set('idSubject', $idSubject);
        $this->db->set('idGroup', $idGroup);
        $this->db->insert('BindingSubjectGroup');
    }

    function delete_binding_TeacherSubject($id_teacher)
    {
        $this->db->where('idTeacher', $id_teacher);
        $this->db->delete('BindingTeacherSubjects');
    }

    function delete_binding_SubjectGroup($idSubject)
    {
        $this->db->where('idSubject', $idSubject);
        $this->db->delete('BindingSubjectGroup');
    }

    function insert_subject($data)
    {
        $this->db->insert('subjects', $data);
    }

    function update_event($data, $action)
    {
        if ($action == 'delete') {
            $this->db->where('idDay', $data['idDay']);
            $this->db->where('idGroup', $data['idGroup']);
            $this->db->delete('BindingDayGroupEvent');
        } else {
            $this->db->where('idDay', $data['idDay']);
            $this->db->where('idGroup', $data['idGroup']);
            $this->db->delete('BindingDayGroupEvent');
            $this->db->insert('BindingDayGroupEvent', $data);
        }
    }

    function delete_subject($id)
    {
        $this->db->where('idsubects', $id);
        $this->db->delete('subjects');
    }

    function delete_group($id)
    {
        $this->db->where('idgroups', $id);
        $this->db->delete('groups');
    }

    function delete_cabinet($id)
    {
        $this->db->where('idcabinets', $id);
        $this->db->delete('cabinets');
    }

    function delete_teacher($id)
    {
        $this->db->where('idteacher', $id);
        $this->db->delete('teachers');
    }

    function delete_day($data)
    {
        $this->db->where('iddays', (int)$data['id']);
        $this->db->delete('days');
    }

    function delete_binding($data)
    {
        $this->db->where('iddays', (int)$data['iddays']);
        $this->db->where('idgroups', (int)$data['idgroups']);
        $this->db->where('idlessons_time', (int)$data['idlessons_time']);
        $this->db->delete('binding');
    }
}