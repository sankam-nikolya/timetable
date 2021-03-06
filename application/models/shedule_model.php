<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shedule_model extends CI_Model
{

    function get_pars($day)
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
            teachers.last_name, 
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

        $this->db->where("binding.iddays", (int)$day);
        $this->db->where("g.fulltime", 1);

        $this->db->group_by("binding.idbinding");

        $this->db->order_by("binding.iddays, g.`order`, lt.num, binding.type", "ASC");

        return $this->db->get("binding")->result_array();
    }

    function get_pars_zao($day)
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
            teachers.patronymic
        ");

        $this->db->join("cabinets c", "binding.idcabinets = c.idcabinets", "LEFT");
        $this->db->join("days d", "binding.iddays = d.iddays");
        $this->db->join("groups g", "binding.idgroups = g.idgroups");
        $this->db->join("lessons_time lt", "binding.idlessons_time = lt.idlessons_time");
        $this->db->join("subjects s", "binding.idsubjects = s.idsubects");
        $this->db->join("BindingTeacherSubjects", "s.idsubects = BindingTeacherSubjects.idSubject", "LEFT");
        $this->db->join("teachers", "BindingTeacherSubjects.idTeacher = teachers.idteacher", "LEFT");

        $this->db->where("binding.iddays", (int)$day);
        $this->db->where("g.fulltime", 0);

        $this->db->group_by("binding.idbinding");

        $this->db->order_by("binding.iddays, g.`order`, lt.num", "ASC");

        return $this->db->get("binding")->result_array();
    }

    function get_event($id_day)
    {
        $this->db->join("groups", "groups.idgroups = BindingDayGroupEvent.idGroup");
        $this->db->where("idDay", $id_day);
        $this->db->where("groups.fulltime", 1);
        return $this->db->get("BindingDayGroupEvent")->result_array();
    }

    function get_event_zao($id_day)
    {
        $this->db->join("groups", "groups.idgroups = BindingDayGroupEvent.idGroup");
        $this->db->where("idDay", $id_day);
        $this->db->where("groups.fulltime", 0);
        return $this->db->get("BindingDayGroupEvent")->result_array();
    }

    function get_days($filter)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        switch ($filter) {
            case 'currently' :
            {
                $from = date("Y-m-d", time() - (0 * 24 * 60 * 60));
                $to = date("Y-m-d", time() + (7 * 24 * 60 * 60));
                $query = $this->db->query("SELECT DISTINCT iddays, DATE_FORMAT(date, '%W %d.%m.%Y') AS 'formated_date', date, UNIX_TIMESTAMP(date) as 'unix_time' FROM days WHERE date BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY date");

                return $query->result_array();
            }
            break;
        }
    }

    function get_days_f_t($from, $to)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("SELECT DISTINCT iddays, DATE_FORMAT(date, '%W %d.%m.%Y') AS 'formated_date', date, UNIX_TIMESTAMP(date) as 'unix_time' FROM days WHERE date BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY date");

        return $query->result_array();
    }

    function get_time()
    {
        $query = $this->db->query('SELECT idlessons_time, num, DATE_FORMAT(start_time, "%H:%i") AS start_time, DATE_FORMAT(end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    function get_count_groups_per_day($day)
    {
        $this->db->join('days', 'days.iddays = binding.iddays', 'inner');
        $this->db->where('date', $day);
        $query = $this->db->count_all_results('binding');
        return $query;
    }

    function get_groups()
    {
        //TODO выводить группы в расписание из binding, а не из общего пула групп
        $this->db->where('active', 1);
        $this->db->where('fulltime', 1);
        $this->db->order_by('order');
        $query = $this->db->get('groups');
        return $query->result_array();
    }

    function get_groups_zao()
    {
        //TODO выводить группы в расписание из binding, а не из общего пула групп
        $this->db->where('active', 1);
        $this->db->where('fulltime', 0);
        $this->db->order_by('order');
        $query = $this->db->get('groups');
        return $query->result_array();
    }

    function get_ads()
    {
        $timestamp = time();
        $this->db->order_by('idannouncements', 'desc');
        $this->db->where('start_datestamp <=', $timestamp);
        $this->db->where('end_datestamp >=', $timestamp);        
        $this->db->where('active', 1);
        $this->db->or_where('announcements.allTime', 1);        
        $this->db->where('active', 1);
        return $this->db->get("announcements")->result_array();
    }
}