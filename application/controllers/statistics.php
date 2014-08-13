<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller
{

    function index()
    {
        $this->load->model('statistics_model');
        $data['num_pars'] = $this->statistics_model->get_num_pars();
        $data['group_num_pars'] = $this->statistics_model->get_group_num_pars();


        $this->load->view('header_view');
        $this->load->view('menu_view');

        $this->load->model('shedule_model');
        $ads['ads'] = $this->shedule_model->get_ads();
        $this->load->view('announcements_view', $ads);

        $this->load->view('statistics_view', $data);
        $this->load->view('footer_view');
    }
}