<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shedule extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/selectdate_view');

        $this->load->model('admin/showshedule_model');
        $this->load->model('subjects_model');

        $data['shedule'] = $this->showshedule_model->get_days($_GET['from'], $_GET['to']);
        $data['subjects'] = $this->subjects_model->get_subjects();

        foreach($data['shedule'] as $item)
        {
            $data['pars'] = $this->showshedule_model->get_pars($item['date']);
            $this->load->view('admin/edit_view', $data);
        }
    }
}