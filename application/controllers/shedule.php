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


        $data['pars_timing'] = $this->shedule_model->get_time();
        $data['groups']      = $this->shedule_model->get_groups();
        $end_data_days       = end($data['days']);
        $data['pars']        = $this->shedule_model->get_pars($data['days'][0]['date'], $end_data_days['date']);
        
        foreach ($data['days'] as $day) 
        {
            $data['rend'] = array();
            foreach ($data['groups'] as $group) {
                array_push($data['rend'], '<tr><td class="anouncegroup">'.$group['name'].'</td>');
                for ($i = 0; $i < count($data['pars_timing']); $i++) {
                    foreach ($data['pars'] as $par) {
                        if ($par['iddays'] == $day['iddays'] && $par['idgroups'] == $group['idgroups'] && $par['idlessons_time'] == $data['pars_timing'][$i]['idlessons_time']) 
                        {
                            array_push($data['rend'], '<td>'.$par["group"].' some par</td>');
                        }
                        else
                        {
                            array_push($data['rend'], '<td>2</td>');
                        }
                        break;
                    }
                }
                array_push($data['rend'], '</tr>');
            }
            $data['day_for_now']    = $day['formated_date'];
            $data['id_day_for_now'] = $day['iddays'];
            $this->load->view('shedule_view', $data);
            //print_r($data['rend']);
        }
        
        $this->load->view('footer_view');
    }
}