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
            $this->load->view('admin/shedule_view', $data);

            $this->load->view('footer_view');
        }
    }

    public function add()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->model('admin_model');

            $data['subjects'] = $this->admin_model->get_subjects();
            $data['timing'] = $this->admin_model->get_time();
            $data['groups'] = $this->admin_model->get_groups();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/add_datepick_view');

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
                    //$this->admin_model->insert_days($array_date);
                    $date_start = date('Y-m-d', strtotime($date_start) + 86400);
                }
                $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
                $this->load->view('admin/add_view', $data);
            }
            if (isset($_POST['insert_data']))
            {

            }

            print_r($_POST);

            $this->load->view('footer_view');
        }
    }

    public function edit()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->model('admin_model');

            $data['subjects'] = $this->admin_model->get_subjects();
            $data['timing'] = $this->admin_model->get_time();
            $data['groups'] = $this->admin_model->get_groups();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/add_datepick_view');

            if (isset($_POST['datepick']))
            {
                $datepick = $_POST['datepick'];
                $from_to = explode(":", $datepick);
                $date_end = $from_to[1];
                $date = $from_to[0];
                print_r($from_to);
                while($date <= $date_end)
                {
                    $date = date('Y-m-d', strtotime($date));
                    $array_date = array('date' => $date);
                    //$this->admin_model->insert_days($array_date);
                    $date = date('Y-m-d', strtotime($date) + 86400);
                }
                $this->load->view('admin/add_view', $data);
            }
            $this->load->view('footer_view');
        }
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