<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shedule extends CI_Controller
{

    function index()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        $this->load->model('shedule_model');

        if (!isset($_GET['filter'])) {
            $_GET['filter'] = 'currently';
            $data['days'] = $this->shedule_model->get_days('currently');
        } elseif (isset($_GET['filter'])) {
            $data['days'] = $this->shedule_model->get_days($this->input->get('filter'));
        }

        if (isset($_GET['from']) && isset($_GET['to'])) {
            $data['days'] = $this->shedule_model->get_days_f_t($_GET['from'], $_GET['to']);
        }
        $this->load->view('header_view');
        $this->load->view('menu_view');

        //$ads['ads'] = $this->shedule_model->get_ads();
        //$this->load->view('announcements_view', $ads);


        //$this->load->view('type_view');
        $data['pars_timing'] = $this->shedule_model->get_time();
        $data['groups'] = $this->shedule_model->get_groups();
      
      	if (count($data['days']) == 0)
        {
			$this->load->view('error_no_pars_view');          	
        }

        foreach ($data['days'] as $day) {
            $data['pars'] = $this->shedule_model->get_pars($day['iddays']);
            $data['event'] = $this->shedule_model->get_event($day['iddays']);
            if (count($data['pars']) > 0 || count($data['event']) > 0) {
                $data['day_for_now'] = $day;
                $this->load->view('shedule_view', $data);
            }
        }
        $this->load->view('footer_view');
    }
}
