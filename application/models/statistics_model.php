<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics_model extends CI_Model {

    function get_num_pars()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT
        COUNT(subjects.idteacher) as 'pars',
        subjects.idteacher,
        teachers.first_name,
        teachers.last_name,
        teachers.patronymic
        FROM
        binding
        INNER JOIN subjects ON subjects.idsubects = binding.idsubjects
        INNER JOIN teachers ON teachers.idteacher = subjects.idteacher
        GROUP BY teachers.idteacher");
        return $query->result_array();
    }

    function get_short_num_pars()
    {

    }

    function get_group_num_pars()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT
        Count(groups.idgroups) as 'pars',
        groups.`name`
        FROM
        binding
        INNER JOIN subjects ON subjects.idsubects = binding.idsubjects
        INNER JOIN days ON days.iddays = binding.iddays
        INNER JOIN groups ON groups.idgroups = binding.idgroups
        GROUP BY groups.idgroups");
        return $query->result_array();
    }

    function get_short_group_num_pars()
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT
        Count(groups.idgroups)  as 'pars',
        groups.`name`
        FROM
        binding
        INNER JOIN subjects ON subjects.idsubects = binding.idsubjects
        INNER JOIN days ON days.iddays = binding.iddays
        INNER JOIN groups ON groups.idgroups = binding.idgroups
        WHERE
        days.date BETWEEN '2013-11-03' AND '2013-11-20'");
        return $query->result_array();
    }
}