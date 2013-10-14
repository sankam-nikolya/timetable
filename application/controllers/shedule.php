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
            $this->load->view('filter_view');

            $this->load->model('shedule_model');

            $data['days'] = $this->shedule_model->get_days($_GET['filter']);
            //$data['hw'] = $this->shedule_model->get_hw();
            $data['pars_timing'] = $this->shedule_model->get_time();
            $data['groups'] = $this->shedule_model->get_groups();

            $data['subjects'] = array();
            $temp_array_names_pars = array();
            $temp_array_ids_pars = array();
            $temp_array_types_pars = array();

            /*foreach ($data['days'] as $q_days)
            {
                $data['day_for_now'] = $q_days;
                foreach ($data['groups'] as $q_groups)
                {
                    $data['pars'] = $this->shedule_model->get_pars($q_days['date'], $q_groups['idgroups']);

                    for ($j = 0; $j < count($data['pars_timing']); $j++)
                    {
                        array_push($temp_array_names_pars, array('name' => '&nbsp;', 'id' => 0));
                        array_push($temp_array_ids_pars, 0);
                        array_push($temp_array_types_pars, 0);

                    }
                    for ($j = 0; $j < count($data['pars_timing']); $j++)
                    {
                        foreach($data['pars'] as $item)
                        {
                            $temp_array_names_pars[$item['num']-1] = array('name' => $item['subject'], 'id' => $item['idsubects'], 'type' => $item['overall']);
                        }
                    }

                    array_push($data['subjects'], array('group_name' => $q_groups['name'], array('pars' => $temp_array_names_pars, 'type' => $temp_array_types_pars)));
                    $temp_array_names_pars = array();
                    $temp_array_ids_pars = array();
                    $temp_array_types_pars = array();


                }
                //$this->load->view('shedule_view', $data);
                print_r($data['subjects']);
                $data['subjects'] = array();
            }*/

            $this->load->view('shedule_blank_view', $data);
            foreach ($data['days'] as $day)
            {
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
                            if ($pars['num']-1 == $i && $pars['overall'] == 0)
                            {
                                $data['pars_rendered'][$i] .= $pars['subject'].' <span class="clr">'. $pars['cabinet'] .'</span>';
                            }
                            if ($pars['num']-1 == $i && ($pars['overall'] == 1 || $pars['overall'] == 2))
                            {
                                if ($pars['overall'] == 1)
                                {
                                    $data['pars_rendered'][$i] .= '<span class="wordup">'. $pars['subject'] .'</span> <span class="clr_for_small">'. $pars['cabinet'] .'</span>';
                                }
                                if ($pars['overall'] == 2)
                                {
                                    $data['pars_rendered'][$i] .= '<br><span class="wordbottom">'. $pars['subject'] .'</span> <span class="clr_for_small">'. $pars['cabinet'] .'</span>';
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