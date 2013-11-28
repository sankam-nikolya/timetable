<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_statistics extends CI_Controller {

    function statistics()
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