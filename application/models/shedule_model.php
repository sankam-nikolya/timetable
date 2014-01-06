<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shedule_model extends CI_Model
{

    public function get_pars($day, $group)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");

        $this->db->select("
            g.idgroups,
            g.`name` AS `group`,
            lt.num,
            s.`name` AS `subject`,
            s.idsubects,
            c.`name` AS cabinet,
            binding.type
        ");

        $this->db->join("cabinets c", "binding.idcabinets = c.idcabinets", "LEFT OUTER");
        $this->db->join("days d", "binding.iddays = d.iddays");
        $this->db->join("groups g", "binding.idgroups = g.idgroups");
        $this->db->join("lessons_time lt", "binding.idlessons_time = lt.idlessons_time");
        $this->db->join("subjects s", "binding.idsubjects = s.idsubects");

        $this->db->where("d.date", $day);
        $this->db->where("g.idgroups", $group);

        $this->db->order_by("num,  binding.type", "ASC");

        return $this->db->get("binding")->result_array();
    }

    function get_TeacherSubject($id_subject)
    {
        $this->db->select(
            "
            teachers.first_name,
            teachers.last_name,
            teachers.patronymic,
            teachers.idteacher
            "
        );
        $this->db->join("teachers", "teachers.idteacher = BindingTeacherSubjects.idTeacher");
        $this->db->where("idSubject", $id_subject);
        return $this->db->get("BindingTeacherSubjects")->result_array();
    }

    function get_event($id_day, $id_group)
    {
        $this->db->where("idDay", $id_day);
        $this->db->where("idGroup", $id_group);
        return $this->db->get("BindingDayGroupEvent")->result_array();
    }

    public function get_days($filter)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        switch ($filter) {
            case 'currently' :
            {
                $from = date("Y-m-d", time() - (1 * 24 * 60 * 60));
                $to = date("Y-m-d", time() + (7 * 24 * 60 * 60));
                $query = $this->db->query("SELECT DISTINCT iddays, DATE_FORMAT (date, '%W %d.%m.%Y') AS 'formated_date', date, UNIX_TIMESTAMP(date) as 'unix_time' FROM days WHERE date BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY date");

                return $query->result_array();
            }
                break;
            case 'all_day' :
            {
                $query = $this->db->query("SELECT DISTINCT iddays, DATE_FORMAT (date, '%W %d.%m.%Y') AS 'formated_date', date as 'date', UNIX_TIMESTAMP(date) as 'unix_time' FROM days ORDER BY date DESC");
                return $query->result_array();
            }
                break;
        }


    }

    function get_days_f_t($from, $to)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("SELECT DISTINCT iddays, DATE_FORMAT (date, '%W %d.%m.%Y') AS 'formated_date', date, UNIX_TIMESTAMP(date) as 'unix_time' FROM days WHERE date BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY date");

        return $query->result_array();
    }

    public function get_hw()
    {
        $query = $this->db->get("homework");
        return $query->result_array();
    }

    public function get_time()
    {
        $query = $this->db->query('SELECT idlessons_time, num, DATE_FORMAT (start_time, "%H:%i") AS start_time, DATE_FORMAT (end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    public function get_count_groups_per_day($day)
    {
        $this->db->join('days', 'days.iddays = binding.iddays', 'inner');
        $this->db->where('date', $day);
        $query = $this->db->count_all_results('binding');
        return $query;
    }

    public function get_groups()
    {
        //TODO выводить группы в расписание из binding, а не из общего пула групп
        $this->db->where('active', 1);
        $this->db->order_by('order');
        $query = $this->db->get('groups');
        return $query->result_array();
    }
}