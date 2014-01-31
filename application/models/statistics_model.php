<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Statistics_model extends CI_Model
{

    function get_num_pars()
    {
        $this->db->select("
            binding.idsubjects,
            Count(teachers.idteacher) as 'pars',
            teachers.idteacher,
            teachers.first_name,
            teachers.last_name,
            teachers.patronymic
        ");

        $this->db->join("days", "binding.iddays = days.iddays");
        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("BindingTeacherSubjects", "subjects.idsubects = BindingTeacherSubjects.idSubject");
        $this->db->join("teachers", "teachers.idteacher = BindingTeacherSubjects.idTeacher");

        $this->db->group_by('teachers.idteacher');
        $this->db->order_by('teachers.last_name', 'asc');

        return $this->db->get("binding")->result_array();
    }

    function get_short_num_pars()
    {
        $monThis = date("Y-m-d", time() - (date("N") - 1) * 24 * 60 * 60);
        $sunThis = date("Y-m-d", time() - (-6 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            binding.idsubjects,
            Count(teachers.idteacher) as 'pars',
            teachers.idteacher,
            teachers.first_name,
            teachers.last_name,
            teachers.patronymic
        ");

        $this->db->join("days", "binding.iddays = days.iddays");
        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("BindingTeacherSubjects", "subjects.idsubects = BindingTeacherSubjects.idSubject");
        $this->db->join("teachers", "teachers.idteacher = BindingTeacherSubjects.idTeacher");

        $this->db->where('days.date BETWEEN ', '"' . $monThis . '" AND "' . $sunThis . '"', FALSE);
        $this->db->group_by('teachers.idteacher');
        $this->db->order_by('teachers.last_name', 'asc');

        return $this->db->get("binding")->result_array();
    }

    function n_get_short_num_pars()
    {
        $monNext = date("Y-m-d", time() - (-7 + date("N") - 1) * 24 * 60 * 60);
        $sunNext = date("Y-m-d", time() - (-13 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            binding.idsubjects,
            Count(teachers.idteacher) as 'pars',
            teachers.idteacher,
            teachers.first_name,
            teachers.last_name,
            teachers.patronymic
        ");

        $this->db->join("days", "binding.iddays = days.iddays");
        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("BindingTeacherSubjects", "subjects.idsubects = BindingTeacherSubjects.idSubject");
        $this->db->join("teachers", "teachers.idteacher = BindingTeacherSubjects.idTeacher");

        $this->db->where('days.date BETWEEN ', '"' . $monNext . '" AND "' . $sunNext . '"', FALSE);
        $this->db->group_by('teachers.idteacher');
        $this->db->order_by('teachers.last_name', 'asc');

        return $this->db->get("binding")->result_array();
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

    function get_short_group_num_pars_0()
    {
        $monThis = date("Y-m-d", time() - (date("N") - 1) * 24 * 60 * 60);
        $sunThis = date("Y-m-d", time() - (-6 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monThis . '" AND "' . $sunThis . '"', FALSE);
        $this->db->where('binding.type', 0);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }

    function get_short_group_num_pars_1()
    {
        $monThis = date("Y-m-d", time() - (date("N") - 1) * 24 * 60 * 60);
        $sunThis = date("Y-m-d", time() - (-6 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monThis . '" AND "' . $sunThis . '"', FALSE);
        $this->db->where('binding.type', 1);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }

    function get_short_group_num_pars_2()
    {
        $monThis = date("Y-m-d", time() - (date("N") - 1) * 24 * 60 * 60);
        $sunThis = date("Y-m-d", time() - (-6 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monThis . '" AND "' . $sunThis . '"', FALSE);
        $this->db->where('binding.type', 2);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }

    function n_get_short_group_num_pars_0()
    {
        $monNext = date("Y-m-d", time() - (-7 + date("N") - 1) * 24 * 60 * 60);
        $sunNext = date("Y-m-d", time() - (-13 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monNext . '" AND "' . $sunNext . '"', FALSE);
        $this->db->where('binding.type', 0);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }

     function n_get_short_group_num_pars_1()
    {
        $monNext = date("Y-m-d", time() - (-7 + date("N") - 1) * 24 * 60 * 60);
        $sunNext = date("Y-m-d", time() - (-13 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monNext . '" AND "' . $sunNext . '"', FALSE);
        $this->db->where('binding.type', 1);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }

     function n_get_short_group_num_pars_2()
    {
        $monNext = date("Y-m-d", time() - (-7 + date("N") - 1) * 24 * 60 * 60);
        $sunNext = date("Y-m-d", time() - (-13 + date("N") - 1) * 24 * 60 * 60);

        $this->db->select("
            Count(groups.idgroups) as 'pars',
            groups.`name`
        ");

        $this->db->join("subjects", "subjects.idsubects = binding.idsubjects");
        $this->db->join("days", "days.iddays = binding.iddays");
        $this->db->join("groups", "groups.idgroups = binding.idgroups");

        $this->db->where('days.date BETWEEN', '"' . $monNext . '" AND "' . $sunNext . '"', FALSE);
        $this->db->where('binding.type', 2);
        $this->db->group_by('groups.idgroups');
        $this->db->order_by('groups.`order`', 'asc'); 

        return $this->db->get("binding")->result_array();
    }
}