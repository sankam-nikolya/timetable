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
binding.`type`,
t.first_name,
t.patronymic
FROM
binding
INNER JOIN cabinets AS c ON binding.idcabinets = c.idcabinets
INNER JOIN days AS d ON binding.iddays = d.iddays
INNER JOIN groups AS g ON binding.idgroups = g.idgroups
INNER JOIN lessons_time AS lt ON binding.idlessons_time = lt.idlessons_time
INNER JOIN subjects AS s ON binding.idsubjects = s.idsubects
INNER JOIN teachers AS t ON s.idteacher = t.idteacher
WHERE
d.date = '$day' AND g.idgroups = '$group'
ORDER BY num,  binding.`type` ASC
");
        return $query->result_array();
    }

    public function get_days($filter)
    {
        switch ($filter)
        {
            case 'last7days' :
            {
                $from = date("Y-m-d", time() - (1 * 24 * 60 * 60));
                $to = date("Y-m-d", time() + (5 * 24 * 60 * 60));
                $query = $this->db->query("SELECT DISTINCT date FROM days WHERE date BETWEEN '". $from ."' AND '". $to ."'");

                return $query->result_array();
            }
            case 'all_day' :
            {
                $query = $this->db->query("SELECT DISTINCT date FROM days ORDER BY date DESC");
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
        $this->db->where('active', 1);
        $query = $this ->db->get('groups');
        return $query->result_array();
    }
}