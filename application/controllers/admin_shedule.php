<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shedule extends CI_Controller {

    public function index()
    {
        $this->load->model('admin_model');

        $data['teachers'] = $this->admin_model->get_teachers();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/shedule_view', $data);
    }

    public function add()
    {
        $this->load->model('admin_model');
        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        if (!isset($_GET['datepick']))
            $this->load->view('admin/add_datepick_view');
        else
        {
            if (isset($_POST['insert_day']))
            {
                echo "success";
                $datepick = $_GET['datepick'];
                $from_to = explode(":", $datepick);
                $date_end = $from_to[1];
                $date = $from_to[0];
                while($date <= $date_end)
                {
                    $date = date('Y-m-d', strtotime($date));
                    $array_date = array('date' => $date);
                    $this->admin_model->insert_days($array_date);
                    $date = date('Y-m-d', strtotime($date) + 86400);
                }
            }

            $this->load->view('admin/add_view');
        }

    }

    public function edit()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
    }

    public function statistics()
    {
        $this->load->model('admin_model');

        $data['teachers'] = $this->admin_model->get_teachers();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        $this->load->view('admin/statistics_view', $data);
    }
}