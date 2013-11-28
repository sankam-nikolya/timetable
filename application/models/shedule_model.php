<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shedule_model extends CI_Model {

    public function get_pars($day, $group)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
SELECT
g.`idgroups`,
g.`name` AS 'group',
lt.`num`,
s.`name` AS 'subject',
s.idsubects,
c.`name` AS 'cabinet',
binding.`type`
FROM
binding
LEFT JOIN cabinets AS c ON binding.idcabinets = c.idcabinets
INNER JOIN days AS d ON binding.iddays = d.iddays
INNER JOIN groups AS g ON binding.idgroups = g.idgroups
INNER JOIN lessons_time AS lt ON binding.idlessons_time = lt.idlessons_time
INNER JOIN subjects AS s ON binding.idsubjects = s.idsubects
WHERE
d.date = '$day' AND g.idgroups = '$group'
ORDER BY num,  binding.`type` ASC
");
        return $query->result_array();
    }

    public function get_days($filter)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        switch ($filter)
        {
            case 'currently' :
            {
                $from = date("Y-m-d", time() - (1 * 24 * 60 * 60));
                $to = date("Y-m-d", time() + (7 * 24 * 60 * 60));
                $query = $this->db->query("SELECT DISTINCT DATE_FORMAT (date, '%W %d.%m.%Y') AS 'formated_date', date FROM days WHERE date BETWEEN '". $from ."' AND '". $to ."'");

                return $query->result_array();
            }
            case 'all_day' :
            {
                $query = $this->db->query("SELECT DISTINCT  DATE_FORMAT (date, '%W %d.%m.%Y') AS 'formated_date', date as 'date' FROM days ORDER BY date DESC");
                return $query->result_array();
            }
            break;
        }


    }

    public function get_hw()
    {
        $query = $this->db->get("homework");
        return $query->result_array();
    }

    public function get_time()
    {
        $query = $this ->db->query('SELECT idlessons_time, num, DATE_FORMAT (start_time, "%H:%i") AS start_time, DATE_FORMAT (end_time, "%H:%i") AS end_time FROM lessons_time WHERE active = 1');
        return $query->result_array();
    }

    public function get_count_groups_per_day($day)
    {
        $this->db->join('days', 'days.iddays = binding.iddays', 'inner');
        $this->db->where('date', $day);
        $query = $this ->db->count_all_results('binding');
        return $query;
    }

    public function get_groups()
    {
        //TODO выводить группы в расписание из binding, а не из общего пула групп
        $this->db->where('active', 1);
        $this->db->order_by('order');
        $query = $this ->db->get('groups');
        return $query->result_array();
    }
}