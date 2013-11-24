<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shedule extends CI_Controller {

    public function index()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->model('statistics_model');
            $data['short_num_pars'] = $this->statistics_model->get_short_num_pars();
            $data['short_group_num_pars'] = $this->statistics_model->get_short_group_num_pars();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/index_view', $data);

            $this->load->view('footer_view');
        }
    }

    public function add_datepick_view()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/add_datepick_view');
            $this->load->view('footer_view');
        }
    }

    function add_shedule_view()
    {
        $this->load->model('admin_model');

        $data['subjects'] = $this->admin_model->get_subjects();
        $data['timing'] = $this->admin_model->get_time();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        for ($i = 0; $i < count($data['groups']); $i++)
        {
            $data['bindingSubjectGroup'][$i] = $this->admin_model->get_bindingSubjectGroup($data['groups'][$i]['idgroups']);
        }
        if (isset($_POST['datepick']))
        {
            $datepick = $_POST['datepick'];
            $from_to = explode(":", $datepick);
            $date_end = $from_to[1];
            $date_start = $from_to[0];
            while($date_start <= $date_end)
            {
                $date_start = date('Y-m-d', strtotime($date_start));
                $array_date = array('date' => $date_start);
                $this->admin_model->insert_days($array_date);
                $date_start = date('Y-m-d', strtotime($date_start) + 86400);
            }
            $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
            $this->load->view('admin/shedule/add_view', $data);
        }
    }

    function edit_datepick_view()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/edit_datepick_view');
            $this->load->view('footer_view');
        }
    }

    function edit_shedule_view()
    {
        $this->load->model('admin_model');

        $data['subjects'] = $this->admin_model->get_subjects();
        $data['timing'] = $this->admin_model->get_time();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        for ($i = 0; $i < count($data['groups']); $i++)
        {
            $data['bindingSubjectGroup'][$i] = $this->admin_model->get_bindingSubjectGroup($data['groups'][$i]['idgroups']);
        }
        if (isset($_POST['datepick']))
        {
            $datepick = $_POST['datepick'];
            $from_to = explode(":", $datepick);
            $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
            $data['bindings'] = $this->admin_model->get_binding_info($data['days'][0]['iddays'], end($data['days'])['iddays']);
            $this->load->view('admin/shedule/edit_view', $data);
        }
        $this->load->view('footer_view');
    }

    function add_db_binding()
    {
        $this->load->model('admin_model');
        $bindings = $this->input->post('binding_select');
        $exploded = array();
        foreach ($bindings as $item)
        {
            array_push($exploded , explode(":", $item));
        }
        foreach ($exploded as $item)
        {
            $data = array(
                'iddays' => $item[0],
                'idgroups' => $item[1],
                'idlessons_time' => $item[2],
                'type' => $item[3],
                'idsubjects' => $item[4]
            );
            $this->admin_model->insert_binding($data);
        }
        header("Location: ".base_url().'admin');
    }

    function update_db_binding()
    {
        $this->load->model('admin_model');
        $bindings = $this->input->post('binding_select');
        $exploded = array();
        foreach ($bindings as $item)
        {
            array_push($exploded , explode(":", $item));
        }
        foreach ($exploded as $item)
        {
            $data = array(
                'iddays' => $item[0],
                'idgroups' => $item[1],
                'idlessons_time' => $item[2],
                'type' => $item[3],
                'idsubjects' => $item[4]
            );
            //$this->admin_model->insert_binding($data);
        }
        header("Location: ".base_url().'admin');
    }

    public function announcements()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('footer_view');
        }
    }

    public function statistics()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->model('statistics_model');

            $data['num_pars'] = $this->statistics_model->get_num_pars();
            $data['group_num_pars'] = $this->statistics_model->get_group_num_pars();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

            $this->load->view('admin/statistics_view', $data);
            $this->load->view('footer_view');
        }
    }


}