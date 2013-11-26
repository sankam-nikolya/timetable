<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shedule extends CI_Controller {

    public function index()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        if (!isset($_GET['filter']))
        {
            $_GET['filter'] = 'all_day';
        }
        if (!isset($_GET['view']))
        {
            $_GET['view'] = 'vcolumn';
        }

        if (isset($_GET['s']))
        {
            $this->subject_info();
        }
        else 
        {
            $this->load->view('header_view');
            $this->load->view('menu_view');
            $this->load->view('time_view');

            $this->load->model('shedule_model');

            $data['days'] = $this->shedule_model->get_days($this->input->get('filter'));
            $data['pars_timing'] = $this->shedule_model->get_time();
            $data['groups'] = $this->shedule_model->get_groups();

            $data['subjects'] = array();
            foreach ($data['days'] as $day)
            {
                $data['day_for_now'] = $day;
                $this->load->view('shedule_blank_view', $data);
                foreach ($data['groups'] as $group)
                {
                    $data['group_for_now'] = $group['name'];
                    $data['pars'] = $this->shedule_model->get_pars($day['date'], $group['idgroups']);

                    $data['pars_rendered'] = array(count($data['pars_timing']));
                    for ($i = 0; $i < count($data['pars_timing']); $i++)
                    {
                        $data['pars_rendered'][$i] = '<td class="cell">';
                        foreach ($data['pars'] as $pars)
                        {
                            if ($pars['num']-1 == $i && $pars['type'] == 0)
                            {
                                $data['pars_rendered'][$i] .= '<p><span title="Общая пара.">'.$pars['subject'].'</span> <span class="clr">'. $pars['cabinet'] .'</span></p>';
                            }
                            if ($pars['num']-1 == $i && ($pars['type'] == 1 || $pars['type'] == 2))
                            {
                                if ($pars['type'] == 1)
                                {
                                    $data['pars_rendered'][$i] .= '<p><span class="wordup" title="Верхняя подгруппа.">'. $pars['subject'] .'</span> <span class="clr">'. $pars['cabinet'] .'</span></p>';
                                }
                                if ($pars['type'] == 2)
                                {
                                    $data['pars_rendered'][$i] .= '<p><span class="wordbottom" title="Нижняя подгруппа.">'. $pars['subject'] .'</span> <span class="clr">'. $pars['cabinet'] .'</span></p>';
                                }
                            }
                        }
                        $data['pars_rendered'][$i] .= '</td>';
                    }
                    $this->load->view('shedule_groups_view', $data);
                }
            }
            $this->load->view('shedule_bottom_view', $data);
            $this->load->view('footer_view');
        }
    }

    public function subject_info()
    {
        $this->load->view('header_view');
        $this->load->view('menu_view');
        $this->load->view('subject_info_view');
    }
}